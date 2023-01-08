@extends('layouts.master')

@section('title')
    {{ 'تعديل خدمة' }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            خدمة
        @endslot
        @slot('title')
            تعديل خدمة
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">الإسم</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{  old('title' , $service->title) }}" id="title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">السعر </label>
                                    <input type="number" name="price"
                                        class="form-control @error('price') is-invalid @enderror"
                                        value="{{  old('price' , $service->price) }}" id="price">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>




                        </div>








                        <div class="row">


                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-logo-input" class="form-label"> اسم الراوت </label>
                                    <input type="text" class="form-control @error('route') is-invalid @enderror"
                                        name="route" id="formrow-image-input" value="{{ old('route' ,  $service->route ) }}">
                                    @error('route')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="formrow-logo-input" class="form-label"> صورة الخدمة </label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" id="formrow-image-input" value="{{ old('image') }}">
                                    @if ($service->image)
                                        <img src="{{ url('public/image/' . $service->image) }}" width="60px">
                                    @endif

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <label class="form-label" for="gridCheck">الحالة :</label>
                                        <div class="btn-group-horizontal" role="group"
                                            aria-label="Horizontal radio toggle button group">
                                            <input type="radio" class="btn-check" name="status" value="active"
                                                {{ $service->status == 'active' ? 'checked' : '' }} id="active-radio1">
                                            <label class="btn btn-outline-success" for="active-radio1">نشط</label>
                                            <input type="radio" class="btn-check" name="status" value="inactive"
                                                {{ $service->status == 'inactive' ? 'checked' : '' }} id="active-radio2">
                                            <label class="btn btn-outline-danger" for="active-radio2">غير نشط</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" value="submit" class="btn btn-success w-lg bg-o">حفظ</button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
@endsection
