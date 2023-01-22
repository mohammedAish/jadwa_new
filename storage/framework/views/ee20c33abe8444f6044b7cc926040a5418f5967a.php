<?php $__env->startSection('title'); ?>
    <?php echo e('مصاريف التأسيس'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo e('دراسة جدوى'); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('name'); ?>
            <?php echo e('مصاريف التأسيس'); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="vertical-example" class="vertical-wizard">
                        <h3>مصاريف التأسيس</h3>
                        <section>
                            <h4 class="mb-4"><strong>مصاريف التأسيس</strong></h4>
                            <form id="form1" name="form1" class="form-horizontal">
                                <?php if(isset($stratupCosts)): ?>
                                <?php $__currentLoopData = $stratupCosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $startupCost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row">
                                        <div class="inner-repeater mb-4" style="">

                                            <div data-repeater-list="inner-group" class="inner mb-4 ">
                                                <div data-repeater-item class=" mb-2 row">
                                                    <div class="col-lg-4">
                                                        <input type="hidden" name="id[]" value="<?php echo e($startupCost->id); ?>" class="form-control" id="verticalnav-pancard-input">

                                                        <div class="mb-4 names" >

                                                            <label for="verticalnav-pancard-input"><strong>البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="name[]" value="<?php echo e($startupCost->name); ?>" class="form-control validate names" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text name_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 ">
                                                        <div class="mb-2 price costs">
                                                            <label for="verticalnav-pancard-input"><strong>القيمة</strong></label>
                                                            <input type="text" name="cost[]"  value="<?php echo e($startupCost->cost); ?>"  onkeypress="return isNumber(event)" class="form-control validate costs" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text cost_error"></span>






                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <div class="mb-3 pt-4 table-responsive">
                                                            <button type="button" class="destroy" title="حذف" style="cursor: pointer;    background: none;
                                                                border: none;"
                                                                    data-id="<?php echo e($startupCost->id); ?>" id="<?php echo e($startupCost->id); ?>"  class="text-danger delete">
                                                                <i class=" mdi mdi-delete font-size-20" style="cursor: pointer;color: #ee0e0e;" id="delete_startup"></i>
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div >
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="inner-repeater mb-4" style="">

                                        <div data-repeater-list="inner-group" class="inner mb-4">


                                            <div data-repeater-item class="inner mb-3 row startup">
                                                <?php if(empty($stratupCosts)): ?>
                                                    <input type="hidden" name="id[]" value="<?php echo e($startupCost->id); ?>" class="form-control" id="verticalnav-pancard-input">

                                                    <div class="col-lg-4 name">
                                                        <div class="mb-3 names">

                                                            <label for="verticalnav-pancard-input"><strong>البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="name[]" class="form-control validate" id="verticalnav-pancard-input">

                                                        </div>
                                                        <span class="text-danger error-text name_error"></span>
                                                    </div>
                                                    <div class="col-lg-4 costs">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>القيمة</strong></label>
                                                            <input type="text" name="cost[]" onkeypress="return isNumber(event)" class="form-control validate" id="verticalnav-pancard-input">







                                                        </div>
                                                        <span class="text-danger error-text cost_error"></span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="col-md-4 col-4 ">
                                                <input data-repeater-create id="add_startup_cost" type="button"
                                                       class="add btn btn-outline-warning inner" value="اضافة " />
                                            </div>

                                        </div>
                                    </div>
                                </div >

                                <div class="col-md-6 col-6" style="float: left">
                                    <div class="col-md-4" style="float: left">
                                        <button type="button" value="حفظ ومتابعة" name="storefsstartupcost" class="btn btn-warning" id="storefsstartupcost" >
                                            حفظ ومتابعة
                                            
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>ملخص</h3>
                        <section>
                            <h4 class="mb-4"><strong>ملخص</strong></h4>
                            <form id=""
                                  class="form-horizontal" enctype="multipart/form-data">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-check" >
                                        <thead class="">
                                        <tr style="background: rgba(244, 244, 244, 0.5);  ">
                                            <th class="align-middle"><svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1581_101)">
                                                        <path d="M3.50312 14.1969C3.50312 14.3937 3.55988 14.5856 3.66825 14.7497L4.20388 15.5525C4.36794 15.7986 4.74044 15.9987 5.03638 15.9987H6.96356C7.2585 15.9987 7.63106 15.7987 7.79513 15.5525L8.32887 14.75C8.42069 14.6113 8.496 14.3634 8.496 14.1969L8.5 12.9719H3.5L3.50312 14.1969ZM6 0C2.81312 0.01 0.5 2.59281 0.5 5.47188C0.5 6.85875 1.01375 8.12313 1.86125 9.09062C2.37781 9.67937 3.18438 10.9103 3.49312 11.9484C3.49409 11.9563 3.49606 11.9646 3.49703 11.9729H8.50328C8.50425 11.9646 8.50622 11.9567 8.50719 11.9484C8.81578 10.9103 9.6225 9.67937 10.1391 9.09062C10.9875 8.15 11.5 6.8875 11.5 5.47188C11.5 2.4625 9.0375 0.000125 6 0ZM9.0125 8.12813C8.52312 8.68594 7.9175 9.575 7.47969 10.4997H4.52313C4.08531 9.575 3.47969 8.68594 2.99062 8.12844C2.35125 7.4 2 6.44063 2 5.47188C2 3.54063 3.50313 1.50781 5.97188 1.5C8.20625 1.5 10 3.29375 10 5.47188C10 6.44063 9.65 7.4 9.0125 8.12813ZM5.5 2.5C4.12188 2.5 3 3.62188 3 5C3 5.27637 3.22362 5.5 3.5 5.5C3.77638 5.5 4 5.275 4 5C4 4.17281 4.67281 3.5 5.5 3.5C5.77637 3.5 6 3.27663 6 3.00031C6 2.724 5.775 2.5 5.5 2.5Z" fill="#0A0A0A" fill-opacity="0.6"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1581_101">
                                                            <rect width="12" height="16" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                البند</th>

                                            <th class="align-middle">
                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1581_101)">
                                                        <path d="M3.50312 14.1969C3.50312 14.3937 3.55988 14.5856 3.66825 14.7497L4.20388 15.5525C4.36794 15.7986 4.74044 15.9987 5.03638 15.9987H6.96356C7.2585 15.9987 7.63106 15.7987 7.79513 15.5525L8.32887 14.75C8.42069 14.6113 8.496 14.3634 8.496 14.1969L8.5 12.9719H3.5L3.50312 14.1969ZM6 0C2.81312 0.01 0.5 2.59281 0.5 5.47188C0.5 6.85875 1.01375 8.12313 1.86125 9.09062C2.37781 9.67937 3.18438 10.9103 3.49312 11.9484C3.49409 11.9563 3.49606 11.9646 3.49703 11.9729H8.50328C8.50425 11.9646 8.50622 11.9567 8.50719 11.9484C8.81578 10.9103 9.6225 9.67937 10.1391 9.09062C10.9875 8.15 11.5 6.8875 11.5 5.47188C11.5 2.4625 9.0375 0.000125 6 0ZM9.0125 8.12813C8.52312 8.68594 7.9175 9.575 7.47969 10.4997H4.52313C4.08531 9.575 3.47969 8.68594 2.99062 8.12844C2.35125 7.4 2 6.44063 2 5.47188C2 3.54063 3.50313 1.50781 5.97188 1.5C8.20625 1.5 10 3.29375 10 5.47188C10 6.44063 9.65 7.4 9.0125 8.12813ZM5.5 2.5C4.12188 2.5 3 3.62188 3 5C3 5.27637 3.22362 5.5 3.5 5.5C3.77638 5.5 4 5.275 4 5C4 4.17281 4.67281 3.5 5.5 3.5C5.77637 3.5 6 3.27663 6 3.00031C6 2.724 5.775 2.5 5.5 2.5Z" fill="#0A0A0A" fill-opacity="0.6"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1581_101">
                                                            <rect width="12" height="16" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                القيمة
                                            </th>

                                        </tr>
                                        </thead>



                                        <tbody class="bg-p" id="startupCosts">
                                        <?php $__currentLoopData = $stratupCosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stratupCost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>



                                    </table>
                                </div>
                                <div class="d-flex justify-content-between" >
                                    <button type="button" value="السابق" name="previous_1" class="btn btn-warning" id="previous_1" >
                                        السابق
                                    </button>
                                    <a href="<?php echo e(route('feasibility-study', $project->id)); ?>" type="button" value="حفظ" name="" class="btn btn-warning" id="" >
                                        حفظ
                                        
                                    </a>
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


    <!-- form wizard init -->
    <script src="<?php echo e(asset('assets/js/pages/form-wizard.init.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/jquery-steps/jquery-steps.min.js')); ?>"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        function fetchfStartupCost() {
            let id = $('#id').val();
            $.ajax({
                type: "GET",
                url: "<?php echo e(route('fetch_startupCosts', $project->id)); ?>",
                data: {id: id},
                dataType: "json",
                success: function (response) {
                    console.log(response.sumCost);

                    $('#startupCosts').html("");
                    $.each(response.startupCosts, function (key, item) {
                        $('#startupCosts').append('<tr style=" border: white;">\
                                            <td>' + item.name + '</td>\
                                            <td>' + item.cost + '</td>\
                                             <td></td>\
                                        </tr> ',
                        );});
                        $('#startupCosts').append('<tr style="font-weight: 700; border: white;" >\
                            <td>اجمالي </td>\
                                        <td id="startupSum">\ ' +response.sumCost + ' </td>\
                            </tr> ',
                            );


                }
            });
        }
        document.addEventListener('click', function(e) {
            var eventTarget = e.target;
            if (e.target.id == 'storefsstartupcost') {
                $("#spinner_1").show();
                e.preventDefault();
                $.ajax({
                    url: "<?php echo e(route('fs-startup-cost.store', $project->id)); ?>",
                    method: 'post',
                    data: new FormData(form1),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        console.log(data)
                        if (data.status == 1) {
                            toastr.success("تمت العملية بنجاح", "تم تخزين البيانات بنجاح");
                            //$("#form1 :input").prop("disabled", true);
                            $("#spinner_1").hide();
                            $('#vertical-example-p-0').attr('style','display:none');
                            $('#vertical-example-p-1').removeAttr('style');
                            $('#vertical-example-t-0').parent().removeClass('current');
                            $('#vertical-example-t-1').parent().attr('class','current');
                            fetchfStartupCost()
                        } else {
                            console.log(data.error)
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                    }
                });

            }
            if (e.target.id == 'add_startup_cost') {
                $(".startup").after(`<div data-repeater-item class="inner mb-3 row ">
                <input type="hidden" name="id[]"  class="form-control" id="verticalnav-pancard-input">

                                      <div class="col-lg-4 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                        <div class="mb-4 names">

                                                            <label for="verticalnav-pancard-input"><strong>البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="name[]"  class="form-control validate" id="verticalnav-pancard-input">

                                                        </div><span class="text-danger error-text name_error"></span>
                                                    </div>
                                                    <div class="col-lg-4 costs <?php $__errorArgs = ['cost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                        <div class="mb-2 price">
                                                            <label for="verticalnav-pancard-input"><strong>القيمة</strong></label>
                                                            <input type="text" name="cost[]"   onkeypress="return isNumber(event)" class="form-control validate" id="verticalnav-pancard-input">

                                                        </div>
                                                        <span class="text-danger error-text cost_error"></span>
                                                    </div>
                                                <div class="col-lg-1">
                                                      <div class="mt-4">

                                                <i class=" mdi mdi-delete font-size-20" style="cursor: pointer;color: #ee0e0e;" id="delete_startup"></i>
                                            </div>
                                                    </div>

                                                `);

            }
            if (e.target.id == 'delete_startup') {
                e.target.parentElement.parentElement.parentElement.remove();
            }
        });
        jQuery(document).ready(function () {
            fetchfStartupCost();
            $('#vertical-example-t-0').parent().attr('class','current');
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
                    console.log(status.value);
                    if (status.value) {
                        $.ajax({
                            url: '<?php echo e(route('fs_startup_cost.del', $project->id)); ?>',
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
            jQuery('#previous_1').click(function (e) {
                $('#vertical-example-p-0').removeAttr('style');
                $('#vertical-example-t-0').parent().attr('class','current');
                $('#vertical-example-p-1').attr('style' , 'display:none');
                $('#vertical-example-t-1').parent().removeClass('current');
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
                $('#form1 :input').keyup(function() {

                    var empty = false;
                    $('#form1 :input').each(function() {
                        console.log($(this).val())
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
            })();
        });
    </script>
    <script>
        $(function() {
            $('#form1').validate({
                rules: {
                    'names[]': {
                        required : true,
                    },
                    'costs[]': {
                        required: true,
                    }
                },
                messages: {
                    'names[]': {
                        required : "هذا الحقل مطلوب",
                    },
                    'costs[]': {
                        required : "هذا الحقل مطلوب",
                    }
                }
            });
        });
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Documents/GitHub/jadwa_new/resources/views/admin/FsStartupCost/create.blade.php ENDPATH**/ ?>