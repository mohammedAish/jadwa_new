@extends('layouts.master')

@section('title') الصفحات @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') اعدادات النظام @endslot
        @slot('title')  الصفحات @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <form method="POST" action="{{ route('search_pages') }}" >
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                            @csrf
                                            @method('POST')
                                            <input type="text" name="query" class="form-control" placeholder=" ابحث عن صفحة">
                                            <i class="bx bx-search-alt search-icon"></i>
    
                                    </div>
    
                                </div>
                            
                                </form>
                        </div>

                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <a href="{{ route('pages.create') }}"
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
                           
                            @foreach($pages as $key => $page)
                                <tbody class="bg-p">
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$page->title}}</td>
                                    <td>{{$page->type}}</td>
                                    <td>{!! Str::limit($page->content, 100) !!}</td>

                                    <td>
                                        <div class="d-flex gap-3">

                                            {{--editing page--}}
                                            <a href="{{route('pages.edit',$page)}}" style="cursor: pointer"  title="تعديل" class="text-success"><i
                                                    class="fa fa-pen"></i></a>
                                            {{--deleting page--}}
                                            
                                            <a  title="حذف" style="cursor: pointer"  data-id="{{ $page->id }}"  class="text-danger delete">
                                               <i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>

                    {{-- <ul class="pagination pagination-rounded justify-content-center mb-2">
                        {{ $project->links() }}
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->




@endsection

@section('script-bottom')
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
                            url: '{{ url('pages/{page}') }}',
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
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>

@endsection
