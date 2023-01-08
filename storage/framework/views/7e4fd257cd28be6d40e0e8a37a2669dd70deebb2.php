<?php $__env->startSection('title'); ?>
    مصاريف ادارية
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
        اعدادات المشروع
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            مصاريف ادارية
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <form method="POST" action="<?php echo e(route('search_adminst_expen')); ?>">
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('POST'); ?>
                                        <input type="text" name="query" class="form-control"
                                            placeholder=" ابحث عن  صفحة">
                                        <i class="bx bx-search-alt search-icon"></i>

                                    </div>

                                </div>

                            </form>
                        </div>

                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                

                                <button type="button"
                                    class="btn btn-success  waves-effect waves-light mb-2 me-2 bg-o yello"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">اضافة
                                    جديد</button>
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
                                                <form method="POST"
                                                    action="<?php echo e(route('adminstExp.store')); ?>"id="newModalForm">
                                                    <?php echo csrf_field(); ?>

                                                    <div class="mb-3">
                                                        <label for="item" class="col-form-label flex">البند</label>
                                                        <input type="text" name="item" class="form-control validate"
                                                            id="item" value="<?php echo e(old('item')); ?>" required>
                                                        <?php $__errorArgs = ['item'];
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
                                                        <label for="value" class="col-form-label flex">القيمة</label>
                                                        <textarea class="form-control validate" name="value" id="value" required><?php echo e(old('value')); ?></textarea>
                                                        <?php $__errorArgs = ['value'];
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
                                                        <button type="submit" class="btn btn-outline-warning">اضافة</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <?php if(isset($adminstExp)): ?>
                        <?php if($adminstExp->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-check">
                                    <thead class="orange">
                                        <tr>

                                            <th style="width: 20px;" class="align-middle">#</th>
                                            <th class="align-middle"> البند </th>
                                            <th class="align-middle">القيمة </th>
                                            <th class="align-middle">العمليات</th>
                                        </tr>
                                    </thead>
                                    <?php $__currentLoopData = $adminstExp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $adminstExp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tbody class="bg-p">
                                            <tr>
                                                <td><?php echo e($key + 1); ?></td>
                                                <td><?php echo e($adminstExp->item); ?></td>
                                                <td><?php echo e($adminstExp->value); ?></td>

                                                <td>
                                                    <div class="d-flex gap-3">


                                                        
                                                        <a title="تعديل" class="text-success" data-bs-toggle="modal"
                                                            data-id="<?php echo e($adminstExp->id); ?>"
                                                            data-item="<?php echo e($adminstExp->item); ?>"
                                                            data-value="<?php echo e($adminstExp->value); ?>"
                                                            data-bs-target="#editModal"><i
                                                                class="fa fa-pen" aria-hidden="true"></i> </a>

                                                        

                                                        <a title="حذف" style="cursor: pointer"
                                                            data-id="<?php echo e($adminstExp->id); ?>" class="text-danger delete">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a>

                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
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
                                            <form method="POST" action="adminstExp/{adminstExp}" id="editModal">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('put'); ?>
                                                <input type="hidden" id="id" name="id">


                                                <div class="mb-3">
                                                    <label for="item" class="col-form-label">البند</label>
                                                    <input type="text" name="item" class="form-control"
                                                        id="item" value="<?php echo e($adminstExp->item); ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="value" class="col-form-label">القيمة</label>
                                                    <input type="text" name="value" class="form-control"
                                                        id="value" value="<?php echo e($adminstExp->value); ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">إغلاق</button>
                                                    <button type="submit" class="btn btn-outline-warning">اضافة</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

<?php $__env->startSection('script-bottom'); ?>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script>
        $(function() {

            $("#newModalForm").validate({
                rules: {
                    item: {
                        required: true,

                    },
                    value: {
                        required: true,
                    },

                },
                messages: {
                    item: "Please enter the title",
                    value: "Please enter the value",

                }

            });
        });
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var item = button.data('item')
            var value = button.data('value')


            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #item').val(item);
            modal.find('.modal-body #value').val(value);


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
                        url: '<?php echo e(url('adminstExp/{adminstExp}')); ?>',
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\jadwahmad\resources\views/admin/AdminstratorExp/index.blade.php ENDPATH**/ ?>