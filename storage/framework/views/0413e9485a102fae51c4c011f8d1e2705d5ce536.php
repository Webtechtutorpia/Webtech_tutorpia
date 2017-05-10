<?php $__env->startSection('content'); ?>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo e(URL::to('myinputs/create')); ?>">Create a Myinput</a>
            </ul>
        </nav>
        <h1>All the Myinputs</h1>

        <!-- will be used to show any messages -->
        <?php if(Session::has('message')): ?>
            <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>String</td>
                <td>Email</td>
                <td>Integer</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $myinputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td><?php echo e($value->id); ?></td>
                    <td><?php echo e($value->string); ?></td>
                    <td><?php echo e($value->email); ?></td>
                    <td><?php echo e($value->integer); ?></td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- show the myinput (uses the show method found at GET /myinputs/{id} -->
                        <a class="btn btn-small btn-success" href="<?php echo e(URL::to('myinputs/' . $value->id)); ?>">Show this Myinput</a>

                        <!-- edit this myinput (uses the edit method found at GET /myinputs/{id}/edit -->
                        <a class="btn btn-small btn-info" href="<?php echo e(URL::to('myinputs/' . $value->id . '/edit')); ?>">Edit this Myinput</a>

                        <!-- delete the myinput (uses the destroy method DESTROY /myinputs/{id} -->
                        <form action="./myinputs/<?php echo e($value->id); ?>"  onsubmit="return confirm('Are you sure to delete: <?php echo e($value->string); ?>')" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('DELETE')); ?>

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash">Delete</i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>