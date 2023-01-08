

<?php $__env->startSection('title'); ?>
    Verify Password
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/owl.carousel/owl.carousel.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    <body class="auth-body-bg">
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xl-3">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5 text">
                                        <a href="index" class="d-block auth-logo">
                                            <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" height="35"
                                                class="auth-logo-dark">
                                        </a>
                                    </div>
                                    <div class="my-auto">
                                        <div style="text-align: center;">
                                            <h5 class="text-primary"> تم تسجيلك بنجاح</h5>
                                            <p class="text-muted">يرجى مراجعة بريدك الالكتروني</p>
                                        </div>

                                        
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-xl-9">
                        <div class="auth-full-bg pt-lg-5 p-4">
                            <div class="w-100">
                                <div class="bg-overlay"></div>
                                <div class="d-flex h-100 flex-column">
                                    <div class="p-4 mt-auto">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7">
                                                <div class="text-center">
                                                    <div dir="ltr">
                                                        <div class="owl-carousel owl-theme auth-review-carousel"
                                                            id="auth-review-carousel">
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-18 mb-4">جدوى في
                                                                        التعديل</p>
                                                                    <div>
                                                                        <h4 class="font-size-16">عدل ما تريد في أي وفت خلال فترة التعديل المسموحة وذلك خلال دقائق</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-18 mb-4">جدوى في
                                                                        السعر</p>
                                                                    <div>
                                                                        <h4 class="font-size-16">سيقوم النظام بمساعدتك
                                                                            وسيقوم بالتحليل المالي وتجهيز الدراسة</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-18 mb-4">سهل وبسيط</p>
                                                                    <div>
                                                                        <h4 class="font-size-16">جدوى كلاود تقدم خدماتها
                                                                            بدقة عالية وسعر تنافسي يتيح لك تحقيق أهدافك
                                                                            وبأقل
                                                                            أسعار</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-18 mb-4">جدوى كلاود تقدم خدماتها
                                                                        بدقة عالية وسعر تنافسي يتيح لك تحقيق أهدافك وبأقل
                                                                        أسعار</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->


                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('script'); ?>
        <!-- owl.carousel js -->
        <script src="<?php echo e(URL::asset('/assets/libs/owl.carousel/owl.carousel.min.js')); ?>"></script>
        <!-- auth-2-carousel init -->
        <script src="<?php echo e(URL::asset('/assets/js/pages/auth-2-carousel.init.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\my project\jadwa\resources\views/auth/verify.blade.php ENDPATH**/ ?>