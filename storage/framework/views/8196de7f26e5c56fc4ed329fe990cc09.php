<?php $__env->startSection('title', 'Add Category'); ?>
<?php $__env->startSection('content'); ?>

                <h1>Edit Category</h1>
            </div>
            <div class="container-fluid">
                <hr>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i
                                        class="icon-align-justify"></i> </span>
                                <h5>Category info</h5>
                            </div>
                            <div class="widget-content nopadding">

                                <!-- BEGIN USER FORM -->
                                <form action="<?php echo e(url('products.store')); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="control-group">
        <label class="control-label">Tên sản phẩm:</label>
        <div class="controls">
            <input type="text" class="span11" placeholder="Tên sản phẩm" name="name" required /> *
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Mô tả:</label>
        <div class="controls">
            <textarea class="span11" placeholder="Mô tả sản phẩm" name="description" required></textarea> *
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Giá:</label>
        <div class="controls">
            <input type="number" class="span11" placeholder="Giá sản phẩm" name="price" required /> *
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Chọn danh mục:</label>
        <div class="controls">
            <select name="category_ids[]" multiple required>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select> 
        </div>
    </div>
    <!-- <div class="control-group">
        <label class="control-label">Chọn logo khác:</label>
        <div class="controls">
            <input type="file" name="fileUpload" id="fileUpload">
        </div>
    </div> -->
    <div class="form-actions">
        <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
    </div>
</form>

                                <!-- END USER FORM -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Tài liệu Môn Học\Kì 4\BE2\Git\nhom3_ST5_BE2_NH23-24\resources\views/admin/edit-category.blade.php ENDPATH**/ ?>