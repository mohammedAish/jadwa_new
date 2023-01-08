<?php $__env->startSection('title'); ?> <?php echo e('إنشاء صفحة'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> صفحات <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> إنشاء صفحة <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">قم بإدخال البيانات  </h4>

                    <form action="<?php echo e(route('pages.store')); ?>" method="POST" class="needs-validation" novalidate>
                        <?php echo csrf_field(); ?>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="title" class="form-label">عنوان الصفحة</label>
                                    <input type="text" name="title" class="form-control " value="<?php echo e(old('title')); ?>" id="title" placeholder="قم بإدخال العنوان" required>
                                    <div class="valid-feedback">
                                       pleas enter the title
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="key" class="form-label">مفتاح الصفحة</label>
                                    <input type="text" name="key" class="form-control" value="<?php echo e(old('key')); ?>" id="key" placeholder="قم بإدخال النص" required>
                                    <div class="valid-feedback">
                                        pleas enter the key
                                     </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="type" class="form-label">نوع الصفحة</label>
                                    <!-- All countries -->
                                    <select id="type" class="form-control" name="type" required>
                                        <option selected disabled hidden>-- إختر النوع --</option>
                                        <option value="reports">reports</option>
                                        <option value="site">site</option>
                                    </select>
                                    <div class="valid-feedback">
                                        pleas enter the type
                                     </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="content" class="form-label" >المحتوى</label>

                                        <textarea id="elm1" name="content" class="form-control" required><?php echo e(old('content')); ?></textarea>
                                       
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


                <div class="text-center">
                    <button type="submit" value="submit" class="btn btn-success w-lg bg-o">حفظ</button>
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



<?php $__env->startSection('script'); ?>
    <!--tinymce js-->
    <script src="<?php echo e(asset('assets/libs/tinymce/tinymce.min.js')); ?>"></script>

    <!-- init js -->
    <script src="<?php echo e(asset('assets/js/pages/form-editor.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('/assets/js/pages/form-validation.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php $__env->stopSection(); ?>













<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jadwahmad\resources\views/admin/pages/create.blade.php ENDPATH**/ ?>