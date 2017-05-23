<?php $__env->startSection('content'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> $( document ).ready(function() {
            $("li[name='Aufgaben']").css('background-color', '#f5f8fa');
        });</script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/Aufgaben.js')); ?>"></script>

    <div class="container">
        <div class="row">

            <h2>Studentenmodus: DBIS</h2>

        
            

            
                
                    
                
                
                    
                        
                        
                    

                    
                        
                        
                        
                        
                    

                    
                        
                        
                        

                        
                        
                        
                            
                            
                        
                    
                    
                        
                        
                        
                    
                    
                        
                        
                        
                        
                    
                
            

        
        
            
            
                
                    
                
                
                    
                        
                        
                    
                    
                        
                        
                        
                        
                            
                        
                    
                    
                        
                        
                        
                        
                        
                    
                
            
        
            <?php if(Session::has('message')): ?>
                <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
            <?php endif; ?>
            
            <?php $__currentLoopData = $myinputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="col-md-12 col-xs-12">
            <?php if($value->zustand == '/' ): ?>
                <div class="panel panel-warning aufgabe ">
                    <div class="panel-heading" onclick="Bodyhandler()"> <?php echo e($value->aufgabenname); ?>

                        <div style="display: inline; float: right" class="glyphicon glyphicon-minus"></div>
                    </div>
            <?php endif; ?>
                    <?php if( $value->zustand == '.'): ?>
                        <div class="panel panel-info aufgabe ">
                            <div class="panel-heading" onclick="Bodyhandler()"> <?php echo e($value->aufgabenname); ?>

                                <div style="display: inline; float: right" class="glyphicon glyphicon-minus"></div>
                            </div>
                            <?php endif; ?>
            <?php if($value->zustand == '+'): ?>
                        <div class="panel panel-success aufgabe ">
                            <div class="panel-heading" onclick="Bodyhandler()"> <?php echo e($value->aufgabenname); ?>

                                <div style="display: inline; float: right" class="glyphicon glyphicon-ok"></div>
                            </div>
            <?php endif; ?>
            <?php if($value->zustand == '-'): ?>
                                <div class="panel panel-danger aufgabe ">
                                    <div class="panel-heading" onclick="Bodyhandler()"> <?php echo e($value->aufgabenname); ?>

                                        <div style="display: inline; float: right" class="glyphicon glyphicon-remove"></div>
                                    </div>

            <?php endif; ?>


                <div class="panel-body">
                    <div class=" panel-group" style="padding-bottom: 1%;">
                        <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                        <div class="col-md-9 col-xs-12 size"> <?php echo e($value->aufgabenname); ?></div>
                    </div>
                    <div class=" panel-group" style="padding-bottom: 1%;">
                        <div class="col-md-3  col-xs-6 size">Abgabe bis :</div>
                        <div class="col-md-3  col-xs-6 size"> <?php echo e($value->abgabedatum); ?></div>
                        <div class="col-md-3  col-xs-6 size">Aufgabe hochladen:</div>
                        <div class="col-md-3  col-xs-4 size">
                            <a class="btn btn-primary btn"  href="<?php echo e(url('/FileUpload')); ?>" role="button">Upload</a>


                        </div>
                    </div>
                    <div class="panel-group" style="padding-bottom: 1%;">
                        <div class="col-md-3 col-xs-6 size"> Tutoren kontaktieren:</div>
                        <div class="col-md-3 col-xs-2 size"><span><a href
                                                                     class="glyphicon glyphicon-envelope"></a></span>
                        </div>
                        <div class="col-md-3 col-xs-12"> Status:</div>
                        <?php if($value->zustand == '.'): ?>
                            <div class="col-md-3 col-xs-12 size">Warten auf Upload</div>
                        <?php endif; ?>
                        <?php if($value->zustand == '/'): ?>
                            <div class="col-md-3 col-xs-12 size">Warten auf Bewertung</div>
                        <?php endif; ?>
                        <?php if($value->zustand == '+'): ?>
                            <div class="col-md-3 col-xs-12 size">erfolgreich abgenommen</div>
                        <?php endif; ?>
                        <?php if($value->zustand == '-'): ?>
                            <div class="col-md-3 col-xs-12 size">Abgabe nicht erfolgreich</div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            </div>
                                
                                
                                    
                                        
                                            
                                        
                                            
                                                
                                                
                                            
                                            
                                                
                                                
                                                
                                                
                                            
                                            
                                                
                                                
                                                
                                                
                                                
                                            
                                            
                                                
                                                
                                                
                                                
                                            
                                            
                                        
                                    
                                
                                
                                

                                
                                
                                
                                
                                
                                
                                
                                
                                

                                
                                
                                
                                
                                
                                

                                
                                
                                
                                

                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                    




            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


    </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>