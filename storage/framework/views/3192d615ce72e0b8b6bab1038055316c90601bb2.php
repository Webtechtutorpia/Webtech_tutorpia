<style> .blue {
        color: blue;
    }</style>
<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->rolle=="Professor" || Auth::user()->rolle=="Tutor" ): ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        
        
        <script type="text/javascript" src="<?php echo e(URL::asset('js/professorenmodus.js')); ?>"></script>

        <div class="container">
            <div class="row">

                <div class="">
                    <h3 class="col-md-5" id="test"> Aufgabe: <?php echo e($aufgabenname); ?> </h3>
                    <h3 class="col-md-5"> Student: <?php echo e($student); ?></h3>
                </div>


                <div class="col-md-12 col-xs-12 ">
                    <h4> Übungsblatt 2</h4>



                    <?php if($zustand== "+"): ?>
                        <b> <div class="glyphicon glyphicon-plus"></div></b>
                        <div class="panel panel-success aufgabe ">
                            <?php elseif($zustand=="-"): ?>
                                <b> <div class="glyphicon glyphicon-minus"></div></b>
                                <div class="panel panel-danger aufgabe">
                                    <?php else: ?>
                                        <b>unknown</b>
                                        <div class="panel panel-warning aufgabe ">
                                            <?php endif; ?>
                                            <div class="panel-heading" onclick="Bodyhandler()">

                                                <div style="display: inline; float: right"
                                                     class="glyphicon glyphicon-minus"></div>
                                            </div>
                                            <div class="panel-body">
                                                <div class=" panel-group" style="padding-bottom: 1%;">
                                                    <div class="col-md-3 col-xs-6 size"> Abgabedatum:</div>
                                                    <div class="col-md-9 col-xs-12 size"> Aufgabe 3</div>
                                                </div>
                                                <div class=" panel-group" style="padding-bottom: 1%;">
                                                    <div class="col-md-3  col-xs-6 size">Upload am :</div>
                                                    <div class="col-md-3  col-xs-6 size"> 28.05.2017 12:51</div>
                                                    <div class="col-md-3  col-xs-6 size"><button>Download</button></div>
                                                    <div class="col-md-3  col-xs-4 size">
                                                        <button class="btn-primary btn" style="padding: 0px 12px;"
                                                                type="button">Delete
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="panel-group" style="padding-bottom: 1%;">
                                                    <div class="col-md-3 col-xs-6 size"> Tutoren kontaktieren:</div>
                                                    <div class="col-md-3 col-xs-2 size"><span> <a href
                                                                                                  class="glyphicon glyphicon-envelope"></a>   </span>
                                                    </div>
                                                    <div class="col-md-3 col-xs-12"> Status:</div>
                                                    <div class="col-md-3 col-xs-12 size">Warten auf Bewertung</div>
                                                </div>
                                            </div>
                                        </div>
                                </div>






    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>