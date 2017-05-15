<?php $__env->startSection('aufgabe'); ?>
    <div class="col-md-11">
        <div class="panel panel-default ">
            <div class="panel-heading" onclick="Bodyhandler(this)">

                <b>neue Aufgabe</b>
                <div class="pull-right">

                    <button class="btn btn-link">
                    <a href="/Professor"> <i class="middlesize-right glyphicon glyphicon-trash"></i></a>
                    </button>


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
                      action="<?php echo e(url('Professor')); ?>" >
                    <?php echo e(csrf_field()); ?>


                    <div class="form group">

                        <label for="Aufgabenname" class="control-label">Aufgabenname</label>
                        <input type="text" class="form-control" name="aufgabenname" id="Aufgabenname"
                               placeholder="Hier Aufgabenname eintragen">
                    </div>

                    <div class="form group">
                        <label for="date" class="control-label">Abgabedatum</label>
                        <input type="text" class="form-control" name="abgabedatum" id="Datum" placeholder="01.01.2017 29:59" >
                    </div>

                    <div class="form group">
                        <label for="Aufgabenbeschreibung" class="control-label">Aufgabenbeschreibung</label>
                        <textarea name="aufgabenbeschreibung" id="Aufgabenbeschreibung" class="" rows="5"
                                  placeholder="Hier Aufgabenstellung eintragen"></textarea>
                    </div>

                    <div class="form-group" style="margin-top: 2em;">
                        <button type="submit" class="btn btn-primary" value="Abschicken"
                                style="float: right">
                           Hinzufügen

                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('Professor.ProfMode', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>