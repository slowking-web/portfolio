<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function json($id = -1)
    {
        if ($id == -1)
        {
            return Menu::get()->toJson();
        }
        else
        {
            return Menu::find($id)->toJson();
        }
    }
}
