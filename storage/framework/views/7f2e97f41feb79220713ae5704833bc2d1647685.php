<?php $__env->startSection('content'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/Aufgaben.js')); ?>"></script>

    <div class="container" id="container">
        <div class="row" >

            <h2>Studentenmodus: DBIS</h2>

            <div class="col-md-4 col-md-offset-8">


                <form class="form-inline" method="get">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="<?php Session::token()?>">
                        <input type="text" name ="search_abgabe" value="<?php echo e(isset($cityName) ? $cityName : ''); ?>"id="search_abgabe" onkeyup="ajaxSearch(this.value)" class="form-control" placeholder="Suche nach..."
                        autofocus onfocus="this.value=this.value;" autocomplete="off">

                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
</form>

</div>
            <div id="liste"></div>





            <?php if(Session::has('message')): ?>
                <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
            <?php endif; ?>
            
            <h3>Alle Aufgaben:</h3>
            <?php $__currentLoopData = $myinputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

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
                                                <div class="col-md-3 col-xs-2 size"><span><a href="mailto:<?php echo e($value->email); ?>?subject=Frage zur Abnahme von <?php echo e($value->aufgabenname); ?> bei <?php echo e($value->name); ?>"
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
                                    <div class="col-md-3 col-xs-12"> Kommentar:</div>
                                    <div class="col-md-3 col-xs-12 size">nichts zu beanstanden. sehr gut weiter so!</div>

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
                                                    <form action="<?php echo e(url('/Aufgabenansicht/destroy')); ?>/<?php echo e($value->abgabeid); ?>"  onsubmit="return confirm('Sind Sie sicher, dass Sie <?php echo e($value->abgabeid); ?> wirklich löschen wollen?')" method="POST">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <button class="btn-primary btn"style="padding: 0px 12px;" type="submit">Delete
                                                        </button>
                                                    </form>
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


    </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>