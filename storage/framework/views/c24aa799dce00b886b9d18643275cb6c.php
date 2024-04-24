<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="<?php echo e(asset('app\css\admin.css')); ?>">
    <!-- <link rel="stylesheet" href="css.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

</head>

<body>
    <!-- Banner -->
    <a href="" class="btn w-full btn-primary text-truncate rounded-0 py-2 border-0 position-relative" style="z-index: 1000;">
        <strong>Đây là quyên ADMIN:</strong> Bạn chỉ có thể xem bao nhiêu user với sửa tên &rarr;
    </a>

    <div class="p-10 bg-surface-secondary">
        <div class="container">
            <div class="card">

                <div class="card-header">
                    <div class="d-flex flex-row align-items-center back">
                        <a href="<?php echo e(route('home')); ?>" class="d-flex align-items-center">
                            <i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                            <h6>Back to home</h6>
                        </a>
                    </div>
                    <h6>CHỈNH SỬA VS THEO DÕI</h6>

                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">số lượng đồ trong vỏ </th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-label="Name">
                                    <a class="text-heading font-semibold" href="#">
                                        <?php echo e($user->name); ?>

                                    </a>
                                </td>
                                <td data-label="Email">
                                    <a class="text-current" href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a>
                                </td>
                                <td data-label="SoLuon">
                                    <span>Web Designer</span>
                                </td>

                                <td>
                                    <button class="btn btn-primary profile-button" type="submit">Chi Tiếc</button>
                                    <button class="btn btn-danger profile-button" type="submit">Vô Hiệu Hóa</button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH D:\Thuận HK4\BE2\LamNhom\nhom3_ST5_BE2_NH23-24\resources\views/admin.blade.php ENDPATH**/ ?>