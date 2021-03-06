<?php $__env->startSection('content'); ?>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo e(URL::asset('js/professorenmodus.js')); ?>"></script>

        <div class="container">
            <div class="row">
                <h2>Korrekturmodus: <?php echo e($kurs); ?></h2>

                    <?php $__currentLoopData = $abgaben; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                            <?php if( $value->zustand == '/'): ?>
                                                <div class="col-md-12 col-xs-12">
                                                    <div class="panel panel-warning aufgabe ">
                                                        <div class="panel-heading" onclick="panel_behavior(this)"> <?php echo e($value->aufgabenname); ?>

                                                            <div class="glyphicon glyphicon-minus icon-right"></div>
                                                        </div>
                                                        <?php endif; ?>
                                                        <?php if( $value->zustand == '+'): ?>
                                                            <div class="col-md-12 col-xs-12">
                                                                <div class="panel panel-success aufgabe ">
                                                                    <div class="panel-heading" onclick="panel_behavior(this)"> <?php echo e($value->aufgabenname); ?>

                                                                        <div  class="glyphicon glyphicon-ok icon-right"></div>
                                                                    </div>
                                                                    <?php endif; ?>
                                                                    <?php if( $value->zustand == '-'): ?>
                                                                        <div class="col-md-12 col-xs-12">
                                                                            <div class="panel panel-danger aufgabe ">
                                                                                <div class="panel-heading" onclick="panel_behavior(this)"> <?php echo e($value->aufgabenname); ?>

                                                                                    <div class="glyphicon glyphicon-remove icon-right"></div>
                                                                                </div>
                                                                                <?php endif; ?>

                                            <div class="panel-body">



                                                <div class="austauschen">
                                                    <?php if(Session::has('message')): ?>
                                                        <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
                                                    <?php endif; ?>

                                            <table class = "table responsive">
                                                <tr>
                                                    <th>Studentenversion</th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>Student:</td>
                                                    <td><?php echo e($value->name); ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Aufgabenstellung:</td>
                                                    <td><?php echo e($value->aufgabenbeschreibung); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Abgabedatum:</td>
                                                    <td><?php echo e($value->abgabedatum); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Upload am:</td>
                                                    <td><?php echo e($value->upload_am); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Datei:</td>
                                                    <td>
                                                    <form action="/download" method="post">
                                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                        <input type="hidden" name="kurs" value="<?php echo e($kurs); ?>">
                                                        <input type="hidden" name="abgabeid" value="<?php echo e($value->abgabeid); ?>">
                                                        <button type="submit" class="btn-primary btn">Download</button>
                                                    </form>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Student kontaktieren</td>
                                                    <td><span><a href="mailto:<?php echo e($value->email); ?>?subject=Frage zur Abnahme von <?php echo e($value->aufgabenname); ?>"
                                                                 class="glyphicon glyphicon-envelope"></a></span></td>
                                                </tr>

                                                <tr>
                                                    <th>Bewertungsbereich</th>
                                                    <th></th>
                                                </tr>
                                                <?php if(count($errors) > 0): ?>
                                                    <div class="alert alert-danger">

                                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <p><?php echo e($error); ?></p>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                    </div>
                                                <?php endif; ?>
                                                <form class="form-horizontal" role="form" method="POST"
                                                      action="<?php echo e(url('Tutor/Aufgabenkorrektur')); ?>">
                                                    <?php echo e(csrf_field()); ?>

                                                <tr>
                                                    <td>Kommentar:</td>
                                                    <td>
                                                    <input required type="text" class="form-control" name="kommentar"
                                                    id="kommentar" onkeypress="buttonFaerben(this)"
                                                    placeholder="Hier Kommentar eintragen" maxlength="255">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status:</td>
                                                    <td>

                                                        <select required name="bewertung" onchange="buttonFaerben(this)">
                                                            <option value="">Bitte auswählen:</option>
                                                            <option value="abnehmen">abnehmen</option>
                                                            <option value="ablehnen">ablehnen</option>

                                                        </select>
                                                    </td>
                                                </tr>
                                                    <tr>
                                                        <td>Bewertung abschicken:</td>
                                                        <td><button class="btn btn-success speichern" disabled>bewerten</button></td>
                                                    </tr>
                                            </form>
                                            </table>
                                                </div>
                                                </div>
                                        </div>
                                        </div>




    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>