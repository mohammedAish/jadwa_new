<?php $__env->startSection('title'); ?>
    <?php echo e('دراسة جدوى'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            الخدمات
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            دراسة جدوى
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="h4 card-title mb-4">تقدم العملية</div>
                    <div class="">
                        <div class="progress-xl progress">
                            <div class="progress-bar bg-success" style="width: 39%;" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100">39%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-center" style="border: 3px solid #F9AA1C ;border-radius: 7px;">
                <div class="card-body ">

                    <div class="col-sm center">
                     <a href="<?php echo e(route('strategic-plan')); ?>" class="btn btn-outline-warning">الخطة الإستراتيجية</a>
                    </div>
                        <span class="font-size-20"  style="color: green ;font-size: 40px !important;"> <i class="fas fa-check-circle"></i></span>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="border: 3px solid #F9AA1C ;border-radius: 7px;">
                <div class="card-body ">

                    <div class="col-sm center">
                        <a href="<?php echo e(route('market-study')); ?>" class="btn btn-outline-warning">دراسة السوق</a>
                    </div>
                    <span class="font-size-20" style="color: green  ;font-size: 40px !important;"> <i class="fas fa-check-circle"></i></span>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="border: 3px solid #F9AA1C ;border-radius: 7px;">
                <div class="card-body ">

                    <div class="col-sm center">
                        <a href="<?php echo e(route('administrators')); ?>" class="btn btn-outline-warning">الإداريين</a>
                    </div>
                    <span class="font-size-20" style="color: green;font-size: 40px !important;"> <i class="fas fa-check-circle"></i></span>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="border: 3px solid #F9AA1C ;border-radius: 7px;">
                <div class="card-body ">

                    <div class="col-sm center">
                        <a href="<?php echo e(route('revenues')); ?>" class="btn btn-outline-warning">الإيرادات وتكاليف الإيرادات</a>
                    </div>
                    <span class="font-size-20" style="color: grey;font-size: 40px !important;"> <i class="fas fa-check-circle"></i></span>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="border: 3px solid #F9AA1C ;border-radius: 7px;">
                <div class="card-body ">

                    <div class="col-sm center">
                        <a class="btn btn-outline-warning">الموظفين</a>
                    </div>
                    <span class="font-size-20" style="color: gray;font-size: 40px !important;"> <i class="fas fa-check-circle"></i></span>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Desktop/valet project/jadwaa/resources/views/admin/forms/feasibility_study.blade.php ENDPATH**/ ?>