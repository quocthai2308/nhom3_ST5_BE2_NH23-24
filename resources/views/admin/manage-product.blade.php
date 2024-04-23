@extends('admin.nav')
@section('title', 'Manage Product')
@section('content')

<h1>Manage Products</h1>
            </div>
            <div class="container-fluid">
                <hr>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"><a
                                        href="{{ url('add-product') }}"> <i class="icon-plus"></i>
                                    </a></span>
                                <h5>Products</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <table class="table table-bordered
                                    table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price ($)</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr class="">
                                            <td width="250">
                                                @foreach ($product->images as $image)
                                                <img src="{{ asset("app/images/products/{$image->name}") }}" style="width:100%">
                                                @endforeach
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ $product->price }}$</td>
                                            <td>{{ $product->created_at }}</td>
                                            <td>
                                            <a href="{{ url('edit-product', $product->id) }}" class="btn btn-success btn-mini">Edit</a>
                                            <a href="{{ url('delete-product', $product->id) }}" class="btn btn-danger btn-mini">Delete</a>
                                            <button class="btn btn-danger delete-product" data-id="{{ $product->id }}">Xoá</button>//
                                            </td>                                  
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row" style="margin-left: 18px;">
                                    <ul class="pagination">
                                        <li class="active"><a href="">1</a>
                                        </li>
                                        <li><a href="">2</a></li>
                                        <li><a href="">3</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection