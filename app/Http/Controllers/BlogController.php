<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function addView(){
        return view('admin.add-blog');
    }
    public function store(Request $request){
        $blogModel = new Blog();
        $title = $request->input('title');
        $content = $request->input('content');
        if(isset($title)&&isset($content)){
        $blogModel->store($title, $content);
        return redirect()->route('manage-blog');
        }else{
            return view('admin.add-blog');
        }
    }
    public function index(){
        $blogModel = new Blog();
        $blogs = $blogModel->getAllBlogs();
        return view('admin.manage-blog',compact('blogs'));
    }

    public function blogIndex(){
        $blogModel = new Blog();
        $blogs = $blogModel->getAllBlogs();
        return view('blog',compact('blogs'));
    }
    public function blogDetail($id){
        $blogModel = new Blog();
        $blog = $blogModel->getBlogById($id);
        return view('blog-details',compact('blog'));
    }
}
