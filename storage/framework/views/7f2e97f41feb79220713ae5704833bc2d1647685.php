<?php $__env->startSection('content'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> $( document ).ready(function() {
            $("li[name='Aufgaben']").css('background-color', '#f5f8fa');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
        });</script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/Aufgaben.js')); ?>"></script>

    <div class="container" id="container">
        <div class="row" >

            <h2>Studentenmodus: DBIS</h2>

            <div class="col-md-4 col-md-offset-8">


                <form class="form-inline" method="get">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="<?php Session::token()?>">
                        <input type="text" name ="search_abgabe" value="<?php echo e(isset($cityName) ? $cityName : ''); ?>"id="search_abgabe" onkeyup="ajaxSearch(this.value)" class="form-control" placeholder="Suche nach..."
                        autofocus onfocus="this.value=this.value;" autocomplete="off">

                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</form>

</div>
            <div id="liste"></div>

            <script>
                function ajaxSearch(name){
                    $("#liste").load("/Aufgabenansicht/ajaxcityList?name="+name)
                };


            </script>



            

            
                
                    
                
                
                    
                        
                        
                    

                    
                        
                        
                        
                        
                    

                    
                        
                        
                        

                        
                        
                        
                            
                            
                        
                    
                    
                        
                        
                        
                    
                    
                        
                        
                        
                        
                    
                
            

        
        
            
            
                
                    
                
                
                    
                        
                        
                    
                    
                        
                        
                        
                        
                            
                        
                    
                    
                        
                        
                        
                        
                        
                    
                
            
        
            <?php if(Session::has('message')): ?>
                <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
            <?php endif; ?>
            
            <h3>Alle Aufgaben:</h3>
            <?php $__currentLoopData = $myinputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="col-md-12 col-xs-12">
            <?php if($value->zustand == '/' ): ?>

                <div class="panel panel-warning aufgabe " >
                    <div class="panel-heading" onclick="Bodyhandler(this)"> <?php echo e($value->aufgabenname); ?>

                        <div style="display: inline; float: right" class="glyphicon glyphicon-minus"></div>
                    </div>
            <?php endif; ?>
                    <?php if( $value->zustand == '.'): ?>
                        <div class="panel panel-info aufgabe ">
                            <div class="panel-heading" onclick="Bodyhandler(this)"> <?php echo e($value->aufgabenname); ?>

                                <div style="display: inline; float: right" class="glyphicon glyphicon-minus"></div>
                            </div>
                            <?php endif; ?>
            <?php if($value->zustand == '+'): ?>
                        <div class="panel panel-success aufgabe ">
                            <div class="panel-heading" onclick="Bodyhandler(this)"> <?php echo e($value->aufgabenname); ?>

                                <div style="display: inline; float: right" class="glyphicon glyphicon-ok"></div>
                            </div>
            <?php endif; ?>
            <?php if($value->zustand == '-'): ?>
                                <div class="panel panel-danger aufgabe ">
                                    <div class="panel-heading" onclick="Bodyhandler(this)"> <?php echo e($value->aufgabenname); ?>

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