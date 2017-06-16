<?php $__env->startSection('content'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/admin.js')); ?>"></script>
    <script> $(document).ready(function () {
            $("li[name='Admin']").css('background-color', '#f5f8fa');
        });</script>
    <div class="container">
        <div class="row">
    <?php if( Session::has('message')): ?>
        <p class="bg-success"> <?php echo e(session()->pull('message')); ?></p>
    <?php endif; ?>
    <?php if(Auth::user()->rolle =='admin'): ?>
        <h1>Adminbereich</h1>

        <div class="panel panel-success">
            <div class="panel-heading panel" onclick="Bodyhandler(this)"> Adminbereich</div>
            <div class="panel-body notVisible">
              <label>Rolle ändern</label>
                <form method="post" action="<?php echo e(Url ('test')); ?>" >
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <table>
                        <thead>
                        <tr>
                            <th class="col-md-4">User</th>
                            <th class="col-md-4">Email</th>
                            <th class="col-md-2">aktuelle Rolle</th>
                            <th class="col-md-2"> Rolle ändern</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td class="col-md-4"><?php echo e($user->name); ?></td>
                                <td class="col-md-4"><?php echo e($user->email); ?></td>
                                <td class="col-md-2"><?php echo e($user->rolle); ?></td>

                                <td class="col-md-2">
                                    <?php if($user->rolle=='admin'): ?>
                                        <select name=rolle[]>
                                            <option value="admin" selected>Admin</option>
                                            <option value="member">Member</option>
                                        </select>
                                    <?php else: ?>
                                        <select name="rolle[]">
                                            <option value="admin">Admin</option>
                                            <option value="member" selected>Member</option>
                                        </select>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                    <input class="btn btn-primary" type="submit" value="bestätigen">
                </form>
                <br>
                    <form method="post" action="<?php echo e(Url ('test')); ?>" onsubmit="return confirm('Sind Sie sicher, dass Sie den Account wirklich löschen wollen? Dadurch könnten wichtige Daten verloren gehen.')">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <label for=delete">Account löschen</label>
                    <input type="text" id="delete" name="delete" placeholder="Accountname oder Email eingeben">


                    <input class="btn btn-primary" type="submit" value="bestätigen">
                </form>
            </div>
        </div>
        <h1>Kursbereich</h1>
        <h3>Kurs anlegen</h3>
            <form class="form-inline" method="post" action="kursanlegen">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div>
                        <div class="form-group">
                            <label for="kursname">Kursname </label>
                        <input type="text" class="form-control" id="kursname" name="kursname" placeholder="Kursname eingeben">
                        </div>
                        <div class="form-group">
                            <label for=" id=leiter">Leitender Prof.</label>

                        <select name="leiter"  class="form-control">
                                <?php $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                             
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        <input type="submit" class="btn btn-primary form-control">
                        </div>
                </div>
            </form>

        <?php if($kurse ==null): ?>
            <h3>Keine Kurse angelegt</h3>
        <?php else: ?>
            <form method="post" action="test2">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                <?php $__currentLoopData = $kurse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kurs): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="panel panel-success">
                        <div class="panel-heading panel" onclick="Bodyhandler(this)"><?php echo e($kurs['kurs']); ?></div>
                        <div class="panel-body notVisible">
                            <table>
                                <thead>
                                <tr>
                                    <th class="col-md-4">User</th>
                                    <th class="col-md-4">Email</th>
                                    <th class="col-md-2">aktuelle Rolle</th>
                                    <th class="col-md-2"> Rolle ändern</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $kurs['belegungen']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $belegung): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr>
                                        <td class="col-md-4"> <?php echo e($belegung->name); ?></td>
                                        <td class="col-md-4"> <?php echo e($belegung->email); ?></td>
                                        <td class="col-md-2"> <?php echo e($belegung ->rolle); ?> </td>
                                        <td class="col-md-2">
                                            <?php if($belegung->rolle=='Professor'): ?>
                                                <select name="kursrolle[]">
                                                    <option value="Professor" selected>Professor</option>
                                                    <option value="Student">Student</option>
                                                    <option value="Tutor">Tutor</option>
                                                </select></td>
                                        <?php elseif($belegung->rolle =='Tutor'): ?>
                                            <select name="kursrolle[]">
                                                <option value="Professor">Professor</option>
                                                <option value="Student">Student</option>
                                                <option value="Tutor" selected>Tutor</option>
                                            </select></td>
                                        <?php else: ?>
                                            <select name="kursrolle[]">
                                                <option value="Professor">Professor</option>
                                                <option value="Student" selected>Student</option>
                                                <option value="Tutor">Tutor</option>
                                            </select> </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <input type="submit" value="abschicken">
            </form>
        <?php endif; ?>
    <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>