<?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <a href="cityDetail/<?php echo e($city->id); ?>"><?php echo e($city->aufgabenname); ?> </a> <br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>






    
        
    
        
    


<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>