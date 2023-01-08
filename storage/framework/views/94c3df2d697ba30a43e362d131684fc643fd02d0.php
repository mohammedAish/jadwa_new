<?php $__env->startSection('title'); ?>
    <?php echo e('دراسة السوق'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e('دراسة جدوى'); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('name'); ?>
            <?php echo e('دراسة السوق'); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="vertical-example" class="vertical-wizard">
                        <h3>القيمة المقترحة و المِيزة التنافسية</h3>
                        <section>
                            <h4 class="mb-4"><strong>القيمة المقترحة و الميزة التنافسية</strong></h4>
                            <form id="form_1" class="form-horizontal" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>القيمة المقترحة</h4>
                                            <input type="text" name="vision" class="form-control" id="verticalnav-pancard-input">
                                            <span class="text-danger error-text vision_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>الميزة التنافسية</h4>
                                            <select name="message" class="form-control" id="verticalnav-pancard-input">
                                                <option selected disabled> -- إختر -- </option>
                                            </select>
                                            <span class="text-danger error-text message_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 " style="float: left">
                                        
                                        <input type="submit" value="حفظ والتالي"  class="btn btn-warning inner go"
                                               id="save_form_1">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>السوق المستهدف</h3>
                        <section>
                            <h4 class="mb-4"><strong>السوق المستهدف</strong></h4>
                            <form id="form_2"
                                  class="form-horizontal" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <h4 class="mb-4">السوق الكلي</h4>
                                            <input type="text" name="vision" class="form-control" id="verticalnav-pancard-input" placeholder="السوق الكلي">
                                            <span class="text-danger error-text vision_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <h4 class="mb-4">السوق المستهدف</h4>
                                            <input type="text" name="vision" class="form-control" id="verticalnav-pancard-input" placeholder="السوق المستهدف">
                                            <span class="text-danger error-text vision_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <h4 class="mb-4">الحصة السوقية</h4>
                                            <input type="text" name="vision" class="form-control" id="verticalnav-pancard-input" placeholder="الحصة السوقية">
                                            <span class="text-danger error-text vision_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 " style="float: left">
                                        
                                        <input type="submit" value="حفظ والتالي" class="btn btn-warning inner go"
                                               id="save_form_2">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>العملاء المستهدفون </h3>
                        <section>
                            <h4 class="mb-4"><strong>العملاء المستهدفون</strong></h4>
                            <form id="form_3" class="form-horizontal" enctype="multipart/form-data">
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <h4 class="mb-4">من هم عملاء المشروع ؟</h4>
                                            <textarea type="text" name="" rows="4" cols="80" class="form-control" id="verticalnav-pancard-input" placeholder="كتابو العملاء المستهدفون"></textarea>
                                            <span class="text-danger error-text vision_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 "  style="float: left">
                                        
                                        <input type="submit" value="حفظ والتالي"  class="btn btn-warning inner go"
                                               id="save_form_3">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>المنافسون </h3>
                        <section>
                            <h4 class="mb-4"><strong>المنافسون</strong></h4>
                            <form id="form_4" class="form-horizontal" enctype="multipart/form-data">
                                <div class="row">
                                    <div data-repeater-list="inner-group" class="inner mb-4">
                                        <h4 class="mb-4">اذكر المنافسون</h4>
                                        <div data-repeater-item class="inner mb-3 row competitors">
                                            <div class="col-md-12 col-8">
                                                <input name="competitors[]" type="text" class="inner form-control"
                                                       value="" placeholder="قم بكتابة اسم المنافس"  />
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <input data-repeater-create id="add_competitor" type="button"
                                                   class="add btn btn-outline-warning inner" value="إضافة" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>
                                </div>
                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 "  style="float: left">
                                        
                                        <input type="submit" value="حفظ والتالي"  class="btn btn-warning inner go"
                                               id="save_form_4">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>قنوات التسويق</h3>
                        <section>
                            <h4 class="mb-4"><strong>قنوات التسويق</strong></h4>
                            <form id="form_5" class="form-horizontal" enctype="multipart/form-data">
                                <div class="row">
                                    <div data-repeater-list="inner-group" class="inner mb-4">
                                        <h4 class="mb-4">قنوات التسويق</h4>
                                        <div data-repeater-item class="inner mb-3 row marketing_channels">
                                            <div class="col-md-12 col-8">
                                                <select name="marketing_channels[]" type="text" class="inner form-control">
                                                    <option selected disabled> -- إختر -- </option>
                                                    <?php $__currentLoopData = $marketing_channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chanel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($chanel->id); ?>"> <?php echo e($chanel->title); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <input data-repeater-create id="add_marketing_channel" type="button"
                                                   class="add btn btn-outline-warning inner" value="إضافة قناة" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>
                                </div>
                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 "  style="float: left">
                                        
                                        <input type="submit" value="حفظ والتالي" class="btn btn-warning inner go"
                                               id="save_form_5">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>مصادر الإيرادات </h3>
                        <section>
                            <h4 class="mb-4"><strong>مصادر الإيرادات</strong></h4>
                            <form id="form_6" class="form-horizontal" enctype="multipart/form-data">
                                <div class="row">
                                    <div data-repeater-list="inner-group" class="inner mb-4">
                                        <h4 class="mb-4">مصادر الإيرادات</h4>
                                        <div data-repeater-item class="inner mb-3 row income_sources">
                                            <div class="col-md-12 col-8">
                                                <select name="income_sources[]" type="text" class="inner form-control">
                                                    <option selected disabled> -- إختر -- </option>
                                                    <?php $__currentLoopData = $income_sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($source->id); ?>"> <?php echo e($source->title); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <input data-repeater-create id="add_income_source" type="button"
                                                   class="add btn btn-outline-warning inner" value="إضافة إيرادات" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>
                                </div>
                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 "  style="float: left">
                                        
                                        <input type="submit" value="حفظ والتالي"  class="btn btn-warning inner go"
                                               id="save_form_6">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>هيكل التكاليف </h3>
                        <section>
                            <h4 class="mb-4"><strong>هيكل التكاليف</strong></h4>
                            <form id="form_7" class="form-horizontal" enctype="multipart/form-data">
                                <div class="row">
                                    <div data-repeater-list="inner-group" class="inner mb-4">
                                        <h4 class="mb-4">هيكل التكاليف</h4>
                                        <div data-repeater-item class="inner mb-3 row expenses_modal">
                                            <div class="col-md-12 col-8">
                                                <select name="expenses_modal[]" type="text" class="inner form-control">
                                                    <option selected disabled> -- إختر -- </option>
                                                    <?php $__currentLoopData = $expenses_modal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($model->id); ?>"> <?php echo e($model->title); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <input data-repeater-create id="add_expenses_modal" type="button"
                                                   class="add btn btn-outline-warning inner" value="إضافة تكاليف" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>
                                </div>
                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 "  style="float: left">
                                        
                                        <input type="submit" value="حفظ والتالي"  class="btn btn-warning inner go"
                                               id="save_form_7">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>الأنشطة الرئيسية </h3>
                        <section>
                            <h4 class="mb-4"><strong>الأنشطة الرئيسية</strong></h4>
                            <form id="form_8" class="form-horizontal" enctype="multipart/form-data">
                                <div class="row">
                                    <div data-repeater-list="inner-group" class="inner mb-4">
                                        <h4 class="mb-4">الأنشطة الرئيسية</h4>
                                        <div data-repeater-item class="inner mb-3 row main_activity">
                                            <div class="col-md-12 col-8">
                                                <select name="main_activity[]" type="text" class="inner form-control">
                                                    <option selected disabled> -- إختر -- </option>
                                                    <?php $__currentLoopData = $main_activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($activity->id); ?>"> <?php echo e($activity->title); ?> </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <input data-repeater-create id="add_main_activity" type="button"
                                                   class="add btn btn-outline-warning inner" value="إضافة أنشطة" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>
                                </div>
                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 "  style="float: left">
                                        
                                        <input type="submit" value="حفظ والتالي"  class="btn btn-warning inner go"
                                               id="save_form_8">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>وصف الخدمات</h3>
                        <section>
                            <h4>الخدمات</h4>
                            <div class="row">
                                <div data-repeater-list="inner-group" class="inner mb-4">
                                    <div class="col-md-4 col-4" style="float: left;">
                                        <button type="button" style="float: left" class="btn btn-outline-warning inner"
                                                data-bs-toggle="modal" data-bs-target="#createModal" data-bs-whatever="@mdo">اضافة خدمة</button>
                                    </div>
                                </div>

                            </div>
                            <div data-repeater-list="inner-group" class="inner mb-4">
                                <div class="col-md-12 col-12 ">
                                    <table class="table table-bordered">

                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>اسم الخدمة</th>
                                            <th>وصف الخدمة</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody id="project_services">
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        

                                        

                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">اضافة جديد </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="createModalForm">
                                                <?php echo csrf_field(); ?>
                                                <div class="mb-3">
                                                    <label for="name" class="col-form-label flex">اسم الخدمة</label>
                                                    <input type="text" name="name"
                                                           class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                           id="name" value="<?php echo e(old('name')); ?>" required>
                                                    <?php $__errorArgs = ['name'];
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
                                                    <label for="details" class="col-form-label flex">النص</label>
                                                    <textarea class="form-control <?php $__errorArgs = ['details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="details" id="details" required><?php echo e(old('details')); ?></textarea>
                                                    <?php $__errorArgs = ['details'];
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
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">إغلاق</button>
                                                    <input type="submit" value="حفظ"  class="btn btn-warning inner go"
                                                           id="create-btn">
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal fade editModal" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel"> تعديل </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editModalForm">
                                                <input type="hidden" id="id" name="id">

                                                <div class="mb-3">
                                                    <label for="name" class="col-form-label">اسم الخدمة</label>
                                                    <input type="text" name="name" class="form-control"
                                                           id="name" value="">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="details" class="col-form-label">وصف الخدمة</label>
                                                    <textarea type="text" class="form-control" name="details" id="details"></textarea>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">إغلاق</button>
                                                    <input type="submit" id="save-btn" class="btn btn-outline-warning" value="تعديل">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal fade " id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel"> حذف العنصر ? </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="deleteModalForm">
                                                <input type="hidden" id="id" name="id">

                                                <div class="modal-footer" align="center">
                                                    <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">إالغاء</button>
                                                    <input type="submit" id="delete-btn" class="btn btn-outline-warning" value="حذف">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                        </section>
                    </div>

                </div>
            </div>
            <!-- end card -->
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

    <!-- form wizard init -->
    <script src="<?php echo e(asset('assets/js/pages/form-wizard.init.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/jquery-steps/jquery-steps.min.js')); ?>"></script>

    


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        $(document).ready(function(){
            $('#save_1').click(function (event) {
                $("#form5 :input").prop("disabled", true);
                event.preventDefault();
                console.log('clicked')
            });

            fetchservices();

            $("#createModal").on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget)
                var id = button.data('id')
                var name = button.data('name')
                var details = button.data('details')

                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #name').val(name);
                modal.find('.modal-body #details').val(details);


                $('#create-btn').click(function (event) {

                    event.preventDefault();

                    $(this).html('Sending..');
                    $.ajax({
                        url: "<?php echo e(route('create_project_product_service')); ?>",
                        type:"POST",
                        data: $('#createModalForm').serialize(),
                        success:function(response){
                            toastr.success(response.Message);
                            $('#createModal').modal('hide');
                            fetchservices();
                            sessionStorage.clear()
                        },
                        error: function(response) {
                            toastr.error(response.Message);
                        }
                    });
                });
            })

            $("#editModal").on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget)
                var id = button.data('id')
                var name = button.data('name')
                var details = button.data('details')

                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #name').val(name);
                modal.find('.modal-body #details').val(details);


                $('#save-btn').click(function (event) {

                    event.preventDefault();

                    $(this).html('Sending..');
                    $.ajax({
                        url: "<?php echo e(route('update_project_product_service')); ?>",
                        type:"POST",
                        data: $('#editModalForm').serialize(),
                        success:function(response){
                            toastr.success(response.Message);
                            $('#editModal').modal('hide');
                            fetchservices();
                            sessionStorage.clear()
                        },
                        error: function(response) {
                            toastr.error(response.Message);
                        }
                    });
                });
            })

            $("#deleteModal").on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget)
                var id = button.data('id')

                var modal = $(this)
                modal.find('.modal-body #id').val(id);

                $('#delete-btn').click(function (event) {

                    event.preventDefault();

                    $(this).html('Sending..');
                    $.ajax({
                        url: "<?php echo e(route('delete_project_product_service')); ?>",
                        type:"POST",
                        data: $('#deleteModalForm').serialize(),
                        success:function(response){
                            toastr.success(response.Message);
                            $('#deleteModal').modal('hide');
                            fetchservices();
                            sessionStorage.clear()
                        },
                        error: function(response) {
                            toastr.error(response.Message);
                        }
                    });
                });
            })
        });

        function fetchservices() {
            $.ajax({
                type: "GET",
                url: "<?php echo e(route('fetch_project_services')); ?>",
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('#project_services').html("");
                    $.each(response.services, function (key, item) {
                        $('#project_services').append('\
                            <tr>\
                                            <td>' + ++key + '</td>\
                                            <td>' + item.name + '</td>\
                                            <td>' + item.details + '</td>\
                                            <td> \
                                            <a  title="تعديل" class="text-success"  data-bs-toggle="modal" data-id="' + item.id + '"\
                                                data-name="' + item.name + '"    data-details="' + item.details + '"\
                                                href="#editModal"><i\
                                                class="fa fa-pen font-size-18"></i> </a>&nbsp;&nbsp;\
                                            <a title="حذف" style="cursor: pointer"\
                                            data-bs-toggle="modal"\
                                                data-id="' + item.id + '" href="#deleteModal" class="text-danger delete ">\
                                                <i class="fa fa-trash font-size-18"></i></a>\
                                                </td>\
                                        </tr> '
                        );
                    });
                }
            });
        }


        document.addEventListener('click', function(e) {
            var eventTarget = e.target;

            // start clone element
            if (e.target.id == 'add_competitor') {
                console.log('test')
                $(".competitors").after(`<div data-repeater-item class="inner mb-3 row ">
                                <div class="input-group col-md-12 col-8 auth-pass-inputgroup <?php $__errorArgs = ['competitors'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                                    <input name="competitors[]" type="text" class="inner form-control "
                                                           value=""  placeholder="قم بكتابة اسم المنافس" required minlength="3" />

                                        <button class="btn btn-danger" style="background-color: #F91616"
                                            type="button" id="delete_competitor"><i
                                                class="fa fa-times"></i></button>
                                                <span class="text-danger error-text problems_error"></span>
                                    </div>
                                    </div>

                                      `);
            }
            if (e.target.id == 'add_marketing_channel') {
                $(".marketing_channels").after(`<div data-repeater-item class="inner mb-3 row ">
                                <div class="input-group col-md-12 col-8 auth-pass-inputgroup <?php $__errorArgs = ['marketing_channels'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                  <select name="marketing_channels[]" type="text" class="inner form-control">
                                                <option selected disabled> -- إختر -- </option>
                                                <?php $__currentLoopData = $marketing_channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chanel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($chanel->id); ?>"> <?php echo e($chanel->title); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

            <button class="btn btn-danger" style="background-color: #F91616"
                type="button" id="delete_marketing_channel"><i
                    class="fa fa-times"></i></button>
                    <span class="text-danger error-text problems_error"></span>
        </div>
        </div>

`);
            }
            if (e.target.id == 'add_income_source') {
                $(".income_sources").after(`<div data-repeater-item class="inner mb-3 row ">
                                <div class="input-group col-md-12 col-8 auth-pass-inputgroup <?php $__errorArgs = ['income_sources'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                                                      <select name="income_sources[]" type="text" class="inner form-control">
                                                                                    <option selected disabled> -- إختر -- </option>
                                                                                    <?php $__currentLoopData = $income_sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($source->id); ?>"> <?php echo e($source->title); ?> </option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

<button class="btn btn-danger" style="background-color: #F91616"
type="button" id="delete_income_source"><i
class="fa fa-times"></i></button>
<span class="text-danger error-text problems_error"></span>
</div>
</div>

`);
            }
            if (e.target.id == 'add_expenses_modal') {
                $(".expenses_modal").after(`<div data-repeater-item class="inner mb-3 row ">
                                <div class="input-group col-md-12 col-8 auth-pass-inputgroup <?php $__errorArgs = ['expenses_modal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                                                      <select name="expenses_modal[]" type="text" class="inner form-control">
                                                                                    <option selected disabled> -- إختر -- </option>
                                                                                    <?php $__currentLoopData = $expenses_modal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($model->id); ?>"> <?php echo e($model->title); ?> </option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

<button class="btn btn-danger" style="background-color: #F91616"
type="button" id="delete_expenses_modal"><i
class="fa fa-times"></i></button>
<span class="text-danger error-text problems_error"></span>
</div>
</div>

`);
            }
            if (e.target.id == 'add_main_activity') {
                $(".main_activity").after(`<div data-repeater-item class="inner mb-3 row ">
                                <div class="input-group col-md-12 col-8 auth-pass-inputgroup <?php $__errorArgs = ['main_activity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                                          <select name="main_activity[]" type="text" class="inner form-control">
                                                                 <option selected disabled> -- إختر -- </option>
                                                                    <?php $__currentLoopData = $main_activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($activity->id); ?>"> <?php echo e($activity->title); ?> </option>
                                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

<button class="btn btn-danger" style="background-color: #F91616"
type="button" id="delete_main_activity"><i
class="fa fa-times"></i></button>
<span class="text-danger error-text problems_error"></span>
</div>
</div>

`);
            }
            // end clone element

            // start delete element
            if (e.target.id == 'delete_competitor') {

                e.target.parentElement.parentElement.remove();
            }
            if (e.target.id == 'delete_marketing_channel') {

                e.target.parentElement.parentElement.remove();
            }
            if (e.target.id == 'delete_income_source') {

                e.target.parentElement.parentElement.remove();
            }
            if (e.target.id == 'delete_expenses_modal') {

                e.target.parentElement.parentElement.remove();
            }
            if (e.target.id == 'delete_main_activity') {

                e.target.parentElement.parentElement.remove();
            }
            // end delete element
        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\jadwahmad\resources\views/admin/forms/administrators.blade.php ENDPATH**/ ?>