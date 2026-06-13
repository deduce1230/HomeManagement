<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//-- モデル ---//

//-- 記録 --//
use App\Models\Unit;

//-- ユーザーＩＤ取得用 ---//
use Illuminate\Support\Facades\Auth;

class FileManageController extends Controller
{
    public function index(){

    	return view('labos.file_index');
    }

    public function store(Request $request){
        //dd($request->all());
        //$request->file('file')->store('');
        $file_name = $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('',$file_name);
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * diaryRecordChart
     *
     * 数値記録グラフ表示画面
     *
     * @return 表示画面ビュー, 表示マスタ情報
     */
    //public function diaryRecordChart()
    public function diaryRecordChart($_year, $_month)
    {

       $target_date      = mktime(00,00,00,$_month,01,$_year);

       $day_start = date("Y-m-d",$target_date);
       $day_end   = date("Y-m-t",$target_date);

       //-- 表示項目 --
       $groups = RecordGroup::orderBy('id', 'asc')->get();

       return view('records.healths.chart',['record_kinds' => $groups, 'user_id' => Auth::id(),
                                            'target_year' => $_year, 'target_month' => $_month,
                                            'day_start' => $day_start, 'day_end' => $day_end]);
    }

    /**
     * diaryRecordGrid
     *
     * 数値記録グラフ入力画面(表示情報）
     *
     * @return 
     */
    //public function diaryRecordGrid($_day_start, $_day_end)
    public function diaryRecordGrid($_year, $_month)
    {//グラフ検証

       $target_date      = mktime(00,00,00,$_month,01,$_year);
       
       $day_start = date("Y/m/d",$target_date);
       $day_end   = date("Y/m/t",$target_date);

       $target_year  = date("Y",$target_date);;
       $target_month = date("m",$target_date);;

       $before_year = date('Y',strtotime("-1month",strtotime($_year . '/' . $_month . '/01')));
       $before_month= date('m',strtotime("-1month",strtotime($_year . '/' . $_month . '/01')));
       $next_year   = date('Y',strtotime("+1month",strtotime($_year . '/' . $_month . '/01')));
       $next_month  = date('m',strtotime("+1month",strtotime($_year . '/' . $_month . '/01')));

       //-- 表示項目 --
       //$groups = RecordGroup::orderBy('id', 'asc')->get();
       $health = VwHealth::where('user_id' , Auth::id())->orderBy('virtual_id', 'asc')->get();


       // 取得値を「日付=>値」の連想配列に格納
       $db_records=array();
       foreach($health as $record_r){
             $db_records[$record_r->rec_date]['Kind1'] = $record_r->Kind1;
             $db_records[$record_r->rec_date]['Kind2'] = $record_r->Kind2;
             $db_records[$record_r->rec_date]['Kind3'] = $record_r->Kind3;
             $db_records[$record_r->rec_date]['Kind4'] = $record_r->Kind4;
             $db_records[$record_r->rec_date]['Kind5'] = $record_r->Kind5;
             $db_records[$record_r->rec_date]['Kind6'] = $record_r->Kind6;
             $db_records[$record_r->rec_date]['Kind7'] = $record_r->Kind7;
       }

       //print($db_records['2021-08-22']['Kind1']);

       // 開始～終了日を日単位で配列に格納
       $days_records=$this->getPriaoDate($day_start, $day_end);

       // 日単位の配列から、「日付=>値」を取り出して再配列（ない場合は「null」）
       $rtn_records=array();
       foreach($days_records as $days)
       {
           //$rtn_days['date'][]   = date('n月d日', strtotime($days));
           $rtn_day = date('n/d', strtotime($days));
           $rtn_records[$rtn_day]['Week']  = $this->getWeekday($days);
           $rtn_records[$rtn_day]['Kind1'] = array_key_exists($days, $db_records) ? $db_records[$days]['Kind1'] : '';
           $rtn_records[$rtn_day]['Kind2'] = array_key_exists($days, $db_records) ? $db_records[$days]['Kind2'] : '';
           $rtn_records[$rtn_day]['Kind3'] = array_key_exists($days, $db_records) ? $db_records[$days]['Kind3'] : '';
           $rtn_records[$rtn_day]['Kind4'] = array_key_exists($days, $db_records) ? $db_records[$days]['Kind4'] : '';
           $rtn_records[$rtn_day]['Kind5'] = array_key_exists($days, $db_records) ? $db_records[$days]['Kind5'] : '';
           $rtn_records[$rtn_day]['Kind6'] = array_key_exists($days, $db_records) ? $db_records[$days]['Kind6'] : '';
           $rtn_records[$rtn_day]['Kind7'] = array_key_exists($days, $db_records) ? $db_records[$days]['Kind7'] : '';
           $rtn_days[]  = $rtn_day;
       }

       return view('records.healths.health-show',['healths' => $rtn_records, 'days' => $rtn_days, 'user_id' => Auth::id(),
           'target_year' => $target_year, 'target_month' => $target_month, 'next_year' => $next_year, 'next_month' => $next_month, 'before_year' => $before_year, 'before_month' => $before_month]);
    }

    /**
    * setRecordData
    *
    * 日付、ユーザーIDをもとに、その日のデータを登録する。
    *
    * 作成日
    *   2021/09/10
    *
    * @param integer $_kind_id    データ種別ID
    * @param string  $_date       登録対象日
    * @param float   $_value      値
    * @param integer $_user_id    取得対象ユーザーID
    * return 1(OK) -1(NG)
    */
    public function setRecordData(Request $request)
    {
        $_date    = $request->input('rec_date');
        $_kind_id = $request->input('kind_id');
        $_value   = $request->input('rec_val');
        $_user_id = $request->input('rep_user_id');

        $_target_id = $this->getRecordDataID($_date, $_kind_id, $_user_id);

        if ( $_target_id > 0 )
        {
            $record_savedata = [
                'id'          => $_target_id,
                'rec_date'    => $_date,
                'rec_kind'    => $_kind_id,
                'rec_val'     => $_value,
                'rep_user_id' => $_user_id,
            ];

            $record = DiaryRecord::where('id', $_target_id)->update($record_savedata);
        }else{
            $maxRecId = DiaryRecord::max('id');
            $nextRecId = $maxRecId + 1;
            $record_savedata = [
                'id'          => $nextRecId,
                'rec_date'    => $_date,
                'rec_kind'    => $_kind_id,
                'rec_val'     => $_value,
                'rep_user_id' => $_user_id,
            ];

            $db_data = new DiaryRecord;
            $db_data->fill($record_savedata)->save();
        }

        //return 1;
        // HTTPステータス:200 成功
        //return response()->json($this->deleteService>getDeleteMessage(), 
        //    \Illuminate\Http\Response::HTTP_OK);
        //echo "ZZZZZZZZ";
        return 1;

    }

    private function getRecordDataID($_date, $_rec_kind, $_user_id)
    {

       $recordKinds = DiaryRecord::where('rec_date', $_date)->where('rec_kind', $_rec_kind)->where('rep_user_id', $_user_id)->first();
       //$rtn_id = optional($recordKinds)->id;

       if (is_object($recordKinds))
       {
           $rtn_id = optional($recordKinds)->id;

       }else {
           $rtn_id = 0;
       }

       //$rtn_id = 0;
       return $rtn_id;

    }
         



    /**
    * getRecordData
    *
    * 記録タイプ、開始＆終了日、記録者のパラメータから
    * 該当記録をJSON形式で返還する関数。
    * 開始～終了は１日単位で返し、対象日に該当データがない場合は「null」とする
    * 
    * 作成日 
    *   2021/08/09
    *
    * @param integer $_rec_kind   表示種別(record_groupsの値)
    * @param string  $_day_start  取得開始日
    * @param string  $_day_end    取得終了日
    * @param integer $_user_id    取得対象ユーザーID
    * return array   値, 日付
    */
    public function getRecordData($_rec_kind, $_day_start, $_day_end, $_user_id)
    {
       $max_kinds=7;
       $rec_kinds=array_fill(0,$max_kinds+1,0);

       $rec_color=['rgba(0,0,0,0)',
                        'rgba(253, 134, 197, 0.7)','rgba(253, 135, 97, 0.7)','rgba(50,255,150,0.9)','rgba(150,85,155,0.9)',
                        'rgba(255,128,0,0.9)','rgba(128,128,0,0.9)','rgba(0,0,128,0.9)'];
       switch($_rec_kind)
       {
           case 1://血圧（朝、夕、上下）
               $rec_kinds[1]=1; 
               $rec_kinds[2]=1; 
               $rec_kinds[3]=1; 
               $rec_kinds[4]=1; 
               break;
           case 2://体重・腹囲
               $rec_kinds[5]=1;
               $rec_kinds[7]=1;
               break;
           case 3://歩数
               $rec_kinds[6]=1;
       }

       $recordKinds = RecordKind::orderBy('rec_kind', 'asc')->get();
       forEach($recordKinds as $recordKind){
           $recordName[$recordKind->rec_kind]= $recordKind->kind_name;
       }

       $rtn_datasets=array();
       $rtn_data=array();
       for($i = 1; $i <= $max_kinds; $i++) {
           if ($rec_kinds[$i]>0) {
               // Where条件作成
               $condition_where  = ['rec_kind' => $i, 'rep_user_id' => $_user_id];
               $condition_where2 = [ ['rec_date','>=',date("Y-m-d", strtotime($_day_start))],
                                     ['rec_date','<=',date("Y-m-d", strtotime($_day_end))] ];
               // DiaryRecordモデルから取得
               $records = DiaryRecord::where($condition_where)->where($condition_where2)->get();

               // 取得値を「日付=>値」の連想配列に格納
               $db_records=array();
               foreach($records as $record_r){
                   $db_records[$record_r->rec_date] = $record_r->rec_val;
               }

               // 開始～終了日を日単位で配列に格納
               $days_records=$this->getPriaoDate($_day_start, $_day_end);

               // 日単位の配列から、「日付=>値」を取り出して再配列（ない場合は「null」）
               $rtn_records=array();
               foreach($days_records as $days)
               {
                   $rtn_records['date'][]   = date('n月d日', strtotime($days));
                   $rtn_records['values'][] = array_key_exists($days, $db_records) ? $db_records[$days] : 'null';
               }

               // データ作成
               $rtn_datasets['label']= $recordName[$i];
               
               $rtn_datasets['type']= 'line';
               $rtn_datasets['data']= $rtn_records['values'];
               //$rtn_datasets['backgroundColor']='rgba(0, 134, 197, 0.7)';
               //$rtn_datasets['borderColor']='rgba(0, 134, 197, 1)';
               $rtn_datasets['backgroundColor']=$rec_color[$i];
               $rtn_datasets['borderColor']=$rec_color[$i];
               $rtn_datasets['borderWidth']=1;
               $rtn_datasets['spanGaps']=true;

               // y軸設定
               $rtn_datasets['yAxisID']='y-axis-left';
               if ($i == 7) $rtn_datasets['yAxisID']="y-axis-right";

               $rtn_data['datasets'][] = $rtn_datasets;
           }
       }

       // 以下、グラフ共通設定
       $rtn_data['labels']   = $rtn_records['date'];

       $rtn_legend=array();
       $rtn_legend['display']= false;

       $rtn_options=array();
       $rtn_options['legend']=$rtn_legend;
     
       //-- 軸ラベルの設定 
       switch($_rec_kind)
       {
           case 1://血圧（朝、夕、上下）
               $rtn_options['scales']['y-axis-left']['position']='left';
               $rtn_options['scales']['y-axis-left']['max']=150;
               $rtn_options['scales']['y-axis-left']['min']=60;
               $rtn_options['scales']['y-axis-left']['title']['display']=true;
               $rtn_options['scales']['y-axis-left']['title']['text']='血圧(mHg)';
               break;
           case 2://体重・腹囲
               $rtn_options['scales']['y-axis-left']['position']='left';
               $rtn_options['scales']['y-axis-left']['max']=90;
               $rtn_options['scales']['y-axis-left']['min']=40;
               $rtn_options['scales']['y-axis-left']['title']['display']=true;
               $rtn_options['scales']['y-axis-left']['title']['text']='体重(kg)';
               $rtn_options['scales']['y-axis-right']['position']='right';
               $rtn_options['scales']['y-axis-right']['max']=100;
               $rtn_options['scales']['y-axis-right']['min']=50;
               $rtn_options['scales']['y-axis-right']['title']['display']=true;
               $rtn_options['scales']['y-axis-right']['title']['text']='腹囲(cm)';
               break;
           case 3://歩数
               $rtn_options['scales']['y-axis-left']['position']='left';
               $rtn_options['scales']['y-axis-left']['beginAtZero']=true;
               $rtn_options['scales']['y-axis-left']['title']['display']=true;
               $rtn_options['scales']['y-axis-left']['title']['text']='歩数';
               break;
       }
    
       $rtn_config=array();
       $rtn_config['data']    = $rtn_data;
       $rtn_config['options'] = $rtn_options;

       return [$rtn_config];
    }

    /**
    * getPriaoDate
    *
    * 指定期間の日付を配列で返す
    *
    * @paran string  $_day_start  開始日 
    * @paran string  $_day_start  終了日
    * return array                日単位の連続した配列
    */
    private function getPriaoDate($_day_start, $_day_end )
    {
        $start = $_day_start;
        $end = $_day_end;
        $diff = (strtotime($end) - strtotime($start)) / ( 60 * 60 * 24);
        $period = array();
        for($i = 0; $i <= $diff; $i++) {
           $period[] = date('Y-m-d', strtotime($start . '+' . $i . 'days'));
        }
        return $period;
     }

    /**
    * getWeekday
    *
    * 指定日付の曜日を返す
    *
    * @paran string  $_date  対象日 
    * return                 曜日（漢字）
    */
     private function getWeekday($_date)
     {
         $week = array( "日", "月", "火", "水", "木", "金", "土" );

         return $week[date("w", strtotime($_date))];
     }

}
