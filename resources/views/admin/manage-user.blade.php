@extends('admin.nav')
@section('title', 'Manage User')
@section('content')


<!-- Hiện Thị thông báo -->
@if (session('success'))
<div class="alert alert-success" role="alert" id="success-alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

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
                                    <!-- Thêm điều kiện để chỉ hiển thị nút này cho user không phải admin -->
                                    @if ($user->userType == 0)
                                    <form action="{{ route('make-admin', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-mini">Add ADMIN (Thêm)</button>
                                    </form>
                                    @else
                                    <form action="{{ route('remove-admin', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-info btn-mini">Remove ADMIN (Bỏ)</button>
                                    </form>
                                    @endif
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
<script>
    // Sử dụng vanilla JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 5000); // Ẩn thông báo sau 5 giây
        }
    });
</script>

@endsection