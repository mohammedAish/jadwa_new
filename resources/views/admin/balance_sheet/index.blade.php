@extends('layouts.master')

@section('title')
    {{ 'ادارة الميزانية العمومية' }}
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
    .wizard.vertical-wizard .steps {
    font-size: 12px;}
</style>
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            {{ 'دراسة جدوى' }}
        @endslot
        @slot('name')
        {{ 'ادارة الميزانية العمومية' }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="vertical-example" class="vertical-wizard">
                        <h3>تجهيزات و مباني</h3>
                        <section>
                            <h4 class="mb-4"><strong>تجهيزات و مباني</strong></h4>
                            <form id="form_1" name="form_1" class="form-horizontal">

                                <div class="row">
                                    @if($balances->where('balance_type', 'equipment_buildings')->isNotEmpty())
                                                @foreach($balances->where('balance_type', 'equipment_buildings') as $balance)
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]"  value="{{$balance->item}}" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="cost[]"  value="{{$balance->cost}}" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>العدد</strong></label>
                                                            <input type="text" name="quantity[]" value="{{$balance->quantity}}" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                            <input type="text" name="depreciation[]"  value="{{$balance->depreciation}}" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text _error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>
                                                            <select  class="form-control"  name="purchase_year[]">
                                                                @eif($balance->purchase_year != null)
                                                                <option value="{{$balance->purchase_year}}" selected> {{$balance->purchase_year}}</option>
                                                                @end
                                                                <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                                @foreach(years()['years'] as $year)
                                                                <option value="{{$year}}">{{$year}}</option>
                                                                @endforeach

                                                            </select>
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @else
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="cost[]"   class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>العدد</strong></label>
                                                            <input type="text" name="quantity[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                            <input type="text" name="depreciation[]"   onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text _error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>
                                                            <select  class="form-control"  name="purchase_year[]">

                                                                <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                                @foreach(years()['years'] as $year)
                                                                <option value="{{$year}}">{{$year}}</option>
                                                                @endforeach

                                                            </select>
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div >

                                                <div class="inner-repeater mb-4" style="">

                                                <div data-repeater-item class="inner mb-3 row income">

                                                </div>

                                                <div class="col-md-4 col-4 ">
                                                    <input data-repeater-create id="add_income_item" type="button"
                                                           class="add btn btn-outline-dark inner" value="اضافة " />
                                                </div>

                                    </div>

                                <div class="col-md-6 col-6" style="float: left">
                                    <div class="col-md-4" style="float: left">
                                        <button type="button" value="حفظ ومتابعة ->" name="save_btn_1" class="btn btn-warning" id="save_btn_1" >
                                            حفظ ومتابعة
                                            {{-- <span class="spinner-border spinner-border-sm" id="spinner_1" role="status" aria-hidden="true"></span> --}}
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </section>

                        <h3> ملخص تجهيزات و مباني </h3>
                        <section>
                            <h4 class="mb-4"><strong> ملخص تجهيزات و مباني</strong></h4>

                            <div class="row">
                            <div class="accordion" id="accordionExaple" >

                            <div class="table-responsive mt-5">
                                <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                    <thead>
                                    <tr>
                                         <th>الأصل /البند</th>
                                         <th>التكلفة</th>
                                         <th>العدد</th>
                                         <th>الاهلاك</th>
                                         <th>سنة الشراء</th>
                                         <th>الاجمالي</th>
                                    </tr>
                                    </thead>
                             <tbody id="summery_equipment_buildings_currentYear">
                             </tbody>
                             <tfoot style="font-weight: bold;" id="totle_summeryـequipment_buildings_currentYear">

                             </tfoot>
                                </table>
                        </div>

                        <div class="table-responsive mt-5">
                            <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                <thead>
                                <tr>
                                     <th>الأصل /البند</th>
                                     <th>التكلفة</th>
                                     <th>العدد</th>
                                     <th>الاهلاك</th>
                                     <th>سنة الشراء</th>
                                     <th>الاجمالي</th>
                                </tr>
                                </thead>
                         <tbody id="summery_equipment_buildings">
                         </tbody>
                         <tfoot style="font-weight: bold;" id="totle_summeryـequipment_buildings">

                         </tfoot>
                            </table>
                    </div>
                        <div class="table-responsive mt-5">
                            <caption>تغير الاهلاك</caption>
                            <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                <thead>
                                <tr>
                                     <th>الأصل /البند</th>
                                     <th>{{$currentYear}}</th>
                                     @foreach(years()['years'] as $year)
                                     <td>{{$year}} </td>
                                     @endforeach
                                </tr>
                                </thead>
                         <tbody>
                            <tr  id="summery_equipment_buildings_depreciation"></tr>
                         </tbody>
                         {{-- <tfoot style="font-weight: bold;" id="totle_summeryـequipment_buildings_currentYear">

                         </tfoot> --}}
                            </table>
                    </div>


                            <br>
                            <br>

                            <div class="d-flex justify-content-between" >
                                <button type="button" value="السابق" name="previous_1" class="btn btn-warning" id="previous_1" >
                                    السابق
                                </button>
                                <button style="float: left" type="button" value="التالي" name="next_btn_2" class="btn btn-warning" id="next_btn_2" >
                                    التالي
                                    {{-- <span class="spinner-border spinner-border-sm" id="spinner_2" role="status" aria-hidden="true"></span> --}}
                                </button>
                            </div>
                            </div>

                        </section>
                        <h3>وسائل النقل</h3>

                        <section id="forms_2">
                            <h4 class="mb-4"><strong>وسائل النقل</strong></h4>



                            <form id="form_2" name="form_2" class="form-horizontal">

                                <div class="row">
                                    @if($balances->where('balance_type', 'transport')->isNotEmpty())
                                                @foreach($balances->where('balance_type', 'transport') as $balance)
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]"  value="{{$balance->item}}" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="cost[]"  value="{{$balance->cost}}" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>العدد</strong></label>
                                                            <input type="text" name="quantity[]" value="{{$balance->quantity}}" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                            <input type="text" name="depreciation[]"  value="{{$balance->depreciation}}" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text _error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>
                                                            <select  class="form-control"  name="purchase_year[]">
                                                                @eif($balance->purchase_year != null)
                                                                <option value="{{$balance->purchase_year}}" selected> {{$balance->purchase_year}}</option>
                                                                @end
                                                                <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                                @foreach(years()['years'] as $year)
                                                                <option value="{{$year}}">{{$year}}</option>
                                                                @endforeach

                                                            </select>
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @else
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="cost[]"   class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>العدد</strong></label>
                                                            <input type="text" name="quantity[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                            <input type="text" name="depreciation[]"   onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text _error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>
                                                            <select  class="form-control"  name="purchase_year[]">

                                                                <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                                @foreach(years()['years'] as $year)
                                                                <option value="{{$year}}">{{$year}}</option>
                                                                @endforeach

                                                            </select>
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div >

                                                <div class="inner-repeater2 mb-4" style="">

                                                <div data-repeater-item class="inner2 mb-3 row income2">

                                                </div>

                                                <div class="col-md-4 col-4 ">
                                                    <input data-repeater-create id="add_income_item2" type="button"
                                                           class="add btn btn-outline-dark inner" value="اضافة " />
                                                </div>

                                    </div>

                                    <br>
                                    <br>

                                        <div class="d-flex justify-content-between" >
                                            <button type="button" value="السابق" name="previous_2" class="btn btn-warning" id="previous_2" >
                                                السابق
                                            </button>
                                            <button style="float: left" type="button" value="حفظ والتالي" name="save_btn_2" class="btn btn-warning" id="save_btn_2" >
                                                حفظ ومتابعة
                                                {{-- <span class="spinner-border spinner-border-sm" id="spinner_2" role="status" aria-hidden="true"></span> --}}
                                            </button>
                                        </div>
                            </form>




                            </form>
                        </section>
                        <h3> ملخص وسائل النقل</h3>
                        <section>
                            <h4 class="mb-4"><strong>ملخص وسائل النقل</strong></h4>

                            <div class="row">
                            <div class="accordion" id="accordionExaple" >


                            <div class="table-responsive mt-5">
                                <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                    <thead>
                                    <tr>
                                         <th>الأصل /البند</th>
                                         <th>التكلفة</th>
                                         <th>العدد</th>
                                         <th>الاهلاك</th>
                                         <th>سنة الشراء</th>
                                         <th>الاجمالي</th>
                                    </tr>
                                    </thead>
                             <tbody id="summery_transport_currentYear">
                             </tbody>
                             <tfoot style="font-weight: bold;" id="totle_transport_currentYear">

                             </tfoot>
                                </table>
                        </div>

                        <div class="table-responsive mt-5">
                            <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                <thead>
                                <tr>
                                     <th>الأصل /البند</th>
                                     <th>التكلفة</th>
                                     <th>العدد</th>
                                     <th>الاهلاك</th>
                                     <th>سنة الشراء</th>
                                     <th>الاجمالي</th>
                                </tr>
                                </thead>
                         <tbody id="summery_transport">
                         </tbody>
                         <tfoot style="font-weight: bold;" id="totle_transport">

                         </tfoot>
                            </table>
                    </div>
                    <div class="table-responsive mt-5">
                        <caption>تغير الاهلاك</caption>

                        <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                            <thead>
                            <tr>
                                 <th>الأصل /البند</th>
                                 <th>{{$currentYear}}</th>
                                 @foreach(years()['years'] as $year)
                                 <td>{{$year}} </td>
                                 @endforeach
                            </tr>
                            </thead>
                     <tbody>
                        <tr  id="transport_depreciation"></tr>
                     </tbody>
                     {{-- <tfoot style="font-weight: bold;" id="totle_summeryـequipment_buildings_currentYear">

                     </tfoot> --}}
                        </table>
                </div>
                            <br>
                            <br>

                            <div class="d-flex justify-content-between" >
                                <button type="button" value="السابق" name="previous_3" class="btn btn-warning" id="previous_3" >
                                    السابق
                                </button>
                                <button style="float: left" type="button" value="التالي" name="next_btn_3" class="btn btn-warning" id="next_btn_3" >
                                    التالي
                                    {{-- <span class="spinner-border spinner-border-sm" id="spinner_2" role="status" aria-hidden="true"></span> --}}
                                </button>
                            </div>
                            </div>

                        </section>

                        <h3>الألات و المعدات</h3>
                        <section>
                            <h4 class="mb-4"><strong>الألات و المعدات</strong></h4>
                            <form id="form_3" name="form_3" class="form-horizontal">


                                <div class="row">
                                    @if($balances->where('balance_type', 'equipments')->isNotEmpty())
                                                @foreach($balances->where('balance_type', 'equipments') as $balance)
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]"  value="{{$balance->item}}" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="cost[]"  value="{{$balance->cost}}" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>العدد</strong></label>
                                                            <input type="text" name="quantity[]" value="{{$balance->quantity}}" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                            <input type="text" name="depreciation[]"  value="{{$balance->depreciation}}" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text _error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>
                                                            <select  class="form-control"  name="purchase_year[]">
                                                                @eif($balance->purchase_year != null)
                                                                <option value="{{$balance->purchase_year}}" selected> {{$balance->purchase_year}}</option>
                                                                @end
                                                                <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                                @foreach(years()['years'] as $year)
                                                                <option value="{{$year}}">{{$year}}</option>
                                                                @endforeach

                                                            </select>
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @else
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]"   class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="cost[]"   class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>العدد</strong></label>
                                                            <input type="text" name="quantity[]"  onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                            <input type="text" name="depreciation[]"  onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text _error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>
                                                            <select  class="form-control"  name="purchase_year[]">

                                                                <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                                @foreach(years()['years'] as $year)
                                                                <option value="{{$year}}">{{$year}}</option>
                                                                @endforeach

                                                            </select>
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div >
                                            <div class="inner-repeater3 mb-4" style="">

                                                <div data-repeater-item class="inner3 mb-3 row income3">

                                                </div>

                                                <div class="col-md-4 col-4 ">
                                                    <input data-repeater-create id="add_income_item3" type="button"
                                                           class="add btn btn-outline-dark inner" value="اضافة " />
                                                </div>

                                    </div>
                            </form>


                            <br>
                            <br>

                                <div class="d-flex justify-content-between" >

                                    <button type="button" value="السابق" name="previous_4" class="btn btn-warning" id="previous_4" >
                                        السابق
                                    </button>
                                    <button type="button" style="float: left" value="التالي" name="save_btn_3" class="btn btn-warning" id="save_btn_3" >
                                        التالي
                                    </button>
                                 </div>

                        </section>
                        <h3> ملخص الألات و المعدات</h3>
                        <section>
                            <h4 class="mb-4"><strong>ملخص الألات و المعدات</strong></h4>

                            <div class="row">
                            <div class="accordion" id="accordionExaple" >

                            <div class="table-responsive mt-5">
                                <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                    <thead>
                                    <tr>
                                         <th>الأصل /البند</th>
                                         <th>التكلفة</th>
                                         <th>العدد</th>
                                         <th>الاهلاك</th>
                                         <th>سنة الشراء</th>
                                         <th>الاجمالي</th>
                                    </tr>
                                    </thead>
                             <tbody id="summery_equipments_currentYear">
                             </tbody>
                             <tfoot style="font-weight: bold;" id="totle_equipments_currentYear">

                             </tfoot>
                                </table>
                        </div>
                                <div class="table-responsive mt-5">
                                    <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                        <thead>
                                        <tr>
                                             <th>الأصل /البند</th>
                                             <th>التكلفة</th>
                                             <th>العدد</th>
                                             <th>الاهلاك</th>
                                             <th>سنة الشراء</th>
                                             <th>الاجمالي</th>
                                        </tr>
                                        </thead>
                                 <tbody id="summery_equipments">
                                 </tbody>
                                 <tfoot style="font-weight: bold;" id="totle_equipments">

                                 </tfoot>
                                    </table>
                            </div>
                            <div class="table-responsive mt-5">
                                <caption>تغير الاهلاك</caption>

                                <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                    <thead>
                                    <tr>
                                         <th>الأصل /البند</th>
                                         <th>{{$currentYear}}</th>
                                         @foreach(years()['years'] as $year)
                                         <td>{{$year}} </td>
                                         @endforeach
                                    </tr>
                                    </thead>
                             <tbody>
                                <tr  id="equipments_depreciation"></tr>
                             </tbody>
                             {{-- <tfoot style="font-weight: bold;" id="totle_summeryـequipment_buildings_currentYear">

                             </tfoot> --}}
                                </table>
                        </div>

                            <br>
                            <br>

                            <div class="d-flex justify-content-between">
                                <button type="button" value="السابق" name="previous_5" class="btn btn-warning" id="previous_5" >
                                    السابق
                                </button>
                                <button style="float: left" type="button" value="التالي" name="next_btn_4" class="btn btn-warning" id="next_btn_4" >
                                    التالي
                                    {{-- <span class="spinner-border spinner-border-sm" id="spinner_2" role="status" aria-hidden="true"></span> --}}
                                </button>
                            </div>
                            </div>

                        </section>
                        <h3>الأثاث</h3>
                        <section>
                            <h4 class="mb-4"><strong>الأثاث</strong></h4>
                            <form id="form_4" name="form_4" class="form-horizontal">

                            <div class="row">
                                @if($balances->where('balance_type', 'furniture')->isNotEmpty())
                                            @foreach($balances->where('balance_type', 'furniture') as $balance)
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                        <input type="text" name="item[]"  value="{{$balance->item}}" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text item_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                        <input type="text" name="cost[]"  value="{{$balance->cost}}" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text item_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3 price">
                                                        <label for="verticalnav-pancard-input"><strong>العدد</strong></label>
                                                        <input type="text" name="quantity[]" value="{{$balance->quantity}}" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text quantity_error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                        <input type="text" name="depreciation[]"  value="{{$balance->depreciation}}" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text _error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>
                                                        <select  class="form-control"  name="purchase_year[]">
                                                            @eif($balance->purchase_year != null)
                                                            <option value="{{$balance->purchase_year}}" selected> {{$balance->purchase_year}}</option>
                                                            @end
                                                            <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                            @foreach(years()['years'] as $year)
                                                            <option value="{{$year}}">{{$year}}</option>
                                                            @endforeach

                                                        </select>
                                                        <span class="text-danger error-text quantity_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                        <input type="text" name="item[]"   class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text item_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                        <input type="text" name="cost[]"   class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text item_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3 price">
                                                        <label for="verticalnav-pancard-input"><strong>العدد</strong></label>
                                                        <input type="text" name="quantity[]"  onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text quantity_error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                        <input type="text" name="depreciation[]"  onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text _error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>
                                                        <select  class="form-control"  name="purchase_year[]">

                                                            <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                            @foreach(years()['years'] as $year)
                                                            <option value="{{$year}}">{{$year}}</option>
                                                            @endforeach

                                                        </select>
                                                        <span class="text-danger error-text quantity_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div >
                                        <div class="inner-repeater4 mb-4" style="">

                                            <div data-repeater-item class="inner4 mb-3 row income4">

                                            </div>

                                            <div class="col-md-4 col-4 ">
                                                <input data-repeater-create id="add_income_item4" type="button"
                                                       class="add btn btn-outline-dark inner" value="اضافة " />
                                            </div>

                                </div>
                        </form>


                        <br>
                        <br>

                            <div class="d-flex justify-content-between" >

                                <button type="button" value="السابق" name="previous_6" class="btn btn-warning" id="previous_6" >
                                    السابق
                                </button>
                                <button type="button" style="float: left" value="التالي" name="save_btn_4" class="btn btn-warning" id="save_btn_4" >
                                    التالي
                                </button>
                             </div>


                        </section>
                        <h3> ملخص الأثاث</h3>
                        <section>
                            <h4 class="mb-4"><strong>ملخص الأثاث</strong></h4>

                            <div class="row">
                            <div class="accordion" id="accordionExaple" >
                                <div class="table-responsive mt-5">
                                    <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                        <thead>
                                        <tr>
                                             <th>الأصل /البند</th>
                                             <th>التكلفة</th>
                                             <th>العدد</th>
                                             <th>الاهلاك</th>
                                             <th>سنة الشراء</th>
                                             <th>الاجمالي</th>
                                        </tr>
                                        </thead>
                                 <tbody id="summery_furniture_currentYear">
                                 </tbody>
                                 <tfoot style="font-weight: bold;" id="totle_furniture_currentYear">

                                 </tfoot>
                                    </table>
                            </div>
                                <div class="table-responsive mt-5">
                                    <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                        <thead>
                                        <tr>
                                             <th>الأصل /البند</th>
                                             <th>التكلفة</th>
                                             <th>العدد</th>
                                             <th>الاهلاك</th>
                                             <th>سنة الشراء</th>
                                             <th>الاجمالي</th>
                                        </tr>
                                        </thead>
                                 <tbody id="summery_furniture">
                                 </tbody>
                                 <tfoot style="font-weight: bold;" id="totle_furniture">

                                 </tfoot>
                                    </table>
                            </div>
                            <div class="table-responsive mt-5">
                                <caption>تغير الاهلاك</caption>

                                <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                    <thead>
                                    <tr>
                                         <th>الأصل /البند</th>
                                         <th>{{$currentYear}}</th>
                                         @foreach(years()['years'] as $year)
                                         <td>{{$year}} </td>
                                         @endforeach
                                    </tr>
                                    </thead>
                             <tbody>
                                <tr  id="furniture_depreciation"></tr>
                             </tbody>
                             {{-- <tfoot style="font-weight: bold;" id="totle_summeryـequipment_buildings_currentYear">

                             </tfoot> --}}
                                </table>
                        </div>

                            <br>
                            <br>

                            <div class="d-flex justify-content-between">
                                <button type="button" value="السابق" name="previous_7" class="btn btn-warning" id="previous_7" >
                                    السابق
                                </button>
                                <button style="float: left" type="button" value="التالي" name="next_btn_5" class="btn btn-warning" id="next_btn_5" >
                                    التالي
                                    {{-- <span class="spinner-border spinner-border-sm" id="spinner_2" role="status" aria-hidden="true"></span> --}}
                                </button>
                            </div>
                            </div>

                        </section>

                        <h3>الاصول الغير ملموسة</h3>
                        <section>
                            <h4 class="mb-4"><strong>الاصول الغير ملموسة</strong></h4>
                            <form id="form_5" name="form_5" class="form-horizontal">

                            <div class="row">
                                @if($balances->where('balance_type', 'intangible_assets')->isNotEmpty())
                                            @foreach($balances->where('balance_type', 'intangible_assets') as $balance)
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                        <input type="text" name="item[]"  value="{{$balance->item}}" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text item_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                        <input type="text" name="cost[]"  value="{{$balance->cost}}" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text item_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3 price">
                                                        <label for="verticalnav-pancard-input"><strong>العدد</strong></label>
                                                        <input type="text" name="quantity[]" value="{{$balance->quantity}}" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text quantity_error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                        <input type="text" name="depreciation[]"  value="{{$balance->depreciation}}" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text _error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>
                                                        <select  class="form-control"  name="purchase_year[]">
                                                            @eif($balance->purchase_year != null)
                                                            <option value="{{$balance->purchase_year}}" selected> {{$balance->purchase_year}}</option>
                                                            @end
                                                            <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                            @foreach(years()['years'] as $year)
                                                            <option value="{{$year}}">{{$year}}</option>
                                                            @endforeach

                                                        </select>
                                                        <span class="text-danger error-text quantity_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                        <input type="text" name="item[]"   class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text item_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                        <input type="text" name="cost[]"   class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text item_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3 price">
                                                        <label for="verticalnav-pancard-input"><strong>العدد</strong></label>
                                                        <input type="text" name="quantity[]"  onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text quantity_error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                        <input type="text" name="depreciation[]"  onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text _error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>
                                                        <select  class="form-control"  name="purchase_year[]">

                                                            <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                            @foreach(years()['years'] as $year)
                                                            <option value="{{$year}}">{{$year}}</option>
                                                            @endforeach

                                                        </select>
                                                        <span class="text-danger error-text quantity_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div >
                                        <div class="inner-repeater5 mb-4" style="">

                                            <div data-repeater-item class="inner5 mb-3 row income5">

                                            </div>

                                            <div class="col-md-4 col-4 ">
                                                <input data-repeater-create id="add_income_item5" type="button"
                                                       class="add btn btn-outline-dark inner" value="اضافة " />
                                            </div>

                                </div>
                        </form>


                        <br>
                        <br>

                            <div class="d-flex justify-content-between" >

                                <button type="button" value="السابق" name="previous_8" class="btn btn-warning" id="previous_8" >
                                    السابق
                                </button>
                                <button type="button" style="float: left" value="التالي" name="save_btn_5" class="btn btn-warning" id="save_btn_5" >
                                    التالي
                                </button>
                             </div>


                        </section>
                        <h3> ملخص الاصول الغير ملموسة</h3>
                        <section>
                            <h4 class="mb-4"><strong>ملخص الاصول الغير ملموسة</strong></h4>

                            <div class="row">
                            <div class="accordion" id="accordionExaple" >
                                <div class="table-responsive mt-5">
                                    <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                        <thead>
                                        <tr>
                                             <th>الأصل /البند</th>
                                             <th>التكلفة</th>
                                             <th>العدد</th>
                                             <th>الاهلاك</th>
                                             <th>سنة الشراء</th>
                                             <th>الاجمالي</th>
                                        </tr>
                                        </thead>
                                 <tbody id="summery_intangible_assets_currentYear">
                                 </tbody>
                                 <tfoot style="font-weight: bold;" id="totle_intangible_assets_currentYear">

                                 </tfoot>
                                    </table>
                            </div>
                                <div class="table-responsive mt-5">
                                    <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                        <thead>
                                        <tr>
                                             <th>الأصل /البند</th>
                                             <th>التكلفة</th>
                                             <th>العدد</th>
                                             <th>الاهلاك</th>
                                             <th>سنة الشراء</th>
                                             <th>الاجمالي</th>
                                        </tr>
                                        </thead>
                                 <tbody id="summery_intangible_assets">
                                 </tbody>
                                 <tfoot style="font-weight: bold;" id="totle_intangible_assets">

                                 </tfoot>
                                    </table>
                            </div>
                            <div class="table-responsive mt-5">
                                <caption>تغير الاهلاك</caption>

                                <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                    <thead>
                                    <tr>
                                         <th>الأصل /البند</th>
                                         <th>{{$currentYear}}</th>
                                         @foreach(years()['years'] as $year)
                                         <td>{{$year}} </td>
                                         @endforeach
                                    </tr>
                                    </thead>
                             <tbody>
                                <tr  id="intangible_assets_depreciation"></tr>
                             </tbody>
                             {{-- <tfoot style="font-weight: bold;" id="totle_summeryـequipment_buildings_currentYear">

                             </tfoot> --}}
                                </table>
                        </div>

                            <br>
                            <br>

                            <div class="d-flex justify-content-between">
                                <button type="button" value="السابق" name="previous_9" class="btn btn-warning" id="previous_9" >
                                    السابق
                                </button>
                                <button style="float: left" type="button" value="التالي" name="next_btn_6" class="btn btn-warning" id="next_btn_6" >
                                    التالي
                                    {{-- <span class="spinner-border spinner-border-sm" id="spinner_2" role="status" aria-hidden="true"></span> --}}
                                </button>
                            </div>
                            </div>

                        </section>

                        <h3> أصول أخرى</h3>
                        <section>
                            <h4 class="mb-4"><strong>أصول أخرى</strong></h4>
                            <form id="form_6" name="form_6" class="form-horizontal">

                            <div class="row">
                                @if($balances->where('balance_type', 'other_assets')->isNotEmpty())
                                            @foreach($balances->where('balance_type', 'other_assets') as $balance)
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                        <input type="text" name="item[]"  value="{{$balance->item}}" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text item_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                        <input type="text" name="cost[]"  value="{{$balance->cost}}" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text item_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3 price">
                                                        <label for="verticalnav-pancard-input"><strong>العدد</strong></label>
                                                        <input type="text" name="quantity[]" value="{{$balance->quantity}}" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text quantity_error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                        <input type="text" name="depreciation[]"  value="{{$balance->depreciation}}" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text _error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>
                                                        <select  class="form-control"  name="purchase_year[]">
                                                            @eif($balance->purchase_year != null)
                                                            <option value="{{$balance->purchase_year}}" selected> {{$balance->purchase_year}}</option>
                                                            @end
                                                            <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                            @foreach(years()['years'] as $year)
                                                            <option value="{{$year}}">{{$year}}</option>
                                                            @endforeach

                                                        </select>
                                                        <span class="text-danger error-text quantity_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                        <input type="text" name="item[]"   class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text item_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                        <input type="text" name="cost[]"   class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text item_error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3 price">
                                                        <label for="verticalnav-pancard-input"><strong>العدد</strong></label>
                                                        <input type="text" name="quantity[]"  onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text quantity_error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                        <input type="text" name="depreciation[]"  onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text _error"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">

                                                        <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>
                                                        <select  class="form-control"  name="purchase_year[]">

                                                            <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                            @foreach(years()['years'] as $year)
                                                            <option value="{{$year}}">{{$year}}</option>
                                                            @endforeach

                                                        </select>
                                                        <span class="text-danger error-text quantity_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div >
                                        <div class="inner-repeater6 mb-4" style="">

                                            <div data-repeater-item class="inner6 mb-3 row income6">

                                            </div>

                                            <div class="col-md-4 col-4 ">
                                                <input data-repeater-create id="add_income_item6" type="button"
                                                       class="add btn btn-outline-dark inner" value="اضافة " />
                                            </div>

                                </div>
                        </form>


                        <br>
                        <br>

                            <div class="d-flex justify-content-between" >

                                <button type="button" value="السابق" name="previous_10" class="btn btn-warning" id="previous_10" >
                                    السابق
                                </button>
                                <button type="button" style="float: left" value="التالي" name="save_btn_6" class="btn btn-warning" id="save_btn_6" >
                                    التالي
                                </button>
                             </div>


                        </section>
                        <h3> ملخص أصول أخرى</h3>
                        <section>
                            <h4 class="mb-4"><strong>ملخص أصول أخرى</strong></h4>

                            <div class="row">
                            <div class="accordion" id="accordionExaple" >
                                <div class="table-responsive mt-5">
                                    <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                        <thead>
                                        <tr>
                                             <th>الأصل /البند</th>
                                             <th>التكلفة</th>
                                             <th>العدد</th>
                                             <th>الاهلاك</th>
                                             <th>سنة الشراء</th>
                                             <th>الاجمالي</th>
                                        </tr>
                                        </thead>
                                 <tbody id="summery_other_assets_currentYear">
                                 </tbody>
                                 <tfoot style="font-weight: bold;" id="totle_other_assets_currentYear">

                                 </tfoot>
                                    </table>
                            </div>

                                <div class="table-responsive mt-5">
                                    <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                        <thead>
                                        <tr>
                                             <th>الأصل /البند</th>
                                             <th>التكلفة</th>
                                             <th>العدد</th>
                                             <th>الاهلاك</th>
                                             <th>سنة الشراء</th>
                                             <th>الاجمالي</th>
                                        </tr>
                                        </thead>
                                 <tbody id="summery_other_assets">
                                 </tbody>
                                 <tfoot style="font-weight: bold;" id="totle_other_assets">

                                 </tfoot>
                                    </table>
                            </div>
                            <div class="table-responsive mt-5">
                                <caption>تغير الاهلاك</caption>

                                <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                    <thead>
                                    <tr>
                                         <th>الأصل /البند</th>
                                         <th>{{$currentYear}}</th>
                                         @foreach(years()['years'] as $year)
                                         <td>{{$year}} </td>
                                         @endforeach
                                    </tr>
                                    </thead>
                             <tbody>
                                <tr  id="other_assets_depreciation"></tr>
                             </tbody>
                             {{-- <tfoot style="font-weight: bold;" id="totle_summeryـequipment_buildings_currentYear">

                             </tfoot> --}}
                                </table>
                        </div>

                            <br>
                            <br>

                            <div class="d-flex justify-content-between">
                                <button type="button" value="السابق" name="previous_11" class="btn btn-warning" id="previous_11" >
                                    السابق
                                </button>
                                <button style="float: left" type="button" value="التالي" name="next_btn_7" class="btn btn-warning" id="next_btn_7" >
                                    التالي
                                    {{-- <span class="spinner-border spinner-border-sm" id="spinner_2" role="status" aria-hidden="true"></span> --}}
                                </button>
                            </div>
                            </div>

                        </section>
                        <h3>  نسبة الاحتياطي</h3>
                        <section>
                            <h4 class="mb-4"><strong>نسبة الاحتياطي</strong></h4>
                            <form id="form_7" name="form_7" class="form-horizontal">
                                @if($balances->where('balance_type', 'reserve')->isNotEmpty())
                                @foreach($balances->where('balance_type', 'reserve') as $balance)
                                <div class="">
                                    <div class="mb-3">

                                        <label for="verticalnav-pancard-input"><strong>نسبة الاحتياطي</strong></label>

                                        <input type="text" name="cost"  value="{{$balance->cost}}" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                        <span class="text-danger error-text _error"></span>
                                    </div>
                                        </div >
                                        @endforeach
                                        @else
                                        <div class="">
                                            <div class="mb-3">

                                                <label for="verticalnav-pancard-input"><strong>نسبة الاحتياطي</strong></label>

                                                <input type="text" name="cost"   onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                <span class="text-danger error-text _error"></span>
                                            </div>
                                                </div >
                                        @endif

                        </form>


                        <br>
                        <br>

                            <div class="d-flex justify-content-between" >

                                <button type="button" value="السابق" name="previous_12" class="btn btn-warning" id="previous_12" >
                                    السابق
                                </button>
                                <button type="button" style="float: left" value="التالي" name="save_btn_7" class="btn btn-warning" id="save_btn_7" >
                                    التالي
                                </button>
                             </div>


                        </section>
                        <h3> ملخص ادارة الميزانية العمومية </h3>
                        <section>
                            <h4 class="mb-4"><strong>ادارة الميزانية العمومية</strong></h4>

                            <div class="row">
                            <div class="accordion" id="accordionExaple" >
                                <div class="table-responsive mt-5">
                                    <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                        <thead>
                                        <tr>
                                             <th>الأصل /البند</th>
                                             <th>اجمالي التكلفة</th>
                                        </tr>
                                        </thead>
                                 <tbody id="summery_allBalance_currentYear">
                                 </tbody>
                                 <tfoot style="font-weight: bold;" id="totle_allBalance_currentYear">

                                 </tfoot>
                                    </table>
                            </div>
                                <div class="table-responsive mt-5">
                                    <table class="table mb-0 border-warning GeneratedTable"  style="width: 100%">
                                        <thead>
                                        <tr>
                                             <th>الأصل /البند</th>
                                             <th>الاجمالي</th>
                                        </tr>
                                        </thead>
                                 <tbody id="summery_allBalance">
                                 </tbody>
                                 <tfoot style="font-weight: bold;" id="totle_allBalance">

                                 </tfoot>
                                    </table>
                            </div>

                            <br>
                            <br>

                            <div class="d-flex justify-content-between">
                                <button type="button" value="السابق" name="previous_13" class="btn btn-warning" id="previous_13" >
                                    السابق
                                </button>

                            </div>
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
                $(".income").append(`<div data-repeater-item class="inner mb-3 row">
                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]"  value="" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="cost[]"  value="" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>العدد</strong></label>

                                                            <input type="text" name="quantity[]" value="" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>


                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                            <input type="text" name="depreciation[]"  value="" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text _error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>

                                                            <select  class="form-control"  name="purchase_year[]">
                                                                <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                                @foreach(years()['years'] as $year)
                                                                <option value="{{$year}}">{{$year}}</option>
                                                                @endforeach

                                                            </select>                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <div class="mt-4">

                                                            <i class=" mdi mdi-delete font-size-20" style="cursor: pointer;color: #ee0e0e;" id="delete_income_item"></i>
                                                        </div>
                                                    </div>
                                                </div>`);
            }
            if (e.target.id == 'add_income_item2') {
                $(".income2").append(`<div data-repeater-item class="inner2 mb-3 row">
                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]"  value="" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="cost[]"  value="" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>العدد</strong></label>

                                                            <input type="text" name="quantity[]" value="" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>


                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                            <input type="text" name="depreciation[]"  value="" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text _error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>

                                                            <select  class="form-control"  name="purchase_year[]">
                                                                <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                                @foreach(years()['years'] as $year)
                                                                <option value="{{$year}}">{{$year}}</option>
                                                                @endforeach

                                                            </select>                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <div class="mt-4">

                                                            <i class=" mdi mdi-delete font-size-20" style="cursor: pointer;color: #ee0e0e;" id="delete_income_item"></i>
                                                        </div>
                                                    </div>
                                                </div>`);
            }
            if (e.target.id == 'add_income_item3') {
                $(".income3").append(`<div data-repeater-item class="inner3 mb-3 row">
                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]"  value="" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="cost[]"  value="" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>العدد</strong></label>

                                                            <input type="text" name="quantity[]" value="" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>


                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                            <input type="text" name="depreciation[]"  value="" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text _error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>

                                                            <select  class="form-control"  name="purchase_year[]">
                                                                <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                                @foreach(years()['years'] as $year)
                                                                <option value="{{$year}}">{{$year}}</option>
                                                                @endforeach

                                                            </select>                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <div class="mt-4">

                                                            <i class=" mdi mdi-delete font-size-20" style="cursor: pointer;color: #ee0e0e;" id="delete_income_item"></i>
                                                        </div>
                                                    </div>
                                                </div>`);
            }
            if (e.target.id == 'add_income_item4') {
                $(".income4").append(`<div data-repeater-item class="inner4 mb-3 row">
                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]"  value="" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="cost[]"  value="" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>العدد</strong></label>

                                                            <input type="text" name="quantity[]" value="" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>


                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                            <input type="text" name="depreciation[]"  value="" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text _error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>

                                                            <select  class="form-control"  name="purchase_year[]">
                                                                <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                                @foreach(years()['years'] as $year)
                                                                <option value="{{$year}}">{{$year}}</option>
                                                                @endforeach

                                                            </select>                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <div class="mt-4">

                                                            <i class=" mdi mdi-delete font-size-20" style="cursor: pointer;color: #ee0e0e;" id="delete_income_item"></i>
                                                        </div>
                                                    </div>
                                                </div>`);
            }
            if (e.target.id == 'add_income_item5') {
                $(".income5").append(`<div data-repeater-item class="inner5 mb-3 row">
                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]"  value="" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="cost[]"  value="" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>العدد</strong></label>

                                                            <input type="text" name="quantity[]" value="" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>


                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                            <input type="text" name="depreciation[]"  value="" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text _error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>

                                                            <select  class="form-control"  name="purchase_year[]">
                                                                <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                                @foreach(years()['years'] as $year)
                                                                <option value="{{$year}}">{{$year}}</option>
                                                                @endforeach

                                                            </select>                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <div class="mt-4">

                                                            <i class=" mdi mdi-delete font-size-20" style="cursor: pointer;color: #ee0e0e;" id="delete_income_item"></i>
                                                        </div>
                                                    </div>
                                                </div>`);
            }
            if (e.target.id == 'add_income_item6') {
                $(".income6").append(`<div data-repeater-item class="inner6 mb-3 row">
                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>الأصل/ البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="item[]"  value="" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>التكلفة</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>

                                                            <input type="text" name="cost[]"  value="" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text item_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>العدد</strong></label>

                                                            <input type="text" name="quantity[]" value="" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>


                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>نسبة الاهلاك</strong></label>

                                                            <input type="text" name="depreciation[]"  value="" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text _error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>سنة الشراء</strong></label>

                                                            <select  class="form-control"  name="purchase_year[]">
                                                                <option value="{{$currentYear}}">{{$currentYear}}</option>
                                                                @foreach(years()['years'] as $year)
                                                                <option value="{{$year}}">{{$year}}</option>
                                                                @endforeach

                                                            </select>                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <div class="mt-4">

                                                            <i class=" mdi mdi-delete font-size-20" style="cursor: pointer;color: #ee0e0e;" id="delete_income_item"></i>
                                                        </div>
                                                    </div>
                                                </div>`);
            }
            if (e.target.id == 'add_income_expenses_item') {
                $(".income_expenses").after(`<div data-repeater-item class="inner mb-3 row">
                                                        <div class="col-lg-3">
                                                        <div class="mb-3">

                                                            <label for="verticalnav-pancard-input"><strong>البند</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>
                                                            <select onchange="checkAlert(event)" id="executive"  class="form-control"  name="item[]">

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
                                                    <div class="col-lg-2">
                                                        <div class="mb-3 price">
                                                            <label for="verticalnav-pancard-input"><strong>القيمة</strong></label>
                                                            <input type="text" name="value[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">


                                                            <input type="text" name="quantity[]" onkeypress="return isNumber(event)" class="form-control" id="verticalnav-pancard-input">
                                                            <span class="text-danger error-text quantity_error"></span>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-">
                                                        <div class="">
                                                            <button class="text-danger rounded-circle"
                                                                type="button" id="delete_income_item">
                                                                <i class="mdi mdi-delete font-size-20"></i></button>
                                                        </div>
                                                    </div>
                                                </div>`);
            }
            // end clone element

            // start delete element
            if (e.target.id == 'delete_income_item') {


                e.target.parentElement.parentElement.parentElement.remove();
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

            jQuery('#next_btn_2').click(function (e) {

                $('#vertical-example-p-1').attr('style','display:none');
                        $('#vertical-example-p-2').removeAttr('style');
                        $('#vertical-example-t-1').parent().removeClass('current');
                        $('#vertical-example-t-2').parent().attr('class','current');
});
jQuery('#next_btn_3').click(function (e) {

$('#vertical-example-p-3').attr('style','display:none');
        $('#vertical-example-p-4').removeAttr('style');
        $('#vertical-example-t-3').parent().removeClass('current');
        $('#vertical-example-t-4').parent().attr('class','current');
});
jQuery('#next_btn_4').click(function (e) {

$('#vertical-example-p-5').attr('style','display:none');
        $('#vertical-example-p-6').removeAttr('style');
        $('#vertical-example-t-5').parent().removeClass('current');
        $('#vertical-example-t-6').parent().attr('class','current');
});
jQuery('#next_btn_5').click(function (e) {

$('#vertical-example-p-7').attr('style','display:none');
        $('#vertical-example-p-8').removeAttr('style');
        $('#vertical-example-t-7').parent().removeClass('current');
        $('#vertical-example-t-8').parent().attr('class','current');
});
jQuery('#next_btn_6').click(function (e) {

$('#vertical-example-p-9').attr('style','display:none');
        $('#vertical-example-p-10').removeAttr('style');
        $('#vertical-example-t-9').parent().removeClass('current');
        $('#vertical-example-t-10').parent().attr('class','current');
});
jQuery('#next_btn_7').click(function (e) {

$('#vertical-example-p-11').attr('style','display:none');
        $('#vertical-example-p-12').removeAttr('style');
        $('#vertical-example-t-11').parent().removeClass('current');
        $('#vertical-example-t-12').parent().attr('class','current');
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
jQuery('#previous_7').click(function (e) {

$('#vertical-example-p-6').removeAttr('style');
            $('#vertical-example-t-6').parent().attr('class','current');
            $('#vertical-example-p-7').attr('style' , 'display:none');
            $('#vertical-example-t-7').parent().removeClass('current');
});
jQuery('#previous_8').click(function (e) {

$('#vertical-example-p-7').removeAttr('style');
            $('#vertical-example-t-7').parent().attr('class','current');
            $('#vertical-example-p-8').attr('style' , 'display:none');
            $('#vertical-example-t-8').parent().removeClass('current');
});
jQuery('#previous_9').click(function (e) {

$('#vertical-example-p-8').removeAttr('style');
            $('#vertical-example-t-8').parent().attr('class','current');
            $('#vertical-example-p-9').attr('style' , 'display:none');
            $('#vertical-example-t-9').parent().removeClass('current');
});
jQuery('#previous_10').click(function (e) {

$('#vertical-example-p-9').removeAttr('style');
            $('#vertical-example-t-9').parent().attr('class','current');
            $('#vertical-example-p-10').attr('style' , 'display:none');
            $('#vertical-example-t-10').parent().removeClass('current');
});
jQuery('#previous_11').click(function (e) {

$('#vertical-example-p-10').removeAttr('style');
            $('#vertical-example-t-10').parent().attr('class','current');
            $('#vertical-example-p-11').attr('style' , 'display:none');
            $('#vertical-example-t-11').parent().removeClass('current');
});
jQuery('#previous_12').click(function (e) {

$('#vertical-example-p-11').removeAttr('style');
            $('#vertical-example-t-11').parent().attr('class','current');
            $('#vertical-example-p-12').attr('style' , 'display:none');
            $('#vertical-example-t-12').parent().removeClass('current');
});
jQuery('#previous_13').click(function (e) {

$('#vertical-example-p-12').removeAttr('style');
            $('#vertical-example-t-12').parent().attr('class','current');
            $('#vertical-example-p-13').attr('style' , 'display:none');
            $('#vertical-example-t-13').parent().removeClass('current');
});




            jQuery('#next_btn').click(function (e) {
                $('#vertical-example-p-2').attr('style','display:none');
                $('#vertical-example-p-3').removeAttr('style');
                $('#vertical-example-t-2').parent().removeClass('current');
                $('#vertical-example-t-3').parent().attr('class','current');

            });






            jQuery('#save_btn_1').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = $('#form_1').serialize();
                jQuery.ajax({
                    url: "{{ route('equipment_buildings.store') }}",
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
                        console.log(result.data);

                        let sumCost=0;
                        let sumTotleCost=0;
        $.each(result.data, function (key, item) {
            sumCost +=item.cost;
            sumTotleCost +=item.cost * item.quantity;
            $('#summery_equipment_buildings').append('\
<tr>\
    <td>'+item.item +'</td>\
    <td>'+item.cost +'</td>\
    <td>'+item.quantity +'</td>\
    <td>'+item.depreciation +'</td>\
    <td>'+item.purchase_year +'</td>\
    <td>'+formatter.format(item.cost * item.quantity) +'</td>\
</tr>\
');
        });
        $('#totle_summeryـequipment_buildings').append('\
<tr>\
    <td>الاجمالي</td>\
    <td>'+formatter.format(sumCost )+'</td>\
    <td></td>\
    <td></td>\
    <td></td>\
    <td>'+formatter.format(sumTotleCost) +'</td>\
</tr>\
');
let sumCostCurrent=0;
let sumTotleCostCurrent=0;
$.each(result.dataYearCurrent, function (key, item) {
    sumCostCurrent +=item.cost;
    sumTotleCostCurrent +=item.cost * item.quantity;
            $('#summery_equipment_buildings_currentYear').append('\
<tr>\
    <td>'+item.item +'</td>\
    <td>'+item.cost +'</td>\
    <td>'+item.quantity +'</td>\
    <td>'+item.depreciation +'</td>\
    <td>'+item.purchase_year +'</td>\
    <td>'+formatter.format(item.cost * item.quantity) +'</td>\
</tr>\
');
$('#totle_summeryـequipment_buildings_currentYear').append('\
<tr>\
    <td>الاجمالي</td>\
    <td>'+formatter.format(sumCostCurrent )+'</td>\
    <td></td>\
    <td></td>\
    <td></td>\
    <td>'+formatter.format(sumTotleCostCurrent) +'</td>\
</tr>\
');
$.each(result.depreciationData, function (key, item) {
    $('#summery_equipment_buildings_depreciation').after('\
    <tr id="summery_equipment_buildings_depreciations">\
        </tr>\
    ');
    $.each(item, function (key, i) {
        if(isNaN(i)){
            $('#summery_equipment_buildings_depreciations').append('<td>' +i+' </td>');

        }else{
$('#summery_equipment_buildings_depreciations').append('<td>' +formatter.format(i)+' </td>');
        }
});
        });
        });
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
                    url: "{{ route('transport.store') }}",
                    method: 'post',
                    data: formData,
                    dataType: 'json',
                    success: function (result) {
                        $('#vertical-example-p-2').attr('style','display:none');
                        $('#vertical-example-p-3').removeAttr('style');
                        $('#vertical-example-t-2').parent().removeClass('current');
                        $('#vertical-example-t-3').parent().attr('class','current');
                        console.log(result.data);
                        $('#summery_transport').empty();
                        $('#totle_transport').empty();
                        let sumCost=0;
                        let sumTotleCost=0;
        $.each(result.data, function (key, item) {
            sumCost +=item.cost;
            sumTotleCost +=item.cost * item.quantity;
            $('#summery_transport').append('\
<tr>\
    <td>'+item.item +'</td>\
    <td>'+item.cost +'</td>\
    <td>'+item.quantity +'</td>\
    <td>'+item.depreciation +'</td>\
    <td>'+item.purchase_year +'</td>\
    <td>'+formatter.format(item.cost * item.quantity) +'</td>\
</tr>\
');
        });
        $('#totle_transport').append('\
<tr>\
    <td>الاجمالي</td>\
    <td>'+formatter.format(sumCost )+'</td>\
    <td></td>\
    <td></td>\
    <td></td>\
    <td>'+formatter.format(sumTotleCost) +'</td>\
</tr>\
');
let sumCostCurrent=0;
let sumTotleCostCurrent=0;
$.each(result.dataYearCurrent, function (key, item) {
    sumCostCurrent +=item.cost;
    sumTotleCostCurrent +=item.cost * item.quantity;
            $('#summery_transport_currentYear').append('\
<tr>\
    <td>'+item.item +'</td>\
    <td>'+item.cost +'</td>\
    <td>'+item.quantity +'</td>\
    <td>'+item.depreciation +'</td>\
    <td>'+item.purchase_year +'</td>\
    <td>'+formatter.format(item.cost * item.quantity) +'</td>\
</tr>\
');
});

$('#totle_transport_currentYear').append('\
<tr>\
    <td>الاجمالي</td>\
    <td>'+formatter.format(sumCostCurrent )+'</td>\
    <td></td>\
    <td></td>\
    <td></td>\
    <td>'+formatter.format(sumTotleCostCurrent) +'</td>\
</tr>\
');
$.each(result.depreciationData, function (key, item) {
    $('#transport_depreciation').after('\
    <tr id="transport_depreciations">\
        </tr>\
    ');
    $.each(item, function (key, i) {
        if(isNaN(i)){
            $('#transport_depreciations').append('<td>' +i+' </td>');

        }else{
$('#transport_depreciations').append('<td>' +formatter.format(i)+' </td>');
        }
});
        });
 }
                });
            });

            jQuery('#save_btn_3').click(function (e) {

e.preventDefault();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var formData = $('#form_3').serialize();
jQuery.ajax({
    url: "{{ route('equipments.store') }}",
    method: 'post',
    data: formData,
    dataType: 'json',
    success: function (result) {
        $('#vertical-example-p-4').attr('style','display:none');
        $('#vertical-example-p-5').removeAttr('style');
        $('#vertical-example-t-4').parent().removeClass('current');
        $('#vertical-example-t-5').parent().attr('class','current');
        $('#summery_equipments').empty();
        $('#totle_equipments').empty();
        console.log(result.data);
        let sumCost=0;
        let sumTotleCost=0;
$.each(result.data, function (key, item) {
sumCost +=item.cost;
sumTotleCost +=item.cost * item.quantity;
$('#summery_equipments').append('\
<tr>\
<td>'+item.item +'</td>\
<td>'+item.cost +'</td>\
<td>'+item.quantity +'</td>\
<td>'+item.depreciation +'</td>\
<td>'+item.purchase_year +'</td>\
<td>'+formatter.format(item.cost * item.quantity) +'</td>\
</tr>\
');
});
$('#totle_equipments').append('\
<tr>\
<td>الاجمالي</td>\
<td>'+formatter.format(sumCost )+'</td>\
<td></td>\
<td></td>\
<td></td>\
<td>'+formatter.format(sumTotleCost) +'</td>\
</tr>\
');
let sumCostCurrent=0;
let sumTotleCostCurrent=0;
$.each(result.dataYearCurrent, function (key, item) {
    sumCostCurrent +=item.cost;
    sumTotleCostCurrent +=item.cost * item.quantity;
            $('#summery_equipments_currentYear').append('\
<tr>\
    <td>'+item.item +'</td>\
    <td>'+item.cost +'</td>\
    <td>'+item.quantity +'</td>\
    <td>'+item.depreciation +'</td>\
    <td>'+item.purchase_year +'</td>\
    <td>'+formatter.format(item.cost * item.quantity) +'</td>\
</tr>\
');
});

$('#totle_equipments_currentYear').append('\
<tr>\
    <td>الاجمالي</td>\
    <td>'+formatter.format(sumCostCurrent )+'</td>\
    <td></td>\
    <td></td>\
    <td></td>\
    <td>'+formatter.format(sumTotleCostCurrent) +'</td>\
</tr>\
');
$.each(result.depreciationData, function (key, item) {
    $('#equipments_depreciation').after('\
    <tr id="equipments_depreciations">\
        </tr>\
    ');
    $.each(item, function (key, i) {
        if(isNaN(i)){
            $('#equipments_depreciations').append('<td>' +i+' </td>');

        }else{
$('#equipments_depreciations').append('<td>' +formatter.format(i)+' </td>');
        }
});
        });


    }
});
});
jQuery('#save_btn_4').click(function (e) {

e.preventDefault();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var formData = $('#form_4').serialize();
jQuery.ajax({
    url: "{{ route('furniture.store') }}",
    method: 'post',
    data: formData,
    dataType: 'json',
    success: function (result) {
        $('#vertical-example-p-6').attr('style','display:none');
        $('#vertical-example-p-7').removeAttr('style');
        $('#vertical-example-t-6').parent().removeClass('current');
        $('#vertical-example-t-7').parent().attr('class','current');
        $('#summery_furniture').empty();
        $('#totle_furniture').empty();
        console.log(result.data);
        let sumCost=0;
        let sumTotleCost=0;
$.each(result.data, function (key, item) {
sumCost +=item.cost;
sumTotleCost +=item.cost * item.quantity;
$('#summery_furniture').append('\
<tr>\
<td>'+item.item +'</td>\
<td>'+item.cost +'</td>\
<td>'+item.quantity +'</td>\
<td>'+item.depreciation +'</td>\
<td>'+item.purchase_year +'</td>\
<td>'+formatter.format(item.cost * item.quantity) +'</td>\
</tr>\
');
});
$('#totle_furniture').append('\
<tr>\
<td>الاجمالي</td>\
<td>'+formatter.format(sumCost )+'</td>\
<td></td>\
<td></td>\
<td></td>\
<td>'+formatter.format(sumTotleCost) +'</td>\
</tr>\
');
let sumCostCurrent=0;
let sumTotleCostCurrent=0;
$.each(result.dataYearCurrent, function (key, item) {
    sumCostCurrent +=item.cost;
    sumTotleCostCurrent +=item.cost * item.quantity;
            $('#summery_furniture_currentYear').append('\
<tr>\
    <td>'+item.item +'</td>\
    <td>'+item.cost +'</td>\
    <td>'+item.quantity +'</td>\
    <td>'+item.depreciation +'</td>\
    <td>'+item.purchase_year +'</td>\
    <td>'+formatter.format(item.cost * item.quantity) +'</td>\
</tr>\
');
});

$('#totle_furniture_currentYear').append('\
<tr>\
    <td>الاجمالي</td>\
    <td>'+formatter.format(sumCostCurrent )+'</td>\
    <td></td>\
    <td></td>\
    <td></td>\
    <td>'+formatter.format(sumTotleCostCurrent) +'</td>\
</tr>\
');
$.each(result.depreciationData, function (key, item) {
    $('#furniture_depreciation').after('\
    <tr id="furniture_depreciations">\
        </tr>\
    ');
    $.each(item, function (key, i) {
        if(isNaN(i)){
            $('#furniture_depreciations').append('<td>' +i+' </td>');

        }else{
$('#furniture_depreciations').append('<td>' +formatter.format(i)+' </td>');
        }
});
        });

    }
});
});
jQuery('#save_btn_5').click(function (e) {

e.preventDefault();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var formData = $('#form_5').serialize();
jQuery.ajax({
    url: "{{ route('intangible_assets.store') }}",
    method: 'post',
    data: formData,
    dataType: 'json',
    success: function (result) {
        $('#vertical-example-p-8').attr('style','display:none');
        $('#vertical-example-p-9').removeAttr('style');
        $('#vertical-example-t-8').parent().removeClass('current');
        $('#vertical-example-t-9').parent().attr('class','current');
        $('#summery_intangible_assets').empty();
        $('#totle_intangible_assets').empty();
        console.log(result.data);
        let sumCost=0;
        let sumTotleCost=0;
$.each(result.data, function (key, item) {
sumCost +=item.cost;
sumTotleCost +=item.cost * item.quantity;
$('#summery_intangible_assets').append('\
<tr>\
<td>'+item.item +'</td>\
<td>'+item.cost +'</td>\
<td>'+item.quantity +'</td>\
<td>'+item.depreciation +'</td>\
<td>'+item.purchase_year +'</td>\
<td>'+formatter.format(item.cost * item.quantity) +'</td>\
</tr>\
');
});
$('#totle_intangible_assets').append('\
<tr>\
<td>الاجمالي</td>\
<td>'+formatter.format(sumCost )+'</td>\
<td></td>\
<td></td>\
<td></td>\
<td>'+formatter.format(sumTotleCost) +'</td>\
</tr>\
');
let sumCostCurrent=0;
let sumTotleCostCurrent=0;
$.each(result.dataYearCurrent, function (key, item) {
    sumCostCurrent +=item.cost;
    sumTotleCostCurrent +=item.cost * item.quantity;
            $('#summery_intangible_assets_currentYear').append('\
<tr>\
    <td>'+item.item +'</td>\
    <td>'+item.cost +'</td>\
    <td>'+item.quantity +'</td>\
    <td>'+item.depreciation +'</td>\
    <td>'+item.purchase_year +'</td>\
    <td>'+formatter.format(item.cost * item.quantity) +'</td>\
</tr>\
');
});

$('#totle_intangible_assets_currentYear').append('\
<tr>\
    <td>الاجمالي</td>\
    <td>'+formatter.format(sumCostCurrent )+'</td>\
    <td></td>\
    <td></td>\
    <td></td>\
    <td>'+formatter.format(sumTotleCostCurrent) +'</td>\
</tr>\
');
$.each(result.depreciationData, function (key, item) {
    $('#intangible_assets_depreciation').after('\
    <tr id="intangible_assets_depreciations">\
        </tr>\
    ');
    $.each(item, function (key, i) {
        if(isNaN(i)){
            $('#intangible_assets_depreciations').append('<td>' +i+' </td>');

        }else{
$('#intangible_assets_depreciations').append('<td>' +formatter.format(i)+' </td>');
        }
});
        });

    }
});
});
jQuery('#save_btn_6').click(function (e) {

e.preventDefault();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var formData = $('#form_6').serialize();
jQuery.ajax({
    url: "{{ route('other_assets.store') }}",
    method: 'post',
    data: formData,
    dataType: 'json',
    success: function (result) {
        $('#vertical-example-p-10').attr('style','display:none');
        $('#vertical-example-p-11').removeAttr('style');
        $('#vertical-example-t-10').parent().removeClass('current');
        $('#vertical-example-t-11').parent().attr('class','current');
        $('#summery_other_assets').empty();
        $('#totle_other_assets').empty();
        console.log(result.data);
        let sumCost=0;
        let sumTotleCost=0;
$.each(result.data, function (key, item) {
sumCost +=item.cost;
sumTotleCost +=item.cost * item.quantity;
$('#summery_other_assets').append('\
<tr>\
<td>'+item.item +'</td>\
<td>'+item.cost +'</td>\
<td>'+item.quantity +'</td>\
<td>'+item.depreciation +'</td>\
<td>'+item.purchase_year +'</td>\
<td>'+formatter.format(item.cost * item.quantity) +'</td>\
</tr>\
');
});
$('#totle_other_assets').append('\
<tr>\
<td>الاجمالي</td>\
<td>'+formatter.format(sumCost )+'</td>\
<td></td>\
<td></td>\
<td></td>\
<td>'+formatter.format(sumTotleCost) +'</td>\
</tr>\
');

let sumCostCurrent=0;
let sumTotleCostCurrent=0;
$.each(result.dataYearCurrent, function (key, item) {
    sumCostCurrent +=item.cost;
    sumTotleCostCurrent +=item.cost * item.quantity;
            $('#summery_other_assets_currentYear').append('\
<tr>\
    <td>'+item.item +'</td>\
    <td>'+item.cost +'</td>\
    <td>'+item.quantity +'</td>\
    <td>'+item.depreciation +'</td>\
    <td>'+item.purchase_year +'</td>\
    <td>'+formatter.format(item.cost * item.quantity) +'</td>\
</tr>\
');
});

$('#totle_other_assets_currentYear').append('\
<tr>\
    <td>الاجمالي</td>\
    <td>'+formatter.format(sumCostCurrent )+'</td>\
    <td></td>\
    <td></td>\
    <td></td>\
    <td>'+formatter.format(sumTotleCostCurrent) +'</td>\
</tr>\
');
$.each(result.depreciationData, function (key, item) {
    $('#other_assets_depreciation').after('\
    <tr id="other_assets_depreciations">\
        </tr>\
    ');
    $.each(item, function (key, i) {
        if(isNaN(i)){
            $('#other_assets_depreciations').append('<td>' +i+' </td>');

        }else{
$('#other_assets_depreciations').append('<td>' +formatter.format(i)+' </td>');
        }
});
        });
    }
});
});

jQuery('#save_btn_7').click(function (e) {

e.preventDefault();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var formData = $('#form_7').serialize();
jQuery.ajax({
    url: "{{ route('reserve.store') }}",
    method: 'post',
    data: formData,
    dataType: 'json',
    success: function (result) {
        $('#vertical-example-p-12').attr('style','display:none');
        $('#vertical-example-p-13').removeAttr('style');
        $('#vertical-example-t-12').parent().removeClass('current');
        $('#vertical-example-t-13').parent().attr('class','current');
        let sumCost=0;
        let sumTotleCost=0;
$.each(result.data, function (key, item) {
sumCost +=item.cost;
sumTotleCost +=item.cost * item.quantity;
$('#summery_allBalance').append('\
<tr>\
<td>'+item.item +'</td>\
<td>'+formatter.format(item.cost * item.quantity) +'</td>\
</tr>\
');
});
$('#totle_allBalance').append('\
<tr>\
<td>مجموع</td>\
<td>'+formatter.format(sumTotleCost) +'</td>\
</tr>\
<tr>\
<td>الاحتياطي</td>\
<td>'+formatter.format(sumTotleCost -(sumTotleCost /result.reserve)) +'</td>\
</tr>\
<tr>\
<td>الاجمالي</td>\
<td>'+formatter.format(sumTotleCost + (sumTotleCost -(sumTotleCost /result.reserve))) +'</td>\
</tr>\
');

let sumCostCurrent=0;
let sumTotleCostCurrent=0;
$.each(result.dataYearCurrent, function (key, item) {
    sumCostCurrent +=item.cost;
    sumTotleCostCurrent +=item.cost * item.quantity;
            $('#summery_allBalance_currentYear').append('\
<tr>\
    <td>'+item.item +'</td>\
    <td>'+formatter.format(item.cost * item.quantity) +'</td>\
</tr>\
');
});

$('#totle_allBalance_currentYear').append('\
<tr>\
<td>مجموع</td>\
<td>'+formatter.format(sumTotleCostCurrent) +'</td>\
</tr>\
<tr>\
<td>الاحتياطي</td>\
<td>'+formatter.format(sumTotleCostCurrent -(sumTotleCostCurrent /result.reserve)) +'</td>\
</tr>\
<tr>\
<td>الاجمالي</td>\
<td>'+formatter.format(sumTotleCostCurrent + (sumTotleCostCurrent -(sumTotleCostCurrent /result.reserve))) +'</td>\
</tr>\
');

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

        const formatter = new Intl.NumberFormat('en-US');
    </script>

@endsection
