

<?php $__env->startSection('title'); ?>
    تسجيل الدخول
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/owl.carousel/owl.carousel.min.css')); ?>">
    <style>
        p {
            font-weight: bold;
        }

        .none {
            font-weight: normal;
        }
    </style>
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

                                        <div>
                                            <h5 class="text colors">للمتابعة قم بتسجيل الدخول</h5>
                                            <p class="text-muted text">جدوى في السعر - جدوى في الوقت</p>
                                        </div>

                                        <div class="mt-4">
                                            <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                                                <?php echo csrf_field(); ?>
                                                
                                                <label for="username" class="form-label colors fon">البريد
                                                    الإلكتروني</label>
                                                <div class="input-group auth-pass-inputgroup ">
                                                    <input name="email" type="email"
                                                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        value="<?php echo e(old('email')); ?>" id="username" placeholder="ادخل البريد الالكتروني"
                                                        autocomplete="email" autofocus>
                                                    <button class="btn btn-light " type="button"><i
                                                            class="mdi mdi-email"></i></button>
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
                                                <div class="mb-3">
                                                    <div class="float-end">
                                                        <?php if(Route::has('password.request')): ?>
                                                            <a href="<?php echo e(route('password.request')); ?>"
                                                                class="text-muted yell">نسيت كلمة المرور</a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <label class="form-label colors fon">كلمة المرور</label>
                                                    <div
                                                        class="input-group auth-pass-inputgroup <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                        <input type="password" name="password"
                                                            class="form-control  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="password" placeholder="Enter password"
                                                            aria-label="Password" aria-describedby="password-addon">
                                                        <button class="btn btn-light " id="show"
                                                            type="button" id="password-addon"><i
                                                                class="mdi mdi-eye-outline"></i></button>
                                                        <?php $__errorArgs = ['password'];
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
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember"
                                                        <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                                    <label class="form-check-label colors" for="remember">
                                                        تذكرني
                                                    </label>
                                                </div>

                                                <div class="mt-3 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light log"
                                                        type="submit" id="login">
                                                        تسجيل دخول</button>
                                                </div>


                                            </form>
                                            <div class="mt-5 text-center yell">
                                                <p id="none">ليس لديك حساب ؟ <a href="<?php echo e(url('register')); ?>"
                                                        class="fw-medium yell">
                                                        حساب جديد</a> </p>
                                            </div>
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
                                                                    <p class="font-size-18 mb-4">جدوى كلاود تقدم خدماتها
                                                                        بدقة عالية وسعر تنافسي يتيح لك تحقيق أهدافك وبأقل
                                                                        أسعار</p>
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
                                                                    <p class="font-size-18 mb-4">جدوى في
                                                                        التعديل</p>
                                                                    <div>
                                                                        <h4 class="font-size-16">عدل ما تريد في أي وفت خلال
                                                                            فترة التعديل المسموحة وذلك خلال دقائق</h4>
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
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
    <script>
        $('#show').click(function name(params) {
            if ($('#password').prop('type') == 'password') {
                $('#password').attr('type', 'text')
            } else {
                $('#password').attr('type', 'password')
            }
        })
    </script>
        <!-- owl.carousel js -->
        <script src="<?php echo e(URL::asset('/assets/libs/owl.carousel/owl.carousel.min.js')); ?>"></script>
        <!-- auth-2-carousel init -->
        <script src="<?php echo e(URL::asset('/assets/js/pages/auth-2-carousel.init.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\my project\jadwahmad\resources\views/auth/login.blade.php ENDPATH**/ ?>