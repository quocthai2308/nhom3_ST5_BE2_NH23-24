<?php $__env->startSection('title', 'Manage User'); ?>
<?php $__env->startSection('content'); ?>
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
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="">
                                <td><?php echo e($user->id); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->roleDescription()); ?></td>
                                <td><?php echo e($user->created_at); ?></td>
                                <td>
                                    <a href="" class="btn btn-success btn-mini">Edit</a>
                                    <form action="" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Wamp64\www\nhom3_ST5_BE2_NH23-24\resources\views/admin/manage-user.blade.php ENDPATH**/ ?>