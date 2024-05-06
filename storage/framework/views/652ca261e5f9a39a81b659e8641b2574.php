
<?php $__env->startSection('title','vouchers của bạn'); ?>
<?php $__env->startSection('content'); ?>
<div class="body-content outer-top-xs">
	<div class="container">
		<div class="product-comparison">
			<div>
				<h1 class="page-title text-center heading-title">Product Comparison</h1>
				<div class="table-responsive">
					<table class="table compare-table inner-top-vs">
						 <?php $__currentLoopData = $vouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voucher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><i class="fa-solid fa-ticket"></i></td>
							<td><?php echo e($voucher['title']); ?></td>
							<td><?php echo e($voucher['quantity']); ?></td>
							<td><?php echo e($voucher['due_date']); ?></td>
							<td>Giảm: <?php echo e($voucher['discount']); ?>%</td>
							<td>
								<a href="#" class="remove-icon" onclick="return confirmRemove(<?php echo e($voucher['id']); ?>);">
									<i class="fa fa-times"></i>
								</a>

							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Wamp64\www\nhom3_ST5_BE2_NH23-24\resources\views/vouchers.blade.php ENDPATH**/ ?>