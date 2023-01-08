@extends('layouts.master')

@section('title') قنوات البيع @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1')  @endslot
        @slot('title') قنوات البيع@endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">

                        </div>

                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                {{-- <a href="{{ route('contacts.create') }}"
                                   class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"> إضافة  جديد <i
                                        class="mdi mdi-plus me-1"></i></a> --}}

                                        <button type="button" class="btn btn-success  waves-effect waves-light mb-2 me-2 yello" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">اضافة جديد</button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">اضافة جديد </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{ route('projBpChanlRes.store') }}">
                                                            @csrf

                                                            <div class="mb-3">
                                                                <label for="title" class="col-form-label">البند</label>
                                                                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
                                                            </div>


                                                                <div class="mb-3">
                                                                    <label for="project_type_id" class="form-label">project_type_id</label>
                                                                    <!-- All countries -->
                                                                    <select id="project_type_id" class="form-select" name="project_type_id">
                                                                        <option selected disabled hidden>-- إختر --</option>
                                                                        @foreach ($protype as  $item)
                                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                           <input type="text" name="type" class="form-control" id="type" value="{{'sale_channel'}}">

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" >اضافة</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div><!-- end col-->
                    </div>
                    @if (isset($projBpChanlRes))
                    @if($projBpChanlRes->count() > 0)

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap table-check">
                            <thead class="orange">
                            <tr>

                                <th style="width: 20px;" class="align-middle">#</th>
                                <th class="align-middle"> البند  </th>
                                <th class="align-middle">العمليات</th>
                            </tr>
                            </thead>
                            @foreach($projBpChanlRes as $key => $item)
                                <tbody>
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->title}}</td>

                                    <td>
                                        <div class="d-flex gap-3">


                                            {{-- <a  title="تعديل" class="text-success"  data-bs-toggle="modal" data-bs-target="#editModal"   data-id="{{ $item->id }}"><i
                                                    class="mdi mdi-pencil font-size-24"></i></a> --}}
                                                    <a  title="تعديل" class="text-success"  data-bs-toggle="modal" data-id="{{ $item->id }}"
                                               data-title="{{ $item->title }}"    data-project_type_id="{{ $item->project_type_id }}"
                                               data-bs-target="#editModal"><i
                                               class="mdi mdi-pencil font-size-18"></i> </a>

                                           {{--deleting page--}}

                                         <a  title="حذف" style="cursor: pointer"  data-id="{{ $item->id }}"  class="text-danger delete">
                                            <i
                                                class="mdi mdi-delete font-size-18"></i></a>

                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            @endforeach
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
                                   <form method="POST" action="projBpChanlRes/{projBpChanlRe}" id="editModal">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" id="id" name="id">


                                         <div class="mb-3">
                                            <label for="title" class="col-form-label">البند</label>
                                            <input type="text" name="title" class="form-control" id="title" value="">
                                        </div>  
                
                                        <div class="mb-3">
                                            <label for="project_type_id" class="form-label">نوع المشروع</label>
                                    <!-- All countries -->
                                    <select id="project_type_id" class="form-select" name="project_type_id">
                                        
                                       
                                        <option selected disabled hidden>-- إختر --</option>
                                                             @foreach ($protype as  $protype)
                                      <option value="{{$protype->id}}"  >{{$protype->title}}</option>
                                                             @endforeach
                                   
                                    </select>
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
                @endif
                @endif


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
            var project_type_id  = button.data('project_type_id ')
            

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #title').val(title);
            modal.find('.modal-body #project_type_id ').val(project_type_id );
            

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
                            url: '{{ url('projBpChanlRes/{projBpChanlRe}') }}',
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
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
@endsection
