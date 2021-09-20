<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ListRequest;

class SkillController extends Controller
{
    public function index(Request $request, $id)
    {
        //$work = Skill::find($id);
        //return view('pf.work', ['work' => $work]);
    }
    
    public function add()
    {
        //Itemsテーブルから「Skill」一覧を取得
        $items = Item::where('sub_id', 1)->get();
        
        return view('skill.add', ['items' => $items]);
    }
    
    public function create(Request $request)
    {
        // 入力チェック
        $this->validate($request, Skill::$rules, Skill::$message);
        
        // テーブル「skills」に保存
        $skills = new Skill;
        $skills->items_id = $request->items;
        $skills->name = $request->name;
        $skills->skill = $request->skill;
        $skills->save();
        
        return redirect('/pf');
    }
    
    public function list(Request $request)
    {
        $skills = DB::table('skills')
        ->leftJoin('items', 'skills.items_id', '=', 'items.sort_id')
        ->where('items.sub_id', '=', 1)
        ->select('skills.id', 'items.name as iname', 'skills.name as sname')
        ->orderBy('skills.items_id')
        ->get();
        return view('skill.list', ['skills' => $skills]);
    }
    
    public function judge(ListRequest $request)
    {
        if ($request->has('update')) {
            return redirect()->route('edit', ['chk' => $request->chk]);
            //$data = $this->edit($request);
            //return view('skill.edit', $data);
        } else {
            $this->remove($request);
            return redirect('/pf');
        }
    }
    
    public function edit(Request $request)
    {
        $items = Item::where('sub_id', 1)->get();
        $skills = Skill::find($request->chk)->first();
        
        $data = [
            'items' => $items,
            'skills' => $skills
        ];
        
        return view('skill.edit', $data);
    }
    
    public function update(Request $request)
    {
        // 入力チェック
        $this->validate($request, Skill::$rules, Skill::$message);
        
        // テーブル「skills」に保存
        $skills = Skill::find($request->id);
        $form = $request->all();
        
        // 不要項目の削除
        unset($form['_token']);
        unset($form['items']);
        
        $skills->fill($form)->save();
        
        return redirect('/pf');
    }
    
    public function remove(Request $request)
    {
        // 対象データの削除
        Skill::whereIn('id', $request->chk)->delete();
    }
}
