<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    private $fname;
    
    public function __construct()
    {
        $this->fname = 'aboutme.txt';
    }
    
    public function index()
    {
        $aboutme = Storage::disk('public')->get($this->fname);
        
        $data = [
            'aboutme' => $aboutme
        ];
        
        return view('pf.index', $data);
    }
}
