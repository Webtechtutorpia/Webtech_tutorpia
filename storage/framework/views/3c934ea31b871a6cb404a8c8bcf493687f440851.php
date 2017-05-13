<style> .blue{
        color:blue;
    }</style>
<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->rolle=="Professor"): ?>

        <script type="text/javascript" src="<?php echo e(URL::asset('js/professorenmodus.js')); ?>"></script>

        <div class="container">
            <div class="row">
                <div class="">
                    <h3 class="col-md-5" id="test"> Professorenmodus: ALDA!</h3>
                </div>

                <span class="glyphicon glyphicon-plus col-md-offset-12" id="bigsize-right" id="plus" onclick="add()"></span>


                <div class="col-md-11">
                    <div class="panel panel-default ">
                        <div class="panel-heading" onclick="Bodyhandler()"><b>Aufgabe 1 </b>
                            <i  style="display: inline" class="middlesize-right glyphicon glyphicon-trash" onclick="remove()"></i>
                            <i style="display: inline" class="middlesize-right glyphicon glyphicon-cog"></i>
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
                                  action="<?php echo e(url('/professorenmodus')); ?>">
                                <?php echo e(csrf_field()); ?>

                            <div class="form group">

                                    <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                                    <input type="text" class="form-control" name="aufgabenname" id="Aufgabenname"
                                           placeholder="Hier Aufgabenname eintragen">
                            </div>

                            <div class="form group">
                                <label for="date" class="control-label">Abgabedatum</label>
                                <input type="text" class="form-control" name="abgabedatum" id="Datum" placeholder="01.01.2017 29:59">
                            </div>

                            <div class="form group">
                                <label for="Aufgabenbeschreibung" class="control-label">Aufgabenbeschreibung</label>
                                <textarea name="aufgabenbeschreibung" id="Aufgabenbeschreibung" class="" rows="5"
                                          placeholder="Hier Aufgabenstellung eintragen"></textarea>
                            </div>

                            <div class="form-group" style="margin-top: 2em;">
                                <button type="submit" class="btn btn-primary" value="Abschicken"
                                        style="float: right">
                                    Abschicken
                                </button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" onclick="Bodyhandler()"><b>Aufgabe 2 </b>
                            <i style="display: inline" class="middlesize-right glyphicon glyphicon-trash"></i>
                            <i style="display: inline" class="middlesize-right glyphicon glyphicon-cog"></i>
                        </div>
                        <div class="panel-body" style="display:none">
                            <form class="form-horizontal" role="form" method="POST"
                                  action="<?php echo e(url('/professorenmodus')); ?>">
                                <?php echo e(csrf_field()); ?>

                            <div class="form group">

                                    <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                                    <input type="text" class="form-control" name="Aufgabenname" id="Aufgabenname"
                                           placeholder="Hier Aufgabenname eintragen">
                            </div>

                            <div class="form group">
                                <label for="Datum" class="control-label">Abgabedatum</label>
                                <input type="text" class="form-control" id="Datum" placeholder="01.01.2017 29:59">
                            </div>

                            <div class="form group">
                                <label for="Aufgabenbeschreibung" class="control-label">Aufgabenbeschreibung</label>
                                <textarea id="Aufgabenstellung" class="" rows="5"
                                          placeholder="Hier Aufgabenbeschreibung eintragen"></textarea>
                            </div>

                            <div class="form-group" style="margin-top: 2em;">
                                <button type="submit" class="btn btn-primary" value="Abschicken"
                                        style="float: right">
                                    Abschicken
                                </button>

                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" onclick="Bodyhandler()"><b>Aufgabe 3 </b>
                            <i style="display: inline" class="middlesize-right glyphicon glyphicon-trash"></i>
                            <i href="display: inline" class="middlesize-right glyphicon glyphicon-cog"></i>
                        </div>
                        <div class="panel-body" style="display:none;">
                            <form class="form-horizontal" role="form" method="POST"
                                  action="<?php echo e(url('/professorenmodus')); ?>">
                                <?php echo e(csrf_field()); ?>

                            <div class="form group">

                                    <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                                    <input type="text" class="form-control" name="Aufgabenname" id="Aufgabenname"
                                           placeholder="Hier Aufgabenname eintragen">
                            </div>

                            <div class="form group">
                                <label for="Datum" class="control-label">Abgabedatum</label>
                                <input type="text" class="form-control" id="Datum" placeholder="01.01.2017 29:59">
                            </div>

                            <div class="form group">
                                <label for="Aufgabenbeschreibung" class="control-label">Aufgabenbeschreibung</label>
                                <textarea id="Aufgabenstellung" class="" rows="5"
                                          placeholder="Hier Aufgabenbeschreibung eintragen"></textarea>
                            </div>

                            <div class="form-group" style="margin-top: 2em;">
                                <button type="submit" class="btn btn-primary" value="Abschicken"
                                        style="float: right">
                                    Abschicken
                                </button>

                            </div>
                            </form>
                        </div>

                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" onclick="Bodyhandler()"><b>Aufgabe 4 </b>
                            <i style="display: inline" class="middlesize-right glyphicon glyphicon-trash"></i>
                            <i style="display: inline" class="middlesize-right glyphicon glyphicon-cog"></i>
                        </div>
                        <div class="panel-body" style="display:none;">
                            <form class="form-horizontal" role="form" method="POST"
                                  action="<?php echo e(url('/professorenmodus')); ?>">
                                <?php echo e(csrf_field()); ?>

                            <div class="form group">

                                    <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                                    <input type="text" class="form-control" name="Aufgabenname" id="Aufgabenname"
                                           placeholder="Hier Aufgabenname eintragen">
                            </div>

                            <div class="form group">
                                <label for="Datum" class="control-label">Abgabedatum</label>
                                <input type="text" class="form-control" id="Datum" placeholder="01.01.2017 29:59">
                            </div>

                            <div class="form group">
                                <label for="Aufgabenbeschreibung" class="control-label">Aufgabenbeschreibung</label>
                                <textarea id="Aufgabenstellung" class="" rows="5"
                                          placeholder="Hier Aufgabenbeschreibung eintragen"></textarea>
                            </div>

                            <div class="form-group" style="margin-top: 2em;">
                                <button type="submit" class="btn btn-primary" value="Abschicken"
                                        style="float: right">
                                    Abschicken
                                </button>

                            </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>

        </div>
        </div>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>