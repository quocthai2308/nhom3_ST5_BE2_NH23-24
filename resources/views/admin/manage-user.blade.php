@extends('admin.nav')
@section('title', 'Manage User')
@section('content')
<h1>Manage User</h1>
</div>
<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><a href="form.html"> <i class="icon-plus"></i>
                        </a></span>
                    <h5>Users</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered
                                    table-striped">
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>User / Admin</th>
                                <th>Ngày Tạo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="">
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->roleDescription() }}</td>
                                <td>{{ $user->created_at}}</td>
                                <td>
                                    <a href="" class="btn btn-success btn-mini">Edit</a>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                                    </form>
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