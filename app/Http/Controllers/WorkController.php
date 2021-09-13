<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Work;
use PHPUnit\Framework\Error\Warning;

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
    
    public function list(Request $request)
    {
        $work = Work::all();
        return view('work.list', ['works' => $work]);
    }
    
    public function judge(Request $request)
    {
        if ($request->has('update')) {
            $data = $this->edit($request);
            return view('work.edit', $data);
        } else {
            $this->remove($request);
            return redirect('/pf');
        }
    }
    
    public function edit(Request $request)
    {
        $works = Work::find($request->chk)->first();
        
        $data = [
            'works' => $works
        ];
        
        return $data;
    }
    
    public function update(Request $request)
    {
        // テーブル「workss」に保存
        $work = Work::find($request->id);
        $work->name = $request->name;
        $work->picture = $request->picture;
        $work->extension = $request->file('picture')->extension();
        $work->job_role = $request->job_role;
        $work->save();
        
        // 保存したデータのIDを取得
        $id = $work->id;
        
        // ファイルをアップロード
        $ext = '.' . $request->file('picture')->extension();
        Storage::disk('public')->putFileAs('files', $request->file('picture'),  $id . $ext);
        
        return redirect('/pf');
    }
    
    public function remove(Request $request)
    {
        try {
            // 画像ファイルの削除
            foreach ($request->chk as $id)
            {
                $work = Work::find($id);
                Storage::disk('public')->delete('files/' . $work->id . '.' . $work->extension);
            }
            
            // 対象データの削除
            Work::whereIn('id', $request->chk)->delete();
        } catch (\Throwable $th) {
            
        }
        
        return redirect('/pf');
    }
}