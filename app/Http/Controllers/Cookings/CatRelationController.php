<?php

namespace App\Http\Controllers\Cookings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cookings\CatRelation;
use App\Http\Requests\Cookings\CatRelationRequest;

class CatRelationController extends Controller
{
    public function index()
    {
        $cat_relation = CatRelation::orderBy('rec_id', 'asc')->paginate(10);
        return view('cookings.settings.tables.cat_relation.index', ['cat_relations' => $cat_relation]);
    }

    public function create()
    {
        /**
         * 登録フォーム
         */
        return view('cookings.settings.tables.cat_relation.create');
    }

    public function store(CatRelationRequest $request)
    {
        //
        $savedata = [
            'rec_id' => $request->rec_id,
            'dish_id' => $request->dish_id,
            'cat_id' => $request->cat_id,
        ];

        $cat_relation = new CatRelation;
        $cat_relation->fill($savedata)->save();

        return redirect('/cooking/setting/table/cat_relation')->with('poststatus', '新規登録しました');

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
        $cat_relation = CatRelation::findOrFail($rec_id);
        return view('cookings.settings.tables.cat_relation.edit', ['cat_relation' => $cat_relation]);
    }


    /**
     * 編集実行
     */
    public function update(CatRelationRequest $request)
    {

        $cat_relation = CatRelation::where('rec_id', $request->rec_id)
            ->update(['dish_id' => $request->dish_id,
                      'cat_id' => $request->cat_id]);

        return redirect('/cooking/setting/table/cat_relation')->with('poststatus', 'データを編集しました');
    }

    /**
     * 物理削除
     */
    public function destroy($id)
    {
        $cat_relation = CatRelation::findOrFail($id);

        $cat_relation->delete();

        return redirect('/cooking/setting/table/cat_relation')->with('poststatus', 'データを削除しました');
    }
}
