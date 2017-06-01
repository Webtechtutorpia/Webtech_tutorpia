<style> .blue {
        color: blue;
    }</style>
<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->rolle=="Professor" || Auth::user()->rolle=="Tutor" ): ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        
        
        <script type="text/javascript" src="<?php echo e(URL::asset('js/professorenmodus.js')); ?>"></script>

        <div class="container">
            <div class="row">


                <div class="col-md-12 col-xs-12 ">
                    <h4> Kurs: bla</h4>


                    <?php if($zustand== "+"): ?>
                        <b>
                            <div class="glyphicon glyphicon-plus"></div>
                        </b>
                        <div class="panel panel-success aufgabe ">
                            <?php elseif($zustand=="-"): ?>
                                <b>
                                    <div class="glyphicon glyphicon-minus"></div>
                                </b>
                                <div class="panel panel-danger aufgabe">
                                    <?php else: ?>
                                        <b>unknown</b>
                                        <div class="panel panel-warning aufgabe ">
                                            <?php endif; ?>
                                            <div class="panel-heading" onclick="Bodyhandler()">
                                                <div style="display:inline">Aufgabe <?php echo e($aufgabenname); ?></div>
                                                <div style="float:right ">Student: <?php echo e($student); ?></div>
                                            </div>
                                            <div class="panel-body">
                                                <div class=" panel-group" style="padding-bottom: 1%;">
                                                    <div class="col-md-3 col-xs-6 size"> Abgabedatum:</div>
                                                    <div class="col-md-9 col-xs-12 size"> 28.05.2017 12:51</div>
                                                </div>
                                                <div class=" panel-group" style="padding-bottom: 1%;">
                                                    <h4 class="col-md-12 col-xs-12 text-center">Studentenversion</h4>
                                                    <div class="col-md-3  col-xs-6 size">Upload am :</div>
                                                    <div class="col-md-3  col-xs-6 size"> 28.05.2017 12:51</div>
                                                    <div class="col-md-3  col-xs-6 size">
                                                        <button class="btn btn-default btn-primary">Download</button>
                                                    </div>
                                                    
                                                    <h4 class="col-md-12 col-xs-12 Text-center">Tutorenberech </h4>
                                                    <div class="col-md-3  col-xs-6 size">Korrigiert am :</div>
                                                    <div class="col-md-3  col-xs-6 size"> 28.05.2017 12:51</div>
                                                    <div class="col-md-6  col-xs-6 size">Abnahme durch: Tutor1</div>

                                                    <div class="col-md-6 col-xs-6 size"> Datei: (Pfad)</div>
                                                    <div class="col-md-3  col-xs-6 size btn-group">
                                                        <button class="btn btn-default btn-primary">Download</button>
                                                        <button class="btn btn-default btn-primary">Delete</button>
                                                    </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Aufgabenname"
                                                               class="control-label col-md-12 col-xs-12"
                                                               style="text-decoration: none">Kommentar:</label>
                                                        <div class="input-group col-md-12 col-xs-12">
                                                        <input type="text" class="form-control" name="aufgabenname"
                                                               id="Aufgabenname" onkeypress="buttonFaerben(this)"
                                                               placeholder="Hier Kommentar eintragen">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-default btn-primary">setzen</button>
                                                            </div>
                                                        </div>
                                                            <div class="col-md-3 col-xs-6 size">Status </div>
                                                        <div class="dropdown">

                                                            <div class="btn-group" role="group">
                                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Dropdown
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a href="#">abnehmen</a></li>
                                                                    <li><a href="#">ablehnen</a></li>
                                                                    <li><a href="#">unbearbeitet</a></li>
                                                                </ul>
                                                                <button class="btn btn-default">Status ändern</button>
                                                            </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                    <div class="input-group">



                                                </div>
                                            </div>
                                        </div>






    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>