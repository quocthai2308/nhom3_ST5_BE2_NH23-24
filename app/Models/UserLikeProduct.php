<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLikeProduct extends Model
{
    protected $table = 'user_like_product';
    public $timestamps = false;
    use HasFactory;
}
