<?php $__env->startSection('content'); ?>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script> $( document ).ready(function() {
            $("li[name='Abgaben']").css('background-color', '#f5f8fa');
        });</script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/Abgabe.js')); ?>"></script>
    <?php if(Auth::user()->rolle=="Tutor" || Auth::user()->rolle=="Professor" ): ?>
        <div class="container">
            <div class="row">
                <h2>Tutorenmodus: ALDA</h2>

                <div class="col-md-4 col-md-offset-8" id="anhang">
                    <div class="input-group">
                        <form method="get" action="/search">
                            <input type="text" class="form-control" placeholder="Suche nach..." name="tfsearch"
                                   onkeypress="search(this.value)">
                            <span class="input-group-btn">
             <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"
                                                                 aria-hidden="true"></span></button></span>
                        </form>
                    </div>
                </div>
                <button onclick="add()"> add</button>
                <button onclick="remove()">remove</button>
                <div id="ausgabe">hallo</div>
                
                <table class="table table-responsive" id="tabelle">
                    <thead>
                    <tr id="head">
                        <th> Name</th>
                    </tr>
                    </thead>
                </table>

                <table class="table">
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


                
                
                
                <td><?php echo e($zeile->zustand); ?></td>

                        <?php else: ?>
                        <td><?php echo e($zeile->zustand); ?></td>
                    <?php endif; ?>
                <?php ($id=$zeile->id); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tr>

                </tbody>
                </table>


            </div>
        </div>

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>