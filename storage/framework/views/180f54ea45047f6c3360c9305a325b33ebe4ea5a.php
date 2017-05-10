<?php $__env->startSection('content'); ?>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo e(URL::to('myinputs')); ?>">View All Myinputs</a></li>
            </ul>
        </nav>
        <h1>Showing <?php echo e($myinput->string); ?></h1>

        <div class="jumbotron text-center">
            <h2><?php echo e($myinput->string); ?></h2>
            <p>
                <strong>Email:</strong> <?php echo e($myinput->email); ?><br>
                <strong>Level:</strong> <?php echo e($myinput->level); ?>

            </p>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>