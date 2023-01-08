

<?php $__env->startSection('title'); ?>
    مشاريعي
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            مشاريعي
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
        <?php echo e($project->name); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-4">
                            <img src="<?php echo e(url('public/logo/' . $project->logo)); ?>" alt="" width="50" height="50"
                                class="avatar-sm">
                        </div>

                        <div class="flex-grow-1 overflow-hidden" style="
                    padding-top: 15px;">
                            <h5 class="text-truncate font-size-17"><?php echo e($project->name); ?></h5>
                        </div>
                    </div>

                    <h5 class="font-size-15 mt-4 font-weight-700">تفاصيل المشروع </h5>

                    <p class="font-size-17"><?php echo $project->idea; ?></p>



                    <div class="row task-dates">

                        <div class="col-sm-3 col-3">
                            <div class="mt-4">
                                <h5 class="font-size-14 orange"><i class="bx bx-calendar me-1 orange"></i> نوع المشروع </h5>
                                <p class="text-muted mb-0 gray"><?php echo e($project->projectType->title); ?></p>
                            </div>
                        </div>

                        <div class="col-sm-3 col-3">
                            <div class="mt-4">
                                <h5 class="font-size-14 orange"><i class="bx bx-calendar me-1  orange"></i> الدولة , المدينة
                                </h5>
                                <p class="text-muted mb-0 gray"><?php echo e($project->city); ?> ,<?php echo e($project->country); ?> </p>
                            </div>
                        </div>

                        <div class="col-sm-3 col-3">
                            <div class="mt-4">
                                <h5 class="font-size-14 orange"><i class="bx bx-calendar me-1 orange"></i> مدة المشروع </h5>
                                <p class="text-muted mb-0 gray"><?php echo e($project->study_duration); ?> أشهر</p>
                            </div>
                        </div>

                        <div class="col-sm-3 col-3">
                            <div class="mt-4">
                                <h5 class="font-size-14 orange"><i class="bx bx-calendar-check me-1 orange"></i> تاريخ
                                    البداية </h5>
                                <p class="text-muted mb-0 gray"><?php echo e($project->start_date); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="font-size-13 m-0"> <i class="bx bx-calendar me-1 orange"></i>
                                            <a href="javascript: void(0);" class="orange">فترة التأسيس </a>
                                        </h5>
                                    </td>
                                    <td>
                                        <div>
                                            <p class="text-black mb-0 gray"><?php echo e($project->development_duration); ?>شهر </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-size-13 m-0"> <i class="bx bx-calendar me-1 orange"></i>
                                            <a href="javascript: void(0);" class="orange">تاريخ بداية التشغيل </a>
                                        </h5>
                                    </td>
                                    <td>
                                        <div>
                                            <p class="text-black mb-0 gray"><?php echo e($dateStartOper); ?></p>
                                        </div>
                    </div>
                    </td>
                    </tr>
                    <tr>

                        <td>
                            <h5 class="font-size-13 m-0"> <i class="bx bx-calendar me-1 orange"></i>
                                <a href="javascript: void(0);" class="orange">سنة بداية التشغيل </a>
                            </h5>
                        </td>
                        <td>
                            <div>
                                <p class="text-black mb-0 gray"><?php echo e($year); ?></p>
                            </div>
                </div>
                </td>
                </tr>
                <tr>
                    <td>
                        <h5 class="font-size-13 m-0"> <i class="bx bx-calendar me-1 orange"></i>
                            <a href="javascript: void(0);" class="orange">عدد ايام السنة </a>
                        </h5>
                    </td>
                    <td>
                        <div>
                            <p class="text-black mb-0 gray">365 يوم</p>
                        </div>
            </div>
            </td>
            </tr>
            <tr>

                <td>
                    <h5 class="font-size-13 m-0"> <i class="bx bx-calendar me-1 orange"></i>
                        <a href="javascript: void(0);" class="orange">عدد ايام السنة المتبقية </a>
                    </h5>
                </td>
                <td>
                    <div>
                        <p class="text-black mb-0 gray"><?php echo e($numofday); ?> يوم</p>
                    </div>
        </div>
        </td>
        </tr>
        <tr>

            <td>
                <h5 class="font-size-13 m-0"> <i class="bx bx-calendar me-1 orange"></i>
                    <a href="javascript: void(0);" class="orange"> الأشهر المتبقة لنهاية السنة </a>
                </h5>
            </td>
            <td>
                <div>
                    <p class="text-black mb-0 gray"><?php echo e($numofmonth); ?> أشهر</p>
                </div>
    </div>
    </td>
    </tr>

    <tr>

        <td>
            <h5 class="font-size-13 m-0"> <i class="bx bx-calendar me-1 orange"></i>
                <a href="javascript: void(0);" class="orange"> ضريبة القيمة المضافة</a>
            </h5>
        </td>
        <td>
            <div>
                <p class="text-black mb-0 gray"><?php echo e($project->vat); ?>%</p>
            </div>
            </div>
        </td>
    </tr>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <h5 class="font-size-18 mt-6 font-weight-900 pb-12"> الخدمات المتوفرة </h5>

        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4">
                <!-- Simple card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="<?php echo e(url('public/image/' . $services->image)); ?>"
                        alt="Card image cap">
                    <div class="card-body">

                        <h4 class="card-title mt-0 "style="display: -webkit-inline-box;"><?php echo e($services->title); ?>

                            <p class="orange" style=" padding-right: 150px ;">
                                <?php echo e($services->price); ?> ر.س</p>
                        </h4>

                        <a href="<?php echo e(route($services->route, 2)); ?>" class="btn btn-outline-warning waves-effect border-ora"
                            style="width: -webkit-fill-available; ">ابدا الان</a>
                    </div>
                </div>
            </div>
            <!-- end col -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    </div>
    <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('/assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>

    <!-- project-overview init -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/project-overview.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\my project\jadwa\resources\views/admin/projects/show.blade.php ENDPATH**/ ?>