<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-xs-offset-1">
                <h3>Kursübersicht</h3>
                <br>
            </div>


            <div class="col-md-8 col-xs-12">
                <div class="panel panel-default panel-success">
                    <div class="panel-heading col-xs-12">
                        <span class="col-xs-4"> Kurse </span>
                        <span class="col-xs-3"> Rolle</span>
                        <span class="col-xs-5"> Option</span>
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-12"></div>
                        <span class="col-xs-4">ALDA</span>
                        <span class="col-xs-3">Tutor</span>
                        <span class="col-xs-5"> <a class="btn btn-primary"
                                    href="<?php echo e(url('/abgabe')); ?>" role="button">Abgabenübersicht</a></span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    
    


    
    
    
    
    
    
    
    
    
    
    







<?php $__env->stopSection(); ?>




















































































































<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>