@extends('layouts.master')

@section('title')
    أنواع المشاريع
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1')
        اعدادات المشروع
        @endslot
        @slot('title')
            أنواع المشاريع
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <form method="POST" action="{{ route('search_projType') }}">
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        @csrf
                                        @method('POST')
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
                                                <form method="POST" action="{{ route('projectype.store') }}"
                                                    id="newModalForm">
                                                    @csrf

                                                    <div class="mb-3">
                                                        <label for="title" class="col-form-label flex">العنوان</label>
                                                        <input type="text" name="title" class="form-control validate"
                                                            id="title" value="{{ old('title') }}" required>
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
                    @if (isset($projType))
                        @if ($projType->count() > 0)
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
                                    @foreach ($projType as $key => $item)
                                        <tbody class="bg-p">
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->status }}</td>

                                                <td>
                                                    <div class="d-flex gap-3">


                                                        <a title="تعديل" class="text-success" data-bs-toggle="modal"
                                                            data-id="{{ $item->id }}" data-title="{{ $item->title }}"
                                                            data-bs-target="#editModal"> <i class="fa fa-pen"></i></a>

                                                        {{-- deleting projecttype --}}
                                                        <a title="حذف" style="cursor: pointer"
                                                            data-id="{{ $item->id }}" class="text-danger delete">
                                                            <i class="fa fa-trash"></i></a>

                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
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
                                                @csrf
                                                @method('put')
                                                <input type="hidden" id="id" name="id">


                                                <div class="mb-3">
                                                    <label for="title" class="col-form-label">العنوان</label>
                                                    <input type="text" name="title" class="form-control"
                                                        id="title" value="{{ $item->title }}">
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
                        @endif
                    @endif


                </div>
            </div>
        </div>
    </div>
    <!-- end row -->


@section('script-bottom')
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
                        url: '{{ url('projectype/{projectype}') }}',
                        type: 'Delete',
                        data: {
                            'id': id,
                            '_token': '{{ csrf_token() }}',
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
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}

@endsection
