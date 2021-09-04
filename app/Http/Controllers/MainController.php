<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    private $fname;
    
    public function __construct()
    {
        $this->fname = 'aboutme.txt';
    }
    
    public function index()
    {
        // ABOUT MEの表示ファイルを取得
        $aboutme = Storage::disk('public')->get($this->fname);
        
        // MY SKILLSの表示データを取得
        $items = Item::where('sub_id', 1)->get();
        
        $skills = DB::table('skills')
        ->leftJoin('items', 'skills.items_id', '=', 'items.sort_id')
        ->where('items.sub_id', '=', 1)
        ->select('skills.id', 'skills.items_id', 'skills.name', 'skills.skill')
        ->get();
        
        $data = [
            'aboutme' => $aboutme,
            'items' => $items,
            'skills' => $skills
        ];
        
        return view('pf.index', $data);
    }
}
