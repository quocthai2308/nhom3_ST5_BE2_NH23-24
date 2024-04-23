@extends('admin')
@section('title', 'Manage Product Type')
@section('content')
                <h1>Manage Category</h1>
            </div>
            <div class="container-fluid">
                <hr>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"><a
                                    href="{{ url('add-category') }}"> <i class="icon-plus"></i>
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
                                        <tr class="">
                                            <td width="100"><img
                                                    src="./images/kisspng-computer-icons-smartphone-telephone-logo-5b2e3e2e956a24.866395171529757230612.png"></td>
                                            <td>Cellphone</td>

                                            <td>
                                                <a href="{{ url('edit-category') }}" class="btn
                                                    btn-success btn-mini">Edit</a>
                                                <a href="#" class="btn
                                                    btn-danger btn-mini">Delete</a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td width="100"><img
                                                    src="./images/tablet-logo.jpg"></td>
                                            <td>Tablet</td>

                                            <td>
                                                <a href="edit_protype.html" class="btn
                                                    btn-success btn-mini">Edit</a>
                                                <a href="#" class="btn
                                                    btn-danger btn-mini">Delete</a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td width="100"><img
                                                    src="./images/laptop-logo.png"></td>
                                            <td>Laptop</td>

                                            <td>
                                                <a href="edit_protype.html" class="btn
                                                    btn-success btn-mini">Edit</a>
                                                <a href="#" class="btn
                                                    btn-danger btn-mini">Delete</a>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td width="100"><img
                                                    src="./images/png-clipart-computer-icons-music-music-speaker-logo-sound.png"></td>
                                            <td>Speaker</td>

                                            <td>
                                                <a href="edit_protype.html" class="btn
                                                    btn-success btn-mini">Edit</a>
                                                <a href="#" class="btn
                                                    btn-danger btn-mini">Delete</a>
                                            </td>
                                        </tr>
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
