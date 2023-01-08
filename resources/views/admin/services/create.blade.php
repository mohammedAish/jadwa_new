@extends('layouts.master')

@section('title')
    {{ 'إنشاء خدمة' }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            خدمة
        @endslot
        @slot('title')
            إنشاء خدمة
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title mb-4">قم بإدخال البيانات  </h4> --}}

                    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data"
                        class="needs-validation" novalidate>
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">الإسم</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                        id="title" placeholder="قم بإدخال الاسم" required>
                                        @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="invalid-feedback">
                                       لم يتم ادخال الاسم
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">السعر </label>
                                    <input type="number" name="price" class="form-control" value="{{ old('price') }}"
                                        id="price" placeholder="قم بإدخال  " required>
                                        @error('price')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="invalid-feedback">
                                        لم يتم ادخال السعر
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-logo-input" class="form-label"> اسم الراوت </label>
                                    <input type="text" class="form-control" required name="route"
                                        id="formrow-image-input" value="{{ old('route') }}">
                                        @error('route')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="invalid-feedback">
                                       لم يتم ادخال الراوت
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-logo-input" class="form-label"> صورة الخدمة </label>
                                    <input type="file" class="form-control" name="image" id="formrow-image-input"
                                        value="{{ old('image') }}" required>
                                        @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="invalid-feedback">
                                       لم يتم اضافة صورة
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <label class="form-label" for="gridCheck">الحالة :</label>
                                        <div class="btn-group-horizontal" role="group"
                                            aria-label="Horizontal radio toggle button group">
                                            <input type="radio" class="btn-check" name="status" value="active"
                                                id="active-radio1" required>
                                            <label class="btn btn-outline-success" for="active-radio1">نشط</label>
                                            <input type="radio" class="btn-check" name="status" value="inactive"
                                                id="active-radio2" required>
                                            <label class="btn btn-outline-danger" for="active-radio2">غير نشط</label>
                                        </div>
                                    </div>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center">
                                <button type="submit" value="submit" class="btn btn-success w-lg bg-o yello">حفظ</button>
                            </div>
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

    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
@endsection
