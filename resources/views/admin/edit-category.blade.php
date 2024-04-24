@extends('admin.nav')
@section('title', 'Add Category')
@section('content')

                <h1>Edit Category</h1>
            </div>
            <div class="container-fluid">
                <hr>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i
                                        class="icon-align-justify"></i> </span>
                                <h5>Category info</h5>
                            </div>
                            <div class="widget-content nopadding">

                                <!-- BEGIN USER FORM -->
                                <form action="{{ url('products.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
    @csrf
    <div class="control-group">
        <label class="control-label">Tên sản phẩm:</label>
        <div class="controls">
            <input type="text" class="span11" placeholder="Tên sản phẩm" name="name" required /> *
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Mô tả:</label>
        <div class="controls">
            <textarea class="span11" placeholder="Mô tả sản phẩm" name="description" required></textarea> *
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Giá:</label>
        <div class="controls">
            <input type="number" class="span11" placeholder="Giá sản phẩm" name="price" required /> *
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Chọn danh mục:</label>
        <div class="controls">
            <select name="category_ids[]" multiple required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select> 
        </div>
    </div>
    <!-- <div class="control-group">
        <label class="control-label">Chọn logo khác:</label>
        <div class="controls">
            <input type="file" name="fileUpload" id="fileUpload">
        </div>
    </div> -->
    <div class="form-actions">
        <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
    </div>
</form>

                                <!-- END USER FORM -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT -->
@endsection