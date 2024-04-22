
<?php $__env->startSection('title', 'Add Product Type'); ?>
<?php $__env->startSection('content'); ?>

                <h1>Add a product type</h1>
            </div>
            <div class="container-fluid">
                <hr>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i
                                        class="icon-align-justify"></i> </span>
                                <h5>Product type info</h5>
                            </div>
                            <div class="widget-content nopadding">

                                <!-- BEGIN USER FORM -->
                                <form action="form.html" method="post"
                                    class="form-horizontal"
                                    enctype="multipart/form-data">
                                    <div class="control-group">
                                        <label class="control-label">Name :</label>
                                        <div class="controls">
                                            <input type="text" class="span11"
                                                placeholder="Product type name"
                                                name="name" /> *
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Choose
                                            another logo :</label>
                                        <div class="controls">
                                            <input type="file" name="fileUpload"
                                                id="fileUpload">
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn
                                            btn-success">Add</button>
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
<?php echo $__env->make('admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\nhom3_ST5_BE2_NH23-24\resources\views/add-protype.blade.php ENDPATH**/ ?>