


<?php $__env->startSection('title'); ?> معلومات التواصل <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>  <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>  اعدادات النظام > قائمة التواصل <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <form method="POST" action="<?php echo e(route('search_contact')); ?>" >
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
                                

                                        <button type="button" class="btn btn-success  waves-effect waves-light mb-2 me-2 bg-o yello" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">اضافة جديد</button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">اضافة جديد </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="<?php echo e(route('contacts.store')); ?>" id="newModalForm">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="mb-3">
                                                                <label for="type" class="col-form-label flex">النوع</label>
                                                                <select id="type" class="form-control validate" name="type" required >
                                                                    <option selected disabled hidden >-- إختر النوع --</option>
                                                                    <option value="FaceBook">FaceBook</option>
                                                                    <option value="TWitter">TWitter</option>
                                                                    <option value="Instagram">Instagram</option>
                                                                    <option value="Tiktok">Tiktok</option>
                                                                    <option value="Snapchat">Snapchat</option>
                                                                    <option value="WhatsApp">WhatsApp</option>
                                                                    <option value="YouTube">YouTube</option>
                                                                    <option value="Email">Email</option>
                                                                    <option value="Phone">Phone</option>

                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="title" class="col-form-label flex">العنوان</label>
                                                                <input type="text" name="title" class="form-control validate" id="title" value="<?php echo e(old('title')); ?>" required >
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="value" class="col-form-label flex">المحتوى</label>
                                                                <textarea class="form-control validate" name="value" id="value" required ><?php echo e(old('value')); ?></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary"  id="formSubmit" >اضافة</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <?php if(isset($contact)): ?>
                    <?php if($contact->count() > 0): ?>

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap table-check">
                            <thead class="orange">
                            <tr>

                                <th style="width: 20px;" class="align-middle">#</th>
                                <th class="align-middle">نوع التواصل  </th>
                                <th class="align-middle"> العنوان  </th>
                                <th class="align-middle">المحتوى </th>
                                <th class="align-middle">العمليات</th>
                            </tr>
                            </thead>
                            <?php $__currentLoopData = $contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tbody class="bg-p">
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                   <td><?php echo e($contact->type); ?></td>
                                    <td><?php echo e($contact->title); ?></td>
                                    <td><?php echo e($contact->value); ?></td>

                                    <td>
                                        <div class="d-flex gap-3">


                                            
                                                    <a  title="تعديل" class="text-success"  data-bs-toggle="modal" data-id="<?php echo e($contact->id); ?>"
                                            data-type="<?php echo e($contact->type); ?>"      data-title="<?php echo e($contact->title); ?>"
                                             data-value="<?php echo e($contact->value); ?>"
                                               data-bs-target="#editModal"><i
                                               class="mdi mdi-pencil font-size-24"></i> </a>

                                           

                                         <a  title="حذف" style="cursor: pointer"  data-id="<?php echo e($contact->id); ?>"  class="text-danger delete">
                                            <i
                                                class="mdi mdi-delete font-size-18"></i></a>

                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel"> تعديل </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                   <form method="POST" action="contacts/{contact}" id="editModal">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('put'); ?>
                                        <input type="hidden" id="id" name="id">



                                     <div class="mb-3">
                                            <label for="type" class="col-form-label">النوع</label>
                                            <select id="type" class="form-select" name="type" >
                                                <option  selected disabled hidden value="<?php echo e($contact->type); ?>"><?php echo e($contact->type); ?></option>
                                                <option value="FaceBook">FaceBook</option>
                                                <option value="TWitter">TWitter</option>
                                                <option value="Instagram">Instagram</option>
                                                <option value="Tiktok">Tiktok</option>
                                                <option value="Snapchat">Snapchat</option>
                                                <option value="WhatsApp">WhatsApp</option>
                                                <option value="YouTube">YouTube</option>
                                                <option value="Email">Email</option>
                                                <option value="Phone">Phone</option>

                                            </select>
                                        </div>


                                         <div class="mb-3">
                                            <label for="title" class="col-form-label">العنوان</label>
                                            <input type="text" name="title" class="form-control" id="title" value="<?php echo e($contact->title); ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="value" class="col-form-label">المحتوى</label>
                                            <input type="text" name="value" class="form-control" id="value" value="<?php echo e($contact->value); ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" >تعديل</button>
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
 type: {
   required: true,
  
 },
 title: {
   required: true,
 },
 value: {
   required: true,
 },
 },
 messages: {
 type:"Please select a type",
 title: "Please enter the title",
 value: "please enter the value"
 }

});
 });
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var type = button.data('type')
            var title = button.data('title')
            var value = button.data('value')


            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #type').val(type);
            modal.find('.modal-body #title').val(title);
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
                            url: '<?php echo e(url('contacts/{contact}')); ?>',
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







<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\jadwahmad\resources\views/admin/contact/index.blade.php ENDPATH**/ ?>