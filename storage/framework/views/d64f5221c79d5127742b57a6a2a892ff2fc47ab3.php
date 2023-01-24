<?php $__env->startSection('title'); ?>
    <?php echo e('إنشاء خدمة'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            خدمة
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            إنشاء خدمة
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    

                    <form action="<?php echo e(route('services.store')); ?>" method="POST" enctype="multipart/form-data"
                        class="needs-validation" novalidate>
                        <?php echo csrf_field(); ?>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">الإسم</label>
                                    <input type="text" name="title" class="form-control" value="<?php echo e(old('title')); ?>"
                                        id="title" placeholder="قم بإدخال الاسم" required>
                                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <div class="invalid-feedback">
                                       لم يتم ادخال الاسم
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">السعر </label>
                                    <input type="number" name="price" class="form-control" value="<?php echo e(old('price')); ?>"
                                        id="price" placeholder="قم بإدخال  " required>
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <div class="invalid-feedback">
                                        لم يتم ادخال السعر
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-logo-input" class="form-label"> اسم الراوت </label>
                                    <input type="text" class="form-control" required name="route"
                                        id="formrow-image-input" value="<?php echo e(old('route')); ?>">
                                        <?php $__errorArgs = ['route'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <div class="invalid-feedback">
                                       لم يتم ادخال الراوت
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-logo-input" class="form-label"> صورة الخدمة </label>
                                    <input type="file" class="form-control" name="image" id="formrow-image-input"
                                        value="<?php echo e(old('image')); ?>" required>
                                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <div class="invalid-feedback">
                                       لم يتم اضافة صورة
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <label class="form-label" for="gridCheck">الحالة :</label>
                                        <div class="btn-group-horizontal" role="group"
                                            aria-label="Horizontal radio toggle button group">
                                            <input type="radio" class="btn-check" name="status" value="active"
                                                id="active-radio1" required>
                                            <label class="btn btn-outline-success" for="active-radio1">نشط</label>
                                            <input type="radio" class="btn-check" name="status" value="inactive"
                                                id="active-radio2" required>
                                            <label class="btn btn-outline-danger" for="active-radio2">غير نشط</label>
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center">
                                <button type="submit" value="submit" class="btn btn-success w-lg bg-o yello">حفظ</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>

    <script src="<?php echo e(URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('/assets/js/pages/form-validation.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Documents/GitHub/jadwa_new/resources/views/admin/services/create.blade.php ENDPATH**/ ?>