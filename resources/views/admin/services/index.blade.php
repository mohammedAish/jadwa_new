@extends('layouts.master')

@section('title') الخدمات @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') اعدادات النظام @endslot
        @slot('title') الخدمات @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                             <form action="{{ route('search_services') }}" method="post">
                            <div class="search-box me-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                        @csrf
                                        @method('POST')
                                        <input type="text" name="query" class="form-control" placeholder=" ابحث عن المشروع">
                                        <i class="bx bx-search-alt search-icon"></i>

                                </div>

                            </div>

                            </form>
                        </div>

                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <a href="{{ route('services.create') }}"
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
                            @foreach($services as $key => $services)
                                <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$services->title}}</td>
                                    <td>{{$services->price}}</td>
                                    <td><img src="{{ url('public/image/'.$services->image) }}" width="50" height="50"></td>
                                    <td>{{$services->status }}</td>

                                    <td>
                                        <div class="d-flex gap-3">


                                            {{--editing project--}}
                                            <a href="{{ route('services.edit', $services->id) }}" title="تعديل" style="cursor: pointer"  class="text-success"><i
                                                    class="fa fa-pen"></i></a>


                                         {{--deleting project--}}
                                         {{-- <a data-bs-toggle="modal" data-bs-target="#kt_modal_2" title="حذف" style="cursor: pointer"  data-id="{{ $services->id }}"  class="text-danger">
                                            <i
                                                class="mdi mdi-delete font-size-18"></i></a> --}}

                                                <a  title="حذف" style="cursor: pointer"  data-id="{{ $services->id }}"  class="text-danger delete">
                                                    <i
                                                        class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- end row -->




    @section('script-bottom')
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
                            url: '{{ url('services/{service}') }}',
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
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}

@endsection
