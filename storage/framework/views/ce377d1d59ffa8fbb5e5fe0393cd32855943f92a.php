<?php $__env->startSection('title'); ?> الصفحات <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> اعدادات النظام <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>  الصفحات <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <form method="POST" action="<?php echo e(route('search_pages')); ?>" >
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('POST'); ?>
                                            <input type="text" name="query" class="form-control" placeholder=" ابحث عن صفحة">
                                            <i class="bx bx-search-alt search-icon"></i>
    
                                    </div>
    
                                </div>
                            
                                </form>
                        </div>

                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <a href="<?php echo e(route('pages.create')); ?>"
                                   class="btn btn-success bg-o waves-effect waves-light mb-2 me-2 yello"> إضافة  جديد <i
                                        class="mdi mdi-plus me-1"></i></a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap table-check">
                            <thead class="orange">
                            <tr>

                                <th style="width: 20px;" class="align-middle">#</th>
                                <th class="align-middle"> اسم الصفحة </th>
                                <th class="align-middle">نوع الصفحة  </th>
                                <th class="align-middle">محتوى الصفحة</th>
                                <th class="align-middle">العمليات</th>
                            </tr>
                            </thead>
                           
                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody class="bg-p">
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($page->title); ?></td>
                                    <td><?php echo e($page->type); ?></td>
                                    <td><?php echo Str::limit($page->content, 100); ?></td>

                                    <td>
                                        <div class="d-flex gap-3">

                                            
                                            <a href="<?php echo e(route('pages.edit',$page)); ?>" style="cursor: pointer"  title="تعديل" class="text-success"><i
                                                    class="fa fa-pen"></i></a>
                                            
                                            
                                            <a  title="حذف" style="cursor: pointer"  data-id="<?php echo e($page->id); ?>"  class="text-danger delete">
                                               <i class="fa fa-trash"></i></a>
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




<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-bottom'); ?>
    <script>
        $('#kt_modal_1').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })


        $('#kt_modal_3').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })

        $('#kt_modal_4').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
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
                            url: '<?php echo e(url('pages/{page}')); ?>',
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
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\MAMP\htdocs\jadwahmad\resources\views/admin/pages/index.blade.php ENDPATH**/ ?>