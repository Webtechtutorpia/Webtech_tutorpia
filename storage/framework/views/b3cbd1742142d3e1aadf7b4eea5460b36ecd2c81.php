<?php $__env->startSection('content'); ?>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo e(URL::to('myinputs')); ?>">View All Myinputs</a></li>
            </ul>
        </nav>
        <h1>Edit <?php echo e($myinput->string); ?></h1>

        <!-- if there are creation errors, they will show here -->
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(url('myinputs')); ?>/<?php echo e($myinput->id); ?>" method="POST" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PATCH')); ?>


            <div class="form-group">
                <label for="formGroupExampleInput">String:</label>
                <input type="text" name="string" class="form-control" value="<?php echo e($myinput->string); ?>">

            </div>

            <div class="form-group">
                <label for="formGroupExampleInput">Email:</label>
                <input type="text" name="email" class="form-control" value="<?php echo e($myinput->email); ?>">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput">Level:</label>
                <input type="text" name="integer" class="form-control" value="<?php echo e($myinput->integer); ?>">
            </div>

            <div class="form-group">
            </div>

            <!-- Update Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus">update</i>
                    </button>
                </div>
            </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>