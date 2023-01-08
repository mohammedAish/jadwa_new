<?php $__env->startSection('title'); ?>
    المشاريع
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            المشاريع
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            قائمة المشاريع
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <style>
        table {
          border-collapse: separate;
          border-spacing: 0 15px;
        }
        th,
        td {
         text-align: center;
          text-align: center;
         background-color: #fff !important;
          padding: 5px;
        }
        th,
        td,
        a {
         
          padding: 5px;
        }
        tr{
        font-weight:550;
        }
        th {
        text-align: center;
        height: 70px !important;
       
        }
      </style>
    <div class="row">
        <div class="col-12">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <form action="<?php echo e(route('search_project')); ?>" method="post">
                        <div class="search-box me-2 mb-2 d-inline-block">
                            <div class="position-relative">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('POST'); ?>
                                <input type="text" name="query" class="form-control"
                                    placeholder=" ابحث عن المشروع">
                                <i class="bx bx-search-alt search-icon"></i>

                            </div>

                        </div>

                    </form>
                </div>

                <div class="col-sm-8">
                    <div class="text-sm-end">
                        <a href="<?php echo e(route('projects.create')); ?>"
                            class="btn btn-success  waves-effect waves-light mb-2 me-2 bg-o yello"> مشروع جديد <i
                                class="mdi mdi-plus me-1"></i></a>
                    </div>
                </div><!-- end col-->
            </div>
            <div class="">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap table-check" >
                            <thead >
                                <tr>
                                    <th class="align-middle">#</th>
                                    <th class="align-middle">الشعار</th>
                                    <th class="align-middle"> اسم المشروع</th>
                                    <th class="align-middle">نوع المشروع </th>
                                    <th class="align-middle">الموقع</th>
                                    <th class="align-middle">تاريخ البداية</th>
                                    <th class="align-middle">العمليات</th>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody class="bg-p">
                                    <tr >
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><img src="<?php echo e(url('/public/logo/' . $project->logo)); ?>" width="50"
                                                height="50"></td>
                                        <td><?php echo e($project->name); ?></td>
                                        <td><?php echo e($project->projectType->title); ?></td>
                                        <td><?php echo e($project->country . ' | ' . $project->city); ?></td>
                                        <td><?php echo e($project->start_date); ?></td>
                                        <td>  
                                                <a href="<?php echo e(route('projects.show', $project->id)); ?>" title="عرض"
                                                    class="text-success"><i class="mdi mdi-eye font-size-20"></i></a>
                                                
                                                <a href="<?php echo e(route('projects.edit', $project->id)); ?>" title="تعديل"
                                                    class="text-primary"><i class="mdi mdi-pencil font-size-20"></i></a>


                                                
                                                <a title="حذف" style="cursor: pointer" data-id="<?php echo e($project->id); ?>"
                                                    class="text-danger delete">
                                                    <i class="mdi mdi-delete font-size-20"></i></a>
                                                
                                        
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>

                    </div>
                    <ul class="pagination pagination-rounded justify-content-end mb-2">
                        <?php echo e($projects->links()); ?>

                    </ul>

                </div>

            </div>
        </div>
    </div>
    <!-- end row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-bottom'); ?>
    <script>
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
                        url: '<?php echo e(route('proj.del')); ?>',
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\my project\jadwahmad\resources\views/admin/projects/index.blade.php ENDPATH**/ ?>