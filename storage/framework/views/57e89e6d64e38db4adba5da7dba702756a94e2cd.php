<!doctype html>
<html>
<head>
   <?php echo $__env->make('includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
	<?php echo $__env->yieldContent('content'); ?>
   <footer class="row">
       <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   </footer>
</div>
</body>
</html><?php /**PATH D:\xampp\htdocs\laravel\hr\resources\views/layout.blade.php ENDPATH**/ ?>