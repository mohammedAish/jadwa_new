@extends('layouts.master')

@section('title')
    {{ 'الخطة الإستراتيجية' }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('title')
            {{ 'دراسة جدوى' }}
        @endslot
        @slot('name')
            {{ 'الخطة الإستراتيجية' }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="vertical-example" class="vertical-wizard">
                        <h3>الرؤية, الرسالة, الأهداف</h3>
                        <section>
                            <h4 class="mb-4"><strong>الرؤية, الرسالة, الأهداف</strong></h4>
                            <form id="form_1" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>الرؤية</h4>
                                            <label for="verticalnav-pancard-input">ما هي رؤيتكم
                                                للمشروع خلال فترة محددة
                                                من
                                                الزمن. ماذا تريد أن يحقق مشروعكم</label>
                                            <textarea type="text" name="vision" class="form-control" id="verticalnav-pancard-input"></textarea>
                                            <span class="text-danger error-text vision_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <h4>الرسالة</h4>
                                            <label for="verticalnav-pancard-input">الرسالة الدائمة
                                                لتأسيس المشروع وهي
                                                الهدف
                                                الرئيسي لتأسيس المشروع وهي غير محددة بوقت</label>
                                            <textarea type="text" name="message" class="form-control" id="verticalnav-pancard-input"></textarea>
                                            <span class="text-danger error-text message_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="inner-repeater mb-4">
                                        <div data-repeater-list="inner-group" class="inner mb-4 goals">
                                            <h4>الأهداف</h4>
                                            <label for="verticalnav-pancard-input">مجموعة الأهداف
                                                التي عند تحقيقها
                                                فإننا
                                                نحقق خطوات إستراتيجية للوصول إلى الرؤية والرسالة
                                                الخاصة بالمشروع</label>

                                            <div data-repeater-list="inner-group" class="inner mb-4 goals">
                                                <div data-repeater-item class="inner mb-3 row goal">
                                                    <div class="col-md-12 col-8  ">
                                                        <input name="goals[]" type="text" class="inner form-control "
                                                               value=""   placeholder="قم بكتابة الهدف" required minlength="3" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-4 ">
                                                    <input data-repeater-create id="add_goal" type="button"
                                                           class="add btn btn-outline-warning inner" value="اضافة هدف" />
                                                </div>
                                                <span class="text-danger error-text goals_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 " style="float: left">
                                        {{-- <button name="save1" onclick="return form1()" type="button" class="btn btn-warning inner"
                                            id="save1">حفظ والتالي</button>  --}}
                                        <input type="submit" value="حفظ والتالي" name="go" class="btn btn-warning inner go"
                                               id="go">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>نقاط القوة والضعف</h3>
                        <section>
                            <h4 class="mb-4"> نقاط القوة والضعف</h4>
                            <form id="form_2" class="form_2" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div data-repeater-list="inner-group" class="inner mb-4 problems">
                                        <h4 class="mb-4">نقاط القوة</h4>
                                        <div data-repeater-item class="inner mb-3 row strength_points">
                                            <div class="col-md-12 col-8">
                                                <input name="strength_points[]" type="text" class="inner form-control"
                                                       value="" placeholder="قم بكتابة نقاط القوة"  />
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <input data-repeater-create id="add_strength_point" type="button"
                                                   class="add btn btn-outline-warning inner" value="إضافة" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>
                                    <div data-repeater-list="inner-group" class="inner mb-4 problems">
                                        <h4 class="mb-4">نقاط الضعف</h4>
                                        <div data-repeater-item class="inner mb-3 row weakness_points">
                                            <div class="col-md-12 col-8">
                                                <input name="weakness_points[]" type="text" class="inner form-control"
                                                       value="" placeholder="قم بكتابة نقاط الضعف"  />
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <input data-repeater-create id="add_weakness_point" type="button"
                                                   class="add btn btn-outline-warning inner" value="إضافة" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>

                                </div>
                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 " style="float: left ">
                                        {{-- <button name="save1" onclick="return form1()" type="button" class="btn btn-warning inner"
                                            id="save1">حفظ والتالي</button>  --}}
                                        <input type="submit" value="حفظ والتالي" name="go" class="btn btn-warning inner go" id="go">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>الفرص والتهديدات</h3>
                        <section>
                            <h4 class="mb-4">الفرص والتهديدات</h4>
                            <form id="form_2" class="form_2" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div data-repeater-list="inner-group" class="inner mb-4 problems">
                                        <h4 class="mb-4">الفرص</h4>
                                        <div data-repeater-item class="inner mb-3 row opportunities">
                                            <div class="col-md-12 col-8">
                                                <input name="opportunities[]" type="text" class="inner form-control"
                                                       value="" placeholder="قم بكتابة الفرص التي تساعد على نجاح المشروع"  />
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <input data-repeater-create id="add_opportunity" type="button"
                                                   class="add btn btn-outline-warning inner" value="إضافة" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>
                                    <div data-repeater-list="inner-group" class="inner mb-4">
                                        <h4 class="mb-4">التهديدات</h4>
                                        <div data-repeater-item class="inner mb-3 row threats">
                                            <div class="col-md-12 col-8">
                                                <input name="threats[]" type="text" class="inner form-control"
                                                       value="" placeholder="قم بكتابة التهديدات التي تواجه المشروع"  />
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <input data-repeater-create id="add_threat" type="button"
                                                   class="add btn btn-outline-warning inner" value="إضافة" />
                                        </div>

                                        <span class="text-danger error-text problems_error"></span>

                                    </div>

                                </div>
                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 " style="float: left ">
                                        {{-- <button name="save1" onclick="return form1()" type="button" class="btn btn-warning inner"
                                            id="save1">حفظ والتالي</button>  --}}
                                        <input type="submit" value="حفظ والتالي" name="go" class="btn btn-warning inner go" id="go">
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>

                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

    <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- form wizard init -->
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-steps/jquery-steps.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script> --}}
    <script src="{{ asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metismenu.min.js') }}"></script>

    <script>
        document.addEventListener('click', function(e) {
            var eventTarget = e.target;

            // start clone element
            if (e.target.id == 'add_goal') {
                $(".goal").after(`<div data-repeater-item class="inner mb-3 row ">
                                <div class="input-group col-md-12 col-8 auth-pass-inputgroup @error('strength_points') is-invalid @enderror">

                                    <input name="goals[]" type="text" class="inner form-control "
                                                               value=""   placeholder="قم بكتابة الهدف" required minlength="3" />

                                        <button class="btn btn-danger" style="background-color: #F91616"
                                            type="button" id="delete_goal"><i
                                                class="fa fa-times"></i></button>
                                                <span class="text-danger error-text problems_error"></span>
                                    </div>
                                    </div>

                                      `);
            }
            if (e.target.id == 'add_strength_point') {
                $(".strength_points").after(`<div data-repeater-item class="inner mb-3 row ">
                                <div class="input-group col-md-12 col-8 auth-pass-inputgroup @error('strength_points') is-invalid @enderror">

                                    <input name="strength_points[]" type="text" class="inner form-control"
                                        value="" placeholder="قم بكتابة نقاط القوة" />
                                        <button class="btn btn-danger" style="background-color: #F91616"
                                            type="button" id="delete_strength_points"><i
                                                class="fa fa-times"></i></button>
                                                <span class="text-danger error-text problems_error"></span>
                                    </div>
                                    </div>

                                      `);
            }
            if (e.target.id == 'add_weakness_point') {
                $(".weakness_points").after(`<div data-repeater-item class="inner mb-3 row ">
                                <div class="input-group col-md-12 col-8 auth-pass-inputgroup @error('weakness_points') is-invalid @enderror">

                                    <input name="weakness_points[]" type="text" class="inner form-control"
                                        value="" placeholder="قم بكتابة نقاط الضعف" />
                                        <button class="btn btn-danger" style="background-color: #F91616"
                                            type="button" id="delete_weakness_points"><i
                                                class="fa fa-times"></i></button>
                                                <span class="text-danger error-text solutions_error"></span>
                                    </div>
                                    </div>

                                      `);
            }
            if (e.target.id == 'add_opportunity') {
                $(".opportunities").after(`<div data-repeater-item class="inner mb-3 row ">
                                                <div class="input-group col-md-12 col-12 auth-pass-inputgroup @error('opportunities') is-invalid @enderror">

                                                    <input name="opportunities[]" type="text" class="inner form-control"
                                                       value="" placeholder="قم بكتابة الفرص التي تساعد على نجاح المشروع"  />

                    <button class="btn btn-danger" style="background-color: #F91616"
                        type="button" id="delete_opportunity"><i
                            class="fa fa-times"></i></button>
                    <span class="text-danger error-text sale_channels_error"></span>
                </div>
            </div>`);
            }
            if (e.target.id == 'add_threat') {
                $(".threats").after(`<div data-repeater-item class="inner mb-3 row ">
                                                <div class="input-group col-md-12 col-12 auth-pass-inputgroup @error('threats') is-invalid @enderror">

                                                    <input name="threats[]" type="text" class="inner form-control"
                                                       value="" placeholder="قم بكتابة التهديدات التي تواجه المشروع"  />

                    <button class="btn btn-danger" style="background-color: #F91616"
                        type="button" id="delete_threat"><i
                            class="fa fa-times"></i></button>
                    <span class="text-danger error-text sale_channels_error"></span>
                </div>
            </div>`);
            }
            // end clone element

            // start delete element
            if (e.target.id == 'delete_goal') {

                e.target.parentElement.parentElement.remove();
            }
            if (e.target.id == 'delete_strength_points') {

                e.target.parentElement.parentElement.remove();
            }
            if (e.target.id == 'delete_weakness_points') {

                e.target.parentElement.parentElement.remove();
            }
            if (e.target.id == 'delete_opportunity') {

                e.target.parentElement.parentElement.remove();
            }
            if (e.target.id == 'delete_threat') {

                e.target.parentElement.parentElement.remove();
            }
            // end delete element
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

@endsection
