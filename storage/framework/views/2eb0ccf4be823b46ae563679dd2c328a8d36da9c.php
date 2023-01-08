<?php $__env->startSection('title'); ?> الخدمات <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> اعدادات النظام <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> الخدمات <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                             <form action="<?php echo e(route('search_services')); ?>" method="post">
                            <div class="search-box me-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('POST'); ?>
                                        <input type="text" name="query" class="form-control" placeholder=" ابحث عن المشروع">
                                        <i class="bx bx-search-alt search-icon"></i>

                                </div>

                            </div>

                            </form>
                        </div>

                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <a href="<?php echo e(route('services.create')); ?>"
                                        class="btn btn-success  waves-effect waves-light mb-2 me-2 bg-o yello"> إضافة خدمة جديد <i
                                        class="mdi mdi-plus me-1"></i></a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap table-check">
                            <thead class="table-light">
                            <tr>

                                <th style="width: 20px;" class="align-middle">#</th>
                                <th class="align-middle">اسم الخدمة</th>
                                <th class="align-middle">  سعر الخدمة</th>
                                <th class="align-middle">  الصورة</th>
                                <th class="align-middle">الحالة</th>
                                <th class="align-middle">العمليات</th>
                            </tr>
                            </thead>
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $services): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($services->title); ?></td>
                                    <td><?php echo e($services->price); ?></td>
                                    <td><img src="<?php echo e(url('public/image/'.$services->image)); ?>" width="50" height="50"></td>
                                    <td><?php echo e($services->status); ?></td>

                                    <td>
                                        <div class="d-flex gap-3">


                                            
                                            <a href="<?php echo e(route('services.edit', $services->id)); ?>" title="تعديل" style="cursor: pointer"  class="text-success"><i
                                                    class="fa fa-pen"></i></a>


                                         
                                         

                                                <a  title="حذف" style="cursor: pointer"  data-id="<?php echo e($services->id); ?>"  class="text-danger delete">
                                                    <i
                                                        class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- end row -->




    <?php $__env->startSection('script-bottom'); ?>
    <script>
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var title = button.data('title')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #title').val(title);

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
                            url: '<?php echo e(url('services/{service}')); ?>',
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/Desktop/valet project/jadwa/resources/views/admin/services/index.blade.php ENDPATH**/ ?>