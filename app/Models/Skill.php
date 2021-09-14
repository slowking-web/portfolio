<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['items_id', 'name', 'skill'];
    
    public static $rules = [
        'name' => 'required',
        'skill' => 'required',
    ];
    
    public static $message = [
        'name.required' => 'スキル項目を入力してください',
        'skill.required' => 'スキル詳細を入力してください',
    ];
    
    use HasFactory;
}
