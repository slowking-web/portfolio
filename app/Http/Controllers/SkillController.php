<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

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
    
    public function delete(Request $request)
    {
        $skills = DB::table('skills')
        ->leftJoin('items', 'skills.items_id', '=', 'items.sort_id')
        ->where('items.sub_id', '=', 1)
        ->select('skills.id', 'items.name as iname', 'skills.name as sname')
        ->get();
        return view('skill.del', ['skills' => $skills]);
    }
    
    public function remove(Request $request)
    {
        // 対象データの削除
        Skill::whereIn('id', $request->chk)->delete();
        
        return redirect('/pf');
    }
}
