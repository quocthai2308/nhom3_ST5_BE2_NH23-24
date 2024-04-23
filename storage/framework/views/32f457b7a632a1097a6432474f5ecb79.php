<?php $__env->startSection('title', 'Manage User'); ?>
<?php $__env->startSection('content'); ?>
                <h1>Manage User</h1>
            </div>
            <div class="container-fluid">
                <hr>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"><a
                                        href="form.html"> <i class="icon-plus"></i>
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
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="">
                                            <td>2</td>
                                            <td>user1</td>
                                            <td>*****</td>
                                            <td>admin</td>
                                            <td>
                                                <a href="edit.html" class="btn
                                                    btn-success btn-mini">Edit</a>
                                                <form action="" method="">
                                                    <input type="submit"
                                                        class="btn btn-danger
                                                        btn-mini"
                                                        value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td>3</td>
                                            <td>guest</td>
                                            <td>*****</td>
                                            <td>editor</td>
                                            <td>
                                                <a href="edit.html" class="btn
                                                    btn-success btn-mini">Edit</a>
                                                <form action="" method="">
                                                    <input type="submit"
                                                        class="btn btn-danger
                                                        btn-mini"
                                                        value="Delete">
                                                </form>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\nhom3_ST5_BE2_NH23-24\resources\views/manage-user.blade.php ENDPATH**/ ?>