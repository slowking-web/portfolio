<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Item;

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
        // テーブル「skills」に保存
        $skills = new Skill;
        $skills->items_id = $request->items;
        $skills->name = $request->name;
        $skills->skill = $request->skill;
        $skills->save();
        
        return redirect('/pf');
    }
}
