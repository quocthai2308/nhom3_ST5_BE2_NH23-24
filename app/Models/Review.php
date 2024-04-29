<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    public $timestamps = false;
    public static function store($rating, $content,$productId)
    {
        $review = new Review();
        $review->rating = $rating;
        $review->content = $content;
        $review->product_id = $productId;
        $review->user_name = session('user_name');
        $review->created_at = date('Y-m-d H:i:s');
        return $review->save();
    }
    public static function getUserName($userName)
    {
        $review = Review::where('user_name', $userName)->first();
        return $review ? true : false;
    }

    use HasFactory;
}
