<?php

namespace App\Http\Controllers\Cookings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cookings\Record;
use App\Http\Requests\Cookings\RecordRequest;

class RecordController extends Controller
{
    public function index()
    {
        $record = Record::orderBy('rec_id', 'asc')->paginate(10);
        return view('cookings.settings.tables.record.index', ['records' => $record]);
    }

    public function create()
    {
        /**
         * 登録フォーム
         */
        return view('cookings.settings.tables.record.create');
    }

    public function store(RecordRequest $request)
    {
        //
        $savedata = [
            'rec_id'    => $request->rec_id,
            'meal_date' => $request->meal_date,
            'meal_id'   => $request->meal_id,
            'recipe_id' => $request->recipe_id,
            'flg_sch'   => $request->flg_sch,
            'score'     => $request->score,
            'memo'      => $request->memo,
        ];

        $record = new Record;
        $record->fill($savedata)->save();

        return redirect('/cooking/setting/table/record')->with('poststatus', '新規登録しました');

    }

    public function show($id)
    {
        //
    }

    /**
     * 編集画面
     */
    public function edit($rec_id)
    {
        $record = Record::findOrFail($rec_id);
        return view('cookings.settings.tables.record.edit', ['record' => $record]);
    }


    /**
     * 編集実行
     */
    public function update(RecordRequest $request)
    {

        $record = Record::where('rec_id', $request->rec_id)
            ->update(['meal_date'  =>$request->meal_date,
                      'meal_id'    =>$request->meal_id,
                      'recipe_id'  =>$request->recipe_id,
                      'flg_sch'    =>$request->flg_sch,
                      'score'      =>$request->score,
                      'memo'       =>$request->memo,
                     ]);

        return redirect('/cooking/setting/table/record')->with('poststatus', 'データを編集しました');
    }

    /**
     * 物理削除
     */
    public function destroy($id)
    {
        $record = Record::findOrFail($id);

        $record->delete();

        return redirect('/cooking/setting/table/record')->with('poststatus', 'データを削除しました');
    }
}
