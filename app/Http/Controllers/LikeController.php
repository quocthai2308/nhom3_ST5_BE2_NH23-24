<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLikeProduct;
class LikeController extends Controller
{
    //
    public function getLikeStatus(Request $request)
    {
        $userId = session('user_id'); 
        $productId = $request->input('product_id');

        $isLiked = UserLikeProduct::getLikeStatus($userId, $productId);

        return response()->json(['isLiked' => $isLiked]);
    }
}
