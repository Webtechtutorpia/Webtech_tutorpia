<?php $__env->startSection('content'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> $( document ).ready(function() {
            $("li[name='Übersicht']").css('background-color', '#f5f8fa');
        });</script>
    <div class="container">
        <div class="row">

            <div class="col-md-12">
        <h3>Wilkommen zurück <?php echo e(Auth::user()->name); ?>!</h3>

    </div>



            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading"><b>Neueste Aktivitäten</b></div>
                    <div class="panel-body">

                            <div class="col-xs-12 col-md-12">
                                <table class="table-responsive">
                                    <tr>
                                        <th class="col-md-4 col-xs-4"><p>Zeit</p></th>
                                        <th class="col-md-8 col-xs-8"><p>Ereignis</p></th>
                                    </tr>
                                    <?php if(Session::has('message')): ?>
                                        <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                                    <?php endif; ?>
                                    

                                    <?php $__currentLoopData = $myinputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr>
                                        <td class="col-md-4 col-xs-8"> <p><?php echo e($value->created_at); ?></p></td>
                                        <?php if($value->zustand == '.'): ?>
                                            <td class="col-md-4 col-xs-8"><p><?php echo e($value->bearbeitet_von); ?> hat <?php echo e($value->aufgabenname); ?> mit Abgabe am <?php echo e($value->abgabedatum); ?> im Kurs <?php echo e($value->kurs); ?> erstellt.</p>
                                            </td>
                                        <?php elseif($value->zustand == '+' || $value->zustand == '-'): ?>
                                        <td class="col-md-4 col-xs-8"><p><?php echo e($value->erstellt_von); ?> hat deine <?php echo e($value->aufgabenname); ?> im Kurs <?php echo e($value->kurs); ?> abgenommen.</p>
                                        </td>
                                        <?php endif; ?>
                                    </tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>