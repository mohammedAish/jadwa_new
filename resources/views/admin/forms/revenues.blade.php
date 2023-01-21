@extends('layouts.master')

@section('title')
    {{ 'الإيرادات وتكاليف الايرادات' }}
@endsection
<style>
    .price {
        position: relative;
    }
    .ral {
        position: absolute;
        top: 29px;
        left: 0px;
        width: 38px;
        height: 34px;
        font-size: 16px;
        padding-top: 5px;
        padding-left: 2px;
        /* color: #fff; */
        background: #e8e3e3;
        padding: 2px;}

    .addItem{
        border:1px solid #3CC0B9;
        background: #FFFFFF;
        border-radius: 7px;
        height: 28px;
        width:186px;
        color: #3CC0B9;
        font-size: 20px;
    }
</style>
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            {{ 'دراسة جدوى' }}
        @endslot
        @slot('name')
            {{ 'الإيرادات وتكاليف الايرادات' }}
        @endslot
    @endcomponent


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="vertical-example" class="vertical-wizard">
                        <h3>الإيرادات</h3>
                        <section>
                            <h4 class="mb-4"><strong> الإيرادات
                                    <svg style="margin-right: 4px;" width="24" height="24"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="24" height="24" rx="12" fill="#F9AA1C" fill-opacity="0.15"/>
                                        <g clip-path="url(#clip0_451_3704)">
                                            <path d="M9.50312 18.1969C9.50312 18.3937 9.55988 18.5856 9.66825 18.7497L10.2039 19.5525C10.3679 19.7986 10.7404 19.9987 11.0364 19.9987H12.9636C13.2585 19.9987 13.6311 19.7987 13.7951 19.5525L14.3289 18.75C14.4207 18.6113 14.496 18.3634 14.496 18.1969L14.5 16.9719H9.5L9.50312 18.1969ZM12 4C8.81312 4.01 6.5 6.59281 6.5 9.47188C6.5 10.8588 7.01375 12.1231 7.86125 13.0906C8.37781 13.6794 9.18437 14.9103 9.49312 15.9484C9.49409 15.9563 9.49606 15.9646 9.49703 15.9729H14.5033C14.5043 15.9646 14.5062 15.9568 14.5072 15.9484C14.8158 14.9103 15.6225 13.6794 16.1391 13.0906C16.9875 12.15 17.5 10.8875 17.5 9.47188C17.5 6.4625 15.0375 4.00013 12 4ZM15.0125 12.1281C14.5231 12.6859 13.9175 13.575 13.4797 14.4997H10.5231C10.0853 13.575 9.47969 12.6859 8.99062 12.1284C8.35125 11.4 8 10.4406 8 9.47188C8 7.54063 9.50313 5.50781 11.9719 5.5C14.2063 5.5 16 7.29375 16 9.47188C16 10.4406 15.65 11.4 15.0125 12.1281ZM11.5 6.5C10.1219 6.5 9 7.62188 9 9C9 9.27637 9.22363 9.5 9.5 9.5C9.77637 9.5 10 9.275 10 9C10 8.17281 10.6728 7.5 11.5 7.5C11.7764 7.5 12 7.27663 12 7.00031C12 6.724 11.775 6.5 11.5 6.5Z" fill="#F9AA1C"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_451_3704">
                                                <rect width="12" height="16" fill="white" transform="translate(6 4)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </strong></h4>
                            <form id="form_1" name="form_1" class="form-horizontal">
                                <table data-repeater-item  class="table table-bordered text-center inner-repeater " id="summry_table">
                                    <thead class="">
                                    <tr style="background-color: #F5F5F5;">
                                        <th>المنتج/الخدمة</th>
                                        <th>القيمة</th>
                                        <th>عدد الوحدات <span style="font-size: 12px; font-weight: 500;color: #000000;">(شهرياً)</span></th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody data-repeater-list="inner-group" class="inner ">
                                    @if(isset($projectIncomes))
                                        @if($projectIncomes->count()>0)
                                            @foreach($projectIncomes as $projectIncome)
                                                <tr id="lable_{{$projectIncome->id}}">
                                                    <td>{{$projectIncome->item}}</td>
                                                    <td>{{$projectIncome->value}}</td>
                                                    <td>{{$projectIncome->quantity}}</td>
                                                    <td>
                                                        <button type="button" class="edit" title="تعديل" style="cursor: pointer; border-radius:60%;
                                            border: none;"
                                                                data-id="{{ $projectIncome->id }}" id="{{ $projectIncome->id }}"  class="text-danger ">
                                                            <i class="p-2 fas fa-pen font-size-12" style="cursor: pointer;color: #200E32;"  id="{{$projectIncome->id}}" onclick="show_edit(this.id)"></i>
                                                        </button>
                                                        <button type="button" class="destroy" title="حذف" style="cursor: pointer; border-radius:60%;
                                            border: none;"
                                                                data-id="{{ $projectIncome->id }}" id="{{ $projectIncome->id }}"  class="text-danger delete">
                                                            <i class="p-2 fas fa-trash-alt font-size-15" style="cursor: pointer;color: #ec6868;" id=""></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr id="input_{{$projectIncome->id}}" style="display: none">

                                                    <td><input type="text" name="item[]" value="{{$projectIncome->item}}" class="form-control" id="verticalnav-pancard-input"></td>
                                                    <td><input type="text" name="value[]" value="{{$projectIncome->value}}" class="form-control" id="verticalnav-pancard-input"></td>
                                                    <td><input type="text" name="quantity[]" value="{{$projectIncome->quantity}}" class="form-control" id="verticalnav-pancard-input"></td>
                                                    <td>
                                                        <button type="button" class="" title="تعديل" style="cursor: pointer; border-radius:60%;
                                            border: none;"
                                                                data-id="{{ $projectIncome->id }}" id="{{ $projectIncome->id }}"  class="text-danger ">
                                                            <i class="p-2 fas fa-pen font-size-12" style="cursor: pointer;color: #200E32;"  id="{{$projectIncome->id}}" onclick="editInput(this.id)"></i>
                                                        </button>
                                                        <button type="button" class="destroy" title="حذف" style="cursor: pointer; border-radius:60%;
                                            border: none;"
                                                                data-id="{{ $projectIncome->id }}" id="{{ $projectIncome->id }}"  class="text-danger delete">
                                                            <i class="p-2 fas fa-trash-alt font-size-15" style="cursor: pointer;color: #ec6868;" id=""></i>
                                                        </button>

                                                    </td>
                                                </tr>

                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="12"
                                                    class="text-center font-weight-bold " id="emptyincome" style="color:   rgba(10, 10, 10, 0.6);font-weight: 500">{{'أضف منتجات / خدمات مشروعك'}}</td>

                                            </tr>
                                        @endif
                                    @endif


                                    </tbody>
                                    <tfoot   class="inner mb-3  income">
                                    </tfoot>


                                </table>
                                <div class="mt-1">
                                    <div class="input-group">
                                        <input data-repeater-create id="add_income_item"  type="button"
                                               class=" add addItem me-2" style="font-weight: 700;font-size: 13px" value=" +  أضف منتج أو خدمة جديدة " />
                                    </div>

                                </div>


                                {{-- <div class="row">
                                    <div class="inner-repeater mb-4" style="">

                                            <div data-repeater-list="inner-group" class="inner mb-4">


                                                <div data-repeater-item class="inner mb-3 row income">
                                                    @if(empty($projectIncomes))
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>المنتج / الخدمة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>القيمة</strong></label>
                                                            <input type="text" name="value[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text value_error"></span>
                                                            @if($project->currency == "ksa")
                                                            <span class="ral">رس</span>
                                                            @else
                                                             <span class="ral">USD</span>
                                                             @endif

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-3">

                                                          @if($project->revenu_entry == "m")
                                                            <label for="verticalnav-pancard-input"><strong>عدد الوحدات شهريا</strong></label>
                                                            @else
                                                            <label for="verticalnav-pancard-input"><strong>عدد الوحدات سنوي</strong></label>
                                                            @endif
                                                            <input type="text" name="quantity[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                    @endif

                                                </div>

                                                <div class="col-md-4 col-4 ">
                                                    <input data-repeater-create id="add_income_item" type="button"
                                                           class=" add  inner addItem" value="+ اضافة " />
                                                </div>
                                            </div>
                                    </div>
                                </div > --}}

                                {{--                                <div class="col-md-6 col-6" style="float: left">--}}
                                {{--                                    <div class="col-md-4" style="float: left">--}}
                                <div class="d-flex align-items-end flex-column flex-wrap" style="margin-top: 15%">
                                    <button type="button" value="حفظ ومتابعة" name="save_btn_1" class="btn w-lg btn-lg btn-warning me-2"  id="save_btn_1" >
                                        <p style="margin-bottom: 0rem !important; font-weight: 600;font-size: 13px;">حفظ ومتابعة</p>
                                        {{-- <span class="spinner-border spinner-border-sm" id="spinner_1" role="status" aria-hidden="true"></span> --}}
                                    </button>
                                </div>
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </form>
                        </section>
                        <h3>نسبة نمو الإيرادات</h3>

                        <section id="forms_2">
                            <h4 class="mb-4"><strong>نسبة نمو الإيرادات</strong></h4>



                            <form id="form_2" name="form_2" class="form-horizontal">


                                <div class="mb-3 price">
                                    <label for="verticalnav-pancard-input"><strong>نسبة نمو الايرادات</strong></label>
                                    <input type="text" name="one_value_incremental" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                    <span class="text-danger error-text value_incremental_error"></span>
                                    <span class="ral text-center pt-2">٪</span>
                                </div>
                                <button type="button" value="حفظ ومتابعة ->" name="value_incremental_button" style="    font-size: 17px;
                                        background: none;
                                        border: none;
                                        color: rgb(249 170 28);" class="" id="value_incremental_button" >
                                    تخصيص نسبة النمو +
                                </button>


                                <div class="row">

                                    <div class="accordion" id="accordionExample" >

                                    </div>
                                </div >
                                <br>
                                <br>

                                <div class="d-flex justify-content-between" >
                                    <button type="button" value="السابق" name="previous_1" class="btn btn-warning" id="previous_1" >
                                        السابق
                                    </button>
                                    <button style="float: left" type="button" value="حفظ والتالي" name="save_btn_2" class="btn btn-warning" id="save_btn_2" >
                                        حفظ ومتابعة
                                        {{-- <span class="spinner-border spinner-border-sm" id="spinner_2" role="status" aria-hidden="true"></span> --}}
                                    </button>


                                </div>
                            </form>
                        </section>

                        <h3>ملخص المبيعات</h3>
                        <section>
                            <h4 class="mb-4"><strong>ملخص المبيعات</strong></h4>

                            <div id="repppppp">
                                <div class="row">
                                    <table class="GeneratedTable" id="summry_table">
                                        <thead>
                                        <tr>
                                            <th>الخدمة</th>
                                            <th>عدد الوحدات شهريا</th>
                                            <th>قيمة الوحدة</th>
                                            @if($project->revenu_entry == "m")
                                                <th> المبيعات الشهرية</th>
                                            @else
                                                <th> المبيعات السنوية</th>
                                            @endif
                                            <th>مبيعات لنهاية العام</th>
                                            <th>مبيعات العام</th>

                                        </tr>
                                        </thead>
                                        <tbody id="incremental_data">

                                        </tbody>
                                        <tfoot id="incremental_data_totle">

                                        </tfoot>
                                    </table>
                                </div>
                                <br>
                                <br>

                                <div class="my-3 py-2">
                                    <table class="mt-3 GeneratedTable" style="width: 40%">
                                        <thead>
                                        <tr  id="incremental_summry_table_year">

                                        </tr>
                                        </thead>

                                    </table>
                                </div>
                                <div class="row">

                                    <table class="GeneratedTable" id="incremental_summry_table">
                                        <thead>
                                        <tr>
                                            <th>السنة</th>
                                            <th>نسبة النمو  السنوية</th>
                                        </tr>
                                        </thead>
                                        <tbody id="view_incremental_data">



                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td>معدل النمو السنوي</td>
                                            <td id="view_incremental_data_avareg_persent"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <br>
                                <br>

                                <div class="row">
                                    <table class="GeneratedTable" id="revenue_summry_table">
                                        <thead>

                                        <tr id="head_data">

                                        </tr>
                                        </thead>
                                        <tbody >

                                        <tr id="total_revenue_data">
                                            <td>اجمالي الايرادات</td>
                                            <td id="total_revenue_current"></td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row mt-5 pt-5" >
                                    <table class="GeneratedTable" style="width: 51%" id="revenue_summry_table_avarage">

                                        <tbody id="total_revenue_avarge">
                                        <tr>
                                            <td style="background: #FCAC02;
                                            font-size: 20px;">اجمالي الايرادات</td>
                                            <td id=total_revenue_totle_icome></td>
                                        </tr>
                                        <tr>
                                            <td style="background: #FCAC02;
                                            font-size: 20px;">متوسط الايرادات</td>
                                            <td id=total_revenue_totle_icome_avarge></td>
                                        </tr>
                                        <tr>
                                            <td style="background: #FCAC02;
                                            font-size: 20px;">متوسط النمو</td>
                                            <td id=total_revenue_totle_icome_avarge_persent></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <br>
                            <br>

                            <div class="d-flex justify-content-between" >

                                <button type="button" value="السابق" name="previous_2" class="btn btn-warning" id="previous_2" >
                                    السابق
                                </button>
                                <button type="button" style="float: left" value="التالي" name="next_btn" class="btn btn-warning" id="next_btn" >
                                    التالي
                                </button>

                            </div>

                        </section>
                        <h3>تكاليف الإيراد</h3>
                        <section>
                            <h4 class="mb-4"><strong>تكاليف الإيراد</strong></h4>
                            <form id="form_3" name="form_3" class="form-horizontal">

                                <div class="row">
                                    <div class="inner-repeater mb-4" style="border: 2px #dedede solid;padding: 10px">

                                        <div data-repeater-list="inner-group" class="inner mb-4">
                                            <div data-repeater-item class="inner mb-3 row income_expenses">
                                                @foreach($projectIncomes as $projectIncome)
                                                    <div data-repeater-item  class=" row add_income_expenses_item">


                                                        <div class="col-lg-3">
                                                            <div class="mb-3">

                                                                <label for="verticalnav-pancard-input"><strong>البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                                <input type="text" name="item[]" value="{{$projectIncome->item}}" class="form-control" id="verticalnav-pancard-input">
                                                                <span class="text-danger error-text item_error"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-pancard-input"><strong>نوع التكليف</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>
                                                                <select class="form-control" name="expensis_type[]">
                                                                    <option value="0" @if ($projectIncome->value == "0") {{ 'selected' }} @endif >مبلغ ثابت</option>
                                                                    <option value="1" @if ($projectIncome->value == "1") {{ 'selected' }} @endif>نسبة من ايرادات المنتج</option>
                                                                    {{-- <option value="2" @if ($projectIncome->value == "2") {{ 'selected' }} @endif>نسبة من ايرادات العامة</option> --}}
                                                                </select>
                                                                <span class="text-danger error-text item_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-pancard-input"><strong>القيمة</strong></label>
                                                                <input type="text" name="value[]"  onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                                <span class="text-danger error-text value_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-pancard-input"><strong>عدد الوحدات شهريا</strong></label>
                                                                <input type="text" name="quantity[]" value="{{$projectIncome->quantity}}"  onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                                <span class="text-danger error-text quantity_error"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-1">
                                                            <div class="mb-3">
                                                                <h4></h4>
                                                                <label for="verticalnav-pancard-input"></label>

                                                                <br>
                                                                <button class="text-danger rounded-circle"
                                                                        type="button" id="delete_income_expenses_item" style="cursor: pointer;    background: none;
                                                            border: none;">
                                                                    <i class="mdi mdi-delete font-size-20"></i></button>
                                                                <span class="text-danger error-text sale_channels_error"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                            <div class="col-md-4 col-4 ">
                                                <input data-repeater-create id="add_income_expenses_item" type="button"
                                                       class="add btn btn-outline-dark inner" value="اضافة " />
                                            </div>
                                        </div>
                                    </div>
                                </div >

                                <div class="d-flex justify-content-between" >
                                    <button type="button" value="السابق" name="previous_3" class="btn btn-warning" id="previous_3" >
                                        السابق
                                    </button>
                                    <button type="button" style="float: left" value="حفظ ومتابعة" name="save_btn_3" class="btn btn-warning" id="save_btn_3"  >
                                        حفظ ومتابعة
                                        {{-- <span class="spinner-border spinner-border-sm" id="spinner_3" role="status" aria-hidden="true"></span> --}}
                                    </button>


                                </div>
                            </form>
                            <br>
                            <br>

                        </section>
                        <h3>نسبة نمو التكاليف</h3>
                        <section>
                            <h4 class="mb-4"><strong>نسبة نمو التكاليف</strong></h4>

                            <form id="form_4" name="form_4" class="form-horizontal">
                                <div class="mb-3 price">
                                    <label for="verticalnav-pancard-input"><strong>نسبة نمو التكاليف</strong></label>
                                    <input type="text" name="one_value_incremental" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                    <span class="text-danger error-text value_incremental_error"></span>
                                    <span class="ral text-center pt-2">٪</span>
                                </div>
                                <button type="button" value="حفظ ومتابعة ->" name="value_exp_incremental_button" style="    font-size: 17px;
                                        background: none;
                                        border: none;
                                        color: rgb(249 170 28);" class="" id="value_exp_incremental_button" >
                                    تخصيص نسبة التكاليف +
                                </button>


                                <div class="row">

                                    <div class="accordion" id="accordionExample_1" >

                                    </div>
                                </div >
                                <br>
                                <br>

                                <div class="d-flex justify-content-between" >
                                    <button type="button" value="السابق" name="previous_4" class="btn btn-warning" id="previous_4" >
                                        السابق
                                    </button>
                                    <button type="button" style="float: left" value="حفظ ومتابعة" name="save_btn_4" class="btn btn-warning" id="save_btn_4" >
                                        حفظ ومتابعة
                                        {{-- <span class="spinner-border spinner-border-sm" id="spinner_4" role="status" aria-hidden="true"></span> --}}
                                    </button>

                                </div>
                            </form>
                            <br>
                            <br>

                        </section>
                        <h3>ملخص التكاليف</h3>
                        <section>
                            <h4 class="mb-4"><strong>ملخص التكاليف</strong></h4>
                            <div class="row">
                                <table class="GeneratedTable" id="summry_table_2">
                                    <thead>
                                    <th>البند</th>
                                    <th>عدد الوحدات شهريا</th>
                                    <th>قيمة الوحدة</th>
                                    @if($project->revenu_entry == "m")
                                        <th> التكاليف الشهرية</th>
                                    @else
                                        <th> التكاليف السنوية</th>
                                    @endif
                                    <th>التكاليف لنهاية العام</th>
                                    <th>مبيعات العام</th>
                                    </thead>
                                    <tbody id="expenses_incremental_data">

                                    </tbody>
                                    <tfoot id="expenses_data_totle">

                                    </tfoot>

                                </table>
                            </div>
                            <br>
                            <br>

                            <div class="row">
                                <table class="GeneratedTable" id="expenses_incremental_summry_table">
                                    <thead>
                                    <tr  id="view_expenses_incremental_data">

                                    </tr>
                                    </thead>

                                </table>
                            </div>
                            <br>
                            <br>

                            <div class="row">
                                {{-- <table class="GeneratedTable" id="expenses_summry_table">
                                    <thead>
                                    <tr id="head_expenses">

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr id="total_expenses_data">

                                    </tr>

                                    </tbody>
                                </table> --}}
                                <table class="GeneratedTable" id="incremental_summry_table">
                                    <thead>
                                    <tr>
                                        <th>السنة</th>
                                        <th>نسبة النمو  السنوية</th>
                                    </tr>
                                    </thead>
                                    <tbody id="view_exp_incremental_data">



                                    </tbody>

                                    <tr>
                                        <td>معدل النمو السنوي</td>
                                        <td id="view_exp_incremental_data_avareg_persent"></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <table class="GeneratedTable" id="revenue_summry_table">
                                    <thead>

                                    <tr id="head_exp_data">
                                        <th>السنة</th>
                                        <th id="total_exp_revenue_current_head"></th>
                                    </tr>
                                    </thead>
                                    <tbody >

                                    <tr id="total_exp_revenue_data">
                                        <td>اجمالي التكاليف</td>
                                        <td id="total_exp_revenue_current"></td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-5 pt-5" >
                                <table class="GeneratedTable" style="width: 51%" id="revenue_summry_table_avarage">

                                    <tbody id="total_revenue_avarge">
                                    <tr>
                                        <td style="background: #FCAC02;
                                            font-size: 20px;">اجمالي التكاليف</td>
                                        <td id=total_exp_revenue_totle_icome></td>
                                    </tr>
                                    <tr>
                                        <td style="background: #FCAC02;
                                            font-size: 20px;">متوسط التكاليف</td>
                                        <td id=total_exp_revenue_totle_icome_avarge></td>
                                    </tr>
                                    <tr>
                                        <td style="background: #FCAC02;
                                            font-size: 20px;">متوسط النمو</td>
                                        <td id=total_exp_revenue_totle_icome_avarge_persent></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <br>
                            <br>
                            <div class="d-flex justify-content-between" >
                                <button type="button" value="السابق" name="previous_5" class="btn btn-warning" id="previous_5" >
                                    السابق
                                </button>
                                <button type="button" style="float: left" value="التالي" name="next_btn_2" class="btn btn-warning" id="next_btn_2" >
                                    التالي
                                </button>


                            </div>

                        </section>
                        <h3>ملخص الأرباح</h3>
                        <section>
                            <h4 class="mb-4"><strong>ملخص الأرباح</strong></h4>
                            <div class="row">
                                <table class="GeneratedTable" id="summry_table_3">
                                    <thead>
                                    <tr>
                                        <th>السنة</th>
                                        <th>إجمالي الايرادات السنوية</th>
                                        <th>إجمالي التكاليف السنوية</th>
                                        <th>مجمل الربح</th>
                                        <th>هامش مجمل الربح </th>
                                    </tr>
                                    </thead>


                                    <tbody id="earning_summery">
                                    <tr id="earning_summery_crrunt">

                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr id="earning_summery_totle" style="    font-size: 19px;
                                        font-weight: bold;">

                                    </tr>
                                    <tr id="earning_summery_totle_avrage"  style="    font-size: 19px;
                                        font-weight: bold;">

                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <br>
                            <br>
                            <div class="" style="float: right">
                                {{-- <button type="button" value="التالي ->" name="next_btn_3" class="btn btn-warning" id="next_btn_3" >
                                    التالي -->
                                </button> --}}
                                <button type="button" value="السابق" name="previous_6" class="btn btn-warning" id="previous_6" >
                                    السابق
                                </button>


                            </div>

                        </section>
                    </div>

                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

@endsection
@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>

    <!-- form wizard init -->
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-steps/jquery-steps.min.js') }}"></script>

    {{--    ******************************************************* Custom Repeater ****************************************************--}}
    <script>

        document.addEventListener('click', function(e) {
            var eventTarget = e.target;

            // start clone element
            if (e.target.id == 'add_income_item') {
                $("#emptyincome").hide()
                $(".income").append(`<tr data-repeater-item class="inner mb-4"> <td> <input style="background-color: #FAFAFA;" placeholder=" اسم المنتج / الخدمة" type="text" name="item[]" class="form-control" id="verticalnav-pancard-input"></td>
                                        <td>  <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
<input style="background-color: #FAFAFA;" type="text" name="value[]" class="form-control" id="verticalnav-pancard-input">
   <span class="input-group-addon bootstrap-touchspin-postfix input-group-append" style="background-color: #FAFAFA;">
                                                    <span class="input-group-text black_text " style="font-weight: 500;">$</span></span>
</div></td>
                                        <td> <input style="background-color: #FAFAFA;" type="text" name="quantity[]" class="form-control" id="verticalnav-pancard-input"></td>
                                        <td><a style="cursor: pointer;" id="delete_income_item">
                                        <svg id="delete_income_item" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle id="delete_income_item" cx="14" cy="14" r="14" fill="#F4F4F4"/>
                                        <circle id="delete_income_item" cx="14" cy="14" r="13.875" stroke="#0A0A0A" stroke-opacity="0.1" stroke-width="0.25"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.6261 8.26091C16.4349 7.69817 15.9383 7.33398 15.3759 7.33398H12.6239L12.5193 7.33821C11.9661 7.38298 11.4941 7.77996 11.3487 8.33753L11.1836 9.1794L11.1643 9.25351C11.0852 9.4935 10.8642 9.66007 10.6118 9.66007L10.6118 9.66007H8.48759L8.42143 9.66463C8.18344 9.69774 8 9.90695 8 10.1601C8 10.4362 8.2183 10.6601 8.48759 10.6601L10.6118 10.6601H17.3881L19.5124 10.6601L19.5786 10.6555C19.8166 10.6224 20 10.4132 20 10.1601C20 9.88394 19.7817 9.66007 19.5124 9.66007H17.3885C17.3884 9.66007 17.3882 9.66007 17.3881 9.66007L17.3134 9.65517C17.0683 9.62278 16.8658 9.43313 16.8162 9.1792L16.6583 8.36871L16.6261 8.26091ZM15.9429 9.66007C15.9207 9.60362 15.9015 9.54546 15.8855 9.48577L15.86 9.37537L15.7091 8.59585C15.6738 8.46059 15.5649 8.36157 15.4335 8.33893L15.3759 8.33402H12.6239C12.4871 8.33402 12.3655 8.41613 12.315 8.51933L12.2979 8.56468L12.1399 9.37557C12.1206 9.47431 12.0927 9.56939 12.057 9.66007H15.9429ZM18.6523 11.8141C18.8983 11.8344 19.0869 12.0388 19.1 12.2847L19.0937 12.4218L18.884 14.9893L18.6641 17.4949C18.6175 17.9951 18.5759 18.417 18.5399 18.7491C18.415 19.9065 17.6637 20.6222 16.5311 20.6434C14.7662 20.676 13.0698 20.6757 11.4225 20.64C10.3227 20.6169 9.58244 19.8935 9.4597 18.7538L9.37487 17.9141L9.22663 16.2853L9.07477 14.498L8.90115 12.3526C8.87957 12.0773 9.07967 11.8362 9.3481 11.8141C9.59415 11.7938 9.8122 11.9645 9.86346 12.2052L9.88341 12.4018L10.0464 14.4131L10.2245 16.4979C10.3043 17.4004 10.3736 18.1308 10.429 18.6438C10.4989 19.2933 10.8409 19.6276 11.4427 19.6402C13.0772 19.6756 14.761 19.6759 16.5134 19.6435C17.1518 19.6316 17.4992 19.3006 17.5707 18.6389L17.6551 17.8037C17.6799 17.5463 17.7063 17.2622 17.7342 16.9535L17.9124 14.9032L18.1271 12.2723C18.1469 12.02 18.3461 11.8266 18.586 11.8132L18.6523 11.8141Z" fill="#E71414"/>
                                        </svg>
                                        </a>
                                        </td><tr>`);
            }
            if (e.target.id == 'add_income_expenses_item') {
                $(".income_expenses").after(`<div data-repeater-item class="inner mb-3 row">
                                                        <div class="col-lg-3">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>
                                                            <select onchange="checkAlert(event)" id="executive"  class="form-control my-2"  name="item[]">
                                                                @foreach($projectIncomes as $projectIncome)
                <option value="{{$projectIncome->item}}">{{$projectIncome->item}} </option>

                                                            @endforeach
                <option>أخري</option>

            </select>
            <div id="sales_channels">
                </div>

                <span class="text-danger error-text item_error"></span>
            </div>
        </div>
        <div class="col-lg-3">
        <div class="mb-3">
            <label for="verticalnav-pancard-input"><strong>نوع التكليف</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>
            <select class="form-control" name="expensis_type[]">
                <option value="0">مبلغ ثابت</option>
                <option value="1">نسبة من ايرادات المنتج</option>
                <option value="2">نسبة من ايرادات العامة</option>
            </select>
            <span class="text-danger error-text item_error"></span>
        </div>
    </div>
        <div class="col-lg-3">
            <div class="mb-3 price">
                <label for="verticalnav-pancard-input"><strong>القيمة</strong></label>
                <input type="text" name="value[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                <span class="text-danger error-text value_error"></span>
@if($project->currency == "ksa")
                <span class="ral">رس</span>
@else
                <span class="ral">USD</span>
@endif
                </div>
            </div>



            <div class="col-lg-2">
                <div class="mb-3">
                    <h4></h4>
                    <label for="verticalnav-pancard-input"></label>

                    <br>
                    <button class="text-danger rounded-circle"
                        type="button" id="delete_income_expenses_item">
                        <i class="mdi mdi-delete font-size-20"></i></button>
        <span class="text-danger error-text sale_channels_error"></span>
                </div>
            </div>
        </div>`);
            }
            // end clone element

            // start delete element
            if (e.target.id == 'delete_income_item') {

                console.log((e.target));
                e.target.parentElement.parentElement.parentElement.parentElement.remove();
            }
            if (e.target.id == 'delete_income_expenses_item') {

                e.target.parentElement.parentElement.parentElement.remove();
            }

            // end delete element
        });
    </script>
    {{--    ******************************************************* Custom Repeater ****************************************************--}}


    {{--    ******************************************************* Ajax Requests ****************************************************--}}

    <script type="text/javascript">
        // $(document).on('change', 'select', function() {
        //         var opt = $(this).find('option:selected')[0];

        //         if($(this).id() == "nationalExecutive"){
        //             $('#sales_channels').after(`<input name="item[]" type="text" class="inner form-control"  value="" placeholder="" />`);
        //         }else{
        //             $('#sales_channels').remove();

        //         }

        //     });


        function show_edit(id) {
            // alert("lable_"+id);
            $("#lable_"+id).attr("style", "display:none");
            $("#input_"+id).removeAttr("style");

        }
        function editInput(id) {
            // $("#lable_"+id).removeAttr("style");
            //                  $("#input_"+id).attr("style", "display:none");
            //                  $(".edit").attr("style", "background-color: green");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = $('#form_1').serialize();
            jQuery.ajax({
                url: 'project_fs_general_income_update/'+id,
                method: 'post',
                data: formData,
                dataType: 'json',
                success: function (result) {
                    console.log(result)
                    $("lable_"+id).empty()
                    toastr.success("تمت العملية بنجاح", "تم تخزين البيانات بنجاح");
                    //$("#form_1 :input").prop("disabled", true);
                    $("#lable_"+id).removeAttr("style");
                    $("#input_"+id).attr("style", "display:none");
                    $(".edit").attr("style", "background-color: green");
                    $("tbody").append('<tr id=lable_'+id+'></tr>');
                }
            });
        }

        function checkAlert(evt) {
            if (evt.target.value === "أخري") {
                $('#sales_channels').after(`<input name="item[]" type="text" class="inner form-control"  value="" placeholder="" />`);
            }else{
                $('#sales_channels').hide();  }
        }
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>

        jQuery(document).ready(function () {

            $('button.destroy').on('click', function(e){
                e.preventDefault();
                var id=this.id;
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
                            url: 'project_fs_general_income_delete_item/'+id,
                            type: 'post',
                            data: {'id' : id},
                            dataType: 'json',
                            success: function(result) {
                                location.reload();
                                // table.destroy();
                                //drawTable($('table')).serializeArray();
                            }
                        })
                    }
                })

            });


// jQuery('#selectitem').on('change', function(e) {
//     var value = $(this).val();
//     alert(value);
//                       //$('#otherItem').attr('style','display:block');

//             });
            jQuery('#previous_1').click(function (e) {

                $('#vertical-example-p-0').removeAttr('style');
                $('#vertical-example-t-0').parent().attr('class','current');
                $('#vertical-example-p-1').attr('style' , 'display:none');
                $('#vertical-example-t-1').parent().removeClass('current');

            });
            jQuery('#previous_2').click(function (e) {
                $('#vertical-example-p-1').removeAttr('style');
                $('#vertical-example-t-1').parent().attr('class','current');
                $('#vertical-example-p-2').attr('style' , 'display:none');
                $('#vertical-example-t-2').parent().removeClass('current');

            });
            jQuery('#previous_3').click(function (e) {

                $('#vertical-example-p-2').removeAttr('style');
                $('#vertical-example-t-2').parent().attr('class','current');
                $('#vertical-example-p-3').attr('style' , 'display:none');
                $('#vertical-example-t-3').parent().removeClass('current');

            });
            jQuery('#previous_4').click(function (e) {

                $('#vertical-example-p-3').removeAttr('style');
                $('#vertical-example-t-3').parent().attr('class','current');
                $('#vertical-example-p-4').attr('style' , 'display:none');
                $('#vertical-example-t-4').parent().removeClass('current');
            });
            jQuery('#previous_5').click(function (e) {

                $('#vertical-example-p-4').removeAttr('style');
                $('#vertical-example-t-4').parent().attr('class','current');
                $('#vertical-example-p-5').attr('style' , 'display:none');
                $('#vertical-example-t-5').parent().removeClass('current');
            });
            jQuery('#previous_6').click(function (e) {

                $('#vertical-example-p-5').removeAttr('style');
                $('#vertical-example-t-5').parent().attr('class','current');
                $('#vertical-example-p-6').attr('style' , 'display:none');
                $('#vertical-example-t-6').parent().removeClass('current');
            });

            jQuery('#next_btn').click(function (e) {
                $('#vertical-example-p-2').attr('style','display:none');
                $('#vertical-example-p-3').removeAttr('style');
                $('#vertical-example-t-2').parent().removeClass('current');
                $('#vertical-example-t-3').parent().attr('class','current');

            });
            jQuery('#next_btn_2').click(function (e) {
                $('#vertical-example-p-5').attr('style','display:none');
                $('#vertical-example-p-6').removeAttr('style');
                $('#vertical-example-t-5').parent().removeClass('current');
                $('#vertical-example-t-6').parent().attr('class','current');


                    e.preventDefault();
                    jQuery.ajax({
                        url: "{{ route('allـearnings',$project->id) }}",
                        method: 'get',
                        dataType: 'json',
                        success: function (result) {
                            $('#earning_summery').empty();
                            $('#earning_summery_totle').empty();
                            $('#earning_summery_totle_avrage').empty();
                            $('#earning_summery').append('<tr id="earning_summery_crrunt"></tr>')
                            console.log(result);
                            $('#earning_summery_crrunt').append( '\
                            <td>' + result.yearCurrent + '</td>\
                                <td>' +formatter.format( result.totleIncomeToEndYearFS)+ '</td>\
                                <td>' + formatter.format(result.totleIncomeToEndYear_exp)+ '</td>\
                                <td>' + formatter.format((result.totleIncomeToEndYearFS)-(result.totleIncomeToEndYear_exp)) + '</td>\
                                <td>' + formatter.format( 100 * (((result.totleIncomeToEndYearFS)-(result.totleIncomeToEndYear_exp)) / result.totleIncomeToEndYearFS))  + '% </td>\
                            ');
                        let sum =0;
                        let sumHamsh =0;
                        $.each(result.totleYearFs, function (key, item) {
                            sum +=  item - (result.totleYear_exp[key]);
                            sumHamsh += (100 * (item -(result.totleYear_exp[key])) / item );
                            $('#earning_summery').append('\
                        <tr id="eex">\
                        <td>' + key + '</td>\
                                <td>' + formatter.format(item) + '</td>\
                                <td>' + formatter.format(result.totleYear_exp[key]) + '</td>\
                                <td>' + formatter.format(item - (result.totleYear_exp[key])) + '</td>\
                                <td>' + formatter.format(100 * (item -(result.totleYear_exp[key])) / item ) + '% </td>\
                            </tr> ');
                        });
                        $('#earning_summery_totle').append( '\
                            <td>الاجمالي</td>\
                                <td>' +formatter.format( result.totleIncomeeFS)+ '</td>\
                                <td>' + formatter.format(result.totleIncomeeExp)+ '</td>\
                                <td>'+ formatter.format(sum+(result.totleIncomeToEndYearFS)-(result.totleIncomeToEndYear_exp))+'</td>\
                                <td></td>\
                            ');
                        $('#earning_summery_totle_avrage').append( '\
                            <td>المعدل</td>\
                                <td>' +formatter.format( result.totleIncomeAvarageeFs)+ '</td>\
                                <td>' + formatter.format(result.totleIncomeAvaragee_exp)+ '</td>\
                                <td>'+ formatter.format((sum+(result.totleIncomeToEndYearFS)-(result.totleIncomeToEndYear_exp))/6)+ '</td>\
                                <td>'+formatter.format((sumHamsh+ (100 * (((result.totleIncomeToEndYearFS)-(result.totleIncomeToEndYear_exp)) / result.totleIncomeToEndYearFS)))/6)+' %</td>\
                            ');
                    }
                });
            });
            $("#spinner_1").hide();
            $("#spinner_2").hide();
            $("#spinner_3").hide();
            $('#vertical-example-t-0').parent().attr('class','current');

            jQuery('#value_incremental_button').click(function (e) {
e.preventDefault();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var formData = $('#form_2').serialize();
jQuery.ajax({
    url: "{{ route('project_fs_general_income_icremental_store',$project->id) }}",
    method: 'post',
    data: formData,
    dataType: 'json',
    success: function (result) {
        toastr.success("تمت العملية بنجاح", "تم تخزين  النسبة البيانات بنجاح");
        $('#accordionExample').html("");
        console.log(result.data);
            $('#accordionExample').append('<div class="table-responsive">\

                    <table class="table mb-0 border-warning" style="width: 100%">\
                        <thead>\
                        <tr>\
                             <th>السنة / البند</th>\
                             <th>نسبة النمو في قيمة الإيراد</th>\
                        </tr>\
                        </thead>\
                 <tbody id="incrementals">\
@foreach(years($project->id)['years'] as $year)\
<tr>\
    <td>' + {{$year}} + '</td>\
<td>\
    <input type="hidden" name="year[]" value="{{$year}}" />\
    <input type="hidden" name="id" class="form-control" value="' + result.data.id + '">\
        <input type="text" name="value_incremental[]" class="form-control" value="' + result.data.incremental + '" >\
</td>\
<td>\
</td>\
</tr>\
@endforeach\
</tbody>\
                    </table>');


    }
});
});
jQuery('#value_exp_incremental_button').click(function (e) {
e.preventDefault();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var formData = $('#form_4').serialize();
jQuery.ajax({
    url: "{{ route('project_exp_general_income_icremental_store',$project->id) }}",
    method: 'post',
    data: formData,
    dataType: 'json',
    success: function (result) {
        toastr.success("تمت العملية بنجاح", "تم تخزين  النسبة البيانات بنجاح");
        $('#accordionExample_1').html("");
        console.log(result.data);
            $('#accordionExample_1').append('<div class="table-responsive">\

                    <table class="table mb-0 border-warning" style="width: 100%">\
                        <thead>\
                        <tr>\
                             <th>السنة / البند</th>\
                             <th>نسبة النمو في قيمة التكاليف</th>\
                        </tr>\
                        </thead>\
                 <tbody id="incrementals">\
@foreach(years($project->id)['years'] as $year)\
<tr>\
    <td>' + {{$year}} + '</td>\
<td>\
    <input type="hidden" name="year[]" value="{{$year}}" />\
    <input type="hidden" name="id" class="form-control" value="' + result.data.id + '">\
        <input type="text" name="value_incremental[]" class="form-control" value="' + result.data.incremental + '" >\
</td>\
<td>\
</td>\
</tr>\
@endforeach\
</tbody>\
                    </table>');




                    }
                });
            });


            jQuery('#save_btn_1').click(function (e) {

                $("#spinner_1").show();
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_1').serialize();
                jQuery.ajax({
                    url: "{{ route('project_fs_general_income_store',$project->id) }}",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function (result) {
                        toastr.success("تمت العملية بنجاح", "تم تخزين البيانات بنجاح");
                        //$("#form_1 :input").prop("disabled", true);
                        $("#spinner_1").hide();
                        $('#vertical-example-p-0').attr('style','display:none');
                        $('#vertical-example-p-1').removeAttr('style');
                        $('#vertical-example-t-0').parent().removeClass('current');
                        $('#vertical-example-t-1').parent().attr('class','current');



                    }
                });
            });
            jQuery('#save_btn_2').click(function (e) {

                $("#spinner_2").show();
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_2').serialize();
                jQuery.ajax({
                    url: "{{ route('project_fs_general_income_icremental_detail_store',$project->id) }}",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function (result) {
                        toastr.success("تمت العملية بنجاح", "تم حفظ البيانات بنجاح");
                        $("#spinner_2").hide();
                        $('#vertical-example-p-1').attr('style','display:none');
                        $('#vertical-example-p-2').removeAttr('style');
                        $('#vertical-example-t-1').parent().removeClass('current');
                        $('#vertical-example-t-2').parent().attr('class','current');

                        $('#incremental_data_totle').empty();
                        $.each(result.data, function (key, item) {
                            $('#incremental_data_totle').append('\
                                          <tr>\
                                <td>' + (item.item) + '</td>\
                                <td>' + formatter.format(item.quantity) +'</td>\
                                <td>' + formatter.format(item.value) +'</td>\
                                @if($project->revenu_entry == "m")\
                                <td>' + formatter.format(item.value * item.quantity) +'</td>\
                                               @else\
                              <td>' + formatter.format((item.value * item.quantity) * 12) +'</td>\
                                @endif\
                                <td>' +formatter.format ((item.value * item.quantity) * result.remainingmonths) +'</td>\
                                <td>' + formatter.format((item.value * item.quantity) * 12) +'</td>\
                                         </tr>\
                                        ');

                        });

                        $('#incremental_data_totle').append('\
                        <tr>\
                                                <th>الاجمالي</th>\
                                                <th></th><th></th>\
                                                <th>'+formatter.format(result.totleIncomeMounth)+'</th>\
                                                <th>'+formatter.format(result.totleIncomeToEndYear)+'</th>\
                                                <th>'+ formatter.format(result.totleIncomeYear)+'</th>\
                                                </tr>\
                                                ');

                        fetch_incremental();
                        view_revenue();
                    }
                });
            });
            jQuery('#save_btn_3').click(function (e) {

                $("#spinner_3").show();
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_3').serialize();
                jQuery.ajax({
                    url: "{{ route('project_exp_general_income_store',$project->id) }}",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function (result) {
                        toastr.success("تمت العملية بنجاح", "تم تخزين البيانات بنجاح");
                        // $("#form_3 :input").prop("disabled", true);
                        $("#spinner_3").hide();
                        $('#vertical-example-p-3').attr('style','display:none');
                        $('#vertical-example-p-4').removeAttr('style');
                        $('#vertical-example-t-3').parent().removeClass('current');
                        $('#vertical-example-t-4').parent().attr('class','current');

                    }
                });
            });
            jQuery('#save_btn_4').click(function (e) {

                $("#spinner_4").show();
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_4').serialize();
                jQuery.ajax({
                    url: "{{ route('project_exp_general_income_icremental_detail_store',$project->id) }}",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function (result) {
                        console.log(result);
                        toastr.success("تمت العملية بنجاح", "تم حفظ البيانات بنجاح");
                        $("#spinner_4").hide();
                        $('#vertical-example-p-4').attr('style','display:none');
                        $('#vertical-example-p-5').removeAttr('style');
                        $('#vertical-example-t-4').parent().removeClass('current');
                        $('#vertical-example-t-5').parent().attr('class','current');
                        $('#expenses_incremental_data').empty();
                        $('#expenses_data_totle').empty();
                        $.each(result.data, function (key, item) {
                            $('#expenses_incremental_data').append('<tr>'+
                                '<td>' + (item.item) + '</td>'+
                                ((item.expensis_type ==  "0")?
                                    ' <td>' + formatter.format(item.quantity)+ ' </td>'
                                    :"")+
                                ((item.expensis_type ==  "1")?
                                    ' <td>' + formatter.format(item.quantity)+ ' </td>'
                                    :"")+
                                ((item.expensis_type ==  "2")?
                                    ' <td> </td>'
                                    :"")+
                                ((item.expensis_type ==  "0")?
                                    ' <td>' + formatter.format(item.value )+ ' </td>'
                                    :"")+
                                ((item.expensis_type ==  "1")?
                                    ' <td>' + formatter.format(item.value/100 ) * (item.fs_income.value)+ ' </td>'
                                    :"")+
                                ((item.expensis_type ==  "2")?
                                    ' <td>' + formatter.format((item.value/100)* result.totleIncomeMounthFS)+ ' </td>'
                                    :"")+
                                '@if($project->revenu_entry == "m")'+
                                ((item.expensis_type ==  "0")?
                                    ' <td>' + formatter.format(item.value *item.quantity)+ ' </td>'
                                    :"")+
                                ((item.expensis_type ==  "1")?
                                    ' <td>' + formatter.format((item.value/100 ) * (item.fs_income.value)*item.quantity)+ ' </td>'
                                    :"")+
                                ((item.expensis_type ==  "2")?
                                    ' <td>' + formatter.format((item.value/100)* result.totleIncomeMounthFS)+ ' </td>'
                                    :"")+
                                ' @else'+
                                '<td>' + formatter.format((item.value * item.quantity) * 12) +'</td>'+
                                '@endif'+
                                ((item.expensis_type ==  "0")?
                                    ' <td>' + formatter.format ((item.value * item.quantity) * result.remainingmonths) + ' </td>'
                                    :"")+
                                ((item.expensis_type ==  "1")?
                                    ' <td>' + formatter.format(((item.value/100 ) * (item.fs_income.value)*item.quantity) * result.remainingmonths )+ ' </td>'
                                    :"")+
                                ((item.expensis_type ==  "2")?
                                    ' <td>' + formatter.format((item.value/100)* result.totleIncomeToEndYearFS)+ ' </td>'
                                    :"")+
                                ((item.expensis_type ==  "0")?
                                    ' <td>' + formatter.format((item.value *item.quantity) * 12)+ ' </td>'
                                    :"")+
                                ((item.expensis_type ==  "1")?
                                    ' <td>' + formatter.format(((item.value/100 ) * (item.fs_income.value)*item.quantity) * 12)+ ' </td>'
                                    :"")+
                                ((item.expensis_type ==  "2")?
                                    ' <td>' + formatter.format((item.value/100)* result.totleIncomeYearFS)+ ' </td>'
                                    :"")+
                                '</tr>'
                            );

                        });
                        $('#expenses_data_totle').append('\
                        <tr>\
                                                <th>الاجمالي</th>\
                                                <th></th><th></th>\
                                                <th>'+formatter.format(result.totleIncomeMounth)+'</th>\
                                                <th>'+formatter.format(result.totleIncomeToEndYear)+'</th>\
                                                <th>'+ formatter.format(result.totleIncomeYear)+'</th>\
                                                </tr>\
                                                ');
                        fetch_expenses_incremental();
                        view_expenses();
                    }
                });
            });

        });

    </script>

    {{--    ******************************************************* Ajax Requests ****************************************************--}}

    <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
        $(document).ready(function() {
            (function() {
                $('#form_1 :input').keyup(function() {

                    var empty = false;
                    $('#form_1 :input').each(function() {
                        if ($(this).val() == '') {
                            empty = true;
                        }
                    });

                    // if (empty) {
                    //     $('#save_btn_1').attr('disabled', 'disabled');
                    // } else {
                    //     $('#save_btn_1').removeAttr('disabled');
                    // }
                });
                $('#form_3 :input').keyup(function() {

                    var empty = false;
                    $('#form_3 :input').each(function() {
                        if ($(this).val() == '') {
                            empty = true;
                        }
                    });

                    // if (empty) {
                    //     $('#save_btn_3').attr('disabled', 'disabled');
                    // } else {
                    //     $('#save_btn_3').removeAttr('disabled');
                    // }
                });
            })();
        });

        function fetch_incremental(){
            jQuery.ajax({
                url: "{{ route('project_fs_general_income_icremental_detail_get',$project->id) }}",
                method: 'get',
                dataType: 'json',
                success: function (result) {
                    // $('#incremental_summry_table_year').append('\
                    //                     <th>النمو السنوي</th>\
                    //             <th style="background: #fff;width: 150px;color:#000">'  + result.projectFsGeneralIncome.incremental +  "%"+'</th>\
                    //         ');
                    console.log(result);
                    $('#view_incremental_data').empty();

                    $.each(result.data, function (key, item) {


                        $('#view_incremental_data').append('\
                                          <tr>\
                                <td>' + item.year + '</td>\
                                <td>' + item.incremental + "%"+'</td>\
                                         </tr>\
                            ');

                    });
                }
            });
        }
        function view_revenue(){



            jQuery.ajax({
                url: "{{ route('project_fs_general_income_icremental_total_revenue',$project->id) }}",
                method: 'get',
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    $('#view_incremental_data_avareg_persent').empty();
                    $('#total_revenue_totle_icome').empty();
                    $('#total_revenue_totle_icome_avarge').empty();
                    $('#total_revenue_totle_icome_avarge_persent').empty();


                    $('#head_data').empty();
                    $('#total_revenue_data').empty();
                    $('#head_data').append('\
                    <th>السنة</th>\
                    <th id="total_revenue_current_head"></th>\
                            ');
                    $('#total_revenue_data').append('\
                            <td>اجمالي الايرادات</td>\
                                        <td id="total_revenue_current"></td>\
                            ');

                    $('#view_incremental_data_avareg_persent').append(
                        result.IncomeAvargePersent +'%'
                    );
                    $('#total_revenue_totle_icome').append(
                        formatter.format(result.totleIncomee)

                    );
                    $('#total_revenue_totle_icome_avarge').append(
                        formatter.format(result.totleIncomeAvaragee)

                    );
                    $('#total_revenue_totle_icome_avarge_persent').append(

                        result.IncomeAvargePersent +'%'
                    );
                    $('#total_revenue_current_head').append(
                        result.yearCurrent
                    );

                    $('#total_revenue_current').append(
                        formatter.format(result.totleIncomeToEndYear)
                    );

                    $.each(result.totleYear, function (key, item) {
                        $('#head_data').append('\
                            <th>' + key + '</th>\
                            ');

                        $('#total_revenue_data').append('\
                                <td>' + formatter.format(item) + '</td>\
                            ');
                    });
                }
            });
        }

        function fetch_expenses_incremental(){
            jQuery.ajax({
                url: "{{ route('project_exp_general_income_icremental_detail_get',$project->id) }}",
                method: 'get',
                dataType: 'json',
                success: function (result) {
                    $('#view_exp_incremental_data').empty();
                    // $('#view_expenses_incremental_data').append('\
                    //                     <th>النمو السنوي</th>\
                    //             <th style="background: #fff;width: 150px;color:#000">'  + result.projectExpGeneralIncome.incremental +  "%"+'</th>\
                    //         ');

                    $.each(result.data, function (key, item) {


                        $('#view_exp_incremental_data').append('\
                  <tr>\
        <td>' + item.year + '</td>\
        <td>' + item.incremental + "%"+'</td>\
                 </tr>\
    ');

                    });
                }
            });
        }
        function view_expenses(){
            jQuery.ajax({
                url: "{{ route('project_exp_general_income_icremental_total_revenue',$project->id) }}",
                method: 'get',
                dataType: 'json',
                success: function (result) {
                    $('#view_exp_incremental_data_avareg_persent').empty();
                    $('#total_exp_revenue_totle_icome').empty();
                    $('#total_exp_revenue_totle_icome_avarge').empty();
                    $('#total_exp_revenue_totle_icome_avarge_persent').empty();
                    $('#head_exp_data').empty();
                    $('#total_exp_revenue_data').empty();
                    $('#head_exp_data').append('\
                                         <th>السنة</th>\
                                        <th id="total_exp_revenue_current_head"></th>\
                            ');
                    $('#total_exp_revenue_data').append('\
                            <td>اجمالي التكاليف</td>\
                                        <td id="total_exp_revenue_current"></td>\
                            ');
                    $('#view_exp_incremental_data_avareg_persent').append(
                        result.IncomeAvargePersent +'%'
                    );
                    $('#total_exp_revenue_totle_icome').append(
                        formatter.format(result.totleIncomee)

                    );
                    $('#total_exp_revenue_totle_icome_avarge').append(
                        formatter.format(result.totleIncomeAvaragee)

                    );
                    $('#total_exp_revenue_totle_icome_avarge_persent').append(

                        result.IncomeAvargePersent  +'%'
                    );
                    $('#total_exp_revenue_current_head').append(
                        result.yearCurrent
                    );

                    $('#total_exp_revenue_current').append(
                        formatter.format(result.totleIncomeToEndYear)
                    );

                    $.each(result.totleYear, function (key, item) {
                        $('#head_exp_data').append('\
                            <th>' + key + '</th>\
                            ');

                        $('#total_exp_revenue_data').append('\
                                <td>' + formatter.format(item) + '</td>\
                            ');
                    });
                }
            });
        }

        const formatter = new Intl.NumberFormat('en-US');
    </script>

@endsection
