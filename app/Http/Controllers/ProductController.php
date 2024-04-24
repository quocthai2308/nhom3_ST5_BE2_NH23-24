<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;

class ProductController extends Controller
{
    // Function lấy toàn bộ sản phẩm
    public function index()
    {
        $productModel = new Product();
        $products = $productModel->getAllProducts();
        return view('admin.manage-product', compact('products'));
    }

    // Hàm thêm sản phẩm
    public function add(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $category_ids = $request->input('category_ids'); // Mảng ID của các danh mục

        // Tạo một sản phẩm mới
        $product = new Product;
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->save();

        // Xử lý tệp hình ảnh được tải lên
        if ($request->hasFile('fileUpload')) {
            $file = $request->file('fileUpload');
            $filename = $name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('app\images\products'), $filename);

            // Tạo một bản ghi hình ảnh mới
            $image = new Image;
            $image->name = $filename;
            $image->product_id = $product->id;
            $image->save();
        }


        // Tạo liên kết giữa sản phẩm và các danh mục
        $product->categories()->sync($category_ids);

        return redirect()->route('manage-product');
    }


    // Hiển thị form edit-product
    public function showEditProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        // Lấy danh sách các danh mục để hiển thị trong form
        $categories = Category::all();

        return view('admin.form-edit-product', ['product' => $product, 'categories' => $categories]);
    }

    public function showAddProduct()
    {
        return view('admin.add-product');
    }

    // Sửa sản phẩm
    public function modify(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $category_ids = $request->input('category_ids'); // Mảng ID của các danh mục

        // Xử lý tệp hình ảnh được tải lên
        if ($request->hasFile('fileUpload')) {
            $file = $request->file('fileUpload');
            // $filename = time() . '.' . $file->getClientOriginalExtension();
            $filename = $name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('app\images\products'), $filename);

            // Tìm bản ghi hình ảnh hiện tại và cập nhật tên của nó
            $image = Image::where('product_id', $product->id)->first();
            if ($image) {
                $image->name = $filename;
                $image->save();
            }
        }

        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->save();

        // Cập nhật liên kết giữa sản phẩm và các danh mục
        $product->categories()->sync($category_ids);

        return redirect()->route('manage-product');
    }


    // Hàm xoá sản phẩm
    public function delete($id) {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Xoá tất cả hình ảnh liên quan
        foreach ($product->images as $image) {
            $image->delete();
        }

        // Xoá liên kết giữa sản phẩm và các danh mục
        $product->categories()->detach();

        // Xoá sản phẩm
        $product->delete();

        return redirect()->route('manage-product');
    }

}
