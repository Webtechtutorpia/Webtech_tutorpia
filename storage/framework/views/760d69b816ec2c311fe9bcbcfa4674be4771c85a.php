<?php $__env->startSection('prof'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="">
                <h3 class="col-md-5"> Professorenmodus: ALDA!</h3>
            </div>

            <a href class="glyphicon glyphicon-plus col-md-offset-12 " id="bigsize-right"></a>


            <div class="col-md-11">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Aufgabe 2 </b>
                        <a href style="display: inline" id="middlesize-right" class="glyphicon glyphicon-trash"></a>
                        <a href style="display: inline" id="middlesize-right" class="glyphicon glyphicon-cog"></a>
                    </div>

                    <div class="panel-body ">

                        <div class="form group">
                            <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                            <input type="text" class="form-control" id="Aufgabenname" placeholder="Hier Aufgabenname eintragen" name="tfAufgabenname">
                        </div>


                        <div class="form group">
                            <label for="Datum" class="control-label">Abgabedatum</label>
                            <input type="text" class="form-control" id="Datum" placeholder="01.01.2017 29:59" name="tfAbgabedatum">
                        </div>

                        <div class="form group">
                            <label for="Aufgabenstellung" class="control-label">Aufgabenbeschreibung</label>
                            <textarea name="taAufgabenbeschreibung" id="Aufgabenstellung" class="" rows="5" placeholder="Hier Aufgabenbeschreibung eintragen"></textarea>
                        </div>

                        <div class="form-group" style="margin-top: 2em;">
                            <button type="submit" class="btn btn-primary" value="Abschicken" style="float: right;">
                                Abschicken
                            </button>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Aufgabe 2 </b>
                        <a href style="display: inline" id="middlesize-right"
                           class="glyphicon glyphicon-trash"></a>
                        <a href style="display: inline" id="middlesize-right"
                           class="glyphicon glyphicon-cog"></a>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Aufgabe 3 </b>
                        <a href style="display: inline" id="middlesize-right"
                           class="glyphicon glyphicon-trash"></a>
                        <a href="display: inline" id="middlesize-right" class="glyphicon glyphicon-cog"></a>
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading"><b>Aufgabe 4 </b>
                        <a href style="display: inline" id="middlesize-right"
                           class="glyphicon glyphicon-trash"></a>
                        <a href style="display: inline" id="middlesize-right"
                           class="glyphicon glyphicon-cog"></a>
                    </div>
                </div>


            </div>
        </div>

    </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>