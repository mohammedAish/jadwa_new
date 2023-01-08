

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Recover_Password'); ?> 2
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/owl.carousel/owl.carousel.min.css')); ?>">
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
                                    <div class="my-auto" style="padding-bottom: 180px;">

                                        <div>
                                            <h5 class="text colors">اعادة تعيين كلمة المرور </h5>
                                            <p class="text-muted text">قم بادخال البريد الالكتروني لارسال التعليمات اليك</p>
                                        </div>

                                        <div class="mt-4">
                                            <?php if(session('status')): ?>
                                                <div class="alert alert-success text-center mb-4" role="alert">
                                                    <?php echo e(session('status')); ?>

                                                </div>
                                            <?php endif; ?>
                                            <form class="form-horizontal" method="POST"
                                                action="<?php echo e(route('password.email')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <div class="mb-3">
                                                    <label for="useremail" class="form-label colors fon">البريد
                                                        الالكتروني</label>
                                                    <input type="email"
                                                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="useremail" name="email" placeholder="Enter email"
                                                        value="<?php echo e(old('email')); ?>" id="email">
                                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($message); ?></strong>
                                                        </span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>

                                                <div class="mt-3 d-grid">
                                                    <button class="btn btn-primary w-md waves-effect waves-light send"
                                                        type="submit">ارسال</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>
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
                                                                    <p class="font-size-18 mb-4 none">جدوى في
                                                                        التعديل</p>
                                                                    <div>
                                                                        <h4 class="font-size-16">عدل ما تريد في أي وفت خلال فترة التعديل المسموحة وذلك خلال دقائق</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-18 mb-4 none">جدوى في
                                                                        السعر</p>
                                                                    <div>
                                                                        <h4 class="font-size-16">سيقوم النظام بمساعدتك
                                                                            وسيقوم بالتحليل المالي وتجهيز الدراسة</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-18 mb-4 none">سهل وبسيط</p>
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

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\my project\jadwa\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>