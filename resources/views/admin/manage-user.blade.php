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
                    <div id="pagination">
                        {{ $users->links() }}
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

    function fetchPage(page) {
        $.ajax({
            url: "{{ route('ajax.users.page') }}?page=" + page,
            type: "GET",
            dataType: "html",
            success: function(data) {
                $("#user-table").html(data);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Gán sự kiện click cho các nút phân trang
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetchPage(page);
    });

    // Gọi lần đầu tiên khi trang được load
    fetchPage(1);
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetchPage(page);
    });

    function fetchPage(page) {
        $.ajax({
            url: '/ajax-users-page?page=' + page,
            type: 'GET',
            success: function(data) {
                $('#pagination').html(data);
            }
        });
    }
</script>

@endsection