<?php $__env->startSection('content'); ?>
	<section class="vh-100">
	  <div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col">
				<div class="d-flex justify-content-between">
					<div>
						<h1><?php echo e($data['first_name']); ?> <?php echo e($data['last_name']); ?></h1>
					</div>
					<div>
						<div class="input-group">
							<form method="POST" action="update/<?php echo e($data['id']); ?>">
							<?php echo csrf_field(); ?>
								<input type="hidden" name="id" value="<?php echo e($data['id']); ?>">
								<div class="input-group">
									<select name="status" class="custom-select" onchange="this.form.submit()">
										<option value="0" <?php if($data['status']==0): ?> selected <?php endif; ?> >Initial</option>
										<option value="1" <?php if($data['status']==1): ?> selected <?php endif; ?> >First Contact</option>
										<option value="2" <?php if($data['status']==2): ?> selected <?php endif; ?> >Interview</option>
										<option value="3" <?php if($data['status']==3): ?> selected <?php endif; ?> >Tech Assignment</option>
										<option value="4" <?php if($data['status']==4): ?> selected <?php endif; ?> >Rejected</option>
										<option value="5" <?php if($data['status']==5): ?> selected <?php endif; ?> >Hired</option>
									</select>
								<div class="input-group-append">
							</form>
							<form method="POST" action="delete/<?php echo e($data['id']); ?>">
								<?php echo csrf_field(); ?>
								<input type="hidden" name="cv" value="storage/<?php echo e($data['cv']); ?>">
								<button type="submit" class="btn btn-danger"/><i class="fa fa-trash" aria-hidden="true"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="d-flex justify-content-center">
			<div class="card shadow-2-strong" style="border-radius: 0.5rem; margin-right: 20px; width:70%">
			  <div class="p-5 text-left">
				<h2>Application Information</h2>
				<h5>Personal details and application</h5>
				<hr/>
				<div class="d-flex justify-content-between">
					<div>
						<div class="form-outline mb-4">
							Position:<br/>
							<?php echo e($data['position']); ?>

						</div>
						<div class="form-outline mb-4">
							Salary-Range:<br/>
							<?php echo e($data['salary']); ?>

						</div>
						<div class="form-outline mb-4">
							Skills:<br/>
							<?php echo e($data['skills']); ?>

						</div>
						<div class="form-outline mb-4">
							CV:<br/>
							<a href="/storage/<?php echo e($data['cv']); ?>"><button class="btn btn-primary"><i class="fa fa-download"></i> Download</button></a>
						</div>
					</div>
					<div>
						<div class="form-outline mb-4">
							Contact:<br/>
							<?php echo e($data['linkedin']); ?>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card shadow-2-strong" style="border-radius: 0.5rem; width:30%">
			<div class="p-5 text-left">
				<h3>Timeline</h3>
				<div class="form-outline mb-4">
					<?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="form-outline">
						<div class="d-flex justify-content-between">
							<div>
								<?php echo e($comm['comment']); ?>

							</div>
							<div>
								<sup><?php echo e($comm['date']); ?>

								</sup>
							</div>
						</div>
						<div>
							<b><?php echo e($comm['status']); ?></b>
						</div>
					</div>
					<hr/>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<div class="form-outline mb-4">
				  <form action="comment/<?php echo e($data['id']); ?>" method="post">
					<?php echo csrf_field(); ?>
					<textarea class="form-control" name="comment"></textarea>
					<input type="hidden" name="candidateid" value="<?php echo e($data['id']); ?>" />
					<input type="hidden" name="status" value="<?php if($data['status']==0): ?> Initial
															<?php elseif($data['status']==1): ?> First Contact
															<?php elseif($data['status']==2): ?> Interview
															<?php elseif($data['status']==3): ?> Tech Assignment
															<?php elseif($data['status']==4): ?> Rejected
															<?php elseif($data['status']==5): ?> Hired
															<?php endif; ?>" />
					<input type="submit" name="btnSubmit" value="Comment" class="btn btn-danger btn-block mb-4"/>
				</form>
			</div>
		</div>
	</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\laravel\hr\resources\views/edit.blade.php ENDPATH**/ ?>