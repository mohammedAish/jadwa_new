<?php $__env->startSection('title'); ?>
    <?php echo e('إنشاء مستخدم'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            خدمات
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            
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
                            <form id="form1" class="form1" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div data-repeater-list="inner-group" class="inner mb-4 problems">
                                        <label>المشاكل <small> (يمكنك إضافة حتى 5 مشاكل) </small></label>
                                        <div data-repeater-item class="inner mb-3 row prob">
                                            <div class="col-md-12 col-8  ">
                                                <input name="problems[]" type="text" class="inner form-control"
                                                    value="" placeholder="ادخل المشكلة"  />
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
                                                    value="" placeholder="ادخل الحل"  />
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4 ">
                                            <input data-repeater-create id="add_solutions" type="button"
                                                class="add btn btn-outline-warning inner" value="اضافة حل" />
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
                        <!-- Seller Details -->
                        <h3> السوق والعملاء </h3>

                        <section>
                            <h4> السوق والعملاء </h4>
                            <form id="form2" class="form2" enctype="multipart/form-data">
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
                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 " style="float: left">
                                        
                                            <input type="submit" value="حفظ والتالي" name="go" class="btn btn-warning inner go"
                                            id="go">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <!-- Seller Details -->
                        <h3> البيع والتسويق </h3>
                        <section>
                            <h4> البيع والتسويق </h4>
                            <form id="form3" class="form-horizontal" enctype="multipart/form-data">
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

                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 " style="float: left">
                                        
                                            <input type="submit" value="حفظ والتالي" name="go" class="btn btn-warning inner go"
                                            id="go">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>المنافسين</h3>
                        <section>
                            <h4>المنافسين</h4>
                            <form id="form4" class="form-horizontal" enctype="multipart/form-data">
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
                            <div class="col-md-4 col-4" style="float: left">
                                <div class="col-md-3 " style="float: left">
                                    
                                        <input type="submit" value="حفظ والتالي" name="go" class="btn btn-warning inner go"
                                        id="go">
                                </div>
                            </div>
                        </form>
                        </section>
                        <h3>الخطة الاستراتيجية</h3>
                        <section>
                            <h4>الخطة الاستراتيجية</h4>
                            <form id="form5" class="form-horizontal" enctype="multipart/form-data">
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

                            <div class="col-md-4 col-4" style="float: left">
                                <div class="col-md-3 " style="float: left">
                                    
                                        <input type="submit" value="حفظ والتالي" name="go" class="btn btn-warning inner go"
                                        id="go">
                                </div>
                            </div>
                        </form>
                        </section>
                        <h3>التكاليف والايرادات</h3>
                        <section>
                            <h4>التكاليف والايرادات</h4>
                            <form id="form6" class="form-horizontal" enctype="multipart/form-data">
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
                            <div class="col-md-4 col-4" style="float: left">
                                <div class="col-md-3 " style="float: left">
                                    
                                        <input type="submit" value="حفظ والتالي" name="go" class="btn btn-warning inner go"
                                        id="go">
                                </div>
                            </div>
                        </form>
                        </section>
                        <h3>معلومات التواصل</h3>
                        <section>
                            <h4>معلومات التواصل</h4>
                        <form id="form7"
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
                            <div class="col-md-4 col-4" style="float: left">
                                <div class="col-md-3 " style="float: left">
                                    
                                        <input type="submit" value="حفظ والتالي" name="go" class="btn btn-warning inner go"
                                        id="go">
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
                                        <form id="addForm">
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
                                                    <input type="submit" value="حفظ" name="go" class="btn btn-warning inner go"
                                                    id="go">
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
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">إغلاق</button>
                                            <button type="submit" class="btn btn-outline-warning">تعديل</button>
                                        </div>
                                    </form>
                                </div>
                             </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-4" style="float: left">
                            <div class="col-md-3 "  style="float: left">
                                
                                    <input type="submit" value="حفظ والتالي" name="go" class="btn btn-warning inner go"
                                    id="go">
                            </div>
                        </div>
                    </section>
                    <h3>تصدير التقرير</h3>
                        <section>

                            <form id="form7"
                            class="form-horizontal" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="row" style="">
                                <div class="inner-repeater mb-4">
                                    <div data-repeater-list="inner-group" class="inner mb-4">
                                        <button class="btn btn-light " id="show" type="button" id="password-addon"><i class="mdi mdi-file"></i></button>
                                        <h3>شكراً لتعبئة نموذج الأعمال !</h3>
                                        <label>يمكنك تحميل التقرير بالضغط على الزر التالي</label>
                                    </div>
                                    <button type="submit" class="btn btn-warning">تحميل نموذج العمل</button>
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
    
    
    

    <!-- App js -->
    
    
    <script>
        // console.log($('#save1'));
        $(document).ready(function() {
        $('#form1').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo e(route('storeproblemssolutions')); ?>",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {

                    if (data.status == 1) {
                        $('#form1').parent().attr('style' , 'display:none');
                        $('#form2').parent().removeAttr('style');
                        // $('.first').removeClass('current');
                        $('#vertical-example-p-1').removeAttr('style');
                        $('#vertical-example-t-0').parent().removeClass('current');
                        $('#vertical-example-t-1').parent().attr('class','current');
                    } else {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    }
                }
            });
        })
        $('#form2').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo e(route('storedetailsmarket')); ?>",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {

                    if (data.status == 1) {
                        $('#form2').parent().attr('style' , 'display:none');
                        $('#form3').parent().removeAttr('style');
                        // $('.first').removeClass('current');
                        $('#vertical-example-p-2').removeAttr('style');
                        $('#vertical-example-t-1').parent().removeClass('current');
                        $('#vertical-example-t-2').parent().attr('class','current');
                    } else {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    }
                }
            });
        })
        $('#form3').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo e(route('storesalesmarketingchannels')); ?>",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {

                    if (data.status == 1) {
                        $('#form3').parent().attr('style' , 'display:none');
                        $('#form4').parent().removeAttr('style');
                        // $('.first').removeClass('current');
                        $('#vertical-example-p-3').removeAttr('style');
                        $('#vertical-example-t-2').parent().removeClass('current');
                        $('#vertical-example-t-3').parent().attr('class','current');
                    } else {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    }
                }
            });
        })
        $('#form4').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo e(route('storecompatitor')); ?>",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {

                    if (data.status == 1) {
                        $('#form4').parent().attr('style' , 'display:none');
                        $('#form5').parent().removeAttr('style');
                        // $('.first').removeClass('current');
                        $('#vertical-example-p-4').removeAttr('style');
                        $('#vertical-example-t-3').parent().removeClass('current');
                        $('#vertical-example-t-4').parent().attr('class','current');
                    } else {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    }
                }
            });
        })
        $('#form5').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo e(route('storevisionmessagegoals')); ?>",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {

                    if (data.status == 1) {
                        $('#form5').parent().attr('style' , 'display:none');
                        $('#form6').parent().removeAttr('style');
                        // $('.first').removeClass('current');
                        $('#vertical-example-p-5').removeAttr('style');
                        $('#vertical-example-t-4').parent().removeClass('current');
                        $('#vertical-example-t-5').parent().attr('class','current');
                    } else {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    }
                }
            });
        })
        $('#form6').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo e(route('storerevenuecost')); ?>",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {

                    if (data.status == 1) {
                        $('#form6').parent().attr('style' , 'display:none');
                        $('#form7').parent().removeAttr('style');
                        // $('.first').removeClass('current');
                        $('#vertical-example-p-6').removeAttr('style');
                        $('#vertical-example-t-5').parent().removeClass('current');
                        $('#vertical-example-t-6').parent().attr('class','current');
                    } else {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    }
                }
            });
        })
        $('#form7').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo e(route('storeusersdetails')); ?>",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {

                    if (data.status == 1) {
                        $('#form7').parent().attr('style' , 'display:none');
                        $('#form8').parent().removeAttr('style');
                        // $('.first').removeClass('current');
                        $('#vertical-example-p-7').removeAttr('style');
                        $('#vertical-example-t-6').parent().removeClass('current');
                        $('#vertical-example-t-7').parent().attr('class','current');
                    } else {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    }
                }
            });
        })
        $('#addForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo e(route('storeservicenamedescription')); ?>",
                method: 'post',
                data: new FormData(this),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {

                    if (data.status == 1) {
                        $('#form7').parent().attr('style' , 'display:none');
                        $('#form8').parent().removeAttr('style');
                        // $('.first').removeClass('current');
                        $('#vertical-example-p-7').removeAttr('style');
                        $('#vertical-example-t-6').parent().removeClass('current');
                        $('#vertical-example-t-7').parent().attr('class','current');
                    } else {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    }
                }
            });
        })


    })

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

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

    <script>

        $(function() {
                $('#form1').validate({
                    rules: {
                        'problems[]': {
                            required : true,
                            minlength : 3
                         },
                        'solutions[]': {
                            required: true,
                            minlength : 3
                        }
                    },
                    messages: {
                        'problems[]': {
                            required : "هذا الحقل مطلوب",
                            minlength : 'يجب ان يكون طول النص اكثر من 3 احرف'
                        },
                        'solutions[]': {
                            required : "هذا الحقل مطلوب",
                            minlength : 'يجب ان يكون طول النص اكثر من 3 احرف'
                        }
                    }
                });

                $('#form3').validate({
                    rules: {
                        'marketing_channels[]': {
                            required : true,
                         },
                        'sales_channels[]': {
                            required : true,
                         },
                    },
                    messages: {
                        'marketing_channels[]': {
                            required : "هذا الحقل مطلوب",
                        },
                        'sales_channels[]': {
                            required : "هذا الحقل مطلوب",
                        },

                    }
                });
                $('#form5').validate({
                    rules: {
                        'goals[]': {
                            required : true,
                         },
                    },
                    messages: {
                        'goals[]': {
                            required : "هذا الحقل مطلوب",
                        },
                    }
                });
                $('#form6').validate({
                    rules: {
                        'income_sources[]': {
                            required : true,
                         },
                        'expensis_modal[]': {
                            required : true,
                         },
                        'main_activity[]': {
                            required : true,
                         },

                    },
                    messages: {
                        'income_sources[]': {
                            required : "هذا الحقل مطلوب",
                        },
                        'expensis_modal[]': {
                            required : "هذا الحقل مطلوب",
                        },
                        'main_activity[]': {
                            required : "هذا الحقل مطلوب",
                        },

                    }
                });
                $("#exampleModal").validate({
                    rules: {
                        name: {
                            required: true,
                            minlength: 3

                        },
                        details: {
                            required: true,
                            minlength: 3
                        },

                    },
                    messages: {
                        name: {
                                required : "هذا الحقل مطلوب",
                                minlength: "هذا الحقل يجب ان يكون طوله اكثر من 3 احرف"
                            },
                            details: {
                                required : "هذا الحقل مطلوب",
                                minlength: "هذا الحقل يجب ان يكون طوله اكثر من 3 احرف"
                            },

                        }
                });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\jadwahmad\resources\views/admin/projectsplane/create.blade.php ENDPATH**/ ?>