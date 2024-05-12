<?php $__env->startSection('title', 'transactions '); ?>
<?php $__env->startSection('content'); ?>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
<h1>Manage Vouchers</h1>
</div>
<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><a href="<?php echo e(url('add-voucher')); ?>"> <i class="icon-plus"></i>
                        </a></span>
                    <h5>Vouchers</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered
                                    table-striped">
                        <thead>
                            <tr>
                                <th>Tên Người Dùng</th>
                                <th>ảnh sản phẩm</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Email</th>
                                <th>Số Điện Thoại</th>
                                <th>Nội Dung Khách Đặc</th>
                                <th>Địa Chỉ</th>
                                <th>Ngày Đặc</th>
                                <th>Nút ( Điều Chỉnh )</th>

                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($transaction->user->name); ?></td> <!-- Giả sử bạn đã có relation 'user' trong model Transaction -->
                                <td style="width: 50%;">
                                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($transaction -> product_id == $item->product_id): ?>
                                    <img style="width: 30%;" src="<?php echo e(asset('app/images/products/'.$item['name'])); ?>" alt="<?php echo e($item['name']); ?>">
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </td>
                                <td><?php echo e($transaction->product->name); ?></td> <!-- Hiển thị tên sản phẩm -->
                                <td><?php echo e($transaction->email); ?></td>
                                <td><?php echo e($transaction->phone); ?></td>
                                <td><?php echo e($transaction->order_content); ?></td>
                                <td><?php echo e($transaction->shipping_address); ?></td>
                                <td><?php echo e($transaction->created_at->format('d-m-Y')); ?></td>
                                <td>
                                    <!-- Nút điều chỉnh, ví dụ xóa hoặc sửa -->
                                    <!-- <button type="button" class="btn btn-primary btn-mini">Chi Tiết</button> -->
                                    <button type="button" class="btn btn-primary btn-mini" data-bs-toggle="modal" data-bs-target="#exampleModal" data-transaction-id="<?php echo e($transaction->id); ?>" data-product-name="<?php echo e($transaction->product->name); ?>" data-product-image="<?php echo e(asset('app/images/products/' . $transaction->product->image)); ?>" data-order-content="<?php echo e($transaction->order_content); ?>">
                                        Chi Tiết
                                    </button>




                                    <button type="button" class="btn btn-danger btn-mini">Hủy</button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        </tbody>
                    </table>
                    <div class="modal" id="exampleModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Chi Tiết Sản Phẩm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h1 id="productName"></h1>
                                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($transaction -> product_id == $item->product_id): ?>
                                    <img style="width: 100%;" src="<?php echo e(asset('app/images/products/'.$item['name'])); ?>" alt="<?php echo e($item['name']); ?>">
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row" style="margin-left: 18px;">
                        <ul class="pagination">
                            <li class="active"><a href="">1</a>
                            </li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Bootstrap Bundle JS -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var exampleModal = document.getElementById('exampleModal');
        exampleModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Nút kích hoạt modal

            // Lấy dữ liệu từ data-* attributes
            var productName = button.getAttribute('data-product-name');
            var productImage = button.getAttribute('data-product-image');

            // Cập nhật nội dung của modal
            var modalProductName = exampleModal.querySelector('#productName');
            var modalProductImage = exampleModal.querySelector('#productImage');

            modalProductName.textContent = productName;
            modalProductImage.src = productImage;
            modalProductImage.alt = productName;
        });
    });
</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Thuận HK4\BE2\LamNhom\nhom3_ST5_BE2_NH23-24\resources\views/admin/hangMoiDac.blade.php ENDPATH**/ ?>