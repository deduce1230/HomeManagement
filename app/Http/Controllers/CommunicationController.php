<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//-- モデル ---//
//use App\Models\Todo\Category;

//-- 記録 --//
use App\Models\Unit;

//-- push通知用 ---//
use App\Models\Communications\Endpoint;
//-- LINE用 ---//
use App\Models\Communications\Line;

//-- ユーザーＩＤ取得用 ---//
use Illuminate\Support\Facades\Auth;

//-- WebPush用 --//
//require_once 'vendor/autoload.php';
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;


class CommunicationController extends Controller
{
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
     * line
     *
     * LINE表示画面
     *
     * @return 表示画面ビュー情報
     */
    public function line()
    {//LINEテスト
        //$tweet = Tweet::where('rec_id',$tweet_id)->get();
        return view('communications.line');
    }

    /**
    * linePost
    *
    * HMラインメッセージの保存用API
    *
    * 作成日
    *   2022/10/29
    *
    * @param text $_endpoint   エンドポイント
    * return true
    */
    public function linePost(Request $request)
    {//-- 

//        if ($request->endpoint == 'undefined') {
//            return -99;
//        }

        $maxRecId = Line::max('rec_id');
        $nextRecId = $maxRecId + 1;
        $savedata = [
            'rec_id'         => $nextRecId,
            'line_date'      => $request->line_date,
            'line_time'      => $request->line_time,
            'line_text'      => $request->line_text,
            'user_id_from'   => Auth::id(),
            'user_id_to'     => $request->user_id_to,
            'read'           => false,
        ];

        $db_data = new Line;
        $db_data->fill($savedata)->save();

        return 0;
    }


    /**
    * lineGet
    *
    * HMラインメッセージの取得用API
    *
    * 作成日
    *   2022/10/29
    *
    * @param text $_endpoint   エンドポイント
    * return true
    */
    public function lineGet($_target_day)
    {//--

//        if ($request->endpoint == 'undefined') {
//            return -99;
//        }


        $line_messages   = Line::where('user_id_from', Auth::id())->get();
        $mes=array();
        foreach($line_messages as $line_message){
            $mes['contents'][]=$line_message->line_text;
        }

        print_r($mes);
        //return [$mes];
    }

/*---------- 以下、WebPush登録画面 ----------------------*/
    /**
     * push
     *
     * push通知表示画面
     *
     * @return プッシュ画面ビュー情報
     */
    public function push()
    {//pushテスト
        return view('labos.push');
    }

    /**
    * pushRegist
    *
    * プッシュ用のトークンなどの保存用API
    * 
    * 作成日 
    *   2022/10/19
    *
    * @param text $_endpoint   エンドポイント
    *        text $_publicKey  公開鍵
    *        text $_authToken  トークン
    * return true
    */
    public function pushRegist(Request $request)
    {//-- トークン登録

        if ($request->endpoint == 'undefined') {
            return -99;
        }
        
        $maxRecId = Endpoint::max('rec_id');
        $nextRecId = $maxRecId + 1;
        $savedata = [
            'rec_id'     => $nextRecId,
            'user_id'    => Auth::id(),
            'endpoint'   => $request->endpoint,
            'public_key' => $request->publickey,
            'token'      => $request->token,
        ];

        $db_data = new Endpoint;
        $db_data->fill($savedata)->save();

        //$rtn = $this->pushMessage(1,'HELLO!!');

        return 0;
    }

    public function pushMessage($user_id, $message)
    {
        $VAPID_SUBJECT = "https://deduce221b.clear-net.jp/";
        $PUBLIC_KEY = 'BIO6BC_OWKp_bqRRZZefiwigzGGnInhAaWwu-qcyDSyDp_UCCAcKrnA7-tsQEc_BvbBGAJPK4VYTr_2o4XLpF58';
        $PRIVATE_KEY = 'liqjDEk4kg5tQjBf4SA0LcUqlwZckgUQy8uKcJeUsRc';


        $push_infos = Endpoint::where('user_id', $user_id)->orderBy('rec_id','asc')->get();

        foreach ($push_infos as $push_info){

            $subscription = Subscription::create([
                'endpoint' => $push_info->endpoint,
                'publicKey' => $push_info->public_key,
                'authToken' => $push_info->token
            ]);

            // ブラウザに認証させる
            $auth = [
                'VAPID' => [
                    'subject' => $VAPID_SUBJECT,
                    'publicKey' => $PUBLIC_KEY,
                    'privateKey' => $PRIVATE_KEY
                ]
            ];

            $webPush = new WebPush($auth);
            
            $report = $webPush->sendOneNotification(
                $subscription,
                $message,
            );

            $endpoint = $report->getRequest()->getUri()->__toString();
        }

        return 0;
    }
}
