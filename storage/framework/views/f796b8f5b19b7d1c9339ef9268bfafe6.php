
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<style>
.revenue-chart{
width: 500px;
position: absolute;
top :100px;
left: 50px;
}
</style>
<h1>Dashboard</h1>
<div class="container-fluid">
    <div class="revenue-chart">
        <canvas id="myChart"></canvas>
        <div class="btn-group">
            <div class="btn btn-primary">Tháng</div>
            <div class="btn btn-success">Năm</div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\nhom3_ST5_BE2_NH23-24\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>