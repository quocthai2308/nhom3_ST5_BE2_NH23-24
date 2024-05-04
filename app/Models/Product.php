<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserLikeProduct;



class Product extends Model
{
    /**
     * @param  $id
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function getTenPreProducts()
    {
        $products = Product::with('images')->take(10)->get();
        return $products;
    }
    public function getSpecialOfferProducts()
    {
        $products = Product::with('images')->offset(10)->limit(30)->get();
        return $products;
    }
    public function getNewProducts()
    {
        $products = Product::with('images')->orderByDesc('id')->limit(10)->get()->reverse();
        return $products;
    }
    public function getProductDetails($id)
    {
        return self::find($id);
    }
    public function getProductByKeyword($keyword)
    {
        $products = Product::where('name', 'LIKE', "%{$keyword}%")->get();
        return $products;
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }
    public function getProductsByCategoryId($categoryId)
    {
        $products = Product::whereHas('categories', function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        })
            ->with('images')
            ->orderByDesc('id')
            ->get();
        return $products;
    }
    // thêm lượt thích
    public function addProductToUserLikes($userId, $productId)
    {
        $existingLike = UserLikeProduct::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if (!$existingLike) {
            $userLikeProduct = new UserLikeProduct;
            $userLikeProduct->user_id = $userId;
            $userLikeProduct->product_id = $productId;
            $userLikeProduct->save();
        } else {
            UserLikeProduct::where('user_id', $userId)
                ->where('product_id', $productId)
                ->delete();
        }
    }
    // MARK: hàm lấy sản phẩm đã like
    public function getProductLiked($userId)
    {
        $products = Product::query()
            ->from('products as p')
            ->join('user_like_product as ulp', 'p.id', '=', 'ulp.product_id')
            ->join('users as u', 'u.id', '=', 'ulp.user_id')
            ->join('images as i', 'p.id', '=', 'i.product_id')
            ->where('u.id', $userId)
            ->select('p.*')
            ->get();
        return $products;
    }

    // Lấy tất cả sản phẩm
    public function getAllProducts()
    {
        return self::orderBy('updated_at', 'desc')->get();
    }


    protected $fillable = ['name', 'description', 'price'];

    // Hàm thêm sản phẩm
    public static function store($name, $description, $price)
    {
        $product = new self;
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        return $product->save();
    }

    // Hàm sửa sản phẩm
    public function modify($name, $description, $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        return $this->save();
    }

    // Hàm xoá sản phẩm
    public function remove()
    {
        return $this->delete();
    }
    public function getLimitedProductCount()
    {
        $products = self::query()
            ->from('products as p')
            ->join('bill_product as bp', 'p.id', '=', 'bp.product_id')
            ->select('p.name', self::raw('SUM(bp.quantity) as total_quantity'))
            ->groupBy('p.name')
            ->orderBy('total_quantity', 'DESC')
            ->limit(7)
            ->get();
        return $products;
    }

    use HasFactory;
}
