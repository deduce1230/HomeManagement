<?php

namespace App\Http\Controllers\Cookings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cookings\MealKind;
use App\Http\Requests\Cookings\MealKindRequest;

class MealKindController extends Controller
{
    public function index()
    {
        $meal_kind = MealKind::orderBy('kind_id', 'asc')->paginate(10);
        return view('cookings.settings.tables.meal_kind.index', ['meal_kinds' => $meal_kind]);
    }

    public function create()
    {
        /**
         * 登録フォーム
         */
        return view('cookings.settings.tables.meal_kind.create');
    }

    public function store(MealKindRequest $request)
    {
        //
        $savedata = [
            'kind_id' => $request->kind_id,
            'kind_nm' => $request->kind_nm,
        ];

        $meal_kind = new MealKind;
        $meal_kind->fill($savedata)->save();

        return redirect('/cooking/setting/table/meal_kind')->with('poststatus', '新規登録しました');

    }

    public function show($id)
    {
        //
    }

    /**
     * 編集画面
     */
    public function edit($kind_id)
    {
        $meal_kind = MealKind::findOrFail($kind_id);
        return view('cookings.settings.tables.meal_kind.edit', ['meal_kind' => $meal_kind]);
    }


    /**
     * 編集実行
     */
    public function update(MealKindRequest $request)
    {

        $meal_kind = MealKind::where('kind_id', $request->kind_id)
            ->update(['kind_nm' => $request->kind_nm]);

        return redirect('/cooking/setting/table/meal_kind')->with('poststatus', 'データを編集しました');
    }

    /**
     * 物理削除
     */
    public function destroy($id)
    {
        $meal_kind = MealKind::findOrFail($id);

        $meal_kind->delete();

        return redirect('/cooking/setting/table/meal_kind')->with('poststatus', 'データを削除しました');
    }
}
