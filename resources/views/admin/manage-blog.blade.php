@extends('admin.nav')
@section('title', 'Manage Product')
@section('content')
    {{-- @if (session('add-success'))
        <div class="alert alert-success">
            {{ session('add-success') }}
        </div>
    @endif
    @if (session('update-success'))
        <div class="alert alert-success">
            {{ session('update-success') }}
        </div>
    @endif --}}
    <h1>Manage Products</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><a href="{{ url('add-blog') }}"> <i
                                    class="icon-plus"></i>
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
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr class="">
                                        <td width="250">
                                                <img src="{{ asset("app/images/products/") }}"
                                                    style="width:100%">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td>$</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href=""
                                                class="btn btn-success btn-mini">Edit</a>
                                            <form action="" method="POST"
                                                class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger btn-mini delete-btn">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                
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
