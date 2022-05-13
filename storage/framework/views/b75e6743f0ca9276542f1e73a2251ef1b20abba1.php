<?php $__env->startSection('content'); ?>
<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i>
						აპლიკანტები
				</div>
				<div class="card-body">
					<table id="datatablesSimple">
						<thead>
							<tr>
								<th><i class="fa fa-info-circle" aria-hidden="true"></i></th>
								<th>Candidate</th>
								<th>Contact</th>
								<th>Skills</th>
								<th>Salary</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
					<?php $__currentLoopData = $Hr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td>
								<a class="btn btn-outline-primary" role="button" href="/admin/edit/<?php echo e($row['id']); ?>">
									<i class="fa fa-search" aria-hidden="true"></i>
							</td>
							<td><?php echo e($row['first_name']); ?> <?php echo e($row['last_name']); ?><br/>
								<small><?php echo e($row['position']); ?></small>
							</td>
							<td> <?php echo e($row['linkedin']); ?>

							</td>
							<td><?php echo e($row['skills']); ?>

							</td>
							<td><?php echo e($row['salary']); ?>

							</td>
							<td>
							<?php if($row['status']==0): ?>
								Initial
							<?php elseif($row['status']==1): ?>
								First Contact
							<?php elseif($row['status']==2): ?>
								Interview
							<?php elseif($row['status']==3): ?>
								Tech Assignment
							<?php elseif($row['status']==4): ?>
								Rejected
							<?php elseif($row['status']==5): ?>
								Hired
							<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
	</div>
</main>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel\hr\resources\views/admin.blade.php ENDPATH**/ ?>