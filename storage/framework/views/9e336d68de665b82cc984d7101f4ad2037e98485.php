

<?php $__env->startSection('title'); ?>
    <?php echo e('إنشاء مستخدم'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            خدمات
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e($project->name); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('name'); ?>
            <?php echo e('دراسة جدوى'); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="vertical-example" class="vertical-wizard">
                        <!-- Seller Details -->
                        <h3> المشاكل والحلول</h3>

                        <section>
                            <h4> المشاكل والحلول</h4>
                            <form id="Form1" class="form-horizontal" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div data-repeater-list="inner-group" class="inner mb-4 problems">
                                        <label>المشاكل <small> (يمكنك إضافة حتى 5 مشاكل) </small></label>
                                        <div data-repeater-item class="inner mb-3 row prob">
                                            <div class="col-md-12 col-8  ">
                                                <input name="problems[]" type="text" class="inner form-control "
                                                    value="" placeholder="ادخل المشكلة" required minlength="3" />
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4 ">
                                            <input data-repeater-create id="add_problem" type="button"
                                                class="add btn btn-outline-warning inner" value="اضافة مشكلة" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>
                                    <div data-repeater-list="inner-group" class="inner mb-4 problems">
                                        <label>الحلول<small> (يمكنك إضافة حتى 5 حلول) </small></label>
                                        <div data-repeater-item class="inner mb-3 row solu">
                                            <div class="col-md-12 col-8  ">
                                                <input name="solutions[]" type="text" class="inner form-control "
                                                    value="" placeholder="ادخل الحل" required minlength="3" />
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4 ">
                                            <input data-repeater-create id="add_solutions" type="button"
                                                class="add btn btn-outline-warning inner" value="اضافة حل" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>

                                 <div class="col-md-4 col-4">
                                        <div class="col-md-3 " style="float: left">
                                            <button name="save1" onclick="return form1()" type="button" class="btn btn-warning inner"
                                                id="save1">التالي</button> 
                                                
                                        </div>
                                    </div> 
                                </div>
                            </form>
                        </section>
                        <!-- Seller Details -->
                        <h3> السوق والعملاء </h3>

                        <section>
                            <h4> السوق والعملاء </h4>
                            <form id="Form2" action="" method="post" class="form-horizontal"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="verticalnav-pancard-input">القيمة
                                                المقترحة</label>
                                            <textarea type="text" name="suggested_value" class="form-control" id="verticalnav-pancard-input"
                                                placeholder="كتابة القيمة المقترحة"></textarea>
                                            <span class="text-danger error-text suggested_value_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="verticalnav-pancard-input">العملاء
                                                المستهدفين</label>
                                            <textarea type="text" name="target_customer" class="form-control" id="verticalnav-pancard-input"
                                                placeholder="كتابة العملاء المستهدفين"></textarea>
                                            <span class="text-danger error-text target_customer_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="verticalnav-cstno-input">السوق
                                                الكلي</label>
                                            <input type="text" name="value_tam" class="form-control"
                                                id="verticalnav-cstno-input" placeholder="قيمة السوق الكلي">
                                            <span class="text-danger error-text value_tam_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="verticalnav-servicetax-input">السوق
                                                المستهدف</label>
                                            <input type="text" class="form-control" id="verticalnav-servicetax-input"
                                                name="value_sam" placeholder="قيمة السوق المستهدف">
                                            <span class="text-danger error-text value_sam_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="verticalnav-companyuin-input">الحصة
                                                السوقية</label>
                                            <input type="text" class="form-control" id="verticalnav-companyuin-input"
                                                name="value_som" placeholder="قيمة الحصة السوقية">
                                            <span class="text-danger error-text value_som_error"></span>
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                        </section>
                        <!-- Seller Details -->
                        <h3> البيع والتسويق </h3>
                        <section>
                            <h4> البيع والتسويق </h4>
                            <form id="Form3" action="" method="post" class="form-horizontal"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div data-repeater-list="inner-group" class="inner mb-4 sales_channels">
                                        <label>قنوات البيع</label>
                                        <div data-repeater-item class="inner mb-3 row sales_chan">
                                            <div class="col-md-12 col-8  ">
                                            
                                                <select name="sales_channels[]" type="text"
                                                    class="inner form-control ">
                                                    <option value="" disabled selected>اختر قنوات البيع</option>
                                                    <?php $__currentLoopData = $sale_channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </select>
                                            </div>
                                            
                                        </div>

                                        <div class="col-md-4 col-4 ">
                                            <input data-repeater-create id="add_sales_channels" type="button"
                                                class="add btn btn-outline-warning inner" value="اضافة قناة" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>

                                </div>
                                <div class="row">
                                    <div data-repeater-list="inner-group" class="inner mb-4 marketing_channels">
                                        <label>قنوات التسويق</label>
                                        <div data-repeater-item class="inner mb-3 row marketing_chan">
                                            <div class="col-md-12 col-8  ">
                                            
                                                <select name="marketing_channels[]" type="text"
                                                    class="inner form-control ">
                                                    <option value="" disabled selected>اختر قنوات التسويق</option>
                                                    <?php $__currentLoopData = $marketing_channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </select>
                                            </div>
                                            
                                        </div>

                                        <div class="col-md-4 col-4 ">
                                            <input data-repeater-create id="add_marketing_channels" type="button"
                                            class="add btn btn-outline-warning inner" value="اضافة قناة" required
                                            minlength="3" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>

                                </div>
                               
                                
                            </form>
                        </section>
                        <h3>المنافسين</h3>
                        <section>
                            <h4>المنافسين</h4>
                            <form id="Form4" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label>حدد معيار المنافسة الأول </label>
                                        <div class="col-md-12 col-8">
                                            <select class="form-control select2" name="compatitor_vector1">
                                                <option disabled selected>اختر معيار</option>
                                                <option>السعر</option>
                                                <option>وقت التسليم</option>
                                                <option>الجودة</option>
                                            </select>
                                        </div>
                                        <span class="text-danger error-text compatitor_vector1_error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label>حدد معيار المنافسة الثاني </label>
                                        <div class="col-md-12 col-8">
                                            <select class="form-control select2" name="compatitor_vector2">
                                                <option disabled selected>اختر معيار</option>
                                                <option>السعر</option>
                                                <option>وقت التسليم</option>
                                                <option>الجودة</option>
                                            </select>
                                        </div>
                                        <span class="text-danger error-text compatitor_vector2_error"></span>
                                    </div>
                                </div>
                                <table class="table table-bordered compatitors">
                                    <label style="padding-right: 355px">اكثر</label>
                                    
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                             
                                                <div data-repeater-item class="inner mb-3 row">
                                                    <div class="col-md-12 col-8">
                                                        <input name="compatitor1" type="text"
                                                            class="inner form-control"
                                                            placeholder="المنافس الأول" />
                                                    </div>
                                                    <span class="text-danger error-text compatitor1_error"></span>
                                                </div>
                                                
                                                <label>أقل</label>
                                            </th>
                                            <th scope="col">
                                                <div data-repeater-item class="inner mb-3 row">
                                                    <div class="col-md-12 col-8">
                                                        <input name="compatitor2" type="text"
                                                            class="inner form-control"
                                                            placeholder="المنافس الثاني" />
                                                    </div>
                                                    <span class="text-danger error-text compatitor2_error"></span>
                                                </div>
                                                <label style="float: left">أكثر</label>
                                            </th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <tr>
                                            <th>
                                                <div data-repeater-item class="inner mb-3 row">
                                                    <div class="col-md-12 col-8">
                                                        <input name="compatitor3" type="text"
                                                            class="inner form-control"
                                                            placeholder="المنافس الثالث" />
                                                    </div>
                                                    <span class="text-danger error-text compatitor3_error"></span>
                                                </div>
                                            </th>
                                            <td>
                                                <div data-repeater-item class="inner mb-3 row">
                                                    <div class="col-md-12 col-8">
                                                        <input name="compatitor4" type="text"
                                                            class="inner form-control"
                                                            placeholder="المنافس الرابع" />
                                                    </div>
                                                    <span class="text-danger error-text compatitor4_error"></span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                  
                                </table>
                            <label style="padding-right: 355px">اقل</label>
                            </div>
                            
                        </form>
                        </section>
                        <h3>الخطة الاستراتيجية</h3>
                        <section>
                            <h4>الخطة الاستراتيجية</h4>
                            <form id="Form5" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
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
                                                    <input data-repeater-create id="add_goals" type="button"
                                                        class="add btn btn-outline-warning inner" value="اضافة هدف" />
                                                </div>
                                                <span class="text-danger error-text goals_error"></span>
                                            </div>                          
                                    </div>
                                </div>
                            </div>

                            
                        </form>
                        </section>
                        <h3>التكاليف والايرادات</h3>
                        <section>
                            <h4>التكاليف والايرادات</h4>
                            <form id="Form6" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                    <div data-repeater-list="inner-group" class="inner mb-4 income_sources">
                                        <label>مصادر الايرادات</label>
                                        <div data-repeater-item class="inner mb-3 row income">
                                            <div class="col-md-12 col-8  ">
                                            
                                                <select name="income_sources[]" type="text"
                                                    class="inner form-control ">
                                                    <option value="" disabled selected>اختر مصادر الايرادات</option>
                                                    <?php $__currentLoopData = $income_sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </select>
                                            </div>
                                            
                                        </div>

                                        <div class="col-md-4 col-4 ">
                                            <input data-repeater-create id="add_income_sources" type="button"
                                                class="add btn btn-outline-warning inner" value="اضافة ايرادات" />
                                        </div>

                                        <span class="text-danger error-text income_sources_error"></span>
                                    </div>
                                    <div data-repeater-list="inner-group" class="inner mb-4 expensis_modal">
                                        <label>هيكل التكاليف</label>
                                        <div data-repeater-item class="inner mb-3 row expensis">
                                            <div class="col-md-12 col-8  ">
                                            
                                                <select name="expensis_modal[]" type="text"
                                                    class="inner form-control ">
                                                    <option value="" disabled selected>اختر هيكل التكاليف</option>
                                                    <?php $__currentLoopData = $expensis_modal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </select>
                                            </div>
                                            
                                        </div>

                                        <div class="col-md-4 col-4 ">
                                            <input data-repeater-create id="add_expensis_modal" type="button"
                                                class="add btn btn-outline-warning inner" value="اضافة تكاليف" />
                                        </div>

                                        <span class="text-danger error-text expensis_modal_error"></span>
                                    </div>
                                    <div data-repeater-list="inner-group" class="inner mb-4 main_activity">
                                        <label>الأنشطة الرئيسية</label>
                                        <div data-repeater-item class="inner mb-3 row activity">
                                            <div class="col-md-12 col-8">
                                                <select name="main_activity[]" type="text"
                                                    class="inner form-control ">
                                                    <option value="" disabled selected>اختر مصادر الايرادات</option>
                                                    <?php $__currentLoopData = $main_activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4 ">
                                            <input data-repeater-create id="add_main_activity" type="button"
                                                class="add btn btn-outline-warning inner" value="اضافة انشطة" />
                                        </div>

                                        <span class="text-danger error-text main_activity_error"></span>
                                    </div>
                            
                            </div>
                            
                        </form>
                        </section>
                        <h3>معلومات التواصل</h3>
                        <section>
                            <h4>معلومات التواصل</h4>
                            <form id="Form7" action="http://127.0.0.1:8086/projectbusinessplans" method="post"
                            class="form-horizontal" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="inner-repeater mb-4">
                                    <div data-repeater-list="inner-group" class="inner mb-4">
                                        <label>اسم المستخدم</label>
                                        <div data-repeater-item class="inner mb-3 row">
                                            <div class="col-md-12 col-12">
                                                <input type="text" value="محمد احمد الهاجري" name="name"
                                                    class="inner form-control" placeholder="اسم المستخدم" />
                                            </div>
                                            <span class="text-danger error-text name_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="inner-repeater mb-4">
                                    <div data-repeater-list="inner-group" class="inner mb-4">
                                        <label>البريد الالكتروني</label>
                                        <div data-repeater-item class="inner mb-3 row">
                                            <div class="col-md-12 col-12">
                                                <input type="text" name="email" value=" admin@admin.com"
                                                    class="inner form-control" placeholder="البريد الالكتروني" />
                                            </div>
                                            <span class="text-danger error-text email_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="inner-repeater mb-4">
                                    <div data-repeater-list="inner-group" class="inner mb-4">
                                        <label> رقم الجوال</label>
                                        <div data-repeater-item class="inner mb-3 row">
                                            <div class="col-md-12 col-12">
                                                <input type="text" name="phone" value="0599242261"
                                                    class="inner form-control" placeholder="رقم الجوال" />
                                            </div>
                                            <span class="text-danger error-text phone_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-cstno-input">واتساب</label>
                                        <input type="text" class="form-control" name="whatsapp"
                                            id="verticalnav-cstno-input" value="تجريب"
                                            placeholder="رابط الواتساب">
                                    </div>
                                    <span class="text-danger error-text whatsapp_error"></span>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="verticalnav-servicetax-input">اللينكد
                                            ان</label>
                                        <input type="text" class="form-control"
                                            id="verticalnav-servicetax-input" value="تجريب" name="linkedin"
                                            placeholder="رابط اللينكد ان">
                                    </div>
                                    <span class="text-danger error-text linkedin_error"></span>
                                </div>
                            </div>

                            
                        </form>
                        </section>
                        <h3>الخدمات </h3>
                        <section>
                            <h4>الخدمات</h4>
                            <div class="row">
                                <div data-repeater-list="inner-group" class="inner mb-4">
                                    <div class="col-md-4 col-4" style="float: left;">
                                        <button type="button" style="float: left" class="btn btn-outline-warning inner"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">اضافة
                                        خدمة</button>
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
                                    <tbody>
                                        <tr>
                                            <th>1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td> <a title="تعديل" class="text-success" data-bs-toggle="modal"
                                                data-id=""
                                                data-title=""
                                                data-description=""
                                                data-bs-target="#editModal"><i
                                                    class="mdi mdi-pencil font-size-24"></i> </a>

                                            

                                            <a title="حذف" style="cursor: pointer"
                                                data-id="" class="text-danger delete">
                                                <i class="mdi mdi-delete font-size-18"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">اضافة جديد </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="" id="addForm">
                                            <?php echo csrf_field(); ?>

                                            <div class="mb-3">
                                                <label for="title" class="col-form-label flex">العنوان</label>
                                                <input type="text" name="title"
                                                    class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="title" value="<?php echo e(old('title')); ?>" required>
                                                <?php $__errorArgs = ['title'];
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
                                                <label for="description" class="col-form-label flex">النص</label>
                                                <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="description" id="description" required><?php echo e(old('description')); ?></textarea>
                                                <?php $__errorArgs = ['description'];
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
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">اضافة</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel"> تعديل </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="" id="editModal">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('put'); ?>
                                        <input type="hidden" id="id" name="id">

                                        <div class="mb-3">
                                            <label for="title" class="col-form-label">العنوان</label>
                                            <input type="text" name="title" class="form-control"
                                                id="title" value="">
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="col-form-label">النص</label>
                                            <textarea type="text" class="form-control" name="description" id="description" ><?php echo e(old('description')); ?></textarea>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">تعديل</button>
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
        <!-- end col -->
    </div>
    
    <!-- end col -->
    </div>
    <!-- end row -->
<?php $__env->stopSection(); ?>




<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/libs/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/bootstrap/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/metismenu/metismenu.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/node-waves/node-waves.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/jquery-repeater/jquery-repeater.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/jquery-steps/jquery-steps.min.js')); ?>"></script>
    <!-- jquery step -->
    <script src="<?php echo e(asset('assets/libs/jquery-steps/jquery-steps.min.js')); ?>"></script>

    <!-- form wizard init -->
    <script src="<?php echo e(asset('assets/js/pages/form-wizard.init.js')); ?>"></script>
    <!-- form wizard init -->
    

    <!-- App js -->

    <script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>


    <script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    

    <script>
        // console.log($('#save1'));
        let f = document.getElementById('Form1');
        function form1() {
           console.log('aa');
            $.ajax({
                url: "<?php echo e(route('storeproblemssolutions')); ?>",
                method: 'post',
                data: new FormData(f),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $('#Form1').parent().attr('style' , 'display:none');
                        $('#Form2').parent().removeAttr('style');
                        $('.first').removeClass('current');
                        $('#vertical-example-t-1').parent().attr('class','current');
                    }
                }
            });
        }
     
        // $("#Form1").on('submit', function(e) {
        //     e.preventDefault();
        //     console.log('aa');
            // $.ajax({
            //     url: "<?php echo e(route('storeproblemssolutions')); ?>",
            //     method: 'post',
            //     data: new FormData(this),
            //     processData: false,
            //     dataType: 'json',
            //     contentType: false,
            //     beforeSend: function() {
            //         $(document).find('span.error-text').text('');
            //     },
            //     success: function(data) {
            //         if (data.status == 0) {
            //             $.each(data.error, function(prefix, val) {
            //                 $('span.' + prefix + '_error').text(val[0]);
            //             });
            //         } else {
            //             $("#a").removeClass("show");
            //             $("#a").removeClass("active");
            //             $("#tab_a").removeClass("active");
            //             $("#b").addClass("show");
            //             $("#b").addClass("active");
            //             $("#tab_b").addClass("active");
            //         }
            //     }
            // });
        // });
        $("#Form2").on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "http://127.0.0.1:8086/storedetailsmarket",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $("#b").removeClass("show");
                        $("#b").removeClass("active");
                        $("#tab_b").removeClass("active");
                        $("#c").addClass("show");
                        $("#c").addClass("active");
                        $("#tab_c").addClass("active");
                    }
                }
            });
        });
        $("#Form3").on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "http://127.0.0.1:8086/storesalesmarketingchannels",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $("#c").removeClass("show");
                        $("#c").removeClass("active");
                        $("#tab_c").removeClass("active");
                        $("#d").addClass("show");
                        $("#d").addClass("active");
                        $("#tab_d").addClass("active");
                    }
                }
            });
        });
        $("#Form4").on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "http://127.0.0.1:8086/storecompatitor",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $("#d").removeClass("show");
                        $("#d").removeClass("active");
                        $("#tab_d").removeClass("active");
                        $("#e").addClass("show");
                        $("#e").addClass("active");
                        $("#tab_e").addClass("active");
                    }
                }
            });
        });
        $("#Form5").on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "http://127.0.0.1:8086/storevisionmessagegoals",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $("#e").removeClass("show");
                        $("#e").removeClass("active");
                        $("#tab_e").removeClass("active");
                        $("#f").addClass("show");
                        $("#f").addClass("active");
                        $("#tab_f").addClass("active");
                    }
                }
            });
        });
        $("#Form6").on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "http://127.0.0.1:8086/storerevenuecost",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $("#f").removeClass("show");
                        $("#f").removeClass("active");
                        $("#tab_f").removeClass("active");
                        $("#g").addClass("show");
                        $("#g").addClass("active");
                        $("#tab_g").addClass("active");
                    }
                }
            });
        });
        $("#Form7").on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "http://127.0.0.1:8086/storeusersdetails",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $("#g").removeClass("show");
                        $("#g").removeClass("active");
                        $("#tab_g").removeClass("active");
                        $("#h").addClass("show");
                        $("#h").addClass("active");
                        $("#tab_h").addClass("active");
                    }
                }
            });
        });
        $("#Form8").on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "http://127.0.0.1:8086/storeservicenamedescription",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $("#h").removeClass("show");
                        $("#h").removeClass("active");
                        $("#tab_h").removeClass("active");
                        $("#i").addClass("show");
                        $("#i").addClass("active");
                        $("#tab_i").addClass("active");
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener('click', function(e) {
            var eventTarget = e.target;

            // start clone elemetn 
            if (e.target.id == 'add_problem') {
                $(".prob").after(`<div data-repeater-item class="inner mb-3 row ">
                                <div class="input-group col-md-12 col-8 auth-pass-inputgroup <?php $__errorArgs = ['problems'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                  
                                    <input name="problems[]" type="text" class="inner form-control"
                                        value="" placeholder="ادخل المشكلة" />
                                        <button class="btn btn-danger" style="background-color: #F91616" 
                                            type="button" id="delete_problem"><i
                                                class="fa fa-times"></i></button>
                                                <span class="text-danger error-text problems_error"></span>
                                    </div>
                                    </div>
                                         
                                      `);
                disableProblem();
            }
            if (e.target.id == 'add_solutions') {
                $(".solu").after(`<div data-repeater-item class="inner mb-3 row ">
                                <div class="input-group col-md-12 col-8 auth-pass-inputgroup <?php $__errorArgs = ['solutions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                  
                                    <input name="solutions[]" type="text" class="inner form-control"
                                        value="" placeholder="ادخل الحل" />
                                        <button class="btn btn-danger" style="background-color: #F91616" 
                                            type="button" id="delete_solutions"><i
                                                class="fa fa-times"></i></button>
                                                <span class="text-danger error-text solutions_error"></span>
                                    </div>
                                    </div>
                                         
                                      `);
                disableSolutions();
            }
            if (e.target.id == 'add_sales_channels') {
                $(".sales_chan").after(`<div data-repeater-item class="inner mb-3 row ">
                                                <div class="input-group col-md-12 col-12 auth-pass-inputgroup <?php $__errorArgs = ['sale_channels'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                                    <select name="sales_channels[]" type="text"
                                                    class="inner form-control ">
                                                    <option value="" disabled selected>اختر قنوات البيع</option>
                                                    <?php $__currentLoopData = $sale_channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </select>
                                                    <button class="btn btn-danger" style="background-color: #F91616"
                                                        type="button" id="delete_sales_channels"><i
                                                            class="fa fa-times"></i></button>
                                                    <span class="text-danger error-text sale_channels_error"></span>
                                                </div>
                                            </div>`);
            }
            if (e.target.id == 'add_marketing_channels') {
                $(".marketing_chan").after(`<div data-repeater-item class="inner mb-3 row ">
                                                <div class="input-group col-md-12 col-12 auth-pass-inputgroup <?php $__errorArgs = ['marketing_channels'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                                    <select name="marketing_channels[]" type="text"
                                                    class="inner form-control ">
                                                    <option value="" disabled selected>اختر قنوات التسويق</option>
                                                    <?php $__currentLoopData = $marketing_channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </select>
                                                    <button class="btn btn-danger" style="background-color: #F91616"
                                                        type="button" id="delete_marketing_channels"><i
                                                            class="fa fa-times"></i></button>
                                                    <span class="text-danger error-text marketing_channels_error"></span>
                                                </div>
                                            </div>`);
            }
            if (e.target.id == 'add_goals') {
                $(".goal").after(`<div data-repeater-item class="inner mb-3 row ">
                                                <div class="input-group col-md-12 col-8 auth-pass-inputgroup <?php $__errorArgs = ['goals'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                  
                                                    <input name="goals[]" type="text" class="inner form-control"
                                                        value="" placeholder="ادخل الهدف" />
                                                        <button class="btn btn-danger" style="background-color: #F91616" 
                                                            type="button" id="delete_goals"><i
                                                                class="fa fa-times"></i></button>
                                                                <span class="text-danger error-text goals_error"></span>
                                                </div>
                                            </div>`);
            }
            if (e.target.id == 'add_income_sources') {
                $(".income").after(`<div data-repeater-item class="inner mb-3 row ">
                                                <div class="input-group col-md-12 col-12 auth-pass-inputgroup <?php $__errorArgs = ['income_sources'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                                    <select name="income_sources[]" type="text"
                                                    class="inner form-control ">
                                                    <option value="" disabled selected>اختر مصادر الايرادات</option>
                                                    <?php $__currentLoopData = $income_sources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </select>
                                                    <button class="btn btn-danger" style="background-color: #F91616"
                                                        type="button" id="delete_income_sources"><i
                                                            class="fa fa-times"></i></button>
                                                    <span class="text-danger error-text income_sources_error"></span>
                                                </div>
                                            </div>`);
            }
            if (e.target.id == 'add_expensis_modal') {
                $(".expensis").after(`<div data-repeater-item class="inner mb-3 row ">
                                                <div class="input-group col-md-12 col-12 auth-pass-inputgroup <?php $__errorArgs = ['expensis_modal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                                    <select name="expensis_modal[]" type="text"
                                                    class="inner form-control ">
                                                    <option value="" disabled selected>اختر هيكل التكاليف</option>
                                                    <?php $__currentLoopData = $expensis_modal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </select>
                                                    <button class="btn btn-danger" style="background-color: #F91616"
                                                        type="button" id="delete_expensis_modal"><i
                                                            class="fa fa-times"></i></button>
                                                    <span class="text-danger error-text expensis_modal_error"></span>
                                                </div>
                                            </div>`);
            }
            if (e.target.id == 'add_main_activity') {
                $(".activity").after(`<div data-repeater-item class="inner mb-3 row ">
                                                <div class="input-group col-md-12 col-12 auth-pass-inputgroup <?php $__errorArgs = ['main_activity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                                    <select name="main_activity[]" type="text"
                                                    class="inner form-control ">
                                                    <option value="" disabled selected>اختر الانشطة الرئيسية</option>
                                                    <?php $__currentLoopData = $main_activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   
                                                </select>
                                                    <button class="btn btn-danger" style="background-color: #F91616"
                                                        type="button" id="delete_main_activity"><i
                                                            class="fa fa-times"></i></button>
                                                    <span class="text-danger error-text main_activity_error"></span>
                                                </div>
                                            </div>`);
            }
            if (e.target.id == 'add_service_name') {
                $(".service_name").append(`<div data-repeater-item class="inner mb-3 row">
                                                <div class="col-md-8 col-8">
                                                    <input type="text" name="service_name[]"
                                                        class="inner form-control" placeholder="اسم الخدمة" />
                                                </div>
                                                <div class="col-md-4 col-4">
                                                     <input data-repeater-delete type="button"
                                                     class="btn btn-danger inner" id="delete_service_name" value="حذف" />
                                            </div>
                                            </div>`);
            }
            if (e.target.id == 'add_service_description') {
                $(".service_description").append(`<div data-repeater-item class="inner mb-3 row">
                                                <div class="col-md-8 col-8">
                                                    <input type="text" name="service_description[]"
                                                        class="inner form-control" placeholder="وصف الخدمة" />
                                                </div>
                                                <div class="col-md-4 col-4">
                                                     <input data-repeater-delete type="button"
                                                     class="btn btn-danger inner" id="delete_service_description" value="حذف" />
                                                     </div>
                                            </div>`);
            }
            // end clone element

            // start delete element 
            if (e.target.id == 'delete_problem') {

                e.target.parentElement.parentElement.remove();
                disableProblem();
            }
            if (e.target.id == 'delete_solutions') {
                e.target.parentElement.parentElement.remove()
                disableSolutions();
            }
            if (e.target.id == 'delete_sales_channels') {
                e.target.parentElement.parentElement.remove()
            }
            if (e.target.id == 'delete_marketing_channels') {
                e.target.parentElement.parentElement.remove()
            }
            if (e.target.id == 'delete_goals') {
                e.target.parentElement.parentElement.remove()
            }
            if (e.target.id == 'delete_income_sources') {
                e.target.parentElement.parentElement.remove()
            }
            if (e.target.id == 'delete_expensis_modal') {
                e.target.parentElement.parentElement.remove()
            }
            if (e.target.id == 'delete_main_activity') {
                e.target.parentElement.parentElement.remove()
            }
            if (e.target.id == 'delete_service_name') {
                e.target.parentElement.parentElement.remove()
            }
            if (e.target.id == 'delete_service_description') {
                e.target.parentElement.parentElement.remove()
            }
            // end delete element
        });
    </script>

    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": 300,
                "hideDuration": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        });
    </script>
    <script>
        function disableProblem() {
            let input = document.getElementsByName('problems[]').length;
            let button = document.getElementById('add_problem');
            if (input >= 5) {
                document.getElementById("add_problem").disabled = true;
            } else {
                document.getElementById("add_problem").disabled = false;
            }
        }

        function disableSolutions() {
            let input = document.getElementsByName('solutions[]').length;
            let button = document.getElementById('add_solutions');
            if (input >= 5) {
                document.getElementById("add_solutions").disabled = true;
            } else {
                document.getElementById("add_solutions").disabled = false;
            }
        }
    </script>
    <script>
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var title = button.data('title')
            var description = button.data('description')


            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #title').val(title);
            modal.find('.modal-body #description').val(description);

        })

        $('.table-responsive').on('click', '.delete', function() {
            let id = $(this).data('id');
            swal.fire({
                text: 'هل انت متاكد من الحذف',
                icon: "error",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                showCancelButton: true,
                customClass: {
                    confirmButtonText: "btn font-weight-bold btn-light",
                    cancelButtonText: "btn font-weight-bold btn-light",
                }
            }).then(function(status) {
                if (status.value) {
                    $.ajax({
                        url: '<?php echo e(url('sliders/{slider}')); ?>',
                        type: 'Delete',
                        data: {
                            'id': id,
                            '_token': '<?php echo e(csrf_token()); ?>',
                        },
                        success: function(e) {
                            location.reload();
                            // table.destroy();
                            //drawTable($('table')).serializeArray();
                        }
                    })
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\my project\jadwa\resources\views/admin/projectsplane/create.blade.php ENDPATH**/ ?>