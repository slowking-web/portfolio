<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Work;

class WorkController extends Controller
{
    public function index()
    {
        return view('pf.work');
    }
    
    public function add()
    {
        return view('work.add');
    }
    
    public function create(Request $request)
    {
        $work = new Work;
        $work->name = $request->name;
        $work->picture = $request->picture;
        $work->job_role = $request->job_role;
        $work->save();
        
        return redirect('/pf');
    }
}