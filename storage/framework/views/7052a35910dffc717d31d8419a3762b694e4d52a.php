

<?php $__env->startSection('title'); ?>
    أنواع المشاريع
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
        اعدادات المشروع
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            أنواع المشاريع
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <form method="POST" action="<?php echo e(route('search_projType')); ?>">
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('POST'); ?>
                                        <input type="text" name="query" class="form-control"
                                            placeholder=" ابحث عن صفحة">
                                        <i class="bx bx-search-alt search-icon"></i>

                                    </div>

                                </div>

                            </form>
                        </div>

                        <div class="col-sm-8">
                            <div class="text-sm-end">


                                <button type="button" class="btn btn-success bg-o waves-effect waves-light mb-2 me-2 yello"
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
                                                <form method="POST" action="<?php echo e(route('projectype.store')); ?>"
                                                    id="newModalForm">
                                                    <?php echo csrf_field(); ?>

                                                    <div class="mb-3">
                                                        <label for="title" class="col-form-label flex">العنوان</label>
                                                        <input type="text" name="title" class="form-control validate"
                                                            id="title" value="<?php echo e(old('title')); ?>" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label flex" for="gridCheck">الحالة </label>

                                                        <div class="form-check">
                                                            <div class="btn-group-horizontal validate" role="group"
                                                                aria-label="Horizontal radio toggle button group">
                                                                <input type="radio" class="btn-check" name="status"
                                                                    value="active" id="active-radio1">
                                                                <label class="btn btn-outline-success"
                                                                    for="active-radio1">نشط</label>
                                                                <input type="radio" class="btn-check" name="status"
                                                                    value="inactive" id="active-radio2">
                                                                <label class="btn btn-outline-danger"
                                                                    for="active-radio2">غير نشط</label>
                                                            </div>
                                                        </div>
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
                    <?php if(isset($projType)): ?>
                        <?php if($projType->count() > 0): ?>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-check">
                                    <thead class="orange">
                                        <tr>

                                            <th style="width: 20px;" class="align-middle">#</th>
                                            <th class="align-middle">نوع المشروع </th>
                                            <th class="align-middle"> الحالة </th>
                                            <th class="align-middle">العمليات</th>
                                        </tr>
                                    </thead>
                                    <?php $__currentLoopData = $projType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tbody class="bg-p">
                                            <tr>
                                                <td><?php echo e($key + 1); ?></td>
                                                <td><?php echo e($item->title); ?></td>
                                                <td><?php echo e($item->status); ?></td>

                                                <td>
                                                    <div class="d-flex gap-3">


                                                        <a title="تعديل" class="text-success" data-bs-toggle="modal"
                                                            data-id="<?php echo e($item->id); ?>" data-title="<?php echo e($item->title); ?>"
                                                            data-bs-target="#editModal"> <i class="fa fa-pen"></i></a>

                                                        
                                                        <a title="حذف" style="cursor: pointer"
                                                            data-id="<?php echo e($item->id); ?>" class="text-danger delete">
                                                            <i class="fa fa-trash"></i></a>

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
                                            <form method="POST" action="projectype/{projectype}" id="editModal">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('put'); ?>
                                                <input type="hidden" id="id" name="id">


                                                <div class="mb-3">
                                                    <label for="title" class="col-form-label">العنوان</label>
                                                    <input type="text" name="title" class="form-control"
                                                        id="title" value="<?php echo e($item->title); ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <label class="form-label" for="gridCheck">الحالة </label>
                                                        <div class="btn-group-horizontal " role="group"
                                                            aria-label="Horizontal radio toggle button group">
                                                            <input type="radio" class="btn-check" name="status"
                                                                value="active" id="active-radio1">
                                                            <label class="btn btn-outline-success"
                                                                for="active-radio1">نشط</label>
                                                            <input type="radio" class="btn-check" name="status"
                                                                value="inactive" id="active-radio2">
                                                            <label class="btn btn-outline-danger" for="active-radio2">غير
                                                                نشط</label>
                                                        </div>
                                                    </div>
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
                    status: {
                        required: true,

                    },
                    title: {
                        required: true,

                    },

                },
                messages: {
                    status: "Please select a status",
                    title: "Please enter the title",

                }

            });
        });
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id');
            var title = button.data('title');
            // var status = button.data('status');

            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #title').val(title);
            // modal.find('.modal-body #status').val(status);


        });

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
                        url: '<?php echo e(url('projectype/{projectype}')); ?>',
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\my project\jadwahmad\resources\views/admin/ProjectType/index.blade.php ENDPATH**/ ?>