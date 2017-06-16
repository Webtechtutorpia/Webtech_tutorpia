<?php $__env->startSection('content'); ?>
    <div class="container">
    <div class="row">



    <div class="panel panel-success">
        <div class="panel-heading"><?php echo e($request->aufgabenname); ?></div>
        <div class="panel-body">
            <div class="bg-warning"> <p>Sie wollen die folgende Aufgabe anlegen: <?php echo e($request->aufgabenname); ?></p>
                <p>Beachten Sie die Aufgabe ist für alle Benutzer des Kurses sofort einsehbar ist. Bitte überprüfen Sie Ihre Angaben auf
                    Richtigkeit und korrigieren gegebenfalls diese.<p>
            </div>
            <form class="form-horizontal" action="<?php echo e(url ('Professor')); ?>" method="post">
                <?php echo e(csrf_field()); ?>


                <div class="form group">
                    <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                    <input type="text" class="form-control" name="aufgabenname" id="Aufgabenname" onkeypress="buttonFaerben(this)"
                          value="<?php echo e($request->aufgabenname); ?>">
                </div>

                <div class="form group">
                    <label for="date" class="control-label">Abgabedatum</label>
                    <input type="text" class="form-control" name="abgabedatum" id="Datum" value="<?php echo e($request->abgabedatum); ?>" onkeypress="buttonFaerben(this)">
                </div>

                <div class="form group">
                    <label for="Aufgabenbeschreibung" class="control-label">Aufgabenbeschreibung</label>
                    <textarea name="aufgabenbeschreibung" id="Aufgabenbeschreibung"  rows="5" onkeypress="buttonFaerben(this)"><?php echo e($request->aufgabenbeschreibung); ?></textarea>
                </div>

                <div class="form-group" style="margin-top: 2em; float:right" >
                    <button type="button" class="btn btn-danger speichern" onclick="window.location='<?php echo e(url("reset")); ?>'">abbrechen</button>
                    <input type="submit" class="btn btn-success speichern"  style=" margin-right: 10em" value="anlegen"></div>

            </form>
        </div>
    </div>




</div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>