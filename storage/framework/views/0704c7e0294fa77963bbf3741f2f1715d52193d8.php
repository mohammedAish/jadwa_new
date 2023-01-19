<?php $__env->startSection('title'); ?>
    <?php echo e('الخطة الإستراتيجية'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e('دراسة جدوى'); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('name'); ?>
            <?php echo e('الخطة الإستراتيجية'); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="vertical-example" class="vertical-wizard">
                        <h3>الرؤية, الرسالة, الأهداف</h3>
                        <section>
                            <h4 class="mb-4"><strong>الرؤية, الرسالة, الأهداف</strong></h4>
                            <form id="form_1" class="form-horizontal" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>الرؤية</h4>
                                            <label for="verticalnav-pancard-input">ما هي رؤيتكم
                                                للمشروع خلال فترة محددة
                                                من
                                                الزمن. ماذا تريد أن يحقق مشروعكم</label>
                                            <textarea type="text" name="vision" class="form-control" id="verticalnav-pancard-input"></textarea>
                                            <span class="text-danger error-text vision_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>الرسالة</h4>
                                            <label for="verticalnav-pancard-input">الرسالة الدائمة
                                                لتأسيس المشروع وهي
                                                الهدف
                                                الرئيسي لتأسيس المشروع وهي غير محددة بوقت</label>
                                            <textarea type="text" name="message" class="form-control" id="verticalnav-pancard-input"></textarea>
                                            <span class="text-danger error-text message_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="inner-repeater mb-4">
                                        <div data-repeater-list="inner-group" class="inner mb-4 goals">
                                            <h4>الأهداف</h4>
                                            <label for="verticalnav-pancard-input">مجموعة الأهداف
                                                التي عند تحقيقها
                                                فإننا
                                                نحقق خطوات إستراتيجية للوصول إلى الرؤية والرسالة
                                                الخاصة بالمشروع</label>

                                            <div data-repeater-list="inner-group" class="inner mb-4 goals">
                                                <div data-repeater-item class="inner mb-3 row goal">
                                                    <div class="col-md-12 col-8  ">
                                                        <input name="goals[]" type="text" class="inner form-control "
                                                               value=""   placeholder="قم بكتابة الهدف" required minlength="3" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-4 ">
                                                    <input data-repeater-create id="add_goal" type="button"
                                                           class="add btn btn-outline-warning inner" value="اضافة هدف" />
                                                </div>
                                                <span class="text-danger error-text goals_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 " style="float: left">
                                        
                                        <input type="submit" value="حفظ والتالي" name="go" class="btn btn-warning inner go"
                                               id="go">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>نقاط القوة والضعف</h3>
                        <section>
                            <h4 class="mb-4"> نقاط القوة والضعف</h4>
                            <form id="form_2" class="form_2" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div data-repeater-list="inner-group" class="inner mb-4 problems">
                                        <h4 class="mb-4">نقاط القوة</h4>
                                        <div data-repeater-item class="inner mb-3 row strength_points">
                                            <div class="col-md-12 col-8">
                                                <input name="strength_points[]" type="text" class="inner form-control"
                                                       value="" placeholder="قم بكتابة نقاط القوة"  />
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <input data-repeater-create id="add_strength_point" type="button"
                                                   class="add btn btn-outline-warning inner" value="إضافة" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>
                                    <div data-repeater-list="inner-group" class="inner mb-4 problems">
                                        <h4 class="mb-4">نقاط الضعف</h4>
                                        <div data-repeater-item class="inner mb-3 row weakness_points">
                                            <div class="col-md-12 col-8">
                                                <input name="weakness_points[]" type="text" class="inner form-control"
                                                       value="" placeholder="قم بكتابة نقاط الضعف"  />
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <input data-repeater-create id="add_weakness_point" type="button"
                                                   class="add btn btn-outline-warning inner" value="إضافة" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>

                                </div>
                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 " style="float: left ">
                                        
                                        <input type="submit" value="حفظ والتالي" name="go" class="btn btn-warning inner go" id="go">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>الفرص والتهديدات</h3>
                        <section>
                            <h4 class="mb-4">الفرص والتهديدات</h4>
                            <form id="form_2" class="form_2" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div data-repeater-list="inner-group" class="inner mb-4 problems">
                                        <h4 class="mb-4">الفرص</h4>
                                        <div data-repeater-item class="inner mb-3 row opportunities">
                                            <div class="col-md-12 col-8">
                                                <input name="opportunities[]" type="text" class="inner form-control"
                                                       value="" placeholder="قم بكتابة الفرص التي تساعد على نجاح المشروع"  />
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <input data-repeater-create id="add_opportunity" type="button"
                                                   class="add btn btn-outline-warning inner" value="إضافة" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>
                                    <div data-repeater-list="inner-group" class="inner mb-4">
                                        <h4 class="mb-4">التهديدات</h4>
                                        <div data-repeater-item class="inner mb-3 row threats">
                                            <div class="col-md-12 col-8">
                                                <input name="threats[]" type="text" class="inner form-control"
                                                       value="" placeholder="قم بكتابة التهديدات التي تواجه المشروع"  />
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <input data-repeater-create id="add_threat" type="button"
                                                   class="add btn btn-outline-warning inner" value="إضافة" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>

                                </div>
                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 " style="float: left ">
                                        
                                        <input type="submit" value="حفظ والتالي" name="go" class="btn btn-warning inner go" id="go">
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>

                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

    <!-- end col -->
    </div>
    <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- form wizard init -->
    <script src="<?php echo e(asset('assets/js/pages/form-wizard.init.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/jquery-steps/jquery-steps.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('assets/libs/bootstrap/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/metismenu/metismenu.min.js')); ?>"></script>

    <script>
        document.addEventListener('click', function(e) {
            var eventTarget = e.target;

            // start clone element
            if (e.target.id == 'add_goal') {
                $(".goal").after(`<div data-repeater-item class="inner mb-3 row ">
                                <div class="input-group col-md-12 col-8 auth-pass-inputgroup <?php $__errorArgs = ['strength_points'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                    <input name="goals[]" type="text" class="inner form-control "
                                                               value=""   placeholder="قم بكتابة الهدف" required minlength="3" />

                                        <button class="btn btn-danger" style="background-color: #F91616"
                                            type="button" id="delete_goal"><i
                                                class="fa fa-times"></i></button>
                                                <span class="text-danger error-text problems_error"></span>
                                    </div>
                                    </div>

                                      `);
            }
            if (e.target.id == 'add_strength_point') {
                $(".strength_points").after(`<div data-repeater-item class="inner mb-3 row ">
                                <div class="input-group col-md-12 col-8 auth-pass-inputgroup <?php $__errorArgs = ['strength_points'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                    <input name="strength_points[]" type="text" class="inner form-control"
                                        value="" placeholder="قم بكتابة نقاط القوة" />
                                        <button class="btn btn-danger" style="background-color: #F91616"
                                            type="button" id="delete_strength_points"><i
                                                class="fa fa-times"></i></button>
                                                <span class="text-danger error-text problems_error"></span>
                                    </div>
                                    </div>

                                      `);
            }
            if (e.target.id == 'add_weakness_point') {
                $(".weakness_points").after(`<div data-repeater-item class="inner mb-3 row ">
                                <div class="input-group col-md-12 col-8 auth-pass-inputgroup <?php $__errorArgs = ['weakness_points'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                    <input name="weakness_points[]" type="text" class="inner form-control"
                                        value="" placeholder="قم بكتابة نقاط الضعف" />
                                        <button class="btn btn-danger" style="background-color: #F91616"
                                            type="button" id="delete_weakness_points"><i
                                                class="fa fa-times"></i></button>
                                                <span class="text-danger error-text solutions_error"></span>
                                    </div>
                                    </div>

                                      `);
            }
            if (e.target.id == 'add_opportunity') {
                $(".opportunities").after(`<div data-repeater-item class="inner mb-3 row ">
                                                <div class="input-group col-md-12 col-12 auth-pass-inputgroup <?php $__errorArgs = ['opportunities'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                                    <input name="opportunities[]" type="text" class="inner form-control"
                                                       value="" placeholder="قم بكتابة الفرص التي تساعد على نجاح المشروع"  />

                    <button class="btn btn-danger" style="background-color: #F91616"
                        type="button" id="delete_opportunity"><i
                            class="fa fa-times"></i></button>
                    <span class="text-danger error-text sale_channels_error"></span>
                </div>
            </div>`);
            }
            if (e.target.id == 'add_threat') {
                $(".threats").after(`<div data-repeater-item class="inner mb-3 row ">
                                                <div class="input-group col-md-12 col-12 auth-pass-inputgroup <?php $__errorArgs = ['threats'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                                    <input name="threats[]" type="text" class="inner form-control"
                                                       value="" placeholder="قم بكتابة التهديدات التي تواجه المشروع"  />

                    <button class="btn btn-danger" style="background-color: #F91616"
                        type="button" id="delete_threat"><i
                            class="fa fa-times"></i></button>
                    <span class="text-danger error-text sale_channels_error"></span>
                </div>
            </div>`);
            }
            // end clone element

            // start delete element
            if (e.target.id == 'delete_goal') {

                e.target.parentElement.parentElement.remove();
            }
            if (e.target.id == 'delete_strength_points') {

                e.target.parentElement.parentElement.remove();
            }
            if (e.target.id == 'delete_weakness_points') {

                e.target.parentElement.parentElement.remove();
            }
            if (e.target.id == 'delete_opportunity') {

                e.target.parentElement.parentElement.remove();
            }
            if (e.target.id == 'delete_threat') {

                e.target.parentElement.parentElement.remove();
            }
            // end delete element
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Documents/GitHub/jadwa_new/resources/views/admin/forms/strategic_plan.blade.php ENDPATH**/ ?>