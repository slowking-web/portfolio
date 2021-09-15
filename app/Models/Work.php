<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = ['name', 'picture', 'extension', 'job_role'];
    
    public static $rules = [
        'picture' => 'required',
        'name' => 'required',
        'job_role' => 'required',
    ];
    
    public static $message = [
        'picture.required' => '画像を設定してください',
        'name.required' => '業務内容を入力してください',
        'job_role.required' => '業務詳細を入力してください',
    ];
    
    use HasFactory;
}
