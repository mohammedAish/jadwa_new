@extends('layouts.master')

@section('title')
    المشاريع
@endsection


@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            المشاريع
        @endslot
        @slot('title')
            قائمة المشاريع
        @endslot
    @endcomponent
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
                    <form action="{{ route('search_project') }}" method="post">
                        <div class="search-box me-2 mb-2 d-inline-block">
                            <div class="position-relative">
                                @csrf
                                @method('POST')
                                <input type="text" name="query" class="form-control"
                                    placeholder=" ابحث عن المشروع">
                                <i class="bx bx-search-alt search-icon"></i>

                            </div>

                        </div>

                    </form>
                </div>

                <div class="col-sm-8">
                    <div class="text-sm-end">
                        <a href="{{ route('projects.create') }}"
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
                            @foreach ($projects as $key => $project)
                                <tbody class="bg-p">
                                    <tr >
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ url('/public/logo/' . $project->logo) }}" width="50"
                                                height="50"></td>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->projectType->title }}</td>
                                        <td>{{ $project->country . ' | ' . $project->city }}</td>
                                        <td>{{ $project->start_date }}</td>
                                        <td>  {{-- show project --}}
                                                <a href="{{ route('projects.show', $project->id) }}" title="عرض"
                                                    class="text-success"><i class="mdi mdi-eye font-size-20"></i></a>
                                                {{-- editing project --}}
                                                <a href="{{ route('projects.edit', $project->id) }}" title="تعديل"
                                                    class="text-primary"><i class="mdi mdi-pencil font-size-20"></i></a>


                                                {{-- deleting project --}}
                                                <a title="حذف" style="cursor: pointer" data-id="{{ $project->id }}"
                                                    class="text-danger delete">
                                                    <i class="mdi mdi-delete font-size-20"></i></a>
                                                {{-- <button class="btn btn-danger delete" data-id="{{  $project->id }}">Delete</button> --}}

                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>

                    </div>
                    <ul class="pagination pagination-rounded justify-content-end mb-2">
                        {{ $projects->links() }}
                    </ul>

                </div>

            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script-bottom')
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
                        url: '{{ route('proj.del') }}',
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
