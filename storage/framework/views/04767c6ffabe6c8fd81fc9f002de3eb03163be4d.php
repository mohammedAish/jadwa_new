<?php $__env->startSection('title'); ?>
    <?php echo e('الإيرادات وتكاليف الايرادات'); ?>

<?php $__env->stopSection(); ?>
<style>
.price {
    position: relative;
}
    .ral {
    position: absolute;
    top: 29px;
    left: 0px;
    width: 38px;
    height: 34px;
    font-size: 16px;
    padding-top: 5px;
    padding-left: 2px;
    /* color: #fff; */
    background: #e8e3e3;
    padding: 2px;}
</style>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e('دراسة جدوى'); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('name'); ?>
            <?php echo e('الإيرادات وتكاليف الايرادات'); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="vertical-example" class="vertical-wizard">
                        <h3>الإيرادات</h3>
                        <section>
                            <h4 class="mb-4"><strong>الإيرادات</strong></h4>
                            <form id="form_1" name="form_1" class="form-horizontal">
                                <?php $__currentLoopData = $projectIncomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectIncome): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row">
                                    <div class="inner-repeater mb-4" style="">

                                            <div data-repeater-list="inner-group" class="inner mb-4">
                                                <div data-repeater-item class=" mb-2 row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-4">

                                                            <label for="verticalnav-pancard-input"><strong>المنتج / الخدمة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]" value="<?php echo e($projectIncome->item); ?>" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-2 price">
                                                            <label for="verticalnav-pancard-input"><strong>القيمة</strong></label>
                                                            <input type="text" name="value[]"  value="<?php echo e($projectIncome->value); ?>"  onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text value_error"></span>
                                                            <?php if($project->currency == "ksa"): ?>
                                                            <span class="ral">رس</span>
                                                            <?php else: ?>
                                                             <span class="ral">USD</span>
                                                             <?php endif; ?>

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-3">
                                                        <div class="mb-2">

                                                          <?php if($project->revenu_entry == "m"): ?>
                                                            <label for="verticalnav-pancard-input"><strong>عدد الوحدات شهريا</strong></label>
                                                            <?php else: ?>
                                                            <label for="verticalnav-pancard-input"><strong>عدد الوحدات سنوي</strong></label>
                                                            <?php endif; ?>
                                                            <input type="text" name="quantity[]" value="<?php echo e($projectIncome->quantity); ?>"   onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-1">
                                                        <div class="mb-3 pt-4 table-responsive">

                                                                <button type="button" class="destroy" title="حذف" style="cursor: pointer"
                                                                 data-id="<?php echo e($projectIncome->id); ?>" id="<?php echo e($projectIncome->id); ?>"  class="text-danger delete">
                                                                    <i
                                                                        class="fa fa-trash"></i></button>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                    </div>
                                </div >
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="row">
                                    <div class="inner-repeater mb-4" style="">

                                            <div data-repeater-list="inner-group" class="inner mb-4">


                                                <div data-repeater-item class="inner mb-3 row income">
                                                    <?php if(empty($projectIncomes)): ?>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>المنتج / الخدمة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>القيمة</strong></label>
                                                            <input type="text" name="value[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text value_error"></span>
                                                            <?php if($project->currency == "ksa"): ?>
                                                            <span class="ral">رس</span>
                                                            <?php else: ?>
                                                             <span class="ral">USD</span>
                                                             <?php endif; ?>

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-3">

                                                          <?php if($project->revenu_entry == "m"): ?>
                                                            <label for="verticalnav-pancard-input"><strong>عدد الوحدات شهريا</strong></label>
                                                            <?php else: ?>
                                                            <label for="verticalnav-pancard-input"><strong>عدد الوحدات سنوي</strong></label>
                                                            <?php endif; ?>
                                                            <input type="text" name="quantity[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>

                                                </div>

                                                <div class="col-md-4 col-4 ">
                                                    <input data-repeater-create id="add_income_item" type="button"
                                                           class="add btn btn-outline-dark inner" value="اضافة " />
                                                </div>
                                            </div>
                                    </div>
                                </div >

                                <div class="col-md-6 col-6" style="float: left">
                                    <div class="col-md-4" style="float: left">
                                        <button type="button" value="حفظ ومتابعة ->" name="save_btn_1" class="btn btn-warning" id="save_btn_1" >
                                            حفظ ومتابعة -->
                                            <span class="spinner-border spinner-border-sm" id="spinner_1" role="status" aria-hidden="true"></span>
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>نسبة نمو الإيرادات</h3>

                        <section id="forms_2">
                            <h4 class="mb-4"><strong>نسبة نمو الإيرادات</strong></h4>


                            <form  id="form_value_incremental" name="form_value_incremental" class="form-horizontal">
                                <div class="mb-3 price">
                                    <label for="verticalnav-pancard-input"><strong>نسبة نمو الايرادات</strong></label>
                                    <input type="text" name="value_incremental" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                    <span class="text-danger error-text value_incremental_error"></span>
                                    <span class="ral text-center pt-2">٪</span>
                                </div>
                                <button type="button" value="حفظ ومتابعة ->" name="value_incremental_button" style="    font-size: 17px;
                                    background: none;
                                    border: none;
                                    color: rgb(249 170 28);" class="" id="value_incremental_button" >
                              تخصيص نسبة النمو +
                                </button>

                            </form>

                            <form id="form_2" name="form_2" class="form-horizontal">



                                <div class="row">

                                        <div class="accordion" id="accordionExample" >

                                        </div>
                                </div >
                                <br>
                                <br>

                                <div class="col-md-6 col-6" style="float: left">
                                    <div class="col-md-3" style="float: left">
                                        <button type="button" value="حفظ والتالي" name="save_btn_2" class="btn btn-warning" id="save_btn_2" >
                                            حفظ ومتابعة -->
                                            <span class="spinner-border spinner-border-sm" id="spinner_2" role="status" aria-hidden="true"></span>
                                        </button>
                                        

                                    </div>
                                </div>
                            </form>
                        </section>

                        <h3>ملخص المبيعات</h3>
                        <section>
                            <h4 class="mb-4"><strong>ملخص المبيعات</strong></h4>

                                <div class="row">
                                    <table class="GeneratedTable" id="summry_table">
                                        <thead>
                                        <tr>
                                            <th>الرقم</th>
                                            <th>الخدمة</th>
                                            <th>عدد الوحدات شهريا</th>
                                            <th>قيمة الوحدة</th>
                                            <?php if($project->revenu_entry == "m"): ?>
                                            <th> المبيعات الشهرية</th>
                                               <?php else: ?>
                                               <th> المبيعات السنوية</th>
                                                            <?php endif; ?>
                                            <th>مبيعات لنهاية العام</th>
                                            <th>مبيعات العام</th>

                                        </tr>
                                        </thead>
                                        <tbody id="incremental_data">

                                        </tbody>
                                        <tfoot id="incremental_data_totle">

                                            </tfoot>
                                    </table>
                                </div>
                                <br>
                                <br>

                                <div class="my-3 py-2">
                                    <table class="mt-3 GeneratedTable" style="width: 40%">
                                        <thead>
                                        <tr  id="incremental_summry_table_year">

                                        </tr>
                                        </thead>

                                    </table>
                                </div>
                            <div class="row">

                                <table class="GeneratedTable" id="incremental_summry_table">
                                    <thead>
                                    <tr>
                                        <th>السنة</th>
                                        <th>نسبة النمو  السنوية</th>
                                    </tr>
                                    </thead>
                                    <tbody id="view_incremental_data">



                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>معدل النمو السنوي</td>
                                            <td id="view_incremental_data_avareg_persent"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <br>
                            <br>

                            <div class="row">
                                <table class="GeneratedTable" id="revenue_summry_table">
                                    <thead>

                                    <tr id="head_data">
                                        <th>السنة</th>
                                        <th id="total_revenue_current_head"></th>
                                    </tr>
                                    </thead>
                                    <tbody >

                                    <tr id="total_revenue_data">
                                        <td>اجمالي الايرادات</td>
                                        <td id="total_revenue_current"></td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-5 pt-5" >
                                <table class="GeneratedTable" style="width: 51%" id="revenue_summry_table_avarage">

                                    <tbody id="total_revenue_avarge">
                                        <tr>
                                            <td style="background: #FCAC02;
                                            font-size: 20px;">اجمالي الايرادات</td>
                                            <td id=total_revenue_totle_icome></td>
                                        </tr>
                                        <tr>
                                            <td style="background: #FCAC02;
                                            font-size: 20px;">متوسط الايرادات</td>
                                            <td id=total_revenue_totle_icome_avarge></td>
                                        </tr>
                                        <tr>
                                            <td style="background: #FCAC02;
                                            font-size: 20px;">متوسط النمو</td>
                                            <td id=total_revenue_totle_icome_avarge_persent></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <br>

                            <div class="col-md-6 col-6" style="float: left">
                                <div class="col-md-4" style="float: left">
                                    <button type="button" value="التالي ->" name="next_btn" class="btn btn-warning" id="next_btn" >
                                        التالي -->
                                    </button>

                                </div>
                            </div>

                        </section>
                        <h3>تكاليف الإيراد</h3>
                        <section>
                            <h4 class="mb-4"><strong>تكاليف الإيراد</strong></h4>
                            <form id="form_3" name="form_3" class="form-horizontal">

                                <div class="row">
                                    <div class="inner-repeater mb-4" style="border: 2px #dedede solid;padding: 10px">

                                        <div data-repeater-list="inner-group" class="inner mb-4">
                                            <div data-repeater-item class="inner mb-3 row income_expenses">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>المنتج / الخدمة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                        <input type="text" name="item[]" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text item_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="verticalnav-pancard-input"><strong>القيمة</strong></label>
                                                        <input type="text" name="value[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text value_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="verticalnav-pancard-input"><strong>عدد الوحدات شهريا</strong></label>
                                                        <input type="text" name="quantity[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text quantity_error"></span>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-4 col-4 ">
                                                <input data-repeater-create id="add_income_expenses_item" type="button"
                                                       class="add btn btn-outline-dark inner" value="اضافة " />
                                            </div>
                                        </div>
                                    </div>
                                </div >

                                <div class="col-md-6 col-6" style="float: left">
                                    <div class="col-md-4" style="float: left">
                                        <button type="button" value="حفظ ومتابعة ->" name="save_btn_3" class="btn btn-warning" id="save_btn_3" disabled="disabled" >
                                            حفظ ومتابعة -->
                                            <span class="spinner-border spinner-border-sm" id="spinner_3" role="status" aria-hidden="true"></span>
                                        </button>

                                    </div>
                                </div>
                            </form>
                            <br>
                            <br>

                        </section>
                        <h3>نسبة نمو التكاليف</h3>
                        <section>
                            <h4 class="mb-4"><strong>نسبة نمو التكاليف</strong></h4>
                            <form  id="form_value_exp_incremental" name="form_value_exp_incremental" class="form-horizontal">
                                <div class="mb-3 price">
                                    <label for="verticalnav-pancard-input"><strong>نسبة نمو التكاليف</strong></label>
                                    <input type="text" name="value_incremental" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                    <span class="text-danger error-text value_incremental_error"></span>
                                    <span class="ral text-center pt-2">٪</span>
                                </div>
                                <button type="button" value="حفظ ومتابعة ->" name="value_exp_incremental_button" style="    font-size: 17px;
                                    background: none;
                                    border: none;
                                    color: rgb(249 170 28);" class="" id="value_exp_incremental_button" >
                              تخصيص نسبة الايرادات +
                                </button>

                            </form>
                            <form id="form_4" name="form_4" class="form-horizontal">

                                <div class="row">

                                    <div class="accordion" id="accordionExample_1" >

                                    </div>
                                </div >
                                <br>
                                <br>

                                <div class="col-md-6 col-6" style="float: left">
                                    <div class="col-md-3" style="float: left">
                                        <button type="button" value="حفظ والتالي" name="save_btn_4" class="btn btn-warning" id="save_btn_4" >
                                            حفظ ومتابعة -->
                                            <span class="spinner-border spinner-border-sm" id="spinner_4" role="status" aria-hidden="true"></span>
                                        </button>

                                    </div>
                                </div>
                            </form>
                            <br>
                            <br>

                        </section>
                        <h3>ملخص التكاليف</h3>
                        <section>
                            <h4 class="mb-4"><strong>ملخص التكاليف</strong></h4>
                            <div class="row">
                                <table class="GeneratedTable" id="summry_table_2">
                                    <thead>
                                    <tr>
                                        <th>الخدمة</th>
                                        <th>عدد الوحدات شهريا</th>
                                        <th>قيمة الوحدة</th>
                                        <th>إجمالي المبيعات الشهرية</th>
                                        <th>صافي المبيعات السنوية</th>
                                    </tr>
                                    </thead>
                                    <tbody id="expenses_incremental_data">

                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <br>

                            <div class="row">
                                <table class="GeneratedTable" id="expenses_incremental_summry_table">
                                    <thead>
                                    <tr>
                                        <th>السنة</th>
                                        <th>البند</th>
                                        <th>نسبة النمو في قيمة الإيراد</th>
                                        <th>نسبة النمو في عدد الوحدات</th>
                                    </tr>
                                    </thead>
                                    <tbody id="view_expenses_incremental_data">

                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <br>

                            <div class="row">
                                <table class="GeneratedTable" id="expenses_summry_table">
                                    <thead>
                                    <tr id="head_expenses">

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr id="total_expenses_data">

                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <br>
                            <div class="col-md-6 col-6" style="float: left">
                                <div class="col-md-4" style="float: left">
                                    <button type="button" value="التالي ->" name="next_btn_2" class="btn btn-warning" id="next_btn_2" >
                                        التالي -->
                                    </button>

                                </div>
                            </div>

                        </section>
                        <h3>ملخص الأرباح</h3>
                        <section>
                            <h4 class="mb-4"><strong>ملخص الأرباح</strong></h4>
                            <div class="row">
                                <table class="GeneratedTable" id="summry_table_3">
                                    <thead>
                                    <tr>
                                        <th>السنة</th>
                                        <th>إجمالي المبيعات السنوية</th>
                                        <th>إجمالي التكاليف السنوية</th>
                                        <th>الضريبة</th>
                                        <th>صافي المبيعات</th>
                                    </tr>
                                    </thead>
                                    <tbody id="earning_summery">

                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <br>
                            <div class="col-md-6 col-6" style="float: left">
                                <div class="col-md-4" style="float: left">
                                    <button type="button" value="التالي ->" name="next_btn_3" class="btn btn-warning" id="next_btn_3" >
                                        التالي -->
                                    </button>

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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>

    <!-- form wizard init -->
    <script src="<?php echo e(asset('assets/js/pages/form-wizard.init.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/jquery-steps/jquery-steps.min.js')); ?>"></script>

    
    <script>

        document.addEventListener('click', function(e) {
            var eventTarget = e.target;

            // start clone element
            if (e.target.id == 'add_income_item') {
                $(".income").after(`<div data-repeater-item class="inner mb-3 row">
                                                        <div class="col-lg-4">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>المنتج / الخدمة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>القيمة</strong></label>
                                                            <input type="text" name="value[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text value_error"></span>
                                                            <?php if($project->currency == "ksa"): ?>
                                                            <span class="ral">رس</span>
                                                            <?php else: ?>
                                                             <span class="ral">USD</span>
                                                             <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">

                                                          <?php if($project->revenu_entry == "m"): ?>
                                                            <label for="verticalnav-pancard-input"><strong>عدد الوحدات شهريا</strong></label>
                                                            <?php else: ?>
                                                            <label for="verticalnav-pancard-input"><strong>عدد الوحدات سنوي</strong></label>
                                                            <?php endif; ?>
                                                            <input type="text" name="quantity[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-1">
                                                        <div class="mt-4">

                                                            <i class=" mdi mdi-delete font-size-20" style="cursor: pointer;color: #ee0e0e;" id="delete_income_item"></i>
                                                        </div>
                                                    </div>
                                                </div>`);
            }
            if (e.target.id == 'add_income_expenses_item') {
                $(".income_expenses").after(`<div data-repeater-item class="inner mb-3 row">
                                                        <div class="col-lg-4">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>المنتج / الخدمة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>القيمة</strong></label>
                                                            <input type="text" name="value[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text value_error"></span>
                                                            <?php if($project->currency == "ksa"): ?>
                                                            <span class="ral">رس</span>
                                                            <?php else: ?>
                                                             <span class="ral">USD</span>
                                                             <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">

                                                          <?php if($project->revenu_entry == "m"): ?>
                                                            <label for="verticalnav-pancard-input"><strong>عدد الوحدات شهريا</strong></label>
                                                            <?php else: ?>
                                                            <label for="verticalnav-pancard-input"><strong>عدد الوحدات سنوي</strong></label>
                                                            <?php endif; ?>
                                                            <input type="text" name="quantity[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-1">
                                                        <div class="mb-3">
                                                            <h4></h4>
                                                            <label for="verticalnav-pancard-input"></label>

                                                            <br>
                                                            <button class="text-danger rounded-circle"
                                                                type="button" id="delete_income_expenses_item">
                                                                <i class="mdi mdi-delete font-size-20"></i></button>
                                                <span class="text-danger error-text sale_channels_error"></span>
                                                        </div>
                                                    </div>
                                                </div>`);
            }
            // end clone element

            // start delete element
            if (e.target.id == 'delete_income_item') {


                e.target.parentElement.parentElement.parentElement.remove();
            }
            if (e.target.id == 'delete_income_expenses_item') {

                e.target.parentElement.parentElement.parentElement.remove();
            }
            // end delete element
        });
    </script>
    


    

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>


        jQuery(document).ready(function () {

            $('button.destroy').on('click', function(e){
    e.preventDefault();
    var id=this.id;
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
                            url: 'project_fs_general_income_delete_item/'+id,
                type: 'post',
                data: {'id' : id},
                dataType: 'json',
                            success: function(result) {
                                location.reload();
                               // table.destroy();
                                //drawTable($('table')).serializeArray();
                            }
                        })
                    }
                })

});


            jQuery('#next_btn').click(function (e) {
                $('#vertical-example-p-2').attr('style','display:none');
                $('#vertical-example-p-3').removeAttr('style');
                $('#vertical-example-t-2').parent().removeClass('current');
                $('#vertical-example-t-3').parent().attr('class','current');
            });
            jQuery('#next_btn_2').click(function (e) {
                $('#vertical-example-p-5').attr('style','display:none');
                $('#vertical-example-p-6').removeAttr('style');
                $('#vertical-example-t-5').parent().removeClass('current');
                $('#vertical-example-t-6').parent().attr('class','current');

                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: "<?php echo e(route('general_project_income_expenses_store_incremental')); ?>",
                        method: 'post',
                        dataType: 'json',
                        success: function (result) {
                            $.each(result.data, function (key, item) {
                                $('#earning_summery').append('\
                                          <tr>\
                               <?php $__currentLoopData = years()['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>' + <?php echo e($year); ?> + '</td>\
                                <td>' + 0 + '</td>\
                                <td>' + 0 +'</td>\
                                <td>' + 0 +'</td>\
                                <td>' + 0 +'</td>\
                                <td>' + 0 +'</td>\
                                <td>' + 0 +'</td>\
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </tr>\
                            ');
                            });
                        }
                    });
            });
            $("#spinner_1").hide();
            $("#spinner_2").hide();
            $("#spinner_3").hide();
            $('#vertical-example-t-0').parent().attr('class','current');

            jQuery('#value_incremental_button').click(function (e) {
e.preventDefault();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var formData = $('#form_value_incremental').serialize();
jQuery.ajax({
    url: "<?php echo e(route('project_fs_general_income_icremental_store')); ?>",
    method: 'post',
    data: formData,
    dataType: 'json',
    success: function (result) {
        toastr.success("تمت العملية بنجاح", "تم تخزين  النسبة البيانات بنجاح");
        $('#accordionExample').html("");
        console.log(result.data);
            $('#accordionExample').append('<div class="table-responsive">\
                    <table class="table mb-0 border-warning" style="width: 100%">\
                        <thead>\
                        <tr>\
                             <th>السنة / البند</th>\
                             <th>نسبة النمو في قيمة الإيراد</th>\
                        </tr>\
                        </thead>\
                 <tbody id="incrementals">\
<?php $__currentLoopData = years()['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
<tr>\
    <td>' + <?php echo e($year); ?> + '</td>\
<td>\
    <input type="hidden" name="year[]" value="<?php echo e($year); ?>" />\
    <input type="hidden" name="id" class="form-control" value="' + result.data.id + '">\
        <input type="text" name="value_incremental[]" class="form-control" value="' + result.data.incremental + '" >\
</td>\
<td>\
</td>\
</tr>\
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
</tbody>\
                    </table>');




    }
});
});
jQuery('#value_exp_incremental_button').click(function (e) {
e.preventDefault();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var formData = $('#form_value_exp_incremental').serialize();
jQuery.ajax({
    url: "<?php echo e(route('project_exp_general_income_icremental_store')); ?>",
    method: 'post',
    data: formData,
    dataType: 'json',
    success: function (result) {
        toastr.success("تمت العملية بنجاح", "تم تخزين  النسبة البيانات بنجاح");
        $('#accordionExample_1').html("");
        console.log(result.data);
            $('#accordionExample_1').append('<div class="table-responsive">\
                    <table class="table mb-0 border-warning" style="width: 100%">\
                        <thead>\
                        <tr>\
                             <th>السنة / البند</th>\
                             <th>نسبة النمو في قيمة التكاليف</th>\
                        </tr>\
                        </thead>\
                 <tbody id="incrementals">\
<?php $__currentLoopData = years()['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
<tr>\
    <td>' + <?php echo e($year); ?> + '</td>\
<td>\
    <input type="hidden" name="year[]" value="<?php echo e($year); ?>" />\
    <input type="hidden" name="id" class="form-control" value="' + result.data.id + '">\
        <input type="text" name="value_incremental[]" class="form-control" value="' + result.data.incremental + '" >\
</td>\
<td>\
</td>\
</tr>\
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
</tbody>\
                    </table>');




    }
});
});


            jQuery('#save_btn_1').click(function (e) {

                $("#spinner_1").show();
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_1').serialize();
                jQuery.ajax({
                    url: "<?php echo e(route('project_fs_general_income_store')); ?>",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function (result) {
                        toastr.success("تمت العملية بنجاح", "تم تخزين البيانات بنجاح");
                        $("#form_1 :input").prop("disabled", true);
                        $("#spinner_1").hide();
                        $('#vertical-example-p-0').attr('style','display:none');
                        $('#vertical-example-p-1').removeAttr('style');
                        $('#vertical-example-t-0').parent().removeClass('current');
                        $('#vertical-example-t-1').parent().attr('class','current');



                    }
                });
            });
            jQuery('#save_btn_2').click(function (e) {

                $("#spinner_2").show();
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_2').serialize();
                jQuery.ajax({
                    url: "<?php echo e(route('project_fs_general_income_icremental_detail_store')); ?>",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function (result) {
                        toastr.success("تمت العملية بنجاح", "تم حفظ البيانات بنجاح");
                        $("#spinner_2").hide();
                        $('#vertical-example-p-1').attr('style','display:none');
                        $('#vertical-example-p-2').removeAttr('style');
                        $('#vertical-example-t-1').parent().removeClass('current');
                        $('#vertical-example-t-2').parent().attr('class','current');
                        $.each(result.data, function (key, item) {
                            $('#incremental_data').append('\
                                          <tr>\
                                            <td>' +formatter.format( item.id) + '</td>\
                                <td>' + (item.item) + '</td>\
                                <td>' + formatter.format(item.quantity) +'</td>\
                                <td>' + formatter.format(item.value) +'</td>\
                                <?php if($project->revenu_entry == "m"): ?>\
                                <td>' + formatter.format(item.value * item.quantity) +'</td>\
                                               <?php else: ?>\
                              <td>' + formatter.format((item.value * item.quantity) * 12) +'</td>\
                                <?php endif; ?>\
                                <td>' +formatter.format ((item.value * item.quantity) * result.remainingmonths) +'</td>\
                                <td>' + formatter.format((item.value * item.quantity) * 12) +'</td>\
                                         </tr>\
                            ');
                        });
                        $('#incremental_data_totle').append('\
                        <tr>\
                                                <th>الاجمالي</th>\
                                                <th></th><th></th><th></th>\
                                                <th>'+formatter.format(result.totleIncomeMounth)+'</th>\
                                                <th>'+formatter.format(result.totleIncomeToEndYear)+'</th>\
                                                <th>'+ formatter.format(result.totleIncomeYear)+'</th>\
                                                </tr>\
                                                ');

                        fetch_incremental();
                        view_revenue();
                    }
                });
            });
            jQuery('#save_btn_3').click(function (e) {

                $("#spinner_3").show();
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_3').serialize();
                jQuery.ajax({
                    url: "<?php echo e(route('project_exp_general_income_store')); ?>",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function (result) {
                        toastr.success("تمت العملية بنجاح", "تم تخزين البيانات بنجاح");
                        $("#form_3 :input").prop("disabled", true);
                        $("#spinner_3").hide();
                        $('#vertical-example-p-3').attr('style','display:none');
                        $('#vertical-example-p-4').removeAttr('style');
                        $('#vertical-example-t-3').parent().removeClass('current');
                        $('#vertical-example-t-4').parent().attr('class','current');

                                        }
                });
            });
            jQuery('#save_btn_4').click(function (e) {

                $("#spinner_4").show();
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_4').serialize();
                jQuery.ajax({
                    url: "<?php echo e(route('general_project_income_expenses_store_incremental')); ?>",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function (result) {
                        toastr.success("تمت العملية بنجاح", "تم حفظ البيانات بنجاح");
                        $("#spinner_4").hide();
                        $('#vertical-example-p-4').attr('style','display:none');
                        $('#vertical-example-p-5').removeAttr('style');
                        $('#vertical-example-t-4').parent().removeClass('current');
                        $('#vertical-example-t-5').parent().attr('class','current');
                        $.each(result.data, function (key, item) {
                            $('#expenses_incremental_data').append('\
                                          <tr>\
                                <td>' + item.item + '</td>\
                                <td>' + item.quantity +'</td>\
                                <td>' + (item.value) +'</td>\
                                <td>' + (item.value * item.quantity) +'</td>\
                                <td>' + ((item.value * item.quantity) * 12) +'</td>\
                                         </tr>\
                            ');
                        });
                        fetch_expenses_incremental();
                        view_expenses();
                    }
                });
            });

        });

    </script>

    

    <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        $(document).ready(function() {
            (function() {
                $('#form_1 :input').keyup(function() {

                    var empty = false;
                    $('#form_1 :input').each(function() {
                        if ($(this).val() == '') {
                            empty = true;
                        }
                    });

                    if (empty) {
                        $('#save_btn_1').attr('disabled', 'disabled');
                    } else {
                        $('#save_btn_1').removeAttr('disabled');
                    }
                });
                $('#form_3 :input').keyup(function() {

                    var empty = false;
                    $('#form_3 :input').each(function() {
                        if ($(this).val() == '') {
                            empty = true;
                        }
                    });

                    if (empty) {
                        $('#save_btn_3').attr('disabled', 'disabled');
                    } else {
                        $('#save_btn_3').removeAttr('disabled');
                    }
                });
            })();
        });

        function fetch_incremental(){
            jQuery.ajax({
                url: "<?php echo e(route('project_fs_general_income_icremental_detail_get')); ?>",
                method: 'get',
                dataType: 'json',
                success: function (result) {
                    $('#incremental_summry_table_year').append('\
                                        <th>النمو السنوي</th>\
                                <th style="background: #fff;width: 150px;color:#000">'  + result.projectFsGeneralIncome.incremental +  "%"+'</th>\
                            ');
                    console.log(result);
                    $.each(result.data, function (key, item) {


                        $('#view_incremental_data').append('\
                                          <tr>\
                                <td>' + item.year + '</td>\
                                <td>' + item.incremental + "%"+'</td>\
                                         </tr>\
                            ');

                    });
                }
            });
        }
        function view_revenue(){
            jQuery.ajax({
                url: "<?php echo e(route('project_fs_general_income_icremental_total_revenue')); ?>",
                method: 'get',
                dataType: 'json',
                success: function (result) {
                    console.log(result);

                    $('#view_incremental_data_avareg_persent').append(
                 '%'+ result.IncomeAvargePersent
                            );
                    $('#total_revenue_totle_icome').append(
                        formatter.format(result.totleIncomee)

                            );
                            $('#total_revenue_totle_icome_avarge').append(
                        formatter.format(result.totleIncomeAvaragee)

                            );
                            $('#total_revenue_totle_icome_avarge_persent').append(

                                '%'+result.IncomeAvargePersent
                            );
                    $('#total_revenue_current_head').append(
                             result.yearCurrent
                            );

                        $('#total_revenue_current').append(
                                 formatter.format(result.totleIncomeToEndYear)
                            );

                    $.each(result.totleYear, function (key, item) {
                        $('#head_data').append('\
                            <th>' + key + '</th>\
                            ');

                        $('#total_revenue_data').append('\
                                <td>' + formatter.format(item) + '</td>\
                            ');
                    });
                }
            });
        }

        function fetch_expenses_incremental(){
            jQuery.ajax({
                url: "<?php echo e(route('view_general_project_expenses_incremental')); ?>",
                method: 'get',
                dataType: 'json',
                success: function (result) {
                    $.each(result.data, function (key, item) {
                        $('#view_expenses_incremental_data').append('\
                                          <tr>\
                                <td>' + item.year + '</td>\
                                <td>' + item.income.item + '</td>\
                                <td>' + item.income_value + "%"+'</td>\
                                <td>' + item.quantity_value + "%"+'</td>\
                                         </tr>\
                            ');
                    });
                }
            });
        }
        function view_expenses(){
            jQuery.ajax({
                url: "<?php echo e(route('total_expenses')); ?>",
                method: 'get',
                dataType: 'json',
                success: function (result) {
                    $.each(result.data, function (key, item) {
                        $('#head_expenses').append('\
                            <th>' + key + '</th>\
                            ');
                        $('#total_expenses_data').append('\
                                <td>' + formatter.format(item) + '</td>\
                            ');
                    });
                }
            });
        }

        const formatter = new Intl.NumberFormat('en-US');
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Desktop/valet project/jadwa/resources/views/admin/forms/revenues.blade.php ENDPATH**/ ?>