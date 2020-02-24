<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // 作成日時カラムの指定
    const CREATED_AT = 'create_dt';
    // 更新日時カラムの指定
    const UPDATED_AT = 'update_dt';
    // $fillable = ['category', 'category_name', 'del_flg']; 
}
