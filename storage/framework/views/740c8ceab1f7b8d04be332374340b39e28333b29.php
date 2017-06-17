<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h3>Kursübersicht</h3>
                <br>
            </div>
            <div class="panel-group">
                <div class="col-md-8">
                    <div class="panel panel-success ">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr class="success">
                                    <th class="col-md-3">Kurse</th>
                                    <th class="col-md-2">Rolle</th>
                                    <th class="col-md-3 text-center"></th>
                                    <th class="col-md-3"></th>


                                </tr>
                                </thead>
                                <tbody>
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                                <?php endif; ?>
                                
                                <?php $__currentLoopData = $myinputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr>
                                        <td><?php echo e($value->kurs); ?></td>
                                        <td><?php echo e($value->rolle); ?></td>
                                        <?php if($value->rolle=="Professor"): ?>
                                            <td class="text-center"><a
                                                        class="btn btn-primary btn-md col-md-11 col-md-offset-2 col-xs-11 col-xs-offset-1"
                                                        href="<?php echo e(url('/Professor')); ?>/<?php echo e($value->kurs); ?>" role="button">ProfMode</a>
                                            </td>
                                            <td class="text-center"><a
                                                        class="btn btn-primary btn-md col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-3"
                                                        href="<?php echo e(url('/Tutor')); ?>/<?php echo e($value->kurs); ?> " role="button">Abgabenübersicht</a>
                                            </td>
                                        <?php endif; ?>
                                        <?php if($value->rolle=="Tutor"): ?>
                                            
                                            
                                            
                                            
                                            <td class="text-center"><a
                                                        class="btn btn-primary btn-md col-md-11 col-md-offset-2 col-xs-11 col-xs-offset-1"
                                                        href="<?php echo e(url('/Tutor')); ?>/<?php echo e($value->kurs); ?>" role="button">Abgabenübersicht</a>
                                            </td>
                                            <td></td>
                                        <?php endif; ?>
                                        <?php if($value->rolle=="Student"): ?>
                                            <td class="text-center"><a
                                                        class="btn btn-primary btn-md col-md-11 col-md-offset-2 col-xs-11 col-xs-offset-1"
                                                        href="<?php echo e(url('/Aufgabenansicht')); ?>/<?php echo e($value->kurs); ?> "
                                                        role="button">Aufgabenstatus</a>
                                            </td>
                                            <td></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-success">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr class="success">
                                    <th class="col-md-4">andere Kurse</th>
                                    
                                    <th class="col-md-6"></th>


                                </tr>
                                </thead>
                                <tbody>
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                                <?php endif; ?>
                                
                                <?php $__currentLoopData = $alle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                    <tr>
                                        <td><?php echo e($value2->bezeichnung); ?></td>
                                        
                                        <td class="text-center">
                                            <form class="form-horizontal" role="form" method="POST"
                                                  action="<?php echo e(url('Kurse')); ?>">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="kurs" value="<?php echo e($value2->bezeichnung); ?>">
                                                
                                                <button type="submit" class="btn btn-primary btn-md col-md-offset-3">
                                                    eintragen
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> $( document ).ready(function() {
            $("li[name='Kurse']").css('background-color', '#f5f8fa');
        });</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>