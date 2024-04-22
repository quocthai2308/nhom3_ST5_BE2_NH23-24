@extends('admin')
@section('title', 'Add New Product')
@section('content')
                <h1>Add New Product</h1>
            </div>
            <div class="container-fluid">
                <hr>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i
                                        class="icon-align-justify"></i> </span>
                                <h5>Product info</h5>
                            </div>
                            <div class="widget-content nopadding">

                                <!-- BEGIN USER FORM -->
                                <form action="form.html" method="post"
                                    class="form-horizontal"
                                    enctype="multipart/form-data">
                                    <div class="control-group">
                                        <label class="control-label">Name :</label>
                                        <div class="controls">
                                            <input type="text" class="span11"
                                                placeholder="Product name"
                                                name="name" /> *
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Choose a
                                            manufacture:</label>
                                        <div class="controls">
                                            <select name="manu_id" id="cate">
                                                <option value="1">Apple</option>
                                                <option value="2">Microsoft</option>
                                                <option value="3">Sony</option>
                                                <option value="4">SamSung</option>
                                                <option value="5">Oppo</option>
                                            </select> *
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Choose a
                                            product type:</label>
                                        <div class="controls">
                                            <select name="type_id" id="subcate">
                                                <option value="1">Cellphone</option>
                                                <option value="2">Tablet</option>
                                                <option value="3">Laptop</option>
                                                <option value="4">Speaker</option>
                                            </select> *
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Choose
                                                an image :</label>
                                            <div class="controls">
                                                <input type="file"
                                                    name="fileUpload"
                                                    id="fileUpload">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Description</label>
                                            <div class="controls">
                                                <textarea class="span11"
                                                    placeholder="Description"
                                                    name="description"></textarea>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Price
                                                    :</label>
                                                <div class="controls">
                                                    <input type="text"
                                                        class="span11"
                                                        placeholder="price"
                                                        name="price" /> *
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Feature
                                                    :</label>
                                                <div class="controls">
                                                    <input type="number"
                                                        class="span11"
                                                        name="feature" /> *
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn
                                                    btn-success">Add</button>
                                            </div>
                                        </div>
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