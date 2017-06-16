<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3>Wilkommen zurück <?php echo e(Auth::user()->name); ?>!</h3>
            </div>
            <div class="col-xs-12 col-md-4 hidden-sm">
                <img class="img-responsive" src="/images/eule_hintergrund.jpg" alt="eule" width="332" height="524">
            </div>
            <div class=" col-md-offset-1 col-md-7 col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading" onclick="panel_behavior(this)"><b>Neueste Aktivitäten</b></div>
                    <div class="panel-body">
                        <div class="col-xs-12 col-md-12">
                            <table class="table-responsive">
                                <thead>
                                <tr>
                                    <th class="col-md-4 col-xs-4"><p>Zeit</p></th>
                                    <th class="col-md-8 col-xs-8"><p>Ereignis</p></th>
                                </tr>
                                </thead>
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                                <?php endif; ?>
                                
                                <tbody id="tbody">

                                <?php $__currentLoopData = $myinputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr>

                                            <td class="col-md-4 col-xs-8">
                                                <p><?php echo e(Carbon\Carbon::parse($value->zeit)->format('d-m-Y H:i:s')); ?></p>
                                            </td>
                                        <?php if($value->was == 'aufgabe'): ?>
                                            <td class="col-md-4 col-xs-8"><p><?php echo e($value->erstellt_von); ?>

                                                    hat <?php echo e($value->aufgabenname); ?> mit Abgabe am <?php echo e($value->abgabedatum); ?>

                                                    im Kurs <?php echo e($value->kurs); ?> erstellt.</p>
                                            </td>
                                        <?php elseif($value->was == 'abgabe'): ?>
                                            <td class="col-md-4 col-xs-8"><p><?php echo e($value->bearbeitet_von); ?> hat
                                                    deine <?php echo e($value->aufgabenname); ?> im Kurs <?php echo e($value->kurs); ?>

                                                    bewertet.</p>
                                            </td>
                                        <?php endif; ?>
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

    
    <script type="text/javascript" src="<?php echo e(URL::asset('js/minjs/overview.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>