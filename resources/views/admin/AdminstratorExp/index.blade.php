@extends('layouts.master')

@section('title')
    مصاريف ادارية
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1')
        اعدادات المشروع
        @endslot
        @slot('title')
            مصاريف ادارية
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <form method="POST" action="{{ route('search_adminst_expen') }}">
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        @csrf
                                        @method('POST')
                                        <input type="text" name="query" class="form-control"
                                            placeholder=" ابحث عن  صفحة">
                                        <i class="bx bx-search-alt search-icon"></i>

                                    </div>

                                </div>

                            </form>
                        </div>

                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                {{-- <a href="{{ route('contacts.create') }}"
                                   class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"> إضافة  جديد <i
                                        class="mdi mdi-plus me-1"></i></a> --}}

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
                                                    action="{{ route('adminstExp.store') }}"id="newModalForm">
                                                    @csrf

                                                    <div class="mb-3">
                                                        <label for="item" class="col-form-label flex">البند</label>
                                                        <input type="text" name="item" class="form-control validate"
                                                            id="item" value="{{ old('item') }}" required>
                                                        @error('item')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="value" class="col-form-label flex">القيمة</label>
                                                        <textarea class="form-control validate" name="value" id="value" required>{{ old('value') }}</textarea>
                                                        @error('value')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
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
                    @if (isset($adminstExp))
                        @if ($adminstExp->count() > 0)
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
                                    @foreach ($adminstExp as $key => $adminstExp)
                                        <tbody class="bg-p">
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $adminstExp->item }}</td>
                                                <td>{{ $adminstExp->value }}</td>

                                                <td>
                                                    <div class="d-flex gap-3">


                                                        {{-- <a  title="تعديل" class="text-success"  data-bs-toggle="modal" data-bs-target="#editModal"   data-id="{{ $item->id }}"><i
                                                    class="mdi mdi-pencil font-size-24"></i></a> --}}
                                                        <a title="تعديل" class="text-success" data-bs-toggle="modal"
                                                            data-id="{{ $adminstExp->id }}"
                                                            data-item="{{ $adminstExp->item }}"
                                                            data-value="{{ $adminstExp->value }}"
                                                            data-bs-target="#editModal"><i
                                                                class="fa fa-pen" aria-hidden="true"></i> </a>

                                                        {{-- deleting page --}}

                                                        <a title="حذف" style="cursor: pointer"
                                                            data-id="{{ $adminstExp->id }}" class="text-danger delete">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a>

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
                                            <form method="POST" action="adminstExp/{adminstExp}" id="editModal">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" id="id" name="id">


                                                <div class="mb-3">
                                                    <label for="item" class="col-form-label">البند</label>
                                                    <input type="text" name="item" class="form-control"
                                                        id="item" value="{{ $adminstExp->item }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="value" class="col-form-label">القيمة</label>
                                                    <input type="text" name="value" class="form-control"
                                                        id="value" value="{{ $adminstExp->value }}">
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
                        url: '{{ url('adminstExp/{adminstExp}') }}',
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
@endsection
