<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Function lấy toàn bộ sản phẩm
    public function index() {
        $productModel = new Product();
        $products = $productModel->getAllProducts();
        return view('admin.manage-product', compact('products'));
    }

    // Hàm thêm sản phẩm
    public function store(Request $request) {
    $name = $request->input('name');
    $description = $request->input('description');
    $price = $request->input('price');
    $category_ids = $request->input('category_ids'); // Mảng ID của các danh mục
    
    $product = Product::store($name, $description, $price);
    
    // Liên kết sản phẩm với các danh mục
    $product->categories()->sync($category_ids);
    
    return response()->json(['product' => $product], 201);
    }
    // Hàm sửa sản phẩm
    public function modify(Request $request, $id) {
        $product = Product::find($id);

    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    $name = $request->input('name');
    $description = $request->input('description');
    $price = $request->input('price');
    $category_ids = $request->input('category_ids'); // Mảng ID của các danh mục

    $product->modify($name, $description, $price);

    // Cập nhật liên kết giữa sản phẩm và các danh mục
    $product->categories()->sync($category_ids);

    return response()->json(['product' => $product], 200);
    }

     // Hàm xoá sản phẩm
     public function destroy($id) {
        $product = Product::find($id);

    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    // Xoá tất cả hình ảnh liên quan
    foreach ($product->images as $image) {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
    
        // Xoá liên kết giữa sản phẩm và các danh mục
        $product->categories()->detach();
    
        $product->remove();
    
        return response()->json(['message' => 'Product deleted'], 200);
        }
    }
}
