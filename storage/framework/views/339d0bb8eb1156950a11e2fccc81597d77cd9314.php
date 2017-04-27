

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">

    <div class="col-md-12 text-center">
        <h3>Wilkommen zurück Max Mustermann!</h3>
    </div>



            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading"><b>Neueste Aktivitäten</b></div>
                    <div class="panel-body">

                            <div class="col-xs-12 col-md-12">
                                <table class="table-responsive">
                                    <tr>
                                        <th class="col-md-3 col-xs-3"><p>Zeit</p></th>
                                        <th class="col-md-9 col-xs-9"><p>Ereignis</p></th>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 col-xs-3"> <p>20.04.17 23:59</p></td>
                                        <td class="col-md-9 col-xs-9"><p>Tutor hat deine Übungsaufgabe Nr 3 im Kurs ALDA
                                                abgenommen.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 col-xs-3"> <p>28.04.17 15:21</p></td>
                                        <td class="col-md-9 col-xs-9"><p>Dozent hat eine neue Übungsaufgabe erstellt.</p>
                                        </td>
                                    </tr>



                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>