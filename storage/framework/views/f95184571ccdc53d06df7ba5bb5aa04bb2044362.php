<style> .blue{
        color:blue;
    }</style>
<?php $__env->startSection('content'); ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script> $( document ).ready(function() {
                $("li[name='Profmodus']").css('background-color', '#f5f8fa');
            });</script>
        <script type="text/javascript" src="<?php echo e(URL::asset('js/professorenmodus.js')); ?>"></script>

        <div class="container">
            <div class="row">

                <div class="">
                    <h3 class="col-md-5" id="test"> Datei auswählen:</h3>
                </div>


                <div class="col-md-11">
                </div>

                <div class="col-md-11">

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
                                  action="<?php echo e(url('FileUpload')); ?>" >
                                <?php echo e(csrf_field()); ?>


                                

                                    
                                    
                                           
                                

                                <div class="form group">

                                    <input type="file" class="form-control" name="upload" id="File" onkeypress="buttonFaerben(this)">
                                </div>


                                <div class="form-group" style="margin-top: 2em;">
                                    <button type="submit" class="btn btn-primary speichern" value="Abschicken"
                                            style="float: right">
                                       Datei hochladen
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>