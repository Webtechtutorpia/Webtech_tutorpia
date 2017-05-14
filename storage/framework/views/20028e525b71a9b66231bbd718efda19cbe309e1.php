<?php $__env->startSection('content'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script> $( document ).ready(function() {
            $("li[name='Kontakt']").css('background-color', '#f5f8fa');
        });</script>

    <div class="container">
        <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
    <form action="/overview">

        <?php if( $errors->count() > 0 ): ?>
            <div class="col-sm-offset-2 col-sm-10">
                <div class="alert alert-danger" role="alert">
                    <p>Leider sind folgende Fehler aufgetreten:</p>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li><?php echo e($message); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
            <?php if(Session::get('sendsuccess')): ?>
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="alert alert-success" role="alert">Wir haben Ihre Nachricht erhalten. Vielen Dank dafür!</div>
                </div>
            <?php endif; ?>

        <label for="fname">Vorname</label>
        <input type="text" id="fname" name="firstname" placeholder="Bitte Vorname eintragen..">

        <label for="lname">Nachname</label>
        <input type="text" id="lname" name="lastname" placeholder="Bitte Nachname eintragen..">

        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Bitte Email eintragen...">

        <label for="subject">Nachricht</label>
        <textarea id="subject" name="subject" placeholder="Bitte Nachricht eintragen" style="height:200px"></textarea>

        <input type=button"
               class=" btn-primary btn" type="submit" value="Bestätigen">

            </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>