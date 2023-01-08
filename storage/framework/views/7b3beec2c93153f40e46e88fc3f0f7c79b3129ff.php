<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
           
            <?php if(isset($title) && isset($name)): ?>
            <h4 class="mb-sm-0 font-size-18"><?php echo e($title  . ' > ' .$name); ?></h4>
            <?php elseif(isset($title) && isset($li_1)): ?>
            <h4 class="mb-sm-0 font-size-18"><?php echo e($li_1 . ' > ' . $title); ?></h4>
            <?php else: ?>
            <h4 class="mb-sm-0 font-size-18"><?php echo e($title /* . ' > ' .$name  */); ?></h4>
            <?php endif; ?>
            

        </div>
    </div>
</div>
<!-- end page title -->
<?php /**PATH D:\my project\jadwahmad\resources\views/components/breadcrumb.blade.php ENDPATH**/ ?>