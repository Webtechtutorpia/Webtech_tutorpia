<?php $__env->startSection('content'); ?>
    <h3> gesuchte Aufgaben: </h3>
    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php if( $value->zustand == '.'): ?>
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-info aufgabe ">
                    <div class="panel-heading" onclick="Bodyhandler(this)"> <?php echo e($value->aufgabenname); ?>

                        <div style="display: inline; float: right" class="glyphicon glyphicon-minus"></div>
                    </div>
                    <div class="panel-body notVisible">
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
                            <div class="col-md-3 col-xs-2 size"><span><a href="mailto:<?php echo e($value->email); ?>?subject=Fehler bei Abnahme von <?php echo e($value->aufgabenname); ?> bei <?php echo e($value->name); ?>"
                                                                         class="glyphicon glyphicon-envelope"></a></span>
                            </div>
                            <div class="col-md-3 col-xs-12"> Status:</div>
                            <div class="col-md-3 col-xs-12 size">Warten auf Upload</div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>
        <?php if($value->zustand == '-'): ?>
            <div class="col-md-12 col-xs-12">
                <div class="panel panel-danger aufgabe ">
                    <div class="panel-heading" onclick="Bodyhandler(this)"> <?php echo e($value->aufgabenname); ?>

                        <div style="display: inline; float: right" class="glyphicon glyphicon-remove"></div></div>
                    <div class="panel-body notVisible">
                        <div class=" panel-group" style="padding-bottom: 1%;">
                            <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                            <div class="col-md-9 col-xs-12 size"> <?php echo e($value->aufgabenname); ?></div>
                        </div>
                        <div class=" panel-group" style="padding-bottom: 1%;">
                            <div class="col-md-3  col-xs-6 size">Abgabe bis:</div>
                            <div class="col-md-3  col-xs-6 size"><?php echo e($value->abgabedatum); ?> </div>
                            <div class="col-md-3  col-xs-6 size">Abgabe abgelehnt:</div>
                            <div class="col-md-3 col-xs-6 size"><?php echo e($value->abgabedatum); ?></div>
                        </div>
                        <div class="panel-group" style="padding-bottom: 1%;">
                            <div class="col-md-3 col-xs-6 size"> Tutor kontaktieren:</div>
                            <div class="col-md-3 col-xs-2 size"><span><a href="mailto:<?php echo e($value->email); ?>?subject=Fehler bei Abnahme von <?php echo e($value->aufgabenname); ?> bei <?php echo e($value->name); ?>"
                                                                         class="glyphicon glyphicon-envelope"></a></span>
                            </div>
                            <div class="col-md-3 col-xs-12"> Status:</div>
                            <div class="col-md-3 col-xs-12 size"> Abgabe nicht erfolgreich</div>
                        </div>
                        <div class="panel-group" style="padding-bottom: 1%;">
                            <div class="col-md-3  col-xs-6 size">Kommentar: </div>

                            <div class="col-md-3 col-xs-2 size">Abgabezeitpunkt verstrichen
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($value->zustand == '+'): ?>
            <div class="col-md-12 col-xs-12 ">

                <div class="panel panel-success aufgabe ">
                    <div class="panel-heading" onclick="Bodyhandler(this)"> <?php echo e($value->aufgabenname); ?>

                        <div style="display: inline; float: right" class="glyphicon glyphicon-ok"></div>
                    </div>
                    <div class="panel-body notVisible">
                        <div class=" panel-group" style="padding-bottom: 1%">
                            <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                            <div class="col-md-9 col-xs-12 size"><?php echo e($value->aufgabenname); ?></div>
                        </div>

                        <div class="panel group" style="padding-bottom: 1%">
                            <div class="col-md-3 col-xs-6 size ">Upload am:</div>
                            <div class="col-md-3 col-xs-6 size "><?php echo e($value->created_at); ?></div>
                            <div class="col-md-3 col-xs-6 size"> korregiert am:</div>
                            <div class="col-md-3  col-xs-6 size"> <?php echo e($value->updated_at); ?></div>
                        </div>

                        <div class="panel-group" style="padding-bottom: 1%;">
                            <div class="col-md-3 col-xs-6 size">Abnahme durch:</div>
                            Word-wrap beachten
                            <div class="col-md-3 col-xs-6 size" style="text-align: bottom"> Tutor1</div>

                            <div class="col-md-3 col-xs-6 size"> korregierte Version:</div>
                            <td class="col-md-1 size"> <div class="glyphicon glyphicon-envelope text-center" style="display: inline"></div> </td>
                            <div class="col-md-3 col-xs-4 size">
                                <button class="btn-primary btn " style="padding: 0px 12px;" type="button">Download
                                </button>
                            </div>
                        </div>
                        <div class="panel-group " style=";">
                            <div class="col-md-3 col-xs-6 size"> Tutor kontaktieren:</div>
                            <div class="col-md-3 col-xs-2 size"><span><a href="mailto:<?php echo e($value->email); ?>?subject=Frage zur Abnahme von <?php echo e($value->aufgabenname); ?> bei <?php echo e($value->name); ?>"
                                                                         class="glyphicon glyphicon-envelope"></a></span>
                            </div>
                        </div>
                        <div class="panel-group" style="padding-bottom: 1%;">
                            <div class="col-md-2  col-xs-12 size">Kommentar:</div>
                            word-wrap
                            <div class="col-md-10 col-xs-12 size">nichts zu beanstanden. sehr gut weiter so!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if($value->zustand == '/'): ?>
            <div class="col-md-12 col-xs-12 ">

                <div class="panel panel-warning aufgabe ">
                    <div class="panel-heading" onclick="Bodyhandler(this)"> <?php echo e($value->aufgabenname); ?>

                        <div style="display: inline; float: right" class="glyphicon glyphicon-minus"></div>
                    </div>
                    <div class="panel-body notVisible">
                        <div class=" panel-group" style="padding-bottom: 1%;">
                            <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                            <div class="col-md-9 col-xs-12 size"> <?php echo e($value->aufgabenname); ?></div>
                        </div>
                        <div class=" panel-group" style="padding-bottom: 1%;">
                            <div class="col-md-3  col-xs-6 size">Upload am :</div>
                            <div class="col-md-3  col-xs-6 size"> <?php echo e($value->created_at); ?></div>
                            <div class="col-md-3  col-xs-6 size">Datei löschen:</div>
                            <div class="col-md-3  col-xs-4 size">
                                <button class="btn-primary btn " style="padding: 0px 12px;" type="button">Delete
                                </button>

                            </div>
                        </div>
                        <div class="panel-group" style="padding-bottom: 1%;">
                            <div class="col-md-3 col-xs-6 size"> Tutor kontaktieren:</div>
                            <div class="col-md-3 col-xs-2 size"><span><a href="mailto:<?php echo e($value->email); ?>?subject=Frage zur <?php echo e($value->aufgabenname); ?> von <?php echo e($value->name); ?>"
                                                                         class="glyphicon glyphicon-envelope"></a></span>
                            </div>
                            <div class="col-md-3 col-xs-12"> Status:</div>
                            <div class="col-md-3 col-xs-12 size">Warten auf Bewertung</div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if(count($cities)==0): ?>
                                        <p> Es wurden keine mit deiner Suchanfrage übereinstimmenden Aufgaben gefunden.</p>
    <?php endif; ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>