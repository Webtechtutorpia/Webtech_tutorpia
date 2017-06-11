<?php $__env->startSection('content'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/Aufgaben.js')); ?>"></script>

    <div class="container" id="container">
        <div class="row">

            <h2>Studentenmodus: <?php echo e($kurs); ?></h2>

            <div class="col-md-4 col-md-offset-8">


                <form class="form-inline" method="get">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="<?php Session::token()?>">
                        <input type="text" name="search_abgabe" id="search_abgabe"
                               onkeyup="ajaxSearch(this.value)" class="form-control" placeholder="Suche nach..."
                               autofocus onfocus="this.value=this.value;" autocomplete="off">

                    </div>
                </form>

            </div>
            <div id="liste"></div>


            
            <h3>Alle Aufgaben:</h3>
            <?php $__currentLoopData = $myinputs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                <?php if( $value->zustand == '.'): ?>
                    <div class="col-md-12 col-xs-12">
                        <div class="panel panel-info aufgabe ">
                            <div class="panel-heading" onclick="Bodyhandler(this)"> <?php echo e($value->aufgabenname); ?>

                                <div style="display: inline; float: right" class="glyphicon glyphicon-minus"></div>
                            </div>

                            <div class="panel-body notVisible">

                                <div class="fileUpload notVisible">
                                    <form class="form-horizontal" role="form" method="POST"
                                          action="<?php echo e(url('FileUpload')); ?>" enctype="multipart/form-data">
                                        <?php echo e(csrf_field()); ?>



                                        <div class="form group">
                                            <input type="hidden" name="aufgabenname" value="<?php echo e($value->aufgabenname); ?>">
                                            <input type="hidden" name="abgabeid" value="<?php echo e($value->abgabeid); ?>">
                                            <input type="hidden" name="username" value="<?php echo e($value->name); ?>">
                                            <input type="file" class="form-control" name="upload" id="upload"
                                                   onkeypress="buttonFaerben(this)">
                                        </div>


                                        <div class="form-group" style="margin-top: 2em;">
                                            <button type="submit" class="btn btn-primary speichern" value="Abschicken"
                                                    style="float: right">
                                                Datei hochladen
                                            </button>

                                        </div>
                                    </form>
                                </div>


                                <div class="austauschen">
                                    <?php if(Session::has('message')): ?>
                                        <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
                                    <?php endif; ?>
                                    <div class=" panel-group" style="padding-bottom: 1%;">
                                        <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                                        <div class="col-md-9 col-xs-12 size"> <?php echo e($value->aufgabenname); ?></div>
                                    </div>
                                    <div class=" panel-group" style="padding-bottom: 1%;">
                                        <div class="col-md-3  col-xs-6 size">Abgabe bis :</div>
                                        <div class="col-md-3  col-xs-6 size"> <?php echo e($value->abgabedatum); ?></div>
                                        <div class="col-md-3  col-xs-6 size">Aufgabe hochladen:</div>
                                        <div class="col-md-3  col-xs-4 size">
                                            <a class="btn btn-primary btn" onclick="add(this)" role="button">Upload</a>

                                        </div>
                                    </div>
                                    <div class="panel-group" style="padding-bottom: 1%;">
                                        <div class="col-md-3 col-xs-6 size"> Tutoren kontaktieren:</div>
                                        <div class="col-md-3 col-xs-2 size"><span><a
                                                        href="mailto:<?php echo e($value->email); ?>?subject=Frage zur Abnahme von <?php echo e($value->aufgabenname); ?> bei <?php echo e($value->name); ?>"
                                                        class="glyphicon glyphicon-envelope"></a></span>
                                        </div>
                                        <div class="col-md-3 col-xs-12"> Status:</div>
                                        <div class="col-md-3 col-xs-12 size">Warten auf Upload</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>
                <?php if($value->zustand == '-'): ?>
                    <div class="col-md-12 col-xs-12">
                        <div class="panel panel-danger aufgabe ">
                            <div class="panel-heading" onclick="Bodyhandler(this)"> <?php echo e($value->aufgabenname); ?>

                                <div style="display: inline; float: right" class="glyphicon glyphicon-remove"></div>
                            </div>
                            <div class="panel-body notVisible">
                                <div class=" panel-group" style="padding-bottom: 1%;">
                                    <div class="col-md-3 col-xs-6 size"> Aufgabenstellung:</div>
                                    <div class="col-md-9 col-xs-12 size"> <?php echo e($value->aufgabenname); ?></div>
                                </div>
                                <div class=" panel-group" style="padding-bottom: 1%;">
                                    <div class="col-md-3  col-xs-6 size">Abgabe bis:</div>
                                    <div class="col-md-3  col-xs-6 size"><?php echo e($value->abgabedatum); ?> </div>
                                    <div class="col-md-3  col-xs-6 size">Abgabe abgelehnt:</div>
                                    <div class="col-md-3 col-xs-6 size"><?php echo e($value->korrigiert_am); ?></div>
                                    <div class="col-md-3 col-xs-6 size">Abgelehnt durch:</div>
                                    <div class="col-md-3 col-xs-6 size"><?php echo e($value->bearbeitet_von); ?></div>
                                    <div class="col-md-3 col-xs-6 size">Datei:</div>
                                    <div class="col-md-3 col-xs-6 size"><button class="btn btn-primary" onclick="window.location.href='/download?kurs=<?php echo e($kurs); ?>&id=<?php echo e($value->abgabeid); ?>'">Download</button></div>
                                </div>
                                <div class="panel-group" style="padding-bottom: 1%;">
                                    <div class="col-md-3 col-xs-6 size"> Tutor kontaktieren:</div>
                                    <div class="col-md-3 col-xs-2 size"><span><a
                                                    href="mailto:<?php echo e($value->email); ?>?subject=Fehler bei Abnahme von <?php echo e($value->aufgabenname); ?> bei <?php echo e($value->name); ?>"
                                                    class="glyphicon glyphicon-envelope"></a></span>
                                    </div>
                                    <div class="col-md-3 col-xs-12"> Status:</div>
                                    <div class="col-md-3 col-xs-12 size"> Abgabe nicht erfolgreich</div>
                                </div>
                                <div class="panel-group" style="padding-bottom: 1%;">
                                    <div class="col-md-3  col-xs-6 size">Kommentar:</div>

                                    <div class="col-md-3 col-xs-2 size"><?php echo e($value->kommentar); ?>

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
                                    <div class="col-md-3 col-xs-6 size "><?php echo e($value->upload_am); ?></div>
                                    <div class="col-md-3 col-xs-6 size"> korregiert am:</div>
                                    <div class="col-md-3  col-xs-6 size"> <?php echo e($value->korrigiert_am); ?></div>
                                </div>

                                <div class="panel-group" style="padding-bottom: 1%;">
                                    <div class="col-md-3 col-xs-6 size">Abnahme durch:</div>
                                    <div class="col-md-3 col-xs-6 size"> <?php echo e($value->bearbeitet_von); ?></div>

                                    <div class="col-md-3 col-xs-6 size"> Datei:</div>
                                    <div class="col-md-3 col-xs-4 size">
                                        
                                        <button class="btn btn-primary " type="button" onclick="window.location.href='/download?kurs=<?php echo e($kurs); ?>&id=<?php echo e($value->abgabeid); ?>'">
                                            Download
                                        </button>
                                    </div>
                                </div>
                                <div class="panel-group ">
                                    <div class="col-md-3 col-xs-6 size"> Tutor kontaktieren:</div>
                                    <div class="col-md-3 col-xs-2 size"><span><a
                                                    href="mailto:<?php echo e($value->email); ?>?subject=Frage zur Abnahme von <?php echo e($value->aufgabenname); ?> bei <?php echo e($value->name); ?>"
                                                    class="glyphicon glyphicon-envelope"></a></span>
                                    </div>
                                </div>
                                <div class="panel-group" style="padding-bottom: 1%;">
                                    <div class="col-md-3 col-xs-12"> Status:</div>
                                    <div class="col-md-3 col-xs-12 size">erfolgreich abgegeben</div>

                                </div>
                                <div class="panel-group ">
                                    <div class="col-md-3 col-xs-6 size"> Kommentar:</div>
                                    <div class="col-md-3 col-xs-2 size"><?php echo e($value->kommentar); ?></div>
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
                                    <div class="col-md-3  col-xs-6 size"> <?php echo e($value->upload_am); ?></div>
                                    <div class="col-md-3  col-xs-6 size">Datei löschen:</div>
                                    <div class="col-md-3  col-xs-4 size">
                                        
                                              
                                              
                                            
                                            
                                            
                                            

                                        <form action="/delete" method="post">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <input type="hidden" name="abgabeid" value="<?php echo e($value->abgabeid); ?>">
                                            <button type="submit" class="btn-primary btn">Delete</button>
                                        </form>
                                            
                                        
                                    </div>
                                </div>
                                <div class="panel-group" style="padding-bottom: 1%;">
                                    <div class="col-md-3 col-xs-6 size"> Tutor kontaktieren:</div>
                                    <div class="col-md-3 col-xs-2 size"><span><a
                                                    href="mailto:<?php echo e($value->email); ?>?subject=Frage zur <?php echo e($value->aufgabenname); ?> von <?php echo e($value->name); ?>"
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