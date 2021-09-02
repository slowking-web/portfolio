<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Work;

class WorkController extends Controller
{
    public function index(Request $request, $id)
    {
        $work = Work::find($id);
        return view('pf.work', ['work' => $work]);
    }

    public function json($id = -1)
    {
        if ($id == -1)
        {
            return Work::get()->toJson();
        }
        else
       {
           return Work::find($id)->toJson();
        }
    }
    
    public function add()
    {
        return view('work.add');
    }
    
    public function create(Request $request)
    {
        // テーブル「works」に保存
        $work = new Work;
        $work->name = $request->name;
        $work->picture = $request->picture;
        $work->extension = $request->file('picture')->extension();
        $work->job_role = $request->job_role;
        $work->save();
        
        // 保存したデータのIDを取得
        $id = $work->id;
        
        // ファイルをアップロード
        //$pname = $request->name;
        $ext = '.' . $request->file('picture')->extension();
        Storage::disk('public')->putFileAs('files', $request->file('picture'),  $id . $ext);
        
        return redirect('/pf');
    }
}