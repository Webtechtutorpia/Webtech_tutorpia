<?php $__env->startSection('content'); ?>

    <?php if(Auth::user()->rolle =='admin'): ?>
        <h1>Adminbereich</h1>
        <form method="post" action="<?php echo e(Url ('test')); ?>">

            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <table>
            <thead>
            <tr>
                <th>User</th>
                <th>Email</th>
                <th>aktuelle Rolle</th>
                <th> Rolle ändern</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->rolle); ?></td>

                    <td>
                        <?php if($user->rolle=='admin'): ?>
                            <select name= rolle[]>
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

            <label for=delete">Account löschen</label>
            <input type="text" id= delete"  placeholder="Accountname oder Email">

            <label for id="create">Account anlegen</label>
            <input type="text" id="create" placeholder="Accountname oder Email">
        <input class="btn btn-primary" type="submit" value="bestätigen">
        </form>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>