<style> .blue{
        color:blue;
    }</style>
<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->rolle=="Professor"): ?>

        <script type="text/javascript" src="<?php echo e(URL::asset('js/professorenmodus.js')); ?>"></script>

        <div class="container">
            <div class="row">
                <div class="">
                    <h3 class="col-md-5" id="test"> Professorenmodus: ALDA2</h3>
                </div>

                <span class="glyphicon glyphicon-plus col-md-offset-12" id="bigsize-right" id="plus" onclick="add(this)"></span>

                <?php if(Session::has('message')): ?>
                    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                <?php endif; ?>

                <?php $__currentLoopData = $myinputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="col-md-11">
                        <div class="panel panel-default ">
                            <div class="panel-heading" onclick="Bodyhandler(this)">

                                <b><?php echo e($value->aufgabenname); ?></b>
                                <div class="pull-right">
                                    <form action="./Professor/<?php echo e($value->id); ?>"  onsubmit="return confirm('Sind Sie sicher, dass Sie <?php echo e($value->aufgabenname); ?> wirklich löschen wollen?')" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>

                                        <button type="submit">
                                            <i class="middlesize-right glyphicon glyphicon-trash"></i>
                                        </button>
                                    </form>
                                </div>


                            </div>
                            <div class="panel-body" style="display:none">
                                <?php if(count($errors) > 0): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <form class="form-horizontal" role="form" method="POST"
                                      action="<?php echo e(url('Professor')); ?>/<?php echo e($value->id); ?>" onsubmit="return confirm('Sind Sie sicher, dass Sie <?php echo e($value->aufgabenname); ?> ändern wollen?')">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('PATCH')); ?>

                                    <div class="form group">

                                        <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                                        <input type="text" class="form-control" name="aufgabenname" id="Aufgabenname"  value="<?php echo e($value->aufgabenname); ?>"
                                               placeholder="Hier Aufgabenname eintragen">
                                    </div>

                                    <div class="form group">
                                        <label for="date" class="control-label">Abgabedatum</label>
                                        <input type="text" class="form-control" name="abgabedatum" id="Datum" placeholder="01.01.2017 29:59" value="<?php echo e($value->abgabedatum); ?>">
                                    </div>

                                    <div class="form group">
                                        <label for="Aufgabenbeschreibung" class="control-label">Aufgabenbeschreibung</label>
                                        <textarea name="aufgabenbeschreibung" id="Aufgabenbeschreibung" class="" rows="5"
                                                  placeholder="Hier Aufgabenstellung eintragen"><?php echo e($value->aufgabenbeschreibung); ?></textarea>
                                    </div>

                                    <div class="form-group" style="margin-top: 2em;">
                                        <button type="submit" class="btn btn-primary" value="Abschicken"
                                                style="float: right">
                                            Bearbeiten

                                        </button>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
        </div>


    <?php endif; ?>

<?php $__env->stopSection(); ?>




        
    

    
        
        

        
            
                
                    
                

                


                
                    
                        
                            
                            
                        
                        
                            
                                
                                    
                                    
                                        
                                            
                                        
                                    
                                
                            
                            
                                  
                                
                            

                                    
                                    
                                           
                            

                            
                                
                                
                            

                            
                                
                                
                                          
                            

                            
                                
                                        
                                    
                                
                                
                            

                        
                    
                    
                        
                            
                            
                        
                        
                            
                                  
                                
                            

                                    
                                    
                                           
                            

                            
                                
                                
                            

                            
                                
                                
                                          
                            

                            
                                
                                        
                                    
                                

                            
                            
                        
                    
                    
                        
                            
                            
                        
                        
                            
                                  
                                
                            

                                    
                                    
                                           
                            

                            
                                
                                
                            

                            
                                
                                
                                          
                            

                            
                                
                                        
                                    
                                

                            
                            
                        

                    
                    
                        
                            
                            
                        
                        
                            
                                  
                                
                            

                                    
                                    
                                           
                            

                            
                                
                                
                            

                            
                                
                                
                                          
                            

                            
                                
                                        
                                    
                                

                            
                            
                        
                    


                
            

        
        
        
    



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>