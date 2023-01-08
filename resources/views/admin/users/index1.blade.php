@extends('layouts.master')

@section('title')
    المستخدمين
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            المستخدمين
        @endslot
        @slot('title')
            قائمة المستخدمين
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        {{-- <div class="col-sm-4">
                            <form action="{{ route('search_user') }}" method="post">
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        @csrf
                                        @method('POST')
                                        <input type="text" name="query" class="form-control"
                                            placeholder="الاسم,المنطقة,البريد,رقم الجوال">
                                        <i class="bx bx-search-alt search-icon"></i>

                                    </div>

                                </div>
                                <button type="submit" class="btn btn-secondary btn-rounded waves-effect waves-light"> بحث
                                    <i class="bx bx-search-alt search-icon me-1"></i></button>
                            </form>
                        </div> --}}

                        <div class="col-sm-12">
                            <div class="text-sm-end">
                                <a href="{{ route('users.create') }}"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2 yello"> إضافة مستخدم
                                    جديد <i class="mdi mdi-plus me-1"></i></a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive" style="overflow:hidden;">
                        <table class="table cell-border " style="text-align:center !important; " id="table">
                            <thead >
                                <tr>
                                    <th style="text-align:center !important;" class="align-middle">#</th>
                                    <th style="text-align:center !important;" class="align-middle">الاسم</th>
                                    <th style="text-align:center !important;" class="align-middle">البريد الإلكتروني</th>
                                    <th style="text-align:center !important;" class="align-middle">رقم الجوال</th>
                                    <th style="text-align:center !important;" class="align-middle">المنطقة</th>
                                    <th style="text-align:center !important;" class="align-middle">العمليات</th>
                                </tr>
                            </thead>

                        </table>
                        {{-- <table class="table align-middle table-nowrap table-check">
                            <thead class="table-light">
                                <tr>
                                    
                                    <th style="width: 20px;" class="align-middle">#</th>
                                    <th class="align-middle">الاسم</th>
                                    <th class="align-middle">البريد الإلكتروني</th>
                                    <th class="align-middle">رقم الجوال</th>
                                    <th class="align-middle">المنطقة</th>
                                    <th class="align-middle">الحالة</th>
                                    <th class="align-middle">العمليات</th>
                                </tr>
                            </thead>
                            @foreach ($users as $key => $user)
                                <tbody>
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><button type="button"
                                                class="btn btn-info btn-sm btn-rounded waves-effect waves-light">{{ $user->phone }}</button>
                                        </td>
                                        <td>{{ $user->country . ' | ' . $user->city }}</td>
                                        <td>
                                            @if ($user->status == 'active')
                                                <button type="button" style="cursor: auto"
                                                    class="btn btn-success waves-effect btn-label btn-sm"><i
                                                        class="bx bx-check-double label-icon"></i> نشط </button>
                                            @else
                                                <button type="button" style="cursor: auto"
                                                    class="btn btn-danger waves-effect btn-label btn-sm"><i
                                                        class="bx bx-block label-icon"></i> غير نشط </button>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                {{-- verifying user email 
                                                <a data-bs-toggle="modal" data-bs-target="#kt_modal_1" title="تأكيد البريد"
                                                    style="cursor: pointer" data-id="{{ $user->id }}"
                                                    class="text-primary"><i class="mdi mdi-email-send font-size-18"></i></a>
                                                {{-- activating & deactivating user 
                                                @if ($user->status == 'active')
                                                    <a data-bs-toggle="modal" data-bs-target="#kt_modal_4"
                                                        title="حظر المستخدم" style="cursor: pointer"
                                                        data-id="{{ $user->id }}" class="text-danger"><i
                                                            class="mdi mdi-toggle-switch-off font-size-20"></i></a>
                                                @else
                                                    <a data-bs-toggle="modal" data-bs-target="#kt_modal_3"
                                                        title="نفعيل المستخدم" style="cursor: pointer"
                                                        data-id="{{ $user->id }}" class="text-success"><i
                                                            class="mdi mdi-toggle-switch font-size-20"></i></a>
                                                @endif
                                                {{-- editing user
                                                <a href="{{ route('users.edit', $user->id) }}" title="تعديل"
                                                    class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                {{-- deleting user 
                                                <a data-bs-toggle="modal" data-bs-target="#kt_modal_2" title="حذف"
                                                    style="cursor: pointer" data-id="{{ $user->id }}"
                                                    class="text-danger">
                                                    <i class="mdi mdi-delete font-size-18"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>  --}}
                    </div>

                    {{-- <ul class="pagination pagination-rounded justify-content-center mb-2">
                        {{ $users->links() }}
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تأكيد البريد</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="user/verify" method="POST">.
                    @method('POST')
                    @csrf
                    <div class="modal-body">
                        <p>هل أنت متأكد من عملية تأكيد البريد ؟</p>
                        <input type="hidden" id="id" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">تأكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="kt_modal_2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">حذف المستخدم</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="users/destroy" method="POST">.
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>هل أنت متأكد من عملية الحذف ؟</p>
                        <input type="hidden" id="id" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="kt_modal_3">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تفعيل المستخدم</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="user/active" method="POST">.
                    @method('POST')
                    @csrf
                    <div class="modal-body">
                        <p>هل أنت متأكد من عملية تفعيل المستخدم ؟</p>
                        <input type="hidden" id="id" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">تأكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="kt_modal_4">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">حظر المستخدم</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-danger ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="user/deactivate" method="POST">.
                    @method('POST')
                    @csrf
                    <div class="modal-body">
                        <p>هل أنت متأكد من عملية حظر المستخدم ؟</p>
                        <input type="hidden" id="id" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">تأكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script-bottom')
    <a href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css"></a>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <script type="text/javascript">
        var table;
        var data = $('table').serializeArray();
        $(document).ready(function() {
            drawTable(data);
            function drawTable(data) {
                table = $('#table').DataTable({

                    processing: true,
                    serverside: true,
                    order: [
                        [0, "asc"]
                    ],
                    ajax: "{{ route('get_users') }}",
                    columns: [{
                        data: 'id',
                        name: 'id',
                    }, {
                        data: 'name',
                        name: 'name',
                    }, {
                        data: 'email',
                        name: 'email',
                    }, {
                        data: 'phone',
                        name: 'phone',
                    }, {
                        data: 'country',
                        name: 'country',
                    }, {
                        data: 'action',
                        name: 'action',
                    }],
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json"
                    },
                    buttons: [{
                        text: 'My button',
                        action: function(e, dt, node, config) {
                            alert('Button activated');
                        }
                    }],
                })
            };
        });
    </script>
    <script>
        $('#kt_modal_1').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })

        $('#kt_modal_2').on('show.bs.modal', function(event) {
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
    </script>
@endsection
