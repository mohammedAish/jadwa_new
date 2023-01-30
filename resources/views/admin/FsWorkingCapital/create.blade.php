@extends('layouts.master')

@section('title')
    {{ 'دراسة السوق' }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('title')
            {{ 'دراسة جدوى' }}
        @endslot
        @slot('name')
            {{ 'دراسة رأس المال العامل' }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="vertical-example" class="vertical-wizard">
                        <h3>رأس المال العامل</h3>
                        <section>
                            <h4 class="mb-4"><strong>رأس المال العامل</strong></h4>
                            <form id="form1" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 @error('account_receivable') is-invalid @enderror">
                                            <h4>
                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1584_944)">
                                                        <path d="M3.50312 14.1969C3.50312 14.3937 3.55988 14.5856 3.66825 14.7497L4.20388 15.5525C4.36794 15.7986 4.74044 15.9987 5.03638 15.9987H6.96356C7.2585 15.9987 7.63106 15.7987 7.79513 15.5525L8.32887 14.75C8.42069 14.6113 8.496 14.3634 8.496 14.1969L8.5 12.9719H3.5L3.50312 14.1969ZM6 0C2.81312 0.01 0.5 2.59281 0.5 5.47188C0.5 6.85875 1.01375 8.12313 1.86125 9.09062C2.37781 9.67937 3.18438 10.9103 3.49312 11.9484C3.49409 11.9563 3.49606 11.9646 3.49703 11.9729H8.50328C8.50425 11.9646 8.50622 11.9567 8.50719 11.9484C8.81578 10.9103 9.6225 9.67937 10.1391 9.09062C10.9875 8.15 11.5 6.8875 11.5 5.47188C11.5 2.4625 9.0375 0.000125 6 0ZM9.0125 8.12813C8.52312 8.68594 7.9175 9.575 7.47969 10.4997H4.52313C4.08531 9.575 3.47969 8.68594 2.99062 8.12844C2.35125 7.4 2 6.44063 2 5.47188C2 3.54063 3.50313 1.50781 5.97188 1.5C8.20625 1.5 10 3.29375 10 5.47188C10 6.44063 9.65 7.4 9.0125 8.12813ZM5.5 2.5C4.12188 2.5 3 3.62188 3 5C3 5.27637 3.22362 5.5 3.5 5.5C3.77638 5.5 4 5.275 4 5C4 4.17281 4.67281 3.5 5.5 3.5C5.77637 3.5 6 3.27663 6 3.00031C6 2.724 5.775 2.5 5.5 2.5Z" fill="#0A0A0A" fill-opacity="0.6"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1584_944">
                                                            <rect width="12" height="16" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                الفترة المتوقعة لتحصيل المبيعات ( أيام )
                                            </h4>
{{--                                            <input type="text" name="account_receivable" class="form-control" id="verticalnav-pancard-input">--}}
                                            <select name="account_receivable" class="form-control" id="receivableselect">
                                                <option selected disabled> -- إختر -- </option>
                                                <?php
                                                $i=15;
                                                for ($i=15;$i<=120;$i+=15){
                                                    echo  '<option   value="'. $i .'"> '. $i .'</option>';
                                                }
                                                ?>
                                                <option id="receivable" value="receivable" value="أخرى">أخرى</option>
                                            </select>
                                            <span class="text-danger error-text account_receivable_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 @error('account_payable') is-invalid @enderror">
                                            <h4>
                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1584_944)">
                                                        <path d="M3.50312 14.1969C3.50312 14.3937 3.55988 14.5856 3.66825 14.7497L4.20388 15.5525C4.36794 15.7986 4.74044 15.9987 5.03638 15.9987H6.96356C7.2585 15.9987 7.63106 15.7987 7.79513 15.5525L8.32887 14.75C8.42069 14.6113 8.496 14.3634 8.496 14.1969L8.5 12.9719H3.5L3.50312 14.1969ZM6 0C2.81312 0.01 0.5 2.59281 0.5 5.47188C0.5 6.85875 1.01375 8.12313 1.86125 9.09062C2.37781 9.67937 3.18438 10.9103 3.49312 11.9484C3.49409 11.9563 3.49606 11.9646 3.49703 11.9729H8.50328C8.50425 11.9646 8.50622 11.9567 8.50719 11.9484C8.81578 10.9103 9.6225 9.67937 10.1391 9.09062C10.9875 8.15 11.5 6.8875 11.5 5.47188C11.5 2.4625 9.0375 0.000125 6 0ZM9.0125 8.12813C8.52312 8.68594 7.9175 9.575 7.47969 10.4997H4.52313C4.08531 9.575 3.47969 8.68594 2.99062 8.12844C2.35125 7.4 2 6.44063 2 5.47188C2 3.54063 3.50313 1.50781 5.97188 1.5C8.20625 1.5 10 3.29375 10 5.47188C10 6.44063 9.65 7.4 9.0125 8.12813ZM5.5 2.5C4.12188 2.5 3 3.62188 3 5C3 5.27637 3.22362 5.5 3.5 5.5C3.77638 5.5 4 5.275 4 5C4 4.17281 4.67281 3.5 5.5 3.5C5.77637 3.5 6 3.27663 6 3.00031C6 2.724 5.775 2.5 5.5 2.5Z" fill="#0A0A0A" fill-opacity="0.6"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1584_944">
                                                            <rect width="12" height="16" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                الفترة المتوقعة لسداد الفواتير ( أيام )
                                            </h4>
                                            <select name="account_payable" class="form-control" id="payableselect">
                                                <option selected disabled> -- إختر -- </option>
                                                <?php
                                                $i=15;
                                                for ($i=15;$i<=120;$i+=15){
                                                    echo  '<option   value="'. $i .'"> '. $i .'</option>';
                                                  }
                                                ?>
                                                <option id="payable" value="payable" value="أخرى">أخرى</option>
                                            </select>
                                            <span class="text-danger error-text account_payable_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 @error('inventory') is-invalid @enderror">
                                            <h4>
                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1584_944)">
                                                        <path d="M3.50312 14.1969C3.50312 14.3937 3.55988 14.5856 3.66825 14.7497L4.20388 15.5525C4.36794 15.7986 4.74044 15.9987 5.03638 15.9987H6.96356C7.2585 15.9987 7.63106 15.7987 7.79513 15.5525L8.32887 14.75C8.42069 14.6113 8.496 14.3634 8.496 14.1969L8.5 12.9719H3.5L3.50312 14.1969ZM6 0C2.81312 0.01 0.5 2.59281 0.5 5.47188C0.5 6.85875 1.01375 8.12313 1.86125 9.09062C2.37781 9.67937 3.18438 10.9103 3.49312 11.9484C3.49409 11.9563 3.49606 11.9646 3.49703 11.9729H8.50328C8.50425 11.9646 8.50622 11.9567 8.50719 11.9484C8.81578 10.9103 9.6225 9.67937 10.1391 9.09062C10.9875 8.15 11.5 6.8875 11.5 5.47188C11.5 2.4625 9.0375 0.000125 6 0ZM9.0125 8.12813C8.52312 8.68594 7.9175 9.575 7.47969 10.4997H4.52313C4.08531 9.575 3.47969 8.68594 2.99062 8.12844C2.35125 7.4 2 6.44063 2 5.47188C2 3.54063 3.50313 1.50781 5.97188 1.5C8.20625 1.5 10 3.29375 10 5.47188C10 6.44063 9.65 7.4 9.0125 8.12813ZM5.5 2.5C4.12188 2.5 3 3.62188 3 5C3 5.27637 3.22362 5.5 3.5 5.5C3.77638 5.5 4 5.275 4 5C4 4.17281 4.67281 3.5 5.5 3.5C5.77637 3.5 6 3.27663 6 3.00031C6 2.724 5.775 2.5 5.5 2.5Z" fill="#0A0A0A" fill-opacity="0.6"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1584_944">
                                                            <rect width="12" height="16" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                فترة دورات المخزون ( أيام )
                                            </h4>
{{--                                            <select name="message" class="form-control" id="verticalnav-pancard-input">--}}
{{--                                                <option selected disabled> -- إختر -- </option>--}}
{{--                                            </select>--}}
                                            <select name="inventory" class="form-control" id="inventoryselect">
                                                <option selected disabled> -- إختر -- </option>
                                                <?php
                                                $i=15;
                                                for ($i=15;$i<=120;$i+=15){
                                                    echo  '<option   value="'. $i .'"> '. $i .'</option>';
                                                }
                                                ?>
                                                <option id="inventory" value="inventory" value="أخرى">أخرى</option>
                                            </select>
                                            <span class="text-danger error-text inventory_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 " style="float: left">
                                        {{-- <button name="save1" onclick="return form1()" type="button" class="btn btn-warning inner"
                                            id="save1">حفظ والتالي</button>  --}}
                                        <input type="submit" value="حفظ والتالي" name="storefsaccountreceivable"  class="btn btn-warning inner go storefsaccountreceivable"
                                               id="storefsaccountreceivable">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>جدول التكاليف</h3>
                        <section>
                            <h4 class="mb-4"><strong>جدول التكاليف</strong></h4>
                            <form id="form_2"
                                  class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <h4 class="mb-4">السوق الكلي</h4>
                                            <input type="text" name="vision" class="form-control" id="verticalnav-pancard-input" placeholder="السوق الكلي">
                                            <span class="text-danger error-text vision_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <h4 class="mb-4">السوق المستهدف</h4>
                                            <input type="text" name="vision" class="form-control" id="verticalnav-pancard-input" placeholder="السوق المستهدف">
                                            <span class="text-danger error-text vision_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="mb-4">
                                            <h4 class="mb-4">الحصة السوقية</h4>
                                            <input type="text" name="vision" class="form-control" id="verticalnav-pancard-input" placeholder="الحصة السوقية">
                                            <span class="text-danger error-text vision_error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 " style="float: left">
                                        {{-- <button name="save1" onclick="return form1()" type="button" class="btn btn-warning inner"
                                            id="save1">حفظ والتالي</button>  --}}
                                        <input type="submit" value="حفظ والتالي" class="btn btn-warning inner go"
                                               id="save_form_2">
                                    </div>
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

@endsection
@section('script')

    <!-- form wizard init -->
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-steps/jquery-steps.min.js') }}"></script>

    {{--    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>--}}

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $(document).on('change', 'select', function() {
                var opt = $(this).find('option:selected')[0];
                if($(this).val() == 'receivable'){
                    $('#receivableselect').after(`<input name="account_receivable" type="text" class="inner form-control"  value="" placeholder="قم بادخال قيمة" />`);
                }
                if($(this).val() == 'payable'){
                    $('#payableselect').after(`<input name="account_payable" type="text" class="inner form-control"  value="" placeholder="قم بادخال قيمة" />`);
                }
                if($(this).val() == 'inventory'){
                    $('#inventoryselect').after(`<input name="inventory" type="text" class="inner form-control"  value="" placeholder="قم بادخال قيمة" />`);
                }

            });
        });
        document.addEventListener('click', function(e) {
            var eventTarget = e.target;
            if (e.target.id == 'storefsaccountreceivable') {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('fs-account-receivable.store') }}",
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
                            $('#vertical-example-p-0').attr('style' , 'display:none');
                            $('#vertical-example-t-0').parent().removeClass('current');
                            $('#vertical-example-p-1').removeAttr('style');
                            $('#vertical-example-t-1').parent().attr('class','current');
                        } else {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                    }
                });

            }
        });


        $(document).ready(function(){
            $('#save_1').click(function (event) {
                $("#form5 :input").prop("disabled", true);
                event.preventDefault();
                console.log('clicked')
            });

            fetchservices();

            $("#createModal").on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget)
                var id = button.data('id')
                var name = button.data('name')
                var details = button.data('details')

                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #name').val(name);
                modal.find('.modal-body #details').val(details);


                $('#create-btn').click(function (event) {

                    event.preventDefault();

                    $(this).html('Sending..');
                    $.ajax({
                        url: "{{ route('create_project_product_service') }}",
                        type:"POST",
                        data: $('#createModalForm').serialize(),
                        success:function(response){
                            toastr.success(response.Message);
                            $('#createModal').modal('hide');
                            fetchservices();
                            sessionStorage.clear()
                        },
                        error: function(response) {
                            toastr.error(response.Message);
                        }
                    });
                });
            })

            $("#editModal").on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget)
                var id = button.data('id')
                var name = button.data('name')
                var details = button.data('details')

                var modal = $(this)
                modal.find('.modal-body #id').val(id);
                modal.find('.modal-body #name').val(name);
                modal.find('.modal-body #details').val(details);


                $('#save-btn').click(function (event) {

                    event.preventDefault();

                    $(this).html('Sending..');
                    $.ajax({
                        url: "{{ route('update_project_product_service') }}",
                        type:"POST",
                        data: $('#editModalForm').serialize(),
                        success:function(response){
                            toastr.success(response.Message);
                            $('#editModal').modal('hide');
                            fetchservices();
                            sessionStorage.clear()
                        },
                        error: function(response) {
                            toastr.error(response.Message);
                        }
                    });
                });
            })

            $("#deleteModal").on('show.bs.modal', function(event) {

                var button = $(event.relatedTarget)
                var id = button.data('id')

                var modal = $(this)
                modal.find('.modal-body #id').val(id);

                $('#delete-btn').click(function (event) {

                    event.preventDefault();

                    $(this).html('Sending..');
                    $.ajax({
                        url: "{{ route('delete_project_product_service') }}",
                        type:"POST",
                        data: $('#deleteModalForm').serialize(),
                        success:function(response){
                            toastr.success(response.Message);
                            $('#deleteModal').modal('hide');
                            fetchservices();
                            sessionStorage.clear()
                        },
                        error: function(response) {
                            toastr.error(response.Message);
                        }
                    });
                });
            })
        });

        function fetchservices() {
            $.ajax({
                type: "GET",
                url: "{{ route('fetch_project_services') }}",
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('#project_services').html("");
                    $.each(response.services, function (key, item) {
                        $('#project_services').append('\
                            <tr>\
                                            <td>' + ++key + '</td>\
                                            <td>' + item.name + '</td>\
                                            <td>' + item.details + '</td>\
                                            <td> \
                                            <a  title="تعديل" class="text-success"  data-bs-toggle="modal" data-id="' + item.id + '"\
                                                data-name="' + item.name + '"    data-details="' + item.details + '"\
                                                href="#editModal"><i\
                                                class="fa fa-pen font-size-18"></i> </a>&nbsp;&nbsp;\
                                            <a title="حذف" style="cursor: pointer"\
                                            data-bs-toggle="modal"\
                                                data-id="' + item.id + '" href="#deleteModal" class="text-danger delete ">\
                                                <i class="fa fa-trash font-size-18"></i></a>\
                                                </td>\
                                        </tr> '
                        );
                    });
                }
            });
        }

    </script>
    <script>
        $(function() {
            $('#form1').validate({
                rules: {
                    'account_receivable': {
                        required: true,
                    },
                    'account_payable': {
                        required: true,
                    },
                    'inventory': {
                        required: true,
                    },
                },
                messages: {
                    'account_receivable': {
                        required: "هذا الحقل مطلوب",
                    },
                    'account_payable': {
                        required: "هذا الحقل مطلوب",
                    },
                    'inventory': {
                        required: "هذا الحقل مطلوب",
                    }
                }
            });
        })
    </script>


@endsection
