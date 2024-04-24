@extends('admin.nav')
@section('title', 'Manage Product Type')
@section('content')
                <h1>Manage Category</h1>
            </div>
            <div class="container-fluid">
                <hr>
                <div class="row-fluid">add-category
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"><a
                                    href="{{ url('/manage-category/page') }}"> <i class="icon-plus"></i>
                                    </a></span>
                                <h5>Categories</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <table class="table table-bordered
                                    table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category Id</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($categories as $category)
                                        <tr class="">
                                            <td > {{ $category['id'] }} </td> 
                                            <td>{{ $category['name'] }}</td>

                                            <td>
                                                <a href="{{ url('edit-category') }}" class="btn
                                                    btn-success btn-mini">Edit</a>
                                                <a href="#" class="btn
                                                    btn-danger btn-mini">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row" style="margin-left: 18px;">
                                    <ul class="pagination">
                                        <li class="active">1</li>
                                        <li>2</li>
                                        <li>3</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT -->
@endsection
