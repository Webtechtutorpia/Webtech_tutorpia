<?php $__env->startSection('content'); ?>

    <?php if(isset($city)): ?>
        <h2>City Name: <?php echo e($city->aufgabenname); ?></h2>
    <?php else: ?>
        <h2>No city found!</h2>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>