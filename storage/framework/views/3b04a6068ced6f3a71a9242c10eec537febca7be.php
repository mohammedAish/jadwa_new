<?php $__env->startSection('title'); ?>
    <?php echo e('المصاريف الإدارية والعمومية'); ?>

<?php $__env->stopSection(); ?>
<style>
    .display {
        display: none;
    }

    /* .price {
        position: relative;
    }
    .ral {
        position: absolute;
        top: 27px;
        left: 0px;
        width: 38px;
        height: 36px;
        font-size: 16px;
        padding-top: 3px;
        padding-left: 2px;
        background: #e8e3e3;
        padding: 2px;
    }  */
</style>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e('دراسة جدوى'); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('name'); ?>
            <?php echo e('المصاريف الإدارية والعمومية'); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="vertical-example" class="vertical-wizard">
                        <h3>المصاريف الادارية</h3>
                        <section>
                            <h4 class="mb-4"><strong>المصاريف الادارية</strong></h4>
                            <form id="form_1" name="form_1" class="form-horizontal">
                                <input type="hidden" value="1" name="project_id" id="project_id">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="inner-repeater mb-4">
                                        <div data-repeater-list="inner-group" class="inner mb-4">
                                            <div data-repeater-item class=" mb-2 row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="administrative_expenses_type"><strong>إدخال قيمة
                                                                المصاريف</strong> <i class="fa fa-lightbulb-o"
                                                                aria-hidden="true"></i> </label>
                                                        <select class="form-control" name="administrative_expenses_type"
                                                            id="administrative_expenses_type">
                                                            <option selected disabled>اختر</option>
                                                            <option value="1">مبلغ ثابت</option>
                                                            <option value="2">نسبة من ايرادات المنتج</option>
                                                            <option value="3">تخصيص </option>
                                                        </select>
                                                        <span class="text-danger error-text item_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="display" id="expense_amount_div">
                                                        <label for="expense_amount"><strong>مبلغ المصاريف
                                                                الإدارية من الإيرادات</strong></label>
                                                        <div class="mb-2 input-group">
                                                            <input type="text" name="expense_amount" value=""
                                                                onkeypress="return isNumber(event)" class="form-control"
                                                                id="expense_amount">
                                                            <span
                                                                class="text-danger error-text expense_amount_error"></span>
                                                            <?php if($project->currency == 'ksa'): ?>
                                                                <button class="btn btn-light" type="button">ر.س</button>
                                                            <?php else: ?>
                                                                <button class="btn btn-light" type="button"><i
                                                                        class="mdi mdi-currency-usd"></i></button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="display" id="expense_ratio_div">
                                                        <label for="expense_ratio"><strong>نسبة المصاريف الإدارية من
                                                                الإيرادات</strong></label>
                                                        <div class="mb-3 input-group">
                                                            <input type="text" name="expense_ratio"
                                                                class="form-control <?php $__errorArgs = ['expense_ratio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                id="expense_ratio" placeholder="نسبة النمو السنوي المتوقع"
                                                                aria-label="expense_ratio">
                                                            <button class="btn btn-light" type="button"><i
                                                                    class="mdi mdi-percent"></i></button>
                                                            <span class="text-danger error-text expense_ratio_error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="display" id="expenseTable_div">
                                                <table class="table table-bordered" style="text-align: center !important"
                                                    id="expenseTable">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="align-middle"> البند </th>
                                                            <th class="align-middle">القيمة </th>
                                                            <th class="align-middle">العمليات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbodyExpenseTable">
                                                        <tr>
                                                            <td> <select class="form-control" name="expensis_type[]">
                                                                    <option value="-1">اختر</option>
                                                                    <?php $__currentLoopData = $AdministExpen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($itm->id); ?>">
                                                                            <?php echo e($itm->item); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="0">أخرى</option>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" name="value[]" class="form-control"
                                                                    id="value" aria-label="value"></td>
                                                            <td> <button class="text-danger rounded-circle" type="button"
                                                                    id="delete_value"
                                                                    style="cursor: pointer; background: none; border: none;">
                                                                    <i class="mdi mdi-delete font-size-20"></i></button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <button type="button" value="اضافة" name="add_td_Expense"
                                                    class="btn btn-warning" id="add_td_Expense">
                                                    اضافة
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-6" style="float: left">
                                    <div class="col-md-4" style="float: left">
                                        <button type="button" value="حفظ ومتابعة ->" name="save_btn_1"
                                            class="btn btn-warning" id="save_btn_1">
                                            حفظ ومتابعة
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>نسبة نمو المصاريف الادارية</h3>
                        <section id="forms_2">
                            <h4 class="mb-4"><strong>نسبة نمو المصاريف الادارية</strong></h4>
                            <form id="form_2" name="form_2" class="form-horizontal">
                                
                                <label for="verticalnav-pancard-input"><strong>نسبة نمو الايرادات</strong></label>
                                <div class="mb-3 price input-group">
                                    <input type="text" name="one_value_incremental"
                                        onkeypress="return isNumber(event)" class="form-control"
                                        id="verticalnav-pancard-input">
                                    <span class="text-danger error-text value_incremental_error"></span>
                                    <button class="btn btn-light" type="button"><i class="mdi mdi-percent"></i></button>
                                </div>
                                <button type="button" value="حفظ ومتابعة ->" name="value_incremental_button"
                                    style="    font-size: 17px;
                                        background: none;
                                        border: none;
                                        color: rgb(249 170 28);"
                                    class="" id="value_incremental_button">
                                    تخصيص نسبة النمو +
                                </button>


                                <div class="row">

                                    <div class="accordion" id="accordionExample">

                                    </div>
                                </div>
                                <br>
                                <br>

                                <div class="d-flex justify-content-between">
                                    <button type="button" value="السابق" name="previous_1" class="btn btn-warning"
                                        id="previous_1">
                                        السابق
                                    </button>
                                    <button style="float: left" type="button" value="حفظ والتالي" name="save_btn_2"
                                        class="btn btn-warning" id="save_btn_2">
                                        حفظ ومتابعة
                                        
                                    </button>


                                </div>
                            </form>
                        </section>

                        <h3>ملخص المصاريف الادارية</h3>
                        <section>
                            <h4 class="mb-4"><strong>ملخص المصاريف الادارية</strong></h4>
                            <div class="row" id="table_expenses">


                            </div>
                            <br>
                            <div class="row" id="table_expenses_incremental">


                            </div>
                            <br>
                            <div class="row" id="table_expenses_details">


                            </div>
                            <br>
                            <div class="d-flex justify-content-between">

                                <button type="button" value="السابق" name="previous_2" class="btn btn-warning"
                                    id="previous_2">
                                    السابق
                                </button>
                                <button type="button" style="float: left" value="التالي" name="next_btn"
                                    class="btn btn-warning" id="next_btn">
                                    التالي
                                </button>

                            </div>

                        </section>
                        <h3> الايجارات </h3>

                        <section id="forms_3">
                            <h4 class="mb-4"><strong>الايجارات</strong></h4>
                            <form id="form_3" name="form_3" class="form-horizontal">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="project_id" value="1">
                                <div class="d-flex">
                                    <input type="checkbox" name="no_rent" id="no_rent" value="1"
                                        class="no_rent"><strong style="margin-right: 10px !important;"> لا يوجد ايجارات في
                                        هذه الدراسة </strong>
                                </div>
                                <hr>
                                <div id="div_rent">
                                    <div class="inner-repeater mb-4">
                                        <div data-repeater-list="inner-group" class="inner mb-4">
                                            <div class="mb-2 row ">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="rent_type"><strong>إدخال قيمة
                                                                الإيجارات</strong> <i class="fa fa-lightbulb-o"
                                                                aria-hidden="true"></i> </label>
                                                        <select class="form-control" name="rent_type" id="rent_type">
                                                            <option selected disabled>اختر</option>
                                                            <option value="1">مبلغ ثابت</option>
                                                            
                                                            <option value="3">تخصيص </option>
                                                        </select>
                                                        <span class="text-danger error-text item_error"></span>
                                                    </div>
                                                </div>
                                                <div class="mb-2 display" id="div_rental_cost">
                                                    <div class="inner-repeater mb-4">
                                                        <div data-repeater-list="inner-group" class="inner mb-4">
                                                            <div class="mb-2 row ">
                                                                <div class="col-lg-6">
                                                                    <label for="rental_cost"><strong>تكلفة
                                                                            الايجارات</strong></label>
                                                                    <div class="mb-2 input-group">
                                                                        <input type="text" name="rental_cost"
                                                                            value="" placeholder="تكلفة الايجارات"
                                                                            onkeypress="return isNumber(event)"
                                                                            class="form-control" id="rental_cost">
                                                                        <span
                                                                            class="text-danger error-text rental_cost_error"></span>
                                                                        <?php if($project->currency == 'ksa'): ?>
                                                                            <button class="btn btn-light"
                                                                                type="button">ر.س</button>
                                                                        <?php else: ?>
                                                                            <button class="btn btn-light" type="button">
                                                                                <i
                                                                                    class="mdi mdi-currency-usd"></i></button>
                                                                        <?php endif; ?>

                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="rental_cost"><strong>نسبة
                                                                            النمو</strong></label>
                                                                    <div class="mb-2 input-group">
                                                                        <input type="text" name="growth_rate_rent"
                                                                            class="form-control <?php $__errorArgs = ['growth_rate_rent'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                            id="growth_rate_rent"
                                                                            placeholder="نسبة النمو "
                                                                            aria-label="growth_rate_rent">
                                                                        <button class="btn btn-light" type="button"><i
                                                                                class="mdi mdi-percent"></i></button>
                                                                        <span
                                                                            class="text-danger error-text growth_rate_rent_error"></span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>
                                                <div class="display" id="rent_custom">
                                                    <label for="verticalnav-pancard-input"><strong>جدول تفصيلي
                                                            للبنود</strong></label>
                                                    <table class="table table-bordered"
                                                        style="text-align: center !important" id="rentTable">
                                                        <thead style="background-color: #F4F4F4B2">
                                                            <tr>
                                                                <th class="align-middle"> البند </th>
                                                                <th class="align-middle">القيمة السنوية </th>
                                                                <th class="align-middle">نسبة النمو </th>
                                                                <th class="align-middle"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbodyRentTable">
                                                            <tr>
                                                                <td style="width: 29%"><input type="text"
                                                                        name="title[]" class="form-control"
                                                                        id="title" aria-label="title">
                                                                </td>
                                                                <td style="width: 29%">

                                                                    <input type="text" name="value_rent[]"
                                                                        class="form-control" id="value_rent">

                                                </div>
                                                </td>
                                                <td style="width: 29%">
                                                    <div class="mb-3 input-group">
                                                        <input type="text" name="growth_rent[]" class="form-control"
                                                            id="growth_rent" aria-label="growth_rent">
                                                        <button class="btn btn-light" type="button"><i
                                                                class="mdi mdi-percent"></i></button>
                                                </td>

                                                <td style="width: 13%">
                                                    <button class="text-danger rounded-circle" type="button"
                                                        id="delete_income_expenses_item"
                                                        style="cursor: pointer; background: none; border: none;">
                                                        <i class="mdi mdi-delete font-size-20"></i></button>
                                                </td>
                                                </tr>
                                                </tbody>
                                                </table>
                                                <button type="button" value="اضافة" name="add_td_rent"
                                                    class="btn btn-warning" id="add_td_rent">
                                                    اضافة
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" value="السابق" name="previous_3" class="btn btn-warning"
                            id="previous_3">
                            السابق
                        </button>
                        <button style="float: left" type="button" value="حفظ والتالي" name="save_btn_3"
                            class="btn btn-warning" id="save_btn_3">
                            حفظ ومتابعة
                        </button>
                    </div>
                    </form>
                    </section>

                    
                    <h3>ملخص الايجارات</h3>
                    <section>
                        <h4 class="mb-4"><strong>ملخص الايجارات</strong></h4>
                        <div class="row" id="table_rent">


                        </div>
                        <br>
                        <div class="row" id="table_rent_details">

                        </div>
                        <br>
                        <div class="d-flex justify-content-between">

                            <button type="button" value="السابق" name="previous_4" class="btn btn-warning"
                                id="previous_4">
                                السابق
                            </button>
                            <button type="button" style="float: left" value="التالي" name="next_btn_2"
                                class="btn btn-warning" id="next_btn_2">
                                التالي
                            </button>

                        </div>

                    </section>
                    <h3> المرافق </h3>

                    <section id="forms_2">
                        <h4 class="mb-4"><strong>المرافق </strong></h4>
                        <form id="form_6" name="form_6" class="form-horizontal">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="project_id" value="1">

                            <div class="d-flex">
                                <input type="checkbox" name="no_utilities" id="no_utilities" value="1"
                                    class="no_utilities"><strong style="margin-right: 10px !important;"> لا يوجد ايجارات
                                    في
                                    هذه الدراسة </strong>
                            </div>
                            <hr>
                            <div id="div_utilities">
                                <div class="inner-repeater mb-4">
                                    <div data-repeater-list="inner-group" class="inner mb-4">
                                        <div class="mb-2 row ">


                                            <div id="utilities_custom">
                                                <label for="verticalnav-pancard-input"><strong>جدول تفصيلي
                                                        للبنود</strong></label>
                                                <table class="table table-bordered" style="text-align: center !important"
                                                    id="utilitiesTable">
                                                    <thead style="background-color: #F4F4F4B2">
                                                        <tr>
                                                            <th class="align-middle"> البند </th>
                                                            <th class="align-middle">القيمة السنوية </th>
                                                            <th class="align-middle"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbodyUtilitiesTable">
                                                        <tr>
                                                            <td style="width: 29%"><input type="text"
                                                                    name="title_utilities[]" class="form-control"
                                                                    id="title_utilities" aria-label="title_utilities">
                                                            </td>
                                                            <td style="width: 29%"><input type="text"
                                                                    name="value_utilities[]" class="form-control"
                                                                    id="value_utilities" aria-label="value_utilities">
                                                            </td>
                                                            <td style="width: 13%">
                                                                <button class="text-danger rounded-circle" type="button"
                                                                    id="delete_utilities_item"
                                                                    style="cursor: pointer; background: none; border: none;">
                                                                    <i class="mdi mdi-delete font-size-20"></i></button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <button type="button" value="اضافة" name="add_td_utilities"
                                                    class="btn btn-warning" id="add_td_utilities">
                                                    اضافة
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" value="السابق" name="previous_5" class="btn btn-warning"
                                    id="previous_5">
                                    السابق
                                </button>
                                <button style="float: left" type="button" value="حفظ والتالي" name="save_btn_6"
                                    class="btn btn-warning" id="save_btn_6">
                                    حفظ ومتابعة
                                </button>
                            </div>
                        </form>
                    </section>
                    <h3>نسبة نمو المرافق</h3>
                    <section id="forms_7">
                        <h4 class="mb-4"><strong>نسبة نمو المرافق</strong></h4>
                        <form id="form_7" name="form_7" class="form-horizontal">
                            
                            <label for="verticalnav-pancard-input"><strong>نسبة نمو المرافق</strong></label>
                            <div class="mb-3 price input-group">
                                <input type="text" name="one_value_incremental_utilities" class="form-control"
                                    id="verticalnav-pancard-input">
                                <span class="text-danger error-text one_value_incremental_utilities_error"></span>
                                <button class="btn btn-light" type="button"><i class="mdi mdi-percent"></i></button>
                            </div>
                            <button type="button" value="حفظ ومتابعة ->" name="value_utilities_button"
                                style="    font-size: 17px;
                                        background: none;
                                        border: none;
                                        color: rgb(249 170 28);"
                                class="" id="value_utilities_button">
                                تخصيص نسبة النمو +
                            </button>


                            <div class="row">

                                <div class="accordion" id="accordionExampleUtilities">

                                </div>
                            </div>
                            <br>
                            <br>

                            <div class="d-flex justify-content-between">
                                <button type="button" value="السابق" name="previous_6" class="btn btn-warning"
                                    id="previous_6">
                                    السابق
                                </button>
                                <button style="float: left" type="button" value="حفظ والتالي" name="save_btn_7"
                                    class="btn btn-warning" id="save_btn_7">
                                    حفظ ومتابعة
                                    
                                </button>
                            </div>
                        </form>
                    </section>

                    <h3>ملخص المرافق </h3>
                    <section>
                        <h4 class="mb-4"><strong>ملخص المرافق</strong></h4>
                        <div class="row" id="table_utilities">


                        </div>
                        <br>
                        <br>
                        <div class="row" id="table_utilities_details">


                        </div>
                        <br>
                        <br>
                        <div class="d-flex justify-content-between">
                            <button type="button" value="السابق" name="previous_7" class="btn btn-warning"
                                id="previous_7">
                                السابق
                            </button>
                            <button style="float: left" type="button" value="حفظ والتالي" name="next_btn_3"
                                class="btn btn-warning" id="next_btn_3">
                                حفظ ومتابعة
                                
                            </button>
                        </div>
                        <br>
                    </section>
                    <h3>تكلفة البيع والتسويق </h3>
                    <section>
                        <h4 class="mb-4"><strong> تكلفة البيع والتسويق</strong></h4>
                        <form id="form_9" name="form_9" class="form-horizontal">
                            <input type="hidden" value="1" name="project_id" id="project_id">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="inner-repeater mb-4">
                                    <div data-repeater-list="inner-group" class="inner mb-4">
                                        <div data-repeater-item class=" mb-2 row">
                                            <div class="col-lg-6">

                                                <label for="marketing_amount"><strong>مبلغ مخصص للتسويق
                                                        سنوياً</strong></label>
                                                <div class="mb-2 input-group">
                                                    <input type="text" name="marketing_amount" value=""
                                                        class="form-control" id="marketing_amount"
                                                        placeholder="مبلغ مخصص للتسويق سنوياً">
                                                    <span class="text-danger error-text marketing_amount_error"></span>
                                                    <?php if($project->currency == 'ksa'): ?>
                                                        <button class="btn btn-light" type="button">ر.س</button>
                                                    <?php else: ?>
                                                        <button class="btn btn-light" type="button"><i
                                                                class="mdi mdi-currency-usd"></i></button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="marketing_ratio"><strong>نسبة التسويق من
                                                        الايرادات</strong></label>
                                                <div class="mb-3 input-group">
                                                    <input type="text" name="marketing_ratio"
                                                        class="form-control <?php $__errorArgs = ['marketing_ratio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="marketing_ratio" placeholder="نسبة التسويق من الايرادات"
                                                        aria-label="marketing_ratio">
                                                    <button class="btn btn-light" type="button"><i
                                                            class="mdi mdi-percent"></i></button>
                                                    <span class="text-danger error-text expense_ratio_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="marketing_growth_rate"><strong>نسبة نمو تكاليف التسويق
                                                        سنويا</strong></label>
                                                <div class="mb-3 input-group">
                                                    <input type="text" name="marketing_growth_rate"
                                                        class="form-control <?php $__errorArgs = ['marketing_growth_rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="marketing_growth_rate"
                                                        placeholder="نسبة نمو تكاليف التسويق  سنويا"
                                                        aria-label="marketing_growth_rate">
                                                    <button class="btn btn-light" type="button"><i
                                                            class="mdi mdi-percent"></i></button>
                                                    <span
                                                        class="text-danger error-text marketing_growth_rate_error"></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="button" value="السابق" name="previous_8" class="btn btn-warning"
                                    id="previous_8">
                                    السابق
                                </button>
                                <button style="float: left" type="button" value="حفظ والتالي" name="save_btn_9"
                                    class="btn btn-warning" id="save_btn_9">
                                    حفظ ومتابعة
                                    
                                </button>
                            </div>
                        </form>
                    </section>

                    <h3> ملخص تكلفة البيع والتسويق</h3>
                    <section>
                        <h4 class="mb-4"><strong>ملخص تكلفة البيع والتسويق</strong></h4>
                        <div class="row" id="table_marketing">


                        </div>
                        <br>
                        <div class="row" id="table_marketing_details">


                        </div>
                        <br>
                        <div class="d-flex justify-content-between">
                            <button type="button" value="السابق" name="previous_9" class="btn btn-warning"
                                id="previous_9">
                                السابق
                            </button>
                            <button style="float: left" type="button" value="حفظ والتالي" name="next_btn_4"
                                class="btn btn-warning" id="next_btn_4">
                                حفظ ومتابعة
                                
                            </button>
                        </div>
                        <br>
                    </section>
                    <h3> مصاريف أخرى</h3>
                    <section>
                        <h4 class="mb-4"><strong>مصاريف أخرى</strong></h4>
                        <div class="row">
                            <div class="inner-repeater mb-4">
                                <div data-repeater-list="inner-group" class="inner mb-4">
                                    <form id="form_10" name="form_10" class="form-horizontal">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="project_id" value="1">
                                        <table class="table table-bordered" style="text-align: center !important"
                                            id="otherTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="align-middle"> البند </th>
                                                    <th class="align-middle">القيمة </th>
                                                    <th class="align-middle">العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyOtherTable">
                                                <tr>
                                                    <td><input type="text" name="title[]" class="form-control"
                                                            id="value" aria-label="value"></td>
                                                    <td><input type="text" name="value[]" class="form-control"
                                                            id="value" aria-label="value"></td>
                                                    <td> <button class="text-danger rounded-circle" type="button"
                                                            id="delete_value"
                                                            style="cursor: pointer; background: none; border: none;">
                                                            <i class="mdi mdi-delete font-size-20"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" value="اضافة" name="add_td_other"
                                            class="btn btn-warning" id="add_td_other">
                                            اضافة
                                        </button>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" value="السابق" name="previous_10" class="btn btn-warning"
                                id="previous_10">
                                السابق
                            </button>
                            <button type="button" style="float: left" value="حفظ ومتابعة" name="save_btn_10"
                                class="btn btn-warning" id="save_btn_10">
                                حفظ ومتابعة
                                
                            </button>
                        </div>
                        </form>
                    </section>

                    <h3> نسبة نمو مصاريف أخرى</h3>
                    <section>
                        <h4 class="mb-4"><strong>نسبة نمو مصاريف أخرى </strong></h4>

                         <form id="form_11" name="form_11" class="form-horizontal">
                            
                            <label for="verticalnav-pancard-input"><strong>نسبة نمو الايرادات</strong></label>
                            <div class="mb-3 price input-group">
                                <input type="text" name="one_value_incremental_other_expenses"
                                    class="form-control"
                                    id="verticalnav-pancard-input">
                                <span class="text-danger error-text value_other_expenses_error"></span>
                                <button class="btn btn-light" type="button"><i class="mdi mdi-percent"></i></button>
                            </div>
                            <button type="button" value="حفظ ومتابعة ->" name="value_other_expenses_button"
                                style="    font-size: 17px;
                                    background: none;
                                    border: none;
                                    color: rgb(249 170 28);"
                                class="" id="value_other_expenses_button">
                                تخصيص نسبة النمو +
                            </button>


                            <div class="row">

                                <div class="accordion" id="accordionExampleOtherExpenses">

                                </div>
                            </div>
                            <br>
                            <br>
                <div class="d-flex justify-content-between">
                                                    <button type="button" value="السابق" name="previous_11" class="btn btn-warning"
                                                        id="previous_11">
                                                        السابق
                                                    </button>
                                                    <button style="float: left" type="button" value="حفظ والتالي" name="save_btn_11"
                                                        class="btn btn-warning" id="save_btn_11">
                                                        حفظ ومتابعة
                                                        
                                                    </button>


                                                </div>

                        </form>


                    </section>
                    <h3> ملخص مصاريف أخرى</h3>
                    <section>
                        <h4 class="mb-4"><strong>ملخص مصاريف أخرى </strong></h4>
                        <div class="row" id="table_other_incremental">


                        </div>
                        <br>
                        <div class="row" id="table_other_details">


                        </div>
                        <br>
                            <div class="d-flex justify-content-between">
                                <button type="button" value="السابق" name="previous_12" class="btn btn-warning"
                                    id="previous_12">
                                    السابق
                                </button>
                                <button type="button" style="float: left" value="حفظ ومتابعة" name="next_btn_5"
                                    class="btn btn-warning" id="next_btn_5">
                                    حفظ ومتابعة
                                    
                                </button>
                            </div>

                    </section>
                    <h3> ملخص المصاريف الادارية والعمومية</h3>
                    <section>
                        <h4 class="mb-4"><strong> ملخص المصاريف الادارية والعمومية</strong></h4>

                        <form id="form_13" name="form_13" class="form-horizontal">
                            <div class="row" id="table_all_details">


                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="button" value="السابق" name="previous_13" class="btn btn-warning"
                                    id="previous_13">
                                    السابق
                                </button>
                                <button type="button" style="float: left" value="حفظ ومتابعة" name="save_btn_13"
                                    class="btn btn-warning" id="save_btn_13">
                                    حفظ ومتابعة
                                    
                                </button>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
    <!-- form wizard init -->
    <script src="<?php echo e(asset('assets/js/pages/form-wizard.init.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/jquery-steps/jquery-steps.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#vertical-example-t-0').parent().attr('class', 'current');
            $('#administrative_expenses_type').on('change', function(e) {
                let val = $("#administrative_expenses_type option:selected").val();
                if (val == 1) {
                    $("#expense_amount_div").removeClass('display');
                    $("#expense_ratio_div").addClass('display');
                    $("#expenseTable_div").addClass('display');
                }
                if (val == 2) {
                    $("#expense_amount_div").addClass('display');
                    $("#expense_ratio_div").removeClass('display');
                    $("#expenseTable_div").addClass('display');
                }
                if (val == 3) {
                    $("#expense_amount_div").addClass('display');
                    $("#expense_ratio_div").addClass('display');
                    $("#expenseTable_div").removeClass('display');
                }
            })
            $('#rent_type').on('change', function(e) {
                let val = $("#rent_type option:selected").val();
                if (val == 1) {
                    $("#div_rental_cost").removeClass('display');
                    $("#div_growth_rate").addClass('display');
                    $("#rent_custom").addClass('display');
                }
                if (val == 2) {
                    $("#div_rental_cost").addClass('display');
                    $("#div_growth_rate").removeClass('display');
                    $("#rent_custom").addClass('display');
                }
                if (val == 3) {
                    $("#div_rental_cost").addClass('display');
                    $("#div_growth_rate").addClass('display');
                    $("#rent_custom").removeClass('display');
                }
            })
            $('#utilities_type').on('change', function(e) {
                let val = $("#utilities_type option:selected").val();
                if (val == 1) {
                    $("#div_utilities_cost").removeClass('display');
                    $("#utilities_custom").addClass('display');
                }
                if (val == 3) {
                    $("#div_utilities_cost").addClass('display');
                    $("#utilities_custom").removeClass('display');
                }
            })
            $('#no_rent').on('change', function(e) {
                if ($('#no_rent').is(":checked")) {
                    $('#div_rent').addClass('display');
                } else {
                    $('#div_rent').removeClass('display');
                }
            })
            $('#no_utilities').on('change', function(e) {
                if ($('#no_utilities').is(":checked")) {
                    $('#div_utilities').addClass('display');
                } else {
                    $('#div_utilities').removeClass('display');
                }
            })

            $('#previous_1').click(function(e) {
                $('#vertical-example-p-0').removeAttr('style');
                $('#vertical-example-t-0').parent().attr('class', 'current');
                $('#vertical-example-p-1').attr('style', 'display:none');
                $('#vertical-example-t-1').parent().removeClass('current');

            });

            $('#previous_2').click(function(e) {
                $('#vertical-example-p-1').removeAttr('style');
                $('#vertical-example-t-1').parent().attr('class', 'current');
                $('#vertical-example-p-2').attr('style', 'display:none');
                $('#vertical-example-t-2').parent().removeClass('current');

            });

            $('#previous_3').click(function(e) {
                $('#vertical-example-p-2').removeAttr('style');
                $('#vertical-example-t-2').parent().attr('class', 'current');
                $('#vertical-example-p-3').attr('style', 'display:none');
                $('#vertical-example-t-3').parent().removeClass('current');

            });

            $('#previous_4').click(function(e) {
                $('#vertical-example-p-3').removeAttr('style');
                $('#vertical-example-t-3').parent().attr('class', 'current');
                $('#vertical-example-p-4').attr('style', 'display:none');
                $('#vertical-example-t-4').parent().removeClass('current');
            });

            $('#previous_5').click(function(e) {
                $('#vertical-example-p-4').removeAttr('style');
                $('#vertical-example-t-4').parent().attr('class', 'current');
                $('#vertical-example-p-5').attr('style', 'display:none');
                $('#vertical-example-t-5').parent().removeClass('current');
            });

            $('#previous_6').click(function(e) {
                $('#vertical-example-p-5').removeAttr('style');
                $('#vertical-example-t-5').parent().attr('class', 'current');
                $('#vertical-example-p-6').attr('style', 'display:none');
                $('#vertical-example-t-6').parent().removeClass('current');
            });
            $('#previous_7').click(function(e) {
                $('#vertical-example-p-6').removeAttr('style');
                $('#vertical-example-t-6').parent().attr('class', 'current');
                $('#vertical-example-p-7').attr('style', 'display:none');
                $('#vertical-example-t-7').parent().removeClass('current');
            });
            $('#previous_8').click(function(e) {
                $('#vertical-example-p-7').removeAttr('style');
                $('#vertical-example-t-7').parent().attr('class', 'current');
                $('#vertical-example-p-8').attr('style', 'display:none');
                $('#vertical-example-t-8').parent().removeClass('current');
            });
            $('#previous_9').click(function(e) {
                $('#vertical-example-p-8').removeAttr('style');
                $('#vertical-example-t-8').parent().attr('class', 'current');
                $('#vertical-example-p-9').attr('style', 'display:none');
                $('#vertical-example-t-9').parent().removeClass('current');
            });
            $('#previous_10').click(function(e) {
                $('#vertical-example-p-9').removeAttr('style');
                $('#vertical-example-t-9').parent().attr('class', 'current');
                $('#vertical-example-p-10').attr('style', 'display:none');
                $('#vertical-example-t-10').parent().removeClass('current');
            });
            $('#previous_11').click(function(e) {
                $('#vertical-example-p-10').removeAttr('style');
                $('#vertical-example-t-10').parent().attr('class', 'current');
                $('#vertical-example-p-11').attr('style', 'display:none');
                $('#vertical-example-t-11').parent().removeClass('current');
            });
            $('#previous_12').click(function(e) {
                $('#vertical-example-p-11').removeAttr('style');
                $('#vertical-example-t-11').parent().attr('class', 'current');
                $('#vertical-example-p-12').attr('style', 'display:none');
                $('#vertical-example-t-12').parent().removeClass('current');
            });
            $('#previous_13').click(function(e) {
                $('#vertical-example-p-12').removeAttr('style');
                $('#vertical-example-t-12').parent().attr('class', 'current');
                $('#vertical-example-p-13').attr('style', 'display:none');
                $('#vertical-example-t-13').parent().removeClass('current');
            });

            $('#next_btn').click(function(e) {
                $('#vertical-example-p-2').attr('style', 'display:none');
                $('#vertical-example-p-3').removeAttr('style');
                $('#vertical-example-t-2').parent().removeClass('current');
                $('#vertical-example-t-3').parent().attr('class', 'current');

            });

            $('#next_btn_2').click(function(e) {
                $('#vertical-example-p-4').attr('style', 'display:none');
                $('#vertical-example-p-5').removeAttr('style');
                $('#vertical-example-t-4').parent().removeClass('current');
                $('#vertical-example-t-5').parent().attr('class', 'current');

            });
            $('#next_btn_3').click(function(e) {
                $('#vertical-example-p-7').attr('style', 'display:none');
                $('#vertical-example-p-8').removeAttr('style');
                $('#vertical-example-t-7').parent().removeClass('current');
                $('#vertical-example-t-8').parent().attr('class', 'current');

            });
            $('#next_btn_4').click(function(e) {
                $('#vertical-example-p-9').attr('style', 'display:none');
                $('#vertical-example-p-10').removeAttr('style');
                $('#vertical-example-t-9').parent().removeClass('current');
                $('#vertical-example-t-10').parent().attr('class', 'current');

            });
            $('#next_btn_5').click(function(e) {
                fetchAllDetails();
                $('#vertical-example-p-12').attr('style', 'display:none');
                $('#vertical-example-p-13').removeAttr('style');
                $('#vertical-example-t-12').parent().removeClass('current');
                $('#vertical-example-t-13').parent().attr('class', 'current');

            });
            $('#save_btn_12').click(function(e) {
                $('#vertical-example-p-12').attr('style', 'display:none');
                $('#vertical-example-p-13').removeAttr('style');
                $('#vertical-example-t-12').parent().removeClass('current');
                $('#vertical-example-t-13').parent().attr('class', 'current');

            });

            $('#save_btn_1').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo e(route('project_administrative_expenses.store',$project->id)); ?>",
                    method: 'post',
                    data: new FormData(form_1),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            toastr.success("تمت العملية بنجاح", "تم تخزين  النسبة البيانات بنجاح");
                            $('#vertical-example-p-0').attr('style', 'display:none');
                            $('#vertical-example-p-1').removeAttr('style');
                            $('#vertical-example-t-0').parent().removeClass('current');
                            $('#vertical-example-t-1').parent().attr('class', 'current');


                        } else {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                    }
                });
            });
            $('#save_btn_2').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_2').serialize();
                jQuery.ajax({
                    url: "<?php echo e(route('project_fs_general_expenses_incremental',$project->id)); ?>",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function(result) {
                        toastr.success("تمت العملية بنجاح", "تم تخزين  النسبة البيانات بنجاح");
                        $('#vertical-example-p-1').attr('style', 'display:none');
                        $('#vertical-example-p-2').removeAttr('style');
                        $('#vertical-example-t-1').parent().removeClass('current');
                        $('#vertical-example-t-2').parent().attr('class', 'current');
                        fetchExpenses();
                        fetchExpensesDetails();
                        fetchExpensesIncremintal();
                    }
                })
            })
            $('#save_btn_3').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo e(route('project_rent.store',$project->id)); ?>",
                    method: 'post',
                    data: new FormData(form_3),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            toastr.success("تمت العملية بنجاح", "تم تخزين  النسبة البيانات بنجاح");
                            $('#vertical-example-p-3').attr('style', 'display:none');
                            $('#vertical-example-p-4').removeAttr('style');
                            $('#vertical-example-t-3').parent().removeClass('current');
                            $('#vertical-example-t-4').parent().attr('class', 'current');
                            fetchRent();
                            fetchRentDetails();

                        } else {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                    }
                });
            });
            $('#save_btn_4').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_4').serialize();
                jQuery.ajax({
                    url: "<?php echo e(route('project_fs_rent_incremental')); ?>",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            toastr.success("تمت العملية بنجاح", "تم تخزين  النسبة البيانات بنجاح");
                            $('#vertical-example-p-4').attr('style', 'display:none');
                            $('#vertical-example-p-5').removeAttr('style');
                            $('#vertical-example-t-4').parent().removeClass('current');
                            $('#vertical-example-t-5').parent().attr('class', 'current');

                        } else {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                    }
                })
            })
            $('#save_btn_6').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo e(route('project_utilities.store')); ?>",
                    method: 'post',
                    data: new FormData(form_6),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            toastr.success("تمت العملية بنجاح", "تم تخزين  النسبة البيانات بنجاح");
                            $('#vertical-example-p-5').attr('style', 'display:none');
                            $('#vertical-example-p-6').removeAttr('style');
                            $('#vertical-example-t-5').parent().removeClass('current');
                            $('#vertical-example-t-6').parent().attr('class', 'current');


                        } else {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                    }

                });
            });
            $('#save_btn_7').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_7').serialize();
                jQuery.ajax({
                    url: "<?php echo e(route('project_fs_utilities_incremental',$project->id)); ?>",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == 1) {
                        toastr.success("تمت العملية بنجاح", "تم تخزين  النسبة البيانات بنجاح");
                        $('#vertical-example-p-6').attr('style', 'display:none');
                        $('#vertical-example-p-7').removeAttr('style');
                        $('#vertical-example-t-6').parent().removeClass('current');
                        $('#vertical-example-t-7').parent().attr('class', 'current');
                        fetchUtilities();
                        fetchUtilitiesDetails();
                    } else {
                            $.each(result.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        }

                    }
                })
            })
            $('#save_btn_9').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo e(route('project_selling_marketing.store')); ?>",
                    method: 'post',
                    data: new FormData(form_9),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(result) {
                        if (result.status == 1) {
                        toastr.success("تمت العملية بنجاح", "تم تخزين  النسبة البيانات بنجاح");
                        $('#vertical-example-p-8').attr('style', 'display:none');
                        $('#vertical-example-p-9').removeAttr('style');
                        $('#vertical-example-t-8').parent().removeClass('current');
                        $('#vertical-example-t-9').parent().attr('class', 'current');
                        fetchMarketnig();
                        fetchMarketnigDetails();
                    } else {
                            $.each(result.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                    }

                });


            });
            $('#save_btn_10').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo e(route('project_other_expenses.store')); ?>",
                    method: 'post',
                    data: new FormData(form_10),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            toastr.success("تمت العملية بنجاح", "تم تخزين  النسبة البيانات بنجاح");
                            $('#vertical-example-p-10').attr('style', 'display:none');
                            $('#vertical-example-p-11').removeAttr('style');
                            $('#vertical-example-t-10').parent().removeClass('current');
                            $('#vertical-example-t-11').parent().attr('class', 'current');



                        } else {
                            $.each(result.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                    }
                });
            });

            $('#save_btn_11').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_11').serialize();
                jQuery.ajax({
                    url: "<?php echo e(route('project_fs_other_expenses_incremental',$project->id)); ?>",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == 1) {
                        toastr.success("تمت العملية بنجاح", "تم تخزين  النسبة البيانات بنجاح");
                        $('#vertical-example-p-11').attr('style', 'display:none');
                        $('#vertical-example-p-12').removeAttr('style');
                        $('#vertical-example-t-11').parent().removeClass('current');
                        $('#vertical-example-t-12').parent().attr('class', 'current');
                        fetchOtherIncremintal();
                        fetchOtherDetails();

                    } else {
                            $.each(result.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                    }
                })
            })
            function fetchExpenses() {
                let id = $('#project_id').val();
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('fetch_administrative_expenses',$project->id)); ?>",
                    data: {id: id},
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('#table_expenses').html("");
                        $('#table_exp').remove();
                            if (response.data.type == 'ratio') {
                                    $('#table_expenses').append('<div class="row" id="table_exp">\
                                        <table class="GeneratedTable" id="incremental_summry_table">\
                                            <thead>\
                                                <tr>\
                                                    <th>البند</th>\
                                                    <th>القيمة</th>\
                                                    <th>الايرادات</th>\
                                                    <th>الاجمالي</th>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="view_incremental_data">\
                                                    <th id="title_expenses">المصاريف الادارية</th>\
                                                    <th id="th_expenses1">'+response.data.value+'</th>\
                                                    <th id="th_expenses2"><?php echo e(incomeData($project->id)['totleIncomeToEndYear']); ?></th>\
                                                    <th id="total_expenses">'+(response.data.value /100) * <?php echo e(incomeData($project->id)['totleIncomeToEndYear']); ?> +'</th>\
                                            </tbody>\
                                        </table></div>');
                            }
                            if (response.data.type == 'amount') {
                                    $('#table_expenses').append('<div class="row" id="table_exp">\
                                        <table class="GeneratedTable" id="incremental_summry_table">\
                                            <thead>\
                                                <tr>\
                                                    <th>البند</th>\
                                                    <th>القيمة</th>\
                                                    <th>الايرادات</th>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="view_incremental_data">\
                                                    <th id="title_expenses">المصاريف الادارية</th>\
                                                    <th id="th_expenses1">'+response.data.value+'</th>\
                                                    <th id="th_expenses2"><?php echo e(incomeData($project->id)['totleIncomeToEndYear']); ?></th>\
                                            </tbody>\
                                        </table></div>');
                            }
                            if (response.data.type == 'custom') {
                                $('#table_expenses').append('<div class="row" id="table_exp">\
                                        <table class="GeneratedTable" id="expenses_custom">\
                                            <thead>\
                                                <tr style="background:#F5F5F5">\
                                                    <th>البند</th>\
                                                    <th>القيمة</th>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="expenses_custom_tbody">\
                                            </tbody>\
                                            ');
                                            let sum = 0;
                                $.each(response.item, function(prefix, val) {
                                $('#expenses_custom_tbody').append('\
                                                    <tr><th id="title_expenses">'+val.expensis_type+'</th>\
                                                    <th class="th_expenses1" id="th_expenses1">'+val.value+'</th><tr>\
                                                    ');
                                                    sum+= val.value;
                                                });
                                $('#expenses_custom_tbody').append('\
                                                    <tr style="background: #F9AA1C;"><th id="title_expenses">الاجمالي</th>\
                                                    <th>'+sum+'</th><tr>\
                                            ');
                        };

                    }
                });
            }
            function fetchExpensesIncremintal() {
                let id = $('#project_id').val();
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('fetch_administrative_expenses_incremintal',$project->id)); ?>",
                    data: {id: id},
                    dataType: "json",
                    success: function (response) {
                        $('#table_expenses_incremental').html("");
                                $('#table_expenses_incremental').append('<div class="row" id="table_exp">\
                                        <table class="GeneratedTable" id="expenses_incremental">\
                                            <thead>\
                                                <tr style="background:#F5F5F5">\
                                                    <th>السنة / البند</th>\
                                                    <th>نسبة النمو في قيمة الإيراد</th>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="expenses_incremental_tbody">\
                                            </tbody>\
                                            ');
                                            let sum = 0;
                                $.each(response.data, function(prefix, val) {
                                $('#expenses_incremental_tbody').append('\
                                                    <tr><th id="title_expenses">'+val.year+'</th>\
                                                    <th class="th_expenses1" id="th_expenses1">'+val.incremental+' %</th><tr>\
                                                    ');
                                                    sum+= val.incremental;
                                                });
                                $('#expenses_incremental_tbody').append('\
                                                    <tr style="background: #F9AA1C;"><th id="title_expenses">الاجمالي</th>\
                                                    <th>'+sum+'%</th><tr>\
                                            ');

                    }
                });
            }
            function fetchOtherIncremintal() {
                let id = $('#project_id').val();
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('fetch_other_incremintal',$project->id)); ?>",
                    data: {id: id},
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        $('#table_other_incremental').html("");
                                $('#table_other_incremental').append('<div class="row" id="table_exp">\
                                        <table class="GeneratedTable" id="other_incremental">\
                                            <thead>\
                                                <tr style="background:#F5F5F5">\
                                                    <th>السنة / البند</th>\
                                                    <th>نسبة النمو في قيمة الإيراد</th>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="other_incremental_tbody">\
                                            </tbody>\
                                            ');
                                            let sum = 0;
                                $.each(response.data, function(prefix, val) {
                                    console.log(response);
                                $('#other_incremental_tbody').append('\
                                                    <tr><th id="title_expenses">'+val.year+'</th>\
                                                    <th class="th_expenses1" id="th_expenses1">'+val.incremental+' %</th><tr>\
                                                    ');
                                                    sum+= val.incremental;
                                                });
                                $('#other_incremental_tbody').append('\
                                                    <tr style="background: #F9AA1C;"><th id="title_expenses">الاجمالي</th>\
                                                    <th>'+sum+' %</th><tr>\
                                            ');

                    }
                });
            }
            function fetchOtherDetails() {
                let id = $('#project_id').val();
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('fetch_other_details',$project->id)); ?>",
                    data: {id: id},
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('#table_other_details').html("");
                                $('#table_other_details').append('<div class="row" id="table_oth_details">\
                                        <table class="GeneratedTable" id="table_oth_details_table">\
                                            <thead>\
                                                <tr style="background-color:#F5F5F5">\
                                                    <th>السنة</th>\
                                                    <td>' + response.year + '</td>\
                                                    <?php $__currentLoopData = years($project->id)['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                                                    <td>' + <?php echo e($year); ?> + '</td>\
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="view_other_data">\
                                            </tbody>\
                                        </table>\
                                    </div>');
                                    // $.each(response.item, function(prefix, val) {
                                        // console.log(response);
                                    $('#view_other_data').append('<tr>\
                                                    <th id="title_other">مصاريف اخرى</th>\
                                                    <th id="th_other_a">'+formatter.format(response.current_value)+'</th>\
                                                    <th id="th_other_b">'+formatter.format(response.prev)+'</th>\
                                                    <th id="th_other_c">'+formatter.format(response.nxt1)+'</th>\
                                                    <th id="th_other_d">'+formatter.format(response.nxt2)+'</th>\
                                                    <th id="th_other_e">'+formatter.format(response.nxt3)+'</th>\
                                                    <th id="th_other_f">'+formatter.format(response.nxt4)+'</th>\
                                            </tr>')
                                        // });

                    }
                });
            }
            function fetchExpensesDetails() {
                let id = $('#project_id').val();
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('fetch_administrative_expenses',$project->id)); ?>",
                    data: {id: id},
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('#table_expenses_details').html("");
                                // $.each(response.data, function(prefix, val) {
                                $('#table_expenses_details').append('<div class="row" id="table_exp">\
                                        <table class="GeneratedTable" id="incremental_summry_table">\
                                            <thead>\
                                                <tr style="background-color:#F5F5F5">\
                                                    <th>السنة</th>\
                                                    <td>' + response.year + '</td>\
                                                    <?php $__currentLoopData = years($project->id)['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                                                    <td>' + <?php echo e($year); ?> + '</td>\
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="view_incremental_data">\
                                            <tr>\
                                                    <th id="title_expenses">مصاريف الإدارية</th>\
                                                    <th id="th_expenses_a">' + formatter.format(response.current_value) + '</th>\
                                                    <th id="th_expenses_b">' + formatter.format(response.prev) + '</th>\
                                                    <th id="th_expenses_c">' + formatter.format(response.nxt1) + '</th>\
                                                    <th id="th_expenses_d">' + formatter.format(response.nxt2) + '</th>\
                                                    <th id="th_expenses_e">' + formatter.format(response.nxt3) + '</th>\
                                                    <th id="th_expenses_f">' + formatter.format(response.nxt4) + '</th>\
                                            </tr>\
                                            <tr>\
                                                    <th id="title_expenses">الإيرادات</th>\
                                                    <th id="th_expenses1"><?php echo e(incomeData($project->id)['totleIncomeToEndYear']); ?></th>\
                                                            <?php $__currentLoopData = incomeData($project->id)['totleYear']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totleYears): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                                                            <th id="th_expenses1">' + formatter.format(<?php echo e($totleYears); ?>)+ '</th>\
                                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                                            </tr>\
                                            <tr>\
                                                    <th id="title_expenses">نسبة مصاريف إدارية<br> من الإيرادات</th>\
                                                    <th id="th_expenses1">' + formatter.format(response.current) + ' %</th>\
                                                    <th id="th_expenses2">' + formatter.format(response.pre) + ' %</th>\
                                                    <th id="total_expenses">' + formatter.format(response.next1) + '%</th>\
                                                    <th id="total_expenses">' + formatter.format(response.next2) + '%</th>\
                                                    <th id="total_expenses">' + formatter.format(response.next3) + '%</th>\
                                                    <th id="total_expenses">' + formatter.format(response.next4) + '%</th>\
                                            </tr>\
                                            </tbody>\
                                        </table>\
                                    </div>');
                            // });
                    }
                });
            }

            function fetchRent() {
                let id = $('#project_id').val();
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('fetch_rent',$project->id)); ?>",
                    data: {id: id},
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('#table_rent').html();
                        $('#table_ren').remove();
                            if (response.data.type == 'amount') {
                                    $('#table_rent').append('<div class="row" id="table_ren">\
                                        <table class="GeneratedTable" id="incremental_summry_table">\
                                            <thead>\
                                                <tr>\
                                                    <th>البند</th>\
                                                    <th>القيمة</th>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="view_incremental_data">\
                                                    <th id="title_expenses">'+response.data.value+'</th>\
                                                    <th id="th_expenses1">'+response.data.growth_rate_rent+'</th>\
                                            </tbody>\
                                        </table></div>');
                            }
                            if (response.data.type == 'custom') {
                                $('#table_rent').append('<div class="row" id="table_ren">\
                                        <table class="GeneratedTable" id="rent_custom">\
                                            <thead>\
                                                <tr style="background:#F5F5F5">\
                                                    <th>البند</th>\
                                                    <th>القيمة</th>\
                                                    <th>نسبة النمو</th>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="rent_custom_tbody">\
                                            </tbody>\
                                            ');
                                            let sum = 0;
                                $.each(response.item, function(prefix, val) {
                                $('#rent_custom_tbody').append('\
                                                    <tr><th id="title_rent">'+val.title+'</th>\
                                                    <th class="th_rent1" id="th_rent1">'+val.value+'</th>\
                                                    <th class="th_rent2" id="th_rent2">'+val.growth_rent+'</th><tr>\
                                                    ');
                                                    sum+= val.value;
                                                });
                                $('#rent_custom_tbody').append('\
                                                    <tr style="background: #F9AA1C;"><th id="title_rent">الاجمالي</th>\
                                                    <th>'+sum+'</th>\
                                                    <th></th>\
                                                    <tr>\
                                            ');
                            };

                    }
                });
            }

            function fetchRentDetails() {
                let id = $('#project_id').val();
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('fetch_rent_details',$project->id)); ?>",
                    data: {id: id},
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('#table_rent_details').html("");
                                // $.each(response.data, function(prefix, val) {
                            if(response.data.type == "amount"){
                                $('#table_rent_details').append('<div class="row" id="table_exp">\
                                        <table class="GeneratedTable" id="incremental_summry_table">\
                                            <thead>\
                                                <tr style="background-color:#F5F5F5">\
                                                    <th>السنة</th>\
                                                    <td>' + response.year + '</td>\
                                                    <?php $__currentLoopData = years($project->id)['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                                                    <td>' + <?php echo e($year); ?> + '</td>\
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="view_incremental_data">\
                                            <tr>\
                                                    <th id="title_expenses">قيمة الايجارات</th>\
                                                    <th id="th_rent_a">' + formatter.format(response.current_value) + '</th>\
                                                    <th id="th_rent_b">' + formatter.format(response.prev) + '</th>\
                                                    <th id="th_rent_c">' + formatter.format(response.nxt1) + '</th>\
                                                    <th id="th_rent_d">' + formatter.format(response.nxt2) + '</th>\
                                                    <th id="th_rent_e">' + formatter.format(response.nxt3) + '</th>\
                                                    <th id="th_rent_f">' + formatter.format(response.nxt4) + '</th>\
                                            </tr>\
                                            <tr>\
                                                    <th id="title_expenses">الإيرادات</th>\
                                                    <th id="th_expenses1"><?php echo e(incomeData($project->id)['totleIncomeToEndYear']); ?></th>\
                                                            <?php $__currentLoopData = incomeData($project->id)['totleYear']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totleYears): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                                                            <th id="th_expenses1">' + formatter.format(<?php echo e($totleYears); ?>)+ '</th>\
                                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                                            </tr>\
                                            <tr>\
                                                    <th id="title_expenses">نسبة الايجارات <br> من الإيرادات</th>\
                                                    <th id="th_expenses1">' + formatter.format(response.current) + ' %</th>\
                                                    <th id="th_expenses2">' + formatter.format(response.pre) + ' %</th>\
                                                    <th id="total_expenses">' + formatter.format(response.next1) + '%</th>\
                                                    <th id="total_expenses">' + formatter.format(response.next2) + '%</th>\
                                                    <th id="total_expenses">' + formatter.format(response.next3) + '%</th>\
                                                    <th id="total_expenses">' + formatter.format(response.next4) + '%</th>\
                                            </tr>\
                                            </tbody>\
                                        </table>\
                                    </div>');
                            }
                            if(response.data.type == "custom"){
                                $('#table_rent_details').append('<div class="row" id="table_ren_details">\
                                        <table class="GeneratedTable" id="table_ren_details_table">\
                                            <thead>\
                                                <tr style="background-color:#F5F5F5">\
                                                    <th>السنة</th>\
                                                    <td>' + response.year + '</td>\
                                                    <?php $__currentLoopData = years($project->id)['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                                                    <td>' + <?php echo e($year); ?> + '</td>\
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="view_rent_data">\
                                                <tr id="view_rent_dataa"></tr>\
                                            </tbody>\
                                        </table>\
                                    </div>');
                                    $.each(response.item, function(prefix, val) {
                                        console.log(response);
                                            $('#view_rent_dataa').after('\
    <tr id="view_rent_dataas">\
        </tr>\
    ');
    $.each(val, function (prefix, i) {
        if(isNaN(i)){
            $('#view_rent_dataas').append('<td>' +i+' </td>');

        }else{
$('#view_rent_dataas').append('<td>' +formatter.format(i)+' </td>');
        }
});
                                        });
                            }
                    }
                });
            }

            function fetchUtilities() {
                let id = $('#project_id').val();
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('fetch_utilities')); ?>",
                    data: {id: id},
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('#table_utilities').html();
                        $('#table_utilit').remove();
                        $('#table_utilities').append('<div class="row" id="table_utilit">\
                                        <table class="GeneratedTable" id="utilities_custom">\
                                            <thead>\
                                                <tr style="background:#F5F5F5">\
                                                    <th>البند</th>\
                                                    <th>القيمة</th>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="utilities_custom_tbody">\
                                            </tbody>\
                                            ');
                                            let sum = 0;
                                $.each(response.item, function(prefix, val) {
                                $('#utilities_custom_tbody').append('\
                                                    <tr><th id="title_rent">'+val.title+'</th>\
                                                    <th class="th_utilities1" id="th_utilities1">'+val.value+'</th>\
                                                    ');
                                                    sum+= val.value;
                                                });
                                $('#utilities_custom_tbody').append('\
                                                    <tr style="background: #413886CC;"><th id="title_rent">الاجمالي</th>\
                                                    <th>'+sum+'</th>\
                                                    <tr>');
                    }
                });
            }
            function fetchUtilitiesDetails() {
                let id = $('#project_id').val();
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('fetch_utilities_details',$project->id)); ?>",
                    data: {id: id},
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('#table_utilities_details').html("");
                                $('#table_utilities_details').append('<div class="row" id="table_utilit_details">\
                                        <table class="GeneratedTable" id="table_utilit_details_table">\
                                            <thead>\
                                                <tr style="background-color:#F5F5F5">\
                                                    <th>السنة</th>\
                                                    <td>' + response.year + '</td>\
                                                    <?php $__currentLoopData = years($project->id)['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                                                    <td>' + <?php echo e($year); ?> + '</td>\
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="view_utilit_data">\
                                            </tbody>\
                                        </table>\
                                    </div>');
                                    // $.each(response.item, function(prefix, val) {
                                        // console.log(response);
                                    $('#view_utilit_data').append('<tr>\
                                                    <th id="title_utilities">المرافق</th>\
                                                    <th id="th_utilities_a">'+formatter.format(response.current_value)+'</th>\
                                                    <th id="th_utilities_b">'+formatter.format(response.prev)+'</th>\
                                                    <th id="th_utilities_c">'+formatter.format(response.nxt1)+'</th>\
                                                    <th id="th_utilities_d">'+formatter.format(response.nxt2)+'</th>\
                                                    <th id="th_utilities_e">'+formatter.format(response.nxt3)+'</th>\
                                                    <th id="th_utilities_f">'+formatter.format(response.nxt4)+'</th>\
                                            </tr>\
                                            <tr>\
                                                    <th id="title_expenses">الإيرادات</th>\
                                                    <th id="th_expenses1"><?php echo e(incomeData($project->id)['totleIncomeToEndYear']); ?></th>\
                                                            <?php $__currentLoopData = incomeData($project->id)['totleYear']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totleYears): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                                                            <th id="th_expenses1">' + formatter.format(<?php echo e($totleYears); ?>)+ '</th>\
                                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                                            </tr>\
                                            <tr>\
                                                    <th id="title_expenses">نسبة المرافق من الإيرادات</th>\
                                                    <th id="th_expenses1">' + formatter.format(response.current) + ' %</th>\
                                                    <th id="th_expenses2">' + formatter.format(response.pre) + ' %</th>\
                                                    <th id="total_expenses">' + formatter.format(response.next1) + '%</th>\
                                                    <th id="total_expenses">' + formatter.format(response.next2) + '%</th>\
                                                    <th id="total_expenses">' + formatter.format(response.next3) + '%</th>\
                                                    <th id="total_expenses">' + formatter.format(response.next4) + '%</th>\
                                            </tr>')
                                        // });

                    }
                });
            }
             function fetchMarketnig() {
                let id = $('#project_id').val();
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('fetch_marketing')); ?>",
                    data: {id: id},
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('#table_marketing').html();
                        $('#table_market').remove();
                        $('#table_marketing_growth_rate').remove();
                                $('#table_marketing').append('<div class="row" id="table_market">\
                                        <table class="GeneratedTable" id="rent_custom">\
                                            <thead>\
                                                <tr style="background:#F5F5F5">\
                                                    <th>البند</th>\
                                                    <th>القيمة</th>\
                                                    <th> المبلغ</th>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="marketing_custom_tbody">\
                                            </tbody>\
                                            ');
                                            let sum = 0;

                                $('#marketing_custom_tbody').append('\
                                                    <tr><th id="title_rent">نسبة التسويق من الإيرادات</th>\
                                                    <th class="th_rent1" id="th_rent1">'+response.marketing_growth_rate+' %</th>\
                                                    <th class="th_rent2" id="th_rent2">'+response.marketing_ratio+'</th><tr>\
                                                    ');

                                $('#marketing_custom_tbody').append('\
                                                    <tr><th id="title_rent">مبلغ مخصص للتسويق</th>\
                                                    <th class="th_rent1" id="th_rent1">'+response.marketing_amount+'</th>\
                                                    <th class="th_rent2" id="th_rent2">'+response.marketing_amount+'</th><tr>\
                                                    ');
                                                    sum+= response.marketing_amount + response.marketing_ratio;


                                $('#marketing_custom_tbody').append('\
                                                    <tr style="background: #3CC0B999;"><th id="title_rent">المجموع</th>\
                                                        <th></th>\
                                                    <th>'+sum+'</th>\
                                                    <tr>\
                                            ');
                                $('#table_marketing').after('<br><br><div class="row" id="table_marketing_growth_rate">\
                                        <table class="GeneratedTable" id="rent_marketing_growth_rate" style="width: 50%; border:none ;margin-right: 25%;">\
                                            <thead style="background: none ; ">\
                                                <tr>\
                                                    <th>نسبة النمو</th>\
                                                    <th>'+response.marketing_growth_rate+' %</th>\
                                                </tr>\
                                            </thead>\
                                            ');
                    }
                });
            }
            function fetchMarketnigDetails() {
                let id = $('#project_id').val();
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('fetch_marketing_details',$project->id)); ?>",
                    data: {id: id},
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('#table_marketing_details').html("");
                                // $.each(response.data, function(prefix, val) {
                                $('#table_marketing_details').append('<div class="row" id="table_market_details">\
                                        <table class="GeneratedTable" id="incremental_summry_table">\
                                            <thead>\
                                                <tr style="background-color:#F5F5F5">\
                                                    <th>السنة</th>\
                                                    <td>' + response.year + '</td>\
                                                    <?php $__currentLoopData = years($project->id)['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                                                    <td>' + <?php echo e($year); ?> + '</td>\
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="view_incremental_data">\
                                            <tr>\
                                                    <th id="title_marketing">تكاليف التسويق</th>\
                                                    <th id="th_marketing_a">' + formatter.format(response.current_value) + '</th>\
                                                    <th id="th_marketing_b">' + formatter.format(response.prev) + '</th>\
                                                    <th id="th_marketing_c">' + formatter.format(response.nxt1) + '</th>\
                                                    <th id="th_marketing_d">' + formatter.format(response.nxt2) + '</th>\
                                                    <th id="th_marketing_e">' + formatter.format(response.nxt3) + '</th>\
                                                    <th id="th_marketing_f">' + formatter.format(response.nxt4) + '</th>\
                                            </tr>\
                                            <tr>\
                                                    <th id="title_expenses">الإيرادات</th>\
                                                    <th id="th_expenses1"><?php echo e(incomeData($project->id)['totleIncomeToEndYear']); ?></th>\
                                                            <?php $__currentLoopData = incomeData($project->id)['totleYear']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totleYears): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                                                            <th id="th_expenses1">' + formatter.format(<?php echo e($totleYears); ?>)+ '</th>\
                                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                                            </tr>\
                                            <tr>\
                                                    <th id="title_expenses">نسبة تكاليف التسويق<br> من الإيرادات</th>\
                                                    <th id="th_expenses1">' + formatter.format(response.current) + ' %</th>\
                                                    <th id="th_expenses2">' + formatter.format(response.pre) + ' %</th>\
                                                    <th id="total_expenses">' + formatter.format(response.next1) + '%</th>\
                                                    <th id="total_expenses">' + formatter.format(response.next2) + '%</th>\
                                                    <th id="total_expenses">' + formatter.format(response.next3) + '%</th>\
                                                    <th id="total_expenses">' + formatter.format(response.next4) + '%</th>\
                                            </tr>\
                                            </tbody>\
                                        </table>\
                                    </div>');
                            // });
                    }
                });
            }
            function fetchAllDetails() {
                let id = $('#project_id').val();
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('fetch_all_details',$project->id)); ?>",
                    data: {id: id},
                    dataType: "json",
                    success: function (response) {
                        $('#table_all_details').html("");
                                $('#table_all_details').append('<div class="row" id="table_market_all">\
                                        <table class="GeneratedTable" id="incremental_summry_table">\
                                            <thead>\
                                                <tr style="background-color:#F5F5F5">\
                                                    <th>السنة</th>\
                                                    <td>' + response.year + '</td>\
                                                    <?php $__currentLoopData = years($project->id)['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                                                    <td>' + <?php echo e($year); ?> + '</td>\
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                                                </tr>\
                                            </thead>\
                                            <tbody id="view_incremental_data">\
                                            <tr>\
                                                    <th id="title_expenses">مصاريف ادارية </th>\
                                                    <th id="th_a_a">' + $('#th_expenses_a').html() + '</th>\
                                                    <th id="th_b_a">' + $('#th_expenses_b').html() + '</th>\
                                                    <th id="th_c_a">' + $('#th_expenses_c').html() + '</th>\
                                                    <th id="th_d_a">' + $('#th_expenses_d').html() + '</th>\
                                                    <th id="th_e_a">' + $('#th_expenses_e').html() + '</th>\
                                                    <th id="th_f_a">' + $('#th_expenses_f').html() + '</th>\
                                            </tr>\
                                            <tr>\
                                                    <th id="title_expenses">إيجارات</th>\
                                                    <th id="th_a_b">' + $('#th_rent_a').html() + '</th>\
                                                    <th id="th_b_b">' + $('#th_rent_b').html() + '</th>\
                                                    <th id="th_c_b">' + $('#th_rent_c').html() + '</th>\
                                                    <th id="th_d_b">' + $('#th_rent_d').html() + '</th>\
                                                    <th id="th_e_b">' + $('#th_rent_e').html() + '</th>\
                                                    <th id="th_f_b">' + $('#th_rent_f').html() + '</th>\
                                            </tr>\
                                            <tr>\
                                                    <th id="title_expenses">مرافق</th>\
                                                    <th id="th_a_c">' + $('#th_utilities_a').html() + '</th>\
                                                    <th id="th_b_c">' + $('#th_utilities_b').html() + '</th>\
                                                    <th id="th_c_c">' + $('#th_utilities_c').html() + '</th>\
                                                    <th id="th_d_c">' + $('#th_utilities_d').html() + '</th>\
                                                    <th id="th_e_c">' + $('#th_utilities_e').html() + '</th>\
                                                    <th id="th_f_c">' + $('#th_utilities_f').html() + '</th>\
                                            </tr>\
                                            <tr>\
                                                    <th id="title_marketing">تكلفة تسويق</th>\
                                                    <th id="th_a_d">' + $('#th_marketing_a').html()  + '</th>\
                                                    <th id="th_b_d">' + $('#th_marketing_b').html() + '</th>\
                                                    <th id="th_c_d">' + $('#th_marketing_c').html() + '</th>\
                                                    <th id="th_d_d">' + $('#th_marketing_d').html() + '</th>\
                                                    <th id="th_e_d">' + $('#th_marketing_e').html() + '</th>\
                                                    <th id="th_f_d">' + $('#th_marketing_f').html() + '</th>\
                                            </tr>\
                                            <tr id="last">\
                                                    <th id="title_other">مصاريف أخرى</th>\
                                                    <th id="th_a_e">' + $('#th_other_a').html() + '</th>\
                                                    <th id="th_b_e">' + $('#th_other_b').html() + '</th>\
                                                    <th id="th_c_e">' + $('#th_other_c').html() + '</th>\
                                                    <th id="th_d_e">' + $('#th_other_d').html() + '</th>\
                                                    <th id="th_e_e">' + $('#th_other_e').html() + '</th>\
                                                    <th id="th_f_e">' + $('#th_other_f').html() + '</th>\
                                            </tr>\
                                            </tbody>\
                                        </table>\
                                    </div>');
                                    let num1 =  parseInt($('#th_a_a').html()) + parseInt($('#th_a_b').html()) + parseInt($('#th_a_c').html())+ parseInt($('#th_a_d').html())+ parseInt($('#th_a_e').html());
                                    let num2 =  parseInt($('#th_b_a').html()) + parseInt($('#th_b_b').html()) + parseInt($('#th_b_c').html())+ parseInt($('#th_b_d').html())+ parseInt($('#th_b_e').html());
                                    let num3 =  parseInt($('#th_c_a').html()) + parseInt($('#th_c_b').html()) + parseInt($('#th_c_c').html())+ parseInt($('#th_c_d').html())+ parseInt($('#th_c_e').html());
                                    let num4 =  parseInt($('#th_d_a').html()) + parseInt($('#th_d_b').html()) + parseInt($('#th_d_c').html())+ parseInt($('#th_d_d').html())+ parseInt($('#th_d_e').html());
                                    let num5 =  parseInt($('#th_e_a').html()) + parseInt($('#th_e_b').html()) + parseInt($('#th_e_c').html())+ parseInt($('#th_e_d').html())+ parseInt($('#th_e_e').html());

                                    console.log(num2);
                                    $('#last').after('<tr style="background:#3CC0B9">\
                                                    <th id="title_expenses">الإجمالي </th>\
                                                    <th id="total_expenses1">' + formatter.format(num1) + '</th>\
                                                    <th id="total_expenses2">' + formatter.format(num2) + '</th>\
                                                    <th id="total_expenses3">' + formatter.format(num3) + '</th>\
                                                    <th id="total_expenses4">' + formatter.format(num4) + '</th>\
                                                    <th id="total_expenses5">' + formatter.format(num5) + '</th>\
                                                    <th id="total_expenses6">' + formatter.format(num6) + '</th>\
                                            </tr>\
                                            <tr style="background:#3CC0B9">\
                                                    <th id="title_expenses">نسبة الاجمالي من <br> الايرادات </th>\
                                                    <th id="th_expenses1">' + formatter.format(response.current_value) + '</th>\
                                                    <th id="th_expenses2">' + formatter.format(response.prev) + '</th>\
                                                    <th id="total_expenses">' + formatter.format(response.nxt1) + '</th>\
                                                    <th id="total_expenses">' + formatter.format(response.nxt2) + '</th>\
                                                    <th id="total_expenses">' + formatter.format(response.nxt3) + '</th>\
                                                    <th id="total_expenses">' + formatter.format(response.nxt4) + '</th>\
                                            </tr>');
                            // });
                    }
                });
            }
            $('#add_td_Expense').click(function(e) {
                $('#tbodyExpenseTable').append(`<tr>
                                                            <td> <select class="form-control" name="expensis_type[]">
                                                                    <option value="-1">اختر</option>
                                                                    <?php $__currentLoopData = $AdministExpen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($itm->id); ?>">
                                                                            <?php echo e($itm->item); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="0">أخرى</option>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" name="value[]" class="form-control"
                                                                    id="value" aria-label="value"></td>
                                                            <td> <button class="text-danger rounded-circle" type="button"
                                                                    id="delete_value"
                                                                    style="cursor: pointer; background: none; border: none;">
                                                                    <i class="mdi mdi-delete font-size-20"></i></button>
                                                            </td>
                                                        </tr>`);
            });
            $('#add_td_other').click(function(e) {
                $('#tbodyOtherTable').append(` <tr>
                                    <td><input type="text" name="title[]" class="form-control"
                                        id="value" aria-label="value"></td>
                                    <td><input type="text" name="value[]" class="form-control"
                                            id="value" aria-label="value"></td>
                                    <td> <button class="text-danger rounded-circle" type="button"
                                            id="delete_value"
                                            style="cursor: pointer; background: none; border: none;">
                                            <i class="mdi mdi-delete font-size-20"></i></button>
                                    </td>
                                </tr>`);
            });

            $('#add_td_rent').click(function(e) {
                $('#tbodyRentTable').append(`<tr>
                                                                <td style="width: 29%"><input type="text"
                                                                        name="title[]" class="form-control"
                                                                        id="title" aria-label="title">
                                                                </td>
                                                                <td style="width: 29%">
                                                                    <div class="mb-3 input-group">
                                                                        <input type="text" name="value_rent[]"
                                                                            class="form-control" id="value_rent">

                                                                    </div>
                                                                </td>
                                                                <td style="width: 29%">
                                                                    <div class="mb-3 input-group">
                                                                        <input type="text" name="growth_rent[]"
                                                                            class="form-control" id="growth_rent">
                                                                            <button class="btn btn-light" type="button"><i
                                                                                class="mdi mdi-percent"></i></button>
                                                                    </div>
                                                                </td>

                                                                <td style="width: 13%">
                                                                    <button class="text-danger rounded-circle"
                                                                        type="button" id="delete_income_others_item"
                                                                        style="cursor: pointer; background: none; border: none;">
                                                                        <i class="mdi mdi-delete font-size-20"></i></button>
                                                                </td>
                                                            </tr>`);
            });
            $('#add_td_utilities').click(function(e) {
                $('#tbodyUtilitiesTable').append(`<tr>
                                                                <td style="width: 29%"><input type="text"
                                                                        name="title_utilities[]" class="form-control"
                                                                        id="title_utilities" aria-label="title">
                                                                </td>

                                                                <td style="width: 29%">
                                                                    <div class="mb-3 input-group">
                                                                        <input type="text" name="value_utilities[]"
                                                                            class="form-control" id="value_utilities">

                                                                    </div>
                                                                </td>

                                                                <td style="width: 13%">
                                                                    <button class="text-danger rounded-circle"
                                                                        type="button" id="delete_utilities_item"
                                                                        style="cursor: pointer; background: none; border: none;">
                                                                        <i class="mdi mdi-delete font-size-20"></i></button>
                                                                </td>
                                                            </tr>`);
            });

            $('#value_incremental_button').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_2').serialize();
                jQuery.ajax({
                    url: "<?php echo e(route('project_fs_general_expenses_incremental',$project->id)); ?>",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function (result) {
                            toastr.success("تمت العملية بنجاح", "تم تخزين  النسبة البيانات بنجاح");
                            $('#accordionExample').html("");
                            // console.log(result.data);
                        $('#accordionExample').append('<div class="table-responsive">\
                            <table class="table mb-0 border-warning" style="width: 100%">\
                                <thead>\
                                <tr>\
                                    <th>السنة / البند</th>\
                                    <th>نسبة النمو في قيمة الإيراد</th>\
                                </tr>\
                                </thead>\
                                <tbody id="incrementals">\
                                <?php $__currentLoopData = years($project->id)['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                                <tr>\
                                    <td>' + <?php echo e($year); ?> + '</td>\
                                <td>\
                                    <input type="hidden" name="year[]" value="<?php echo e($year); ?>" />\
                                    <input type="hidden" name="id" class="form-control" value="' + result.data[0].id + '">\
                                        <input type="text" name="value_incremental[]" class="form-control" value="' + result.data[0].incremental + '" >\
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
            $('#value_utilities_button').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_7').serialize();
                jQuery.ajax({
                    url: "<?php echo e(route('project_fs_utilities_incremental',$project->id)); ?>",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function (result) {
                        // console.log(result);
                            toastr.success("تمت العملية بنجاح", "تم تخزين  النسبة البيانات بنجاح");
                        $('#accordionExampleUtilities').html("");
                            // console.log(result.data);
                        $('#accordionExampleUtilities').append('<div class="table-responsive">\
                            <table class="table mb-0 border-warning" style="width: 100%">\
                                <thead>\
                                <tr>\
                                    <th>السنة / البند</th>\
                                    <th>نسبة النمو في قيمة الإيراد</th>\
                                </tr>\
                                </thead>\
                                <tbody id="incrementals">\
                                <?php $__currentLoopData = years($project->id)['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                                <tr>\
                                    <td>' + <?php echo e($year); ?> + '</td>\
                                <td>\
                                    <input type="hidden" name="year[]" value="<?php echo e($year); ?>" />\
                                    <input type="hidden" name="id" class="form-control" value="' + result.data[0].id + '">\
                                        <input type="text" name="value_incremental_utilities[]" class="form-control" value="' + result.data[0].incremental + '" >\
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
            $('#value_other_expenses_button').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_11').serialize();
                jQuery.ajax({
                    url: "<?php echo e(route('project_fs_other_expenses_incremental',$project->id)); ?>",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function (result) {
                        // console.log(result);
                            toastr.success("تمت العملية بنجاح", "تم تخزين  النسبة البيانات بنجاح");
                        $('#accordionExampleOtherExpenses').html("");
                            // console.log(result.data);
                        $('#accordionExampleOtherExpenses').append('<div class="table-responsive">\
                            <table class="table mb-0 border-warning" style="width: 100%">\
                                <thead>\
                                <tr>\
                                    <th>السنة / البند</th>\
                                    <th>نسبة النمو في قيمة الإيراد</th>\
                                </tr>\
                                </thead>\
                                <tbody id="incrementals">\
                                <?php $__currentLoopData = years($project->id)['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                                <tr>\
                                    <td>' + <?php echo e($year); ?> + '</td>\
                                <td>\
                                    <input type="hidden" name="year[]" value="<?php echo e($year); ?>" />\
                                    <input type="hidden" name="id" class="form-control" value="' + result.data[0].id + '">\
                                        <input type="text" name="value_incremental_other_expenses[]" class="form-control" value="' + result.data[0].incremental + '" >\
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


        });
        const formatter = new Intl.NumberFormat('en-US');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Documents/GitHub/jadwa_new/resources/views/admin/forms/generalAdministrativeExpenses.blade.php ENDPATH**/ ?>