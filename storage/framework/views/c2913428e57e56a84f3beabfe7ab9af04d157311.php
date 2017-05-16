<?php $__env->startSection('content'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> $( document ).ready(function() {
            $("li[name='Kurse']").css('background-color', '#f5f8fa');
        });</script>
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
                                            <td><?php echo e(Auth::user()->rolle); ?></td>
                                            <td class="text-center"><a
                                                        class="btn btn-primary btn-md col-md-11 col-md-offset-2 col-xs-11 col-xs-offset-1"
                                                        href="<?php echo e(url('/abgabe')); ?>" role="button">Abgabenübersicht</a></td>
                                            <td></td>
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
                                        <tr>
                                            <td>WAST1</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-md col-md-offset-3">eintragen
                                                </button>
                                            </td>
                                        <tr>
                                            <td>WAST2</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-md col-md-offset-3">eintragen
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>SOTE 1</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-md col-md-offset-3">eintragen
                                                </button>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>SOTE 2</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-md col-md-offset-3">eintragen
                                                </button>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>WEBTECH</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-md col-md-offset-3">eintragen
                                                </button>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>MAWI 1</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-md col-md-offset-3">eintragen
                                                </button>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>SYAN</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-md col-md-offset-3">eintragen
                                                </button>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>WAST1</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-md col-md-offset-3">eintragen
                                                </button>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
        </div>
                    </div>








<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>