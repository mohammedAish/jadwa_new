@extends('layouts.master')

@section('title')
    {{ 'إنشاء مستخدم' }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            مشاريع
        @endslot
        @slot('title')
            إنشاء مشروع
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="basic-example">
                        <!-- Seller Details -->
                        <h3> تفاصيل المشروع</h3>
                        <section>
                            <form id="form1" class="form1">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"> اسم المشروع</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" id="name" placeholder="  اسم المشروع">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="idea" class="form-label">الفكرة/الوصف</label>
                                            <textarea id="elm1" style="height: 250px; !important" name="idea"
                                                class="form-control @error('idea') is-invalid @enderror">{{ old('idea') }}</textarea>

                                            @error('idea')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="country" class="form-label">الدولة </label>
                                            <input type="text" name="country"
                                                class="form-control @error('country')" value="{{ old('country') }}" is-invalid @enderror
                                                id="country"
                                                placeholder="الدولة ">
                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="city" class="form-label">المدينة </label>
                                            <input type="text" name="city"
                                                class="form-control @error('city')" value="{{ old('city') }}" is-invalid @enderror
                                                id="formrow-city-input"
                                                placeholder="المدينة ">
                                            @error('city')
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
                                            <label for="formrow-logo-input" class="form-label"> تحميل الشعار </label>
                                            <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                                name="logo" id="formrow-logo-input" value="{{ old('logo') }}"
                                                placeholder="الشعار">
                                            @error('logo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 " style="float: left">
                                        {{--  <input name="save" type="submit" class="btn btn-warning inner save"
                                            id="save" value="التالي"> --}}
                                        <input type="submit" value="التالي" name="go" class="btn btn-warning inner go"
                                            id="go">

                                    </div>
                                </div>
                            </form>
                        </section>

                        <!-- Company Document -->
                        <h3>اعدادات المشروع</h3>
                        <section>

                        </section>

                    </div>

                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection




@section('script')
    <!--tinymce js-->

    <script src="{{ asset('assets/libs/jquery-steps/jquery-steps.min.js') }}"></script>

    <!-- form wizard init -->
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>

    <script>
        $(document).ready(function() {

            // $('a[href="#next"]').click(function () {
            //     e.preventDefault();
            //     console.log('aa');
            //     $('#form1').parent().attr('style' , 'display:none');
            //     $('#form2').parent().removeAttr('style');
            //     $('.first').removeClass('current');
            //     $('.last').attr('class','current');
            // })
            $('#form1').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('store_project') }}",
                    method: 'post',
                    data: new FormData(this),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            $('#basic-example-p-0').attr('style', 'display:none');
                            $('#basic-example-p-1').removeAttr('style');
                            $('#basic-example-p-1').append(`<form id="form2" class="form2">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="project_type_id" class="form-label">نوع المشروع</label>
                                            <!-- All countries -->
                                            <select id="project_type_id" class="form-select" name="project_type_id"
                                                required>
                                                <option selected disabled hidden>-- نوع المشروع --</option>
                                                @foreach ($protype as $item)
                                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="study_duration" class="form-label">مدة الدراسة</label>
                                            <!-- All countries -->
                                            <select id="study_duration" class="form-select" name="study_duration">
                                                <option selected disabled hidden>-- مدة الدراسة --</option>
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="language" class="form-label">لغة المشروع</label>
                                            <select id="language" class="form-select" name="language">
                                                <option selected disabled hidden>لغة المشروع</option>
                                                <option value="ar">اللغة العربية</option>
                                                <option value="en">اللغة الانجليزية</option>
                                            </select>
                                            @error('currency')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="currency" class="form-label">عملة المشروع</label>
                                            <select id="currency" class="form-select" name="currency">
                                                <option selected disabled hidden>عملة المشروع</option>
                                                <option value="dollar"> دولار امريكي</option>
                                                <option value="ksa"> ريال سعودي</option>
                                            </select>
                                            @error('currency')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="start_date" class="form-label">تاريخ البداية </label>
                                            <input type="date"
                                                class="form-control @error('start_date') is-invalid @enderror"
                                                id="start_date" name="start_date" value="{{ old('start_date') }}"
                                                required>
                                            @error('start_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="development_duration" class="form-label">فترة التأسيس</label>
                                            <input type="number" name="development_duration" class="form-control"
                                                placeholder="فترة التأسيس" id="development_duration"
                                                value="{{ old('development_duration') }}" required>
                                            @error('development_duration')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="revenu_entry" class="form-label">عدد الوحدات</label>
                                            <select id="revenu_entry" class="form-select" name="revenu_entry">
                                                <option value="m">شهريا</option>
                                                <option value="y">سنويا</option>
                                            </select>
                                            @error('revenu_entry')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="vat" class="form-label">الضريبة </label>
                                            <input type="number" name="vat" required
                                                class="form-control @error('vat')" value="{{ old('vat') }}" is-invalid @enderror
                                                id="formrow-vat-input"
                                                placeholder="الضريبة">
                                            @error('vat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="number_days_year" class="form-label">عدد ايام السنة
                                            </label>
                                            <input type="number" name="number_days_year" class="form-control"
                                                id="number_days_year" value="{{ old('number_days_year') }}">
                                            @error('number_days_year')
                                                <span class="invalid-feedback" role="alert" placeholder="عدد أيام السنة">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                        <input type="submit" value="التالي" name="done" class="btn btn-warning inner done"
                                            id="done">

                            </form>`);
                            $('#form2').submit(function(e) {
                                e.preventDefault();
                                $.ajax({
                                    url: "{{ route('store_project_details') }}",
                                    method: 'post',
                                    data: new FormData(this),
                                    processData: false,
                                    dataType: 'json',
                                                contentType: false,
                                                beforeSend: function() {
                                    $(document).find('span.error-text').text('');
                                },
                                success: function(data) {
                                    if (data.status == 0) {
                                        $.each(data.error, function(prefix, val) {
                                            $('span.' + prefix + '_error').text(val[0]);
                                        });
                                    } else {
                                        location.href= "{{ route('projects.index') }}";
                                    }
                                }

                            });
                            });
                            $('.first').removeClass('current');
                            $('.last').attr('class', 'current');
                            $('<input>', {
                                type: 'hidden',
                                class: 'form-control',
                                value: data.id,
                                name: 'project_id'
                            }).appendTo($('#basic-example-p-1'));
                            $('<input>', {
                                type: 'hidden',
                                class: 'form-control',
                                value: data.id,
                                name: 'project_id'
                            }).appendTo($('#form2'));
                        }
                    }
                });
            });

        });
    </script>

@endsection
