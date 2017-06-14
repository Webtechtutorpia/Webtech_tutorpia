<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1 class="text-center"><strong>Impressum</strong></h1>
        <br><p><span style="text-decoration: underline;">Angaben gem. § 5 TMG:</span></p>


        <p>Tutorpia <br>
         Kontakt: contact.tutorpia@gmail.com</p>
        <br>
        <p><strong>Vertreten Durch:</strong></p>
        <p>Jannis Grebenstein. <br>
        Rheingutstraße 34 <br>
            78462 Konstanz </p>

        <p> Isabell Bayer</p>

    </div>
    <script> $( document ).ready(function() {
            $("li[name='Impressum']").css('background-color', '#f5f8fa');
        });</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>