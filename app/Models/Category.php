<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getParentCategories (){
        return self::where('parent_id', 0)->get();
    }
    use HasFactory;
}
