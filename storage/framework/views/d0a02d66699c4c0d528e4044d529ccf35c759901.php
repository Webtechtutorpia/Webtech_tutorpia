<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <h2>Tutorenmodus: <?php echo e($kurs); ?></h2>
            <div class="col-md-6 col-md-offset-10" id="anhang">
                <div class="input-group">
                    <form method="get" action="/search">
                        <input type="text" class="form-control" placeholder="Suche nach..." id="tfsearch"
                               style="margin-bottom: 2em;">
                    </form>
                </div>
            </div>
            <table class="table table-responsive table-striped table-bordered" id="tabelle">
                <thead>
                <tr>
                    <th class="col-md-3 col-xs-3">Name</th>
                    <?php if(Session::has('message')): ?>
                        <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                    <?php endif; ?>
                    
                    <?php $__currentLoopData = $myinputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <th class="col-md-1 col-xs-1"><?php echo e($value->aufgabenname); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tr>
                </thead>
                <tbody>
                <?php if(Session::has('message')): ?>
                    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                <?php endif; ?>
                
                <?php ($id=0); ?>
                <?php $__currentLoopData = $ergebnismenge; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $zeile): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php if($id ==0): ?>
                        <tr>
                            <td><?php echo e($zeile->name); ?></td>

                            <?php endif; ?>

                            <?php if($zeile->id!=$id && $id!=""): ?>
                        </tr>
                        <tr>
                            <td><?php echo e($zeile->name); ?></td>
                            <?php if($zeile->zustand == '+'): ?>
                                <td class="text-center"><a
                                            href="<?php echo e(url('Aufgabenansicht/bestimmteAbgabe')); ?>/<?php echo e($zeile->user); ?>/<?php echo e($zeile->aufgabenname); ?>"
                                            class="glyphicon glyphicon-ok btn-success"></a>
                            <?php endif; ?>
                            <?php if($zeile->zustand == '-'): ?>
                                <td class="text-center"><a
                                            href="<?php echo e(url('Aufgabenansicht/bestimmteAbgabe')); ?>/<?php echo e($zeile->user); ?>/<?php echo e($zeile->aufgabenname); ?>"
                                            class="glyphicon glyphicon-remove btn-danger"></a></td>
                            <?php endif; ?>
                            <?php if($zeile->zustand == '.'): ?>
                                <td class="text-center"> unbearbeitet</td>
                            <?php endif; ?>
                            <?php if($zeile->zustand == '/'): ?>
                                <td class="text-center"><a
                                            href="<?php echo e(url('Aufgabenansicht/bestimmteAbgabe')); ?>/<?php echo e($zeile->user); ?>/<?php echo e($zeile->aufgabenname); ?>"
                                            class="glyphicon glyphicon-minus btn-warning"></a></td>
                            <?php endif; ?>

                            <?php else: ?>
                                <?php if($zeile->zustand == '+'): ?>
                                    <td class="text-center"><a
                                                href="<?php echo e(url('Aufgabenansicht/bestimmteAbgabe')); ?>/<?php echo e($zeile->user); ?>/<?php echo e($zeile->aufgabenname); ?>"
                                                class="glyphicon glyphicon-ok btn-success"></a>
                                <?php endif; ?>
                                <?php if($zeile->zustand == '-'): ?>
                                    <td class="text-center"><a
                                                href="<?php echo e(url('Aufgabenansicht/bestimmteAbgabe')); ?>/<?php echo e($zeile->user); ?>/<?php echo e($zeile->aufgabenname); ?>"
                                                class="glyphicon glyphicon-remove btn-danger"></a></td>
                                <?php endif; ?>
                                <?php if($zeile->zustand == '.'): ?>
                                    <td class="text-center">unbearbeitet</td>
                                <?php endif; ?>
                                <?php if($zeile->zustand == '/'): ?>
                                    <td class="text-center"><a
                                                href="<?php echo e(url('Aufgabenansicht/bestimmteAbgabe')); ?>/<?php echo e($zeile->user); ?>/<?php echo e($zeile->aufgabenname); ?>"
                                                class="glyphicon glyphicon-minus btn-warning"></a></td>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php ($id=$zeile->id); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/Abgabe.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>