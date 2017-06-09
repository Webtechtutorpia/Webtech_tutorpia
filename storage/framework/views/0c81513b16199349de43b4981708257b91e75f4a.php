<style> .blue{
        color:blue;
    }</style>
<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->rolle=="Professor"): ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script> $( document ).ready(function() {
                $("li[name='Profmodus']").css('background-color', '#f5f8fa');
            });</script>
        <script type="text/javascript" src="<?php echo e(URL::asset('js/professorenmodus.js')); ?>"></script>

        <div class="container">
            <div class="row">

                <div class="">
                    <h3 class="col-md-5" id="test"> Professorenmodus: <?php echo e(session()->get('global_variable')); ?></h3>
                </div>

                <span class="glyphicon glyphicon-plus col-md-offset-12" id="bigsize-right" id="plus" onclick="add(this)"></span>


            <div class="col-md-11 neueAufgabe" style="display:none">
                <div class="panel panel-success ">
                    <div class="panel-heading" onclick="Bodyhandler(this)">

                        <b>neue Aufgabe</b>
                        <div class="pull-right">

                                    <i onclick="verstecken(this)" class="middlesize-right glyphicon glyphicon-trash"></i>



                        </div>


                    </div>
                    <div class="panel-body notVisible">
                        <?php if(count($errors) > 0): ?>
                            <div class="alert alert-danger">

                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <p><?php echo e($error); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <form class="form-horizontal" role="form" method="POST"
                              
                              action="<?php echo e(url('confirm')); ?>">

                        <?php echo e(csrf_field()); ?>


                            <div class="form group">
                                <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                                <input type="text" class="form-control" name="aufgabenname" id="Aufgabenname" onkeypress="buttonFaerben(this)"
                                       placeholder="Hier Aufgabenname eintragen">
                            </div>

                            <div class="form group">
                                <label for="date" class="control-label">Abgabedatum</label>
                                <input type="text" class="form-control" name="abgabedatum" id="Datum" placeholder="01.01.2017 20:59" onkeypress="buttonFaerben(this)">
                            </div>

                            <div class="form group">
                                <label for="Aufgabenbeschreibung" class="control-label">Aufgabenbeschreibung</label>
                                <textarea name="aufgabenbeschreibung" id="Aufgabenbeschreibung" class="" rows="5" onkeypress="buttonFaerben(this)"
                                          placeholder="Hier Aufgabenstellung eintragen"></textarea>
                            </div>

                            <div class="form-group" style="margin-top: 2em;">
                                <button type="submit" class="btn btn-primary speichern" disabled value="Abschicken"
                                        style="float: right">
                                    Hinzufügen

                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>


                <?php if(Session::has('message')): ?>
                    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
                <?php endif; ?>
                
                <?php $__currentLoopData = $myinputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="col-md-11">
                        <div class="panel panel-default ">
                            <div class="panel-heading" onclick="Bodyhandler(this)">

                                <b><?php echo e($value->aufgabenname); ?></b>
                                <div class="pull-right">
                                    <form action="<?php echo e(url('Professor')); ?>/<?php echo e($value->id); ?>"  onsubmit="return confirm('Sind Sie sicher, dass Sie <?php echo e($value->aufgabenname); ?> wirklich löschen wollen?')" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>

                                        <button type="submit">
                                            <i class="middlesize-right glyphicon glyphicon-trash"></i>
                                        </button>
                                    </form>
                                </div>



                            </div>
                            <div class="panel-body notVisible" >
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
                                        <input type="text" class="form-control" name="aufgabenname" id="Aufgabenname"  value="<?php echo e($value->aufgabenname); ?>" onkeypress="buttonFaerben(this)"
                                               placeholder="Hier Aufgabenname eintragen">
                                    </div>

                                    <div class="form group">
                                        <label for="date" class="control-label">Abgabedatum</label>
                                        <input type="text" class="form-control" name="abgabedatum" id="Datum" placeholder="01.01.2017 29:59" value="<?php echo e($value->abgabedatum); ?>" onkeypress="buttonFaerben(this)">
                                    </div>

                                    <div class="form group">
                                        <label for="Aufgabenbeschreibung" class="control-label">Aufgabenbeschreibung</label>
                                        <textarea name="aufgabenbeschreibung" id="Aufgabenbeschreibung" class="" rows="5" placeholder="Hier Aufgabenstellung eintragen" onkeypress="buttonFaerben(this)"><?php echo e($value->aufgabenbeschreibung); ?></textarea>
                                    </div>

                                    <div class="form-group" style="margin-top: 2em;">
                                        <button type="submit" class="btn btn-primary speichern" value="Abschicken" disabled
                                                style="float: right">
                                            Speichern

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