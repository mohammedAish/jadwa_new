<!-- JAVASCRIPT -->
<script src="<?php echo e(asset('assets/libs/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/bootstrap/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/metismenu/metismenu.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/node-waves/node-waves.min.js')); ?>"></script>
<script>
    $('#change-password').on('submit',function(event){
        event.preventDefault();
        var Id = $('#data_id').val();
        var current_password = $('#current-password').val();
        var password = $('#password').val();
        var password_confirm = $('#password-confirm').val();
        $('#current_passwordError').text('');
        $('#passwordError').text('');
        $('#password_confirmError').text('');
        $.ajax({
            url: "<?php echo e(url('update-password')); ?>" + "/" + Id,
            type:"POST",
            data:{
                "current_password": current_password,
                "password": password,
                "password_confirmation": password_confirm,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success:function(response){
                $('#current_passwordError').text('');
                $('#passwordError').text('');
                $('#password_confirmError').text('');
                if(response.isSuccess == false){
                    $('#current_passwordError').text(response.Message);
                }else if(response.isSuccess == true){
                    setTimeout(function () {
                        window.location.href = "<?php echo e(route('root')); ?>";
                    }, 1000);
                }
            },
            error: function(response) {
                $('#current_passwordError').text(response.responseJSON.errors.current_password);
                $('#passwordError').text(response.responseJSON.errors.password);
                $('#password_confirmError').text(response.responseJSON.errors.password_confirmation);
            }
        });
    });
</script>

<?php echo $__env->yieldContent('script'); ?>

<!-- App js -->

<script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>


<script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


<script>
    $(document).ready(function() {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        <?php if(Session::has('error')): ?>
        toastr.error('<?php echo e(Session::get('error')); ?>');
        <?php elseif(Session::has('success')): ?>
        toastr.success('<?php echo e(Session::get('success')); ?>');
        <?php endif; ?>
    });

</script>


<?php echo $__env->yieldContent('script-bottom'); ?>
<?php /**PATH D:\my project\jadwahmad\resources\views/layouts/vendor-scripts.blade.php ENDPATH**/ ?>