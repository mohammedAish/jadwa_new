@extends('layouts.master')

@section('title')
    {{ 'إنشاء صفحة' }}
@endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1')
            صفحات
        @endslot
        @slot('title')
            إنشاء صفحة
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">قم بإدخال البيانات </h4>

                    <form action="{{ route('pages.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="title" class="form-label">عنوان الصفحة</label>
                                    <input type="text" name="title" class="form-control " value="{{ old('title') }}" required
                                        id="title" placeholder="قم بإدخال العنوان">
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="valid-feedback">
                                        pleas enter the title
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="key" class="form-label">مفتاح الصفحة</label>
                                    <input type="text" name="key" class="form-control" value="{{ old('key') }}"
                                        id="key" placeholder="قم بإدخال النص" required>
                                        @error('key')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="valid-feedback">
                                        pleas enter the key
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="type" class="form-label">نوع الصفحة</label>
                                    <!-- All countries -->
                                    <select id="type" class="form-control" name="type" required>
                                        <option selected disabled hidden>-- إختر النوع --</option>
                                        <option value="reports">reports</option>
                                        <option value="site">site</option>
                                    </select>
                                    @error('type')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="valid-feedback">
                                        pleas enter the type
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <label for="content" class="form-label">المحتوى</label>

                                        <textarea id="elm1" name="content" class="form-control" required>{{ old('content') }}</textarea>
                                        @error('content')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


                        <div class="text-center">
                            <button type="submit" value="submit" class="btn btn-success w-lg bg-o yello">حفظ</button>
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



@section('script')
    <!--tinymce js-->
    <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
@endsection



@endsection
