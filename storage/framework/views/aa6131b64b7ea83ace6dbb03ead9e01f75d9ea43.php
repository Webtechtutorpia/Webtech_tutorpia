<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
        <h2>Tutorenmodus: ALDA</h2>

            <div class="col-md-4 col-md-offset-8 col-xs-4 col-xs-offset-8">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Suche nach...">
                <span class="input-group-btn">
             <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
      </span>

            </div>
            </div>

        <table class="table table-hover" >
            <thead>
            <tr>
                <th class="col-md-3 col-xs-3">Vorname</th>
                <th class="col-md-3 col-xs-3">Nachname</th>
                <th class="col-md-1 col-xs-1">Aufgabe1</th>
                <th class="col-md-1 col-xs-3">Aufgabe2</th>
                <th class="col-md-1 col-xs-3">Aufgabe3</th>
                <th class="col-md-1 col-xs-3">Aufgabe4</th>
                <th class="col-md-1 col-xs-3">Aufgabe5</th>
                <th class="col-md-1 col-xs-3">Aufgabe6</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-minus btn-warning"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-remove btn-danger"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-ok btn-success"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-minus btn-warning"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-remove btn-danger"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-ok btn-success"></a></td>
            </tr>
            <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-minus-sign btn-warning"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-remove-sign btn-danger"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-ok-sign btn-success"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-minus-sign btn-warning"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-remove-sign btn-danger"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-ok-sign btn-success"></a></td>
            </tr>
            <tr>
                <td>July</td>
                <td>Dooley</td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-minus-sign btn-warning"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-remove-sign btn-danger"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-ok-sign btn-success"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-minus-sign btn-warning"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-remove-sign btn-danger"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-ok-sign btn-success"></a></td>
            </tr>
            <tr>
                <td>Klaus</td>
                <td>Peter</td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-minus-sign btn-warning"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-remove-sign btn-danger"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-ok-sign btn-success"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-minus-sign btn-warning"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-remove-sign btn-danger"></a></td>
                <td class="text-center"><a href="<?php echo e(url('/aufgabe_example')); ?>" class="glyphicon glyphicon-ok-sign btn-success"></a></td>
            </tr>
            </tbody>
        </table>
    </div>
    </div>


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>