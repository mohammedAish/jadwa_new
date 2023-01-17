<?php $__env->startSection('title'); ?>
    <?php echo e('ادارة الموظفين'); ?>

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
        <?php echo e('ادارة الموظفين'); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="vertical-example" class="vertical-wizard">
                        <h3>القوى العاملة</h3>
                        <section>
                            <h4 class="mb-4"><strong>القوى العاملة</strong></h4>
                            <form id="form_1" name="form_1" class="form-horizontal">

                                <div class="row">
                                    <div class="inner-repeater mb-4" style="">

                                            <div data-repeater-list="inner-group" class="inner mb-4">
                                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>الوظيفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="job[]"  value="<?php echo e($employee->job); ?>" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text job_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>العدد</strong></label>
                                                            <input type="text" name="quantity[]" value="<?php echo e($employee->quantity); ?>" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>


                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>الراتب الشهري</strong></label>

                                                            <input type="text" name="annual_salary[]"  value="<?php echo e($employee->annual_salary); ?>" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text _error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>نسبة زيادة سنوية</strong></label>

                                                            <input type="text" name="value_incremental[]"  value="<?php echo e($employee->value_incremental); ?>"  onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <div data-repeater-item class="inner mb-3 row income">




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
                                            
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>نسبة الرواتب </h3>

                        <section id="forms_2">
                            <h4 class="mb-4"><strong>نسبة الرواتب </strong></h4>



                            <form id="form_2" name="form_2" class="form-horizontal">

                                <div class="row">

                                        <div class="accordion" id="accordionExaple" >
                                            <div class="table-responsive">
                                                <table class="table mb-0 border-warning" style="width: 100%">
                                                    <thead>
                                                    <tr>
                                                         <th>الوظيفة</th>
                                                         <?php $__currentLoopData = years()['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <td><?php echo e($year); ?> </td>
                                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tr>
                                                    </thead>
                                             <tbody id="incrementals_jobs">
                                             </tbody>
                                                </table>
                                        </div>
                                </div>
                                <br>
                                <br>

                                    <div class="d-flex justify-content-between" >
                                        <button type="button" value="السابق" name="previous_1" class="btn btn-warning" id="previous_1" >
                                            السابق
                                        </button>
                                        <button style="float: left" type="button" value="حفظ والتالي" name="save_btn_2" class="btn btn-warning" id="save_btn_2" >
                                            حفظ ومتابعة
                                            
                                        </button>


                                </div>
                            </form>
                        </section>

                        <h3>عدد الموظفين</h3>
                        <section>
                            <h4 class="mb-4"><strong>عدد الموظفين</strong></h4>
                            <form id="form_3" name="form_3" class="form-horizontal">

                                <div class="row">
                                    <div class="accordion" id="accordionExaple" >
                                        <div class="table-responsive">
                                            <table class="table mb-0 border-warning" style="width: 100%">
                                                <thead>
                                                <tr>
                                                     <th>الوظيفة</th>
                                                     <?php $__currentLoopData = years()['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <td><?php echo e($year); ?> </td>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tr>
                                                </thead>
                                         <tbody id="incrementals_employes">
                                         </tbody>
                                            </table>
                                    </div>
                            </div>
                                </div>
                            </form>


                            <br>
                            <br>

                                <div class="d-flex justify-content-between" >

                                    <button type="button" value="السابق" name="previous_2" class="btn btn-warning" id="previous_2" >
                                        السابق
                                    </button>
                                    <button type="button" style="float: left" value="التالي" name="save_btn_3" class="btn btn-warning" id="save_btn_3" >
                                        التالي
                                    </button>
                                 </div>

                        </section>
                        <h3>ملخص الموظفين</h3>
                        <section>
                            <h4 class="mb-4"><strong>ملخص الموظفين</strong></h4>

                                <div class="row">
                                    <div class="accordion" id="accordionExaple" >
                                        <div class="table-responsive">
                                            <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                                <thead>
                                                <tr>
                                                     <th>الوظيفة</th>
                                                     <th>العدد</th>
                                                     <th>الراتب</th>
                                                      <th>راتب شهري</th>
                                                      <th>لنهاية السنة</th>
                                                      <th>سنوي</th>
                                                </tr>
                                                </thead>
                                         <tbody id="summeryـincrementals_employes">
                                         </tbody>
                                         <tfoot id="totle_summeryـincrementals_employes">

                                         </tfoot>
                                            </table>
                                    </div>
                                    <div class="table-responsive mt-5">
                                        <caption>تغير عدد  الموظفين</caption>

                                        <table id="" class="table mb-0 border-warning GeneratedTable" style="width: 100%">

                                            <thead>
                                            <tr>
                                                 <th>الوظيفة</th>
                                                 <?php $__currentLoopData = years()['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <th><?php echo e($year); ?> </th>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tr>
                                            </thead>
                                     <tbody id="table_quantity_employes" class="text-center">
                                        <tr id="quantity_employes"></tr>
                                     </tbody>
                                        </table>
                                </div>
                                <div class="table-responsive mt-5">
                                    <caption>تغير النسبة</caption>

                                    <table class="table mb-0 border-warning GeneratedTable" style="width: 100%;font-size: 15px;
                                    ">
                                        <thead>
                                        <tr>
                                             <th>الوظيفة</th>
                                             <?php $__currentLoopData = years()['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <th><?php echo e($year); ?> </th>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tr>
                                        </thead>
                                 <tbody id="table_incremental_employes" class="text-center">
                                    <tr id="incremental_employes"></tr>
                                 </tbody>
                                    </table>
                            </div>
                            <div class="table-responsive mt-5">
                                <caption>تغير الرواتب</caption>

                                <table class="table mb-0 border-warning GeneratedTable" style="width: 100%;font-size: 15px;">
                                    <thead>
                                    <tr>
                                         <th>الوظيفة</th>
                                         <th id="yearCurrent"></th>
                                         <?php $__currentLoopData = years()['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <th><?php echo e($year); ?> </th>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                    </thead>
                             <tbody id="table_salary_employes" class="text-center">
                                <tr id="salary_employes"></tr>
                             </tbody>
                             <tfoot style="font-weight: bold;">
                                <tr id="totole_salary_employes">
                                    <td>الاجمالي</td>
                                </tr>
                                <tr id="avarage_salary_employes">
                                    <td>متوسط الرواتب</td>
                                </tr>
                                <tr id="avarage_Fs_income">
                                    <td>الايرادات </td>

                                </tr>
                                <tr id="avarage_Fs_incomea_enployes">
                                    <td>نسبة الرواتب من الايرادات</td>
                                </tr>
                             </tfoot>
                                </table>
                        </div>

                            </div>
                                </div>



                            <br>
                            <br>

                                <div class="d-flex justify-content-between" >

                                    <button type="button" value="السابق" name="previous_3" class="btn btn-warning" id="previous_3" >
                                        السابق
                                    </button>
                                    
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
                    <div class="col-lg-3">
                                                        <div class="mb-3">


                                                            <input type="text" name="job[]" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3 price">
                                                            <input type="text" name="quantity[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text value_error"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <input type="text" name="annual_salary[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">
                                                            <input type="text" name="value_incremental[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
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
                                                        <div class="col-lg-3">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>
                                                            <select onchange="checkAlert(event)" id="executive"  class="form-control"  name="item[]">

                                                            <option>أخري</option>

                                                        </select>
                                                        <div id="sales_channels">
                                                            </div>

                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="verticalnav-pancard-input"><strong>نوع التكليف</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>
                                                        <select class="form-control" name="expensis_type[]">
                                                            <option value="0">مبلغ ثابت</option>
                                                            <option value="1">نسبة من ايرادات المنتج</option>
                                                            <option value="2">نسبة من ايرادات العامة</option>
                                                        </select>
                                                        <span class="text-danger error-text item_error"></span>
                                                    </div>
                                                </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>القيمة</strong></label>
                                                            <input type="text" name="value[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">


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
    // $(document).on('change', 'select', function() {
    //         var opt = $(this).find('option:selected')[0];

    //         if($(this).id() == "nationalExecutive"){
    //             $('#sales_channels').after(`<input name="item[]" type="text" class="inner form-control"  value="" placeholder="" />`);
    //         }else{
    //             $('#sales_channels').remove();

    //         }

    //     });

    function checkAlert(evt) {
  if (evt.target.value === "أخري") {
    $('#sales_channels').after(`<input name="item[]" type="text" class="inner form-control"  value="" placeholder="" />`);
            }else{
              $('#sales_channels').hide();  }
}
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


// jQuery('#selectitem').on('change', function(e) {
//     var value = $(this).val();
//     alert(value);
//                       //$('#otherItem').attr('style','display:block');

//             });
jQuery('#previous_1').click(function (e) {

                $('#vertical-example-p-0').removeAttr('style');
                $('#vertical-example-t-0').parent().attr('class','current');
                $('#vertical-example-p-1').attr('style' , 'display:none');
                $('#vertical-example-t-1').parent().removeClass('current');

            });
            jQuery('#previous_2').click(function (e) {
                $('#vertical-example-p-1').removeAttr('style');
                $('#vertical-example-t-1').parent().attr('class','current');
                $('#vertical-example-p-2').attr('style' , 'display:none');
                $('#vertical-example-t-2').parent().removeClass('current');
});
jQuery('#previous_3').click(function (e) {
                $('#vertical-example-p-2').removeAttr('style');
                $('#vertical-example-t-2').parent().attr('class','current');
                $('#vertical-example-p-3').attr('style' , 'display:none');
                $('#vertical-example-t-3').parent().removeClass('current');
});
jQuery('#previous_3').click(function (e) {

    $('#vertical-example-p-2').removeAttr('style');
                $('#vertical-example-t-2').parent().attr('class','current');
                $('#vertical-example-p-3').attr('style' , 'display:none');
                $('#vertical-example-t-3').parent().removeClass('current');

});
jQuery('#previous_4').click(function (e) {

    $('#vertical-example-p-3').removeAttr('style');
                $('#vertical-example-t-3').parent().attr('class','current');
                $('#vertical-example-p-4').attr('style' , 'display:none');
                $('#vertical-example-t-4').parent().removeClass('current');
});
jQuery('#previous_5').click(function (e) {

$('#vertical-example-p-4').removeAttr('style');
            $('#vertical-example-t-4').parent().attr('class','current');
            $('#vertical-example-p-5').attr('style' , 'display:none');
            $('#vertical-example-t-5').parent().removeClass('current');
});
jQuery('#previous_6').click(function (e) {

$('#vertical-example-p-5').removeAttr('style');
            $('#vertical-example-t-5').parent().attr('class','current');
            $('#vertical-example-p-6').attr('style' , 'display:none');
            $('#vertical-example-t-6').parent().removeClass('current');
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
var formData = $('#form_2').serialize();
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
var formData = $('#form_4').serialize();
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
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_1').serialize();
                jQuery.ajax({
                    url: "<?php echo e(route('employe.store')); ?>",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function (result) {
                        toastr.success("تمت العملية بنجاح", "تم تخزين البيانات بنجاح");
                        //$("#form_1 :input").prop("disabled", true);
                        $("#spinner_1").hide();
                        $('#vertical-example-p-0').attr('style','display:none');
                        $('#vertical-example-p-1').removeAttr('style');
                        $('#vertical-example-t-0').parent().removeClass('current');
                        $('#vertical-example-t-1').parent().attr('class','current');
                        console.log(result.data);
                        $('#incrementals_jobs').empty();

        $.each(result.data, function (key, item) {
            $('#incrementals_jobs').append('\
<tr>\
    <td>'+item.job +'</td>\
    <?php $__currentLoopData = years()['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
<td>\
    <input type="hidden" name="year[]" value="<?php echo e($year); ?>" />\
    <input type="hidden" name="employes_id[]" value="' +item.id + '">\
    <input type="text" name="value_incremental[]" value="' +item.value_incremental + '">\
</td>\
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
</tr>\
');
        });
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
                    url: "<?php echo e(route('employe.employees_store_detial')); ?>",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function (result) {
                        $('#vertical-example-p-1').attr('style','display:none');
                        $('#vertical-example-p-2').removeAttr('style');
                        $('#vertical-example-t-1').parent().removeClass('current');
                        $('#vertical-example-t-2').parent().attr('class','current');
                        console.log(result.data);
                        $('#incrementals_employes').empty();

        $.each(result.data, function (key, item) {
            $('#incrementals_employes').append('\
<tr>\
    <td>' +item.job + '</td>\
    <?php $__currentLoopData = years()['years']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
<td>\
    <input type="hidden" name="year[]" value="<?php echo e($year); ?>" />\
    <input type="hidden" name="employes_id[]" value="' +item.id + '">\
    <input type="text" name="quantity[]" value="' +item.quantity + '">\
</td>\
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
</tr>\
');
        });
                    }
                });
            });
            jQuery('#save_btn_3').click(function (e) {

                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_3').serialize();
                jQuery.ajax({
                    url: "<?php echo e(route('employe.employees_store_detial2')); ?>",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function (result) {
                        toastr.success("تمت العملية بنجاح", "تم تخزين البيانات بنجاح");
                        // $("#form_3 :input").prop("disabled", true);
                        $("#spinner_3").hide();
                        $('#vertical-example-p-2').attr('style','display:none');
                        $('#vertical-example-p-3').removeAttr('style');
                        $('#vertical-example-t-2').parent().removeClass('current');
                        $('#vertical-example-t-3').parent().attr('class','current');
                        console.log(result.data);
                        $('#summeryـincrementals_employes').empty();
                        $('#totle_summeryـincrementals_employes').empty();
                        let sum =0;
        $.each(result.data, function (key, item) {
            sum += item.quantity;
            $('#summeryـincrementals_employes').append('\
<tr>\
    <td>' +item.job + '</td>\
     <td>' + formatter.format(item.quantity)+ ' </td>\
     <td>' + formatter.format(item.annual_salary)+ ' </td>\
     <td>' + formatter.format(item.annual_salary * item.quantity)+ ' </td>\
     <td>' + formatter.format(item.annual_salary * item.quantity * result.remainingmonths)+ ' </td>\
     <td>' + formatter.format( 12 * item.annual_salary * item.quantity )+ ' </td>\
</tr>\
');
    });
    $('#totle_summeryـincrementals_employes').empty();

    $('#totle_summeryـincrementals_employes').append('\
<tr>\
    <td>الاجمالي</td>\
    <td>'+sum+'</td>\
    <td></td>\
    <td>' +formatter.format(result.totleEmployeMounth)+'</td>\
    <td>'+ formatter.format(result.totleEmployeToEndYear)+'</td>\
    <td>'+ formatter.format(result.totleEmployeYear)+'</td>\
</tr>\
');
// $('#currentYear').append('<td>'+result.totleEmployeToEndYear+'</td>');
$('#table_quantity_employes').empty();
$('#table_quantity_employes').append('<tr id="quantity_employes"> </tr>');


$.each(result.employeesDetailsQ, function (key, item) {
    $('#quantity_employes').after('\
    <tr id="quantity_employess">\
        </tr>\
    ');
    $.each(item, function (key, i) {
$('#quantity_employess').append('\
    <td>' +i+'</td>\
');
});
});
$('#table_incremental_employes').empty();
$('#table_incremental_employes').append('<tr id="incremental_employes"> </tr>');
$.each(result.employeesDetailsI, function (key, item) {
    $('#incremental_employes').after('\
    <tr id="incremental_employess">\
        </tr>\
    ');
    $.each(item, function (key, i) {
$('#incremental_employess').append('\
    <td>' +i+'</td>\
');
});
});

$('#table_salary_employes').empty();
$('#totole_salary_employes').empty();
$('#totole_salary_employes').append('<td>الاجمالي</td>');
$('#avarage_salary_employes').empty();
$('#avarage_salary_employes').append('<td>متوسط الرواتب</td>');
$('#table_salary_employes').append('<tr id="salary_employes"> </tr>');
$('#yearCurrent').append(result.yearCurrent);
$.each(result.employeesDetailsS, function (key, item) {
    console.log(item);
    $('#salary_employes').after('\
    <tr id="salary_employess">\
        </tr>\
    ');
    $.each(item, function (key, i) {
        if(isNaN(i)){
            $('#salary_employess').append('<td>' +i+' </td>');

        }else{
$('#salary_employess').append('<td>' +formatter.format(i)+' </td>');
        }
});
});
$.each(result.sumSalaryy, function (key, item) {
            $('#totole_salary_employes').append('<td>' +formatter.format(item)+' </td>');

});
$.each(result.avarageSalaryy, function (key, item) {
            $('#avarage_salary_employes').append('<td>' +formatter.format(item)+' </td>');
});
$.each(result.totleYear, function (key, item) {
            $('#avarage_Fs_income').append('<td>' +formatter.format(item)+' </td>');
});
$.each(result.fs_salary_employs, function (key, item) {
            $('#avarage_Fs_incomea_enployes').append('<td>%' +formatter.format(item)+' </td>');

});
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

                    // if (empty) {
                    //     $('#save_btn_1').attr('disabled', 'disabled');
                    // } else {
                    //     $('#save_btn_1').removeAttr('disabled');
                    // }
                });
                $('#form_3 :input').keyup(function() {

                    var empty = false;
                    $('#form_3 :input').each(function() {
                        if ($(this).val() == '') {
                            empty = true;
                        }
                    });

                    // if (empty) {
                    //     $('#save_btn_3').attr('disabled', 'disabled');
                    // } else {
                    //     $('#save_btn_3').removeAttr('disabled');
                    // }
                });
            })();
        });

        const formatter = new Intl.NumberFormat('en-US');
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Documents/GitHub/jadwa_new/resources/views/admin/employes/employes.blade.php ENDPATH**/ ?>