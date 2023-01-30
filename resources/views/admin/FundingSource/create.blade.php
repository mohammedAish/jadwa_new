@extends('layouts.master')

@section('title')
    {{ 'هيكلة رأس المال ' }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('title')
            {{ 'دراسة جدوى' }}
        @endslot
        @slot('name')
            {{ 'هيكلة رأس المال ' }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="vertical-example" class="vertical-wizard">
                        <h3>الحد الأدنى للنقد</h3>
                        <section>
{{--                            <h4 class="mb-4"><strong>مصادر التمويل</strong></h4>--}}
                            <form id="form1" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div id="showCache">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3 @error('minimum_cash') is-invalid @enderror">
                                            <h4>
                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1584_944)">
                                                        <path d="M3.50312 14.1969C3.50312 14.3937 3.55988 14.5856 3.66825 14.7497L4.20388 15.5525C4.36794 15.7986 4.74044 15.9987 5.03638 15.9987H6.96356C7.2585 15.9987 7.63106 15.7987 7.79513 15.5525L8.32887 14.75C8.42069 14.6113 8.496 14.3634 8.496 14.1969L8.5 12.9719H3.5L3.50312 14.1969ZM6 0C2.81312 0.01 0.5 2.59281 0.5 5.47188C0.5 6.85875 1.01375 8.12313 1.86125 9.09062C2.37781 9.67937 3.18438 10.9103 3.49312 11.9484C3.49409 11.9563 3.49606 11.9646 3.49703 11.9729H8.50328C8.50425 11.9646 8.50622 11.9567 8.50719 11.9484C8.81578 10.9103 9.6225 9.67937 10.1391 9.09062C10.9875 8.15 11.5 6.8875 11.5 5.47188C11.5 2.4625 9.0375 0.000125 6 0ZM9.0125 8.12813C8.52312 8.68594 7.9175 9.575 7.47969 10.4997H4.52313C4.08531 9.575 3.47969 8.68594 2.99062 8.12844C2.35125 7.4 2 6.44063 2 5.47188C2 3.54063 3.50313 1.50781 5.97188 1.5C8.20625 1.5 10 3.29375 10 5.47188C10 6.44063 9.65 7.4 9.0125 8.12813ZM5.5 2.5C4.12188 2.5 3 3.62188 3 5C3 5.27637 3.22362 5.5 3.5 5.5C3.77638 5.5 4 5.275 4 5C4 4.17281 4.67281 3.5 5.5 3.5C5.77637 3.5 6 3.27663 6 3.00031C6 2.724 5.775 2.5 5.5 2.5Z" fill="#0A0A0A" fill-opacity="0.6"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1584_944">
                                                            <rect width="12" height="16" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                 الحد الأدنى للنقد السنوي للمشروع
                                            </h4>
                                           <div class="row " id="selectInputt">

                                               <div class="col-md-12 minimum_cash">
                                                 @if(isset($fundingSources[0]))
                                                       <input type="text" name="minimum_cash" value="{{$fundingSources[0]->minimum_cash}}" class="form-control validate" id="verticalnav-pancard-input">
                                                       <span class="text-danger error-text minimum_cash_error"></span>
                                                   @else
                                                       <input type="text" name="minimum_cash" class="form-control validate" id="verticalnav-pancard-input">
                                                       <span class="text-danger error-text minimum_cash_error"></span>

                                                   @endif
{{--                                                   <label for="verticalnav-pancard-input"><strong>الحد الأدنى للنقد</strong> <i class="fa fa-lightbulb-o" aria-hidden="true"></i> </label>--}}

                                         </div>
                                           </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3 @error('interest_rate') is-invalid @enderror">
                                            <h4>
                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1584_944)">
                                                        <path d="M3.50312 14.1969C3.50312 14.3937 3.55988 14.5856 3.66825 14.7497L4.20388 15.5525C4.36794 15.7986 4.74044 15.9987 5.03638 15.9987H6.96356C7.2585 15.9987 7.63106 15.7987 7.79513 15.5525L8.32887 14.75C8.42069 14.6113 8.496 14.3634 8.496 14.1969L8.5 12.9719H3.5L3.50312 14.1969ZM6 0C2.81312 0.01 0.5 2.59281 0.5 5.47188C0.5 6.85875 1.01375 8.12313 1.86125 9.09062C2.37781 9.67937 3.18438 10.9103 3.49312 11.9484C3.49409 11.9563 3.49606 11.9646 3.49703 11.9729H8.50328C8.50425 11.9646 8.50622 11.9567 8.50719 11.9484C8.81578 10.9103 9.6225 9.67937 10.1391 9.09062C10.9875 8.15 11.5 6.8875 11.5 5.47188C11.5 2.4625 9.0375 0.000125 6 0ZM9.0125 8.12813C8.52312 8.68594 7.9175 9.575 7.47969 10.4997H4.52313C4.08531 9.575 3.47969 8.68594 2.99062 8.12844C2.35125 7.4 2 6.44063 2 5.47188C2 3.54063 3.50313 1.50781 5.97188 1.5C8.20625 1.5 10 3.29375 10 5.47188C10 6.44063 9.65 7.4 9.0125 8.12813ZM5.5 2.5C4.12188 2.5 3 3.62188 3 5C3 5.27637 3.22362 5.5 3.5 5.5C3.77638 5.5 4 5.275 4 5C4 4.17281 4.67281 3.5 5.5 3.5C5.77637 3.5 6 3.27663 6 3.00031C6 2.724 5.775 2.5 5.5 2.5Z" fill="#0A0A0A" fill-opacity="0.6"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1584_944">
                                                            <rect width="12" height="16" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                نسبة الفائدة للقرض قصير الأجل
                                            </h4>
                                            <div class="row " id="selectInputt2">
                                            <div class="col-md-12 interest_rate" >
                                                @if(isset($fundingSources[0]))
                                                    <div class="input-group">
                                                    <input type="text" name="interest_rate" value="{{$fundingSources[0]->interest_rate}}" class="form-control validate" id="verticalnav-pancard-input">


                                                        <span
                                                            class="input-group-addon bootstrap-touchspin-prefix input-group-prepend"
                                                            id="formrow-vat-input"><span class="input-group-text"
                                                                                         style="background-color: #f4f4f480; color:black;font-weight: bold;">%</span></span>
                                                </div>
                                                    <span class="text-danger error-text interest_rate_error"></span>
                                                @else
                                                    <div class="input-group">
                                                    <input type="text" name="interest_rate" class="form-control validate" id="verticalnav-pancard-input">
                                                    <span
                                                        class="input-group-addon bootstrap-touchspin-prefix input-group-prepend"
                                                        id="formrow-vat-input"><span class="input-group-text"
                                                                                     style="background-color: #f4f4f480; color:black;font-weight: bold;">%</span></span>
                                                    </div>
                                                    <span class="text-danger error-text interest_rate_error"></span>
                                                @endif

                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">

                                            <h4>
                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1584_944)">
                                                        <path d="M3.50312 14.1969C3.50312 14.3937 3.55988 14.5856 3.66825 14.7497L4.20388 15.5525C4.36794 15.7986 4.74044 15.9987 5.03638 15.9987H6.96356C7.2585 15.9987 7.63106 15.7987 7.79513 15.5525L8.32887 14.75C8.42069 14.6113 8.496 14.3634 8.496 14.1969L8.5 12.9719H3.5L3.50312 14.1969ZM6 0C2.81312 0.01 0.5 2.59281 0.5 5.47188C0.5 6.85875 1.01375 8.12313 1.86125 9.09062C2.37781 9.67937 3.18438 10.9103 3.49312 11.9484C3.49409 11.9563 3.49606 11.9646 3.49703 11.9729H8.50328C8.50425 11.9646 8.50622 11.9567 8.50719 11.9484C8.81578 10.9103 9.6225 9.67937 10.1391 9.09062C10.9875 8.15 11.5 6.8875 11.5 5.47188C11.5 2.4625 9.0375 0.000125 6 0ZM9.0125 8.12813C8.52312 8.68594 7.9175 9.575 7.47969 10.4997H4.52313C4.08531 9.575 3.47969 8.68594 2.99062 8.12844C2.35125 7.4 2 6.44063 2 5.47188C2 3.54063 3.50313 1.50781 5.97188 1.5C8.20625 1.5 10 3.29375 10 5.47188C10 6.44063 9.65 7.4 9.0125 8.12813ZM5.5 2.5C4.12188 2.5 3 3.62188 3 5C3 5.27637 3.22362 5.5 3.5 5.5C3.77638 5.5 4 5.275 4 5C4 4.17281 4.67281 3.5 5.5 3.5C5.77637 3.5 6 3.27663 6 3.00031C6 2.724 5.775 2.5 5.5 2.5Z" fill="#0A0A0A" fill-opacity="0.6"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1584_944">
                                                            <rect width="12" height="16" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                  حد ادنى
                                            </h4>
{{--                                            <select name="message" class="form-control" id="verticalnav-pancard-input">--}}
{{--                                                <option selected disabled> -- إختر -- </option>--}}
{{--                                            </select>--}}
                                            <div class="row " id="selectInputt3">
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-warning mb-3">
                                                        @if(isset($fundingSources[0]))
                                                            <input class="form-check-input "  type="checkbox"  id="chkCache" {{$fundingSources[0]->minimum_cash?'':'checked'}} onclick="ShowHideDiv(this)" >
                                                            <label class="form-check-label black_text" for="formCheckcolor4">
                                                                لا يتطلب المشروع حد أدنى للنقد
                                                            </label>
                                                        @else
                                                            <input class="form-check-input" type="checkbox" id="chkCache" onclick="ShowHideDiv(this)" >
                                                            <label class="form-check-label black_text" for="formCheckcolor4">
                                                                لا يتطلب المشروع حد أدنى للنقد
                                                            </label>

                                                        @endif

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 " id="skipdev" style="float: left">
                                        {{-- <button name="save1" onclick="return form1()" type="button" class="btn btn-warning inner"
                                            id="save1">حفظ والتالي</button>  --}}
                                        <input type="submit" value="حفظ والتالي" name="storefundingsource"  class="btn btn-warning inner go storefsaccountreceivable"
                                               id="storefundingsource">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>هيكلة رأس المال</h3>
                        <section>
                            <h4 class="mb-4"><strong>هيكلة رأس المال</strong></h4>
                            <form id="form2"
                                  class="form-horizontal" enctype="multipart/form-data">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-check">
{{--                                        <thead class="">--}}
{{--                                        <tr style="background: rgba(244, 244, 244, 0.5);  ">--}}
{{--                                            <th class="align-middle"><svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                    <g clip-path="url(#clip0_1581_101)">--}}
{{--                                                        <path d="M3.50312 14.1969C3.50312 14.3937 3.55988 14.5856 3.66825 14.7497L4.20388 15.5525C4.36794 15.7986 4.74044 15.9987 5.03638 15.9987H6.96356C7.2585 15.9987 7.63106 15.7987 7.79513 15.5525L8.32887 14.75C8.42069 14.6113 8.496 14.3634 8.496 14.1969L8.5 12.9719H3.5L3.50312 14.1969ZM6 0C2.81312 0.01 0.5 2.59281 0.5 5.47188C0.5 6.85875 1.01375 8.12313 1.86125 9.09062C2.37781 9.67937 3.18438 10.9103 3.49312 11.9484C3.49409 11.9563 3.49606 11.9646 3.49703 11.9729H8.50328C8.50425 11.9646 8.50622 11.9567 8.50719 11.9484C8.81578 10.9103 9.6225 9.67937 10.1391 9.09062C10.9875 8.15 11.5 6.8875 11.5 5.47188C11.5 2.4625 9.0375 0.000125 6 0ZM9.0125 8.12813C8.52312 8.68594 7.9175 9.575 7.47969 10.4997H4.52313C4.08531 9.575 3.47969 8.68594 2.99062 8.12844C2.35125 7.4 2 6.44063 2 5.47188C2 3.54063 3.50313 1.50781 5.97188 1.5C8.20625 1.5 10 3.29375 10 5.47188C10 6.44063 9.65 7.4 9.0125 8.12813ZM5.5 2.5C4.12188 2.5 3 3.62188 3 5C3 5.27637 3.22362 5.5 3.5 5.5C3.77638 5.5 4 5.275 4 5C4 4.17281 4.67281 3.5 5.5 3.5C5.77637 3.5 6 3.27663 6 3.00031C6 2.724 5.775 2.5 5.5 2.5Z" fill="#0A0A0A" fill-opacity="0.6"/>--}}
{{--                                                    </g>--}}
{{--                                                    <defs>--}}
{{--                                                        <clipPath id="clip0_1581_101">--}}
{{--                                                            <rect width="12" height="16" fill="white"/>--}}
{{--                                                        </clipPath>--}}
{{--                                                    </defs>--}}
{{--                                                </svg>--}}
{{--                                                البند</th>--}}
{{--                                            <th class="align-middle">--}}
{{--                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                    <g clip-path="url(#clip0_1581_101)">--}}
{{--                                                        <path d="M3.50312 14.1969C3.50312 14.3937 3.55988 14.5856 3.66825 14.7497L4.20388 15.5525C4.36794 15.7986 4.74044 15.9987 5.03638 15.9987H6.96356C7.2585 15.9987 7.63106 15.7987 7.79513 15.5525L8.32887 14.75C8.42069 14.6113 8.496 14.3634 8.496 14.1969L8.5 12.9719H3.5L3.50312 14.1969ZM6 0C2.81312 0.01 0.5 2.59281 0.5 5.47188C0.5 6.85875 1.01375 8.12313 1.86125 9.09062C2.37781 9.67937 3.18438 10.9103 3.49312 11.9484C3.49409 11.9563 3.49606 11.9646 3.49703 11.9729H8.50328C8.50425 11.9646 8.50622 11.9567 8.50719 11.9484C8.81578 10.9103 9.6225 9.67937 10.1391 9.09062C10.9875 8.15 11.5 6.8875 11.5 5.47188C11.5 2.4625 9.0375 0.000125 6 0ZM9.0125 8.12813C8.52312 8.68594 7.9175 9.575 7.47969 10.4997H4.52313C4.08531 9.575 3.47969 8.68594 2.99062 8.12844C2.35125 7.4 2 6.44063 2 5.47188C2 3.54063 3.50313 1.50781 5.97188 1.5C8.20625 1.5 10 3.29375 10 5.47188C10 6.44063 9.65 7.4 9.0125 8.12813ZM5.5 2.5C4.12188 2.5 3 3.62188 3 5C3 5.27637 3.22362 5.5 3.5 5.5C3.77638 5.5 4 5.275 4 5C4 4.17281 4.67281 3.5 5.5 3.5C5.77637 3.5 6 3.27663 6 3.00031C6 2.724 5.775 2.5 5.5 2.5Z" fill="#0A0A0A" fill-opacity="0.6"/>--}}
{{--                                                    </g>--}}
{{--                                                    <defs>--}}
{{--                                                        <clipPath id="clip0_1581_101">--}}
{{--                                                            <rect width="12" height="16" fill="white"/>--}}
{{--                                                        </clipPath>--}}
{{--                                                    </defs>--}}
{{--                                                </svg>--}}
{{--                                                القيمة</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
                                            <tbody>
                                            <tr style=" border: white;">
                                                <td>التمويل الذاتي للمشروع</td>
                                                <td> <div class="col-6 self_financing">
                                                            <input type="text" name="self_financing" value="" class="form-control validate" id="self_financing">
                                                            <span class="text-danger error-text self_financing_error"></span>

                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr style=" border: white;">
                                                <td>التكلفة الإستثمارية التقديرية للمشروع</td>
                                                <td>
                                                    <div class="col-md-6" >

                                                <div class="input-group">
                                                    <input type="text" id="project_financing" name="project_financing" disabled value="{{$estimatedCostProject}}" class="form-control validate" >
                                                    <span class="text-danger error-text"></span>
                                                   </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr style=" border: white;">
                                                <td>نسبة التمويل الذاتي من تكلفة الإستثمار</td>
                                                <td> <div class="col-6 self_financing">
                                                 <div class="input-group">
                                                <input disabled type="text" id="self_financing_ratio" name="self_financing_ratio" class="form-control validate"  >
                                                 <span
                                                     class="input-group-addon bootstrap-touchspin-prefix input-group-prepend"
                                                     id="formrow-vat-input"><span class="input-group-text"
                                                   style="background-color: #f4f4f480; color:black;font-weight: bold;">%</span></span>
                                                </div>

                                               </div> <span class="text-danger error-text"></span>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr style=" border: white;">
                                                <td>مبلغ التمويل اللازم للمشروع</td>
                                                <td> <div class="col-6 self_financing">
                                                        <div class="input-group">
                                                            <input disabled type="text" name="value_arrest" class="form-control validate" value="" id="value_arrest">

                                                        </div>
                                                        <span class="text-danger error-text "></span>
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-between" >
                                        <button type="button" value="السابق" name="previous_1" class="btn btn-warning" id="previous_1" >
                                            السابق
                                        </button>
                                    <input type="submit" value="حفظ والتالي" name="storecapitalStructure"  class="btn btn-warning inner go storecapitalStructure"
                                           id="storecapitalStructure">
                                        {{-- <button name="save1" onclick="return form2()" type="button" class="btn btn-warning inner"
                                            id="save1">حفظ والتالي</button>  --}}

                                </div>
                            </form>
                        </section>
                        <h3>تفاصيل التمويل</h3>
                        <section>
                            <h4 class="mb-4"><strong>تفاصيل التمويل</strong></h4>
                            <form id="form3"
                                  class="form-horizontal" enctype="multipart/form-data">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-check">
                                    <thead class="">
                                    <tr style="background: rgba(244, 244, 244, 0.5);  ">
                                        <th class="align-middle"><svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1581_101)">
                                                    <path d="M3.50312 14.1969C3.50312 14.3937 3.55988 14.5856 3.66825 14.7497L4.20388 15.5525C4.36794 15.7986 4.74044 15.9987 5.03638 15.9987H6.96356C7.2585 15.9987 7.63106 15.7987 7.79513 15.5525L8.32887 14.75C8.42069 14.6113 8.496 14.3634 8.496 14.1969L8.5 12.9719H3.5L3.50312 14.1969ZM6 0C2.81312 0.01 0.5 2.59281 0.5 5.47188C0.5 6.85875 1.01375 8.12313 1.86125 9.09062C2.37781 9.67937 3.18438 10.9103 3.49312 11.9484C3.49409 11.9563 3.49606 11.9646 3.49703 11.9729H8.50328C8.50425 11.9646 8.50622 11.9567 8.50719 11.9484C8.81578 10.9103 9.6225 9.67937 10.1391 9.09062C10.9875 8.15 11.5 6.8875 11.5 5.47188C11.5 2.4625 9.0375 0.000125 6 0ZM9.0125 8.12813C8.52312 8.68594 7.9175 9.575 7.47969 10.4997H4.52313C4.08531 9.575 3.47969 8.68594 2.99062 8.12844C2.35125 7.4 2 6.44063 2 5.47188C2 3.54063 3.50313 1.50781 5.97188 1.5C8.20625 1.5 10 3.29375 10 5.47188C10 6.44063 9.65 7.4 9.0125 8.12813ZM5.5 2.5C4.12188 2.5 3 3.62188 3 5C3 5.27637 3.22362 5.5 3.5 5.5C3.77638 5.5 4 5.275 4 5C4 4.17281 4.67281 3.5 5.5 3.5C5.77637 3.5 6 3.27663 6 3.00031C6 2.724 5.775 2.5 5.5 2.5Z" fill="#0A0A0A" fill-opacity="0.6"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1581_101">
                                                        <rect width="12" height="16" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            تفاصيل</th>
                                        <th class="align-middle">
                                         </th>
                                    </tr>
                                    </thead>
                                        <tbody>
                                        <tr style=" border: white;">
                                            <td>نسبة الفائدة</td>
                                            <td> <div class="col-6 interest">
                                                    @if(isset($loanDetails[0]))
                                                        <div class="input-group">
                                                        <input type="text" name="interest" value="{{$loanDetails[0]->interest}}" class="form-control validate" id="verticalnav-pancard-input">
                                                        <span
                                                            class="input-group-addon bootstrap-touchspin-prefix input-group-prepend"
                                                            id="formrow-vat-input"><span class="input-group-text"
                                                                                         style="background-color: #f4f4f480; color:black;font-weight: bold;">%</span></span>
                                                        </div>
                                                        <span class="text-danger error-text interest_error"></span>
                                                       </div>

                                                    @else
                                                    <div class="input-group">
                                                        <input type="text" name="interest" class="form-control validate" value="{{old('interest')}}" id="verticalnav-pancard-input">
                                                        <span
                                                            class="input-group-addon bootstrap-touchspin-prefix input-group-prepend"
                                                            id="formrow-vat-input"><span class="input-group-text"
                                                                                         style="background-color: #f4f4f480; color:black;font-weight: bold;">%</span></span>

                                                    </div>
                                                    <span class="text-danger error-text interest_error"></span>
                                                    @endif

                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr style=" border: white;">
                                            <td>مصاريف ادارية</td>
                                            <td> <div class="col-6 self_financing">
                                                    @if(isset($loanDetails[0]))
                                                        <input type="text" name="administrative_expenses" value="{{$loanDetails[0]->administrative_expenses}}" class="form-control validate" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text administrative_expenses_error"></span>

                                                    @else
                                                        <input type="text" name="administrative_expenses" class="form-control validate" value="{{old('administrative_expenses')}}" id="verticalnav-pancard-input">
                                                        <span class="text-danger error-text administrative_expenses_error"></span>

                                                    @endif
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr style=" border: white;">
                                            <td>تاريخ بداية القرض</td>
                                            <td>
                                                <div class="col-md-6" >

                                                    <div class="input-group">
                                                        <div class="input-group">
                                                            @if(isset($loanDetails[0]))
                                                                <input type="date"
                                                                       class="form-control @error('start_date') is-invalid @enderror"
                                                                       id="start_date" name="start_date" value="{{ $loanDetails[0]->start_date }}"
                                                                       required>
                                                                <span class="text-danger error-text start_date_error"></span>
                                                            @else
                                                                <input type="date"
                                                                       class="form-control @error('start_date') is-invalid @enderror"
                                                                       id="start_date" onchange="mysummation()" name="start_date" value="{{ old('start_date') }}"
                                                                       required>
                                                                <span class="text-danger error-text start_date_error"></span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr style=" border: white;">
                                            <td>فترة السماح بالسنة</td>
                                            <td> <div class="col-6 self_financing">
                                                    <div class="input-group">
                                                        <input disabled type="text" id="period_of_the_year" name="period_of_the_year" class="form-control validate" value="5" >
                                                        <span
                                                            class="input-group-addon bootstrap-touchspin-prefix input-group-prepend"
                                                            id="formrow-vat-input"><span class="input-group-text"
                                                                                         style="background-color: #f4f4f480; color:black;font-weight: bold;">سنوات</span></span>

                                                    </div>  <span class="text-danger error-text "></span>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr style=" border: white;">
                                            <td>فترة سداد القرض</td>
                                            <td> <div class="col-6 self_financing">
                                                    <div class="input-group">
                                                        <input disabled type="text" name="Loan_repayment_period" id="Loan_repayment_period" class="form-control validate" value="5" >
                                                        <span
                                                            class="input-group-addon bootstrap-touchspin-prefix input-group-prepend"
                                                            id="formrow-vat-input"><span class="input-group-text"
                                                                                         style="background-color: #f4f4f480; color:black;font-weight: bold;">سنوات</span></span>
                                                        <span class="text-danger error-text "></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr style=" border: white;">
                                            <td>سنة انتهاء القرض</td>
                                            <td> <div class="col-6 self_financing">
                                                    <div class="input-group">
                                                        <input  type="text" id="end_loan" name="end_loan" class="form-control validate" readonly='true' >
                                                        <span
                                                            class="input-group-addon bootstrap-touchspin-prefix input-group-prepend"
                                                            id="formrow-vat-input"><span class="input-group-text"
                                                                                         style="background-color: #f4f4f480; color:black;font-weight: bold;">سنوات</span></span>

                                                    </div> <span class="text-danger error-text "></span>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-between" >
                                        <button type="button" value="السابق" name="previous_2" class="btn btn-warning" id="previous_2" >
                                            السابق
                                        </button>
                                    <input type="submit" value="حفظ والتالي" name="storeloanDetail"  class="btn btn-warning inner go storeloanDetail"
                                           id="storeloanDetail">


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

@endsection
@section('script')
    <script src="{{ asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datepicker/datepicker.min.js') }}"></script>
    <!-- form wizard init -->
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-steps/jquery-steps.min.js') }}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function(){
            $("#self_financing").on("input", function(){
                var self_financing =$(this).val();
            var project_financing = $("#project_financing").val();
           // var self_financing_ratio=parseInt($('#self_financing_ratio').val());
           //var self_financing_ratio = ((self_financing  / project_financing ) *100);
            $("#self_financing_ratio").val((self_financing  / project_financing ) * 100);
            $("#value_arrest").val(project_financing - self_financing );

            });
        });
        </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery(document).ready(function () {
            $('#vertical-example-t-0').parent().attr('class','current');
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
            $("#chkCache").click(function () {
                if ($(this).is(":checked")) {
                    $("#showCache").hide();
                    $("#storefundingsource")[0].submit();
                    ratio();
                    theArrest()

                } else {
                    $("#showCache").show();
                }
            });
        })

        $(document).ready(function() {

            $(document).on('change', 'select', function() {
                var opt = $(this).find('option:selected')[0];
                if($(this).val() == 'receivable'){
                    $('#selectInputt').append(`<div class="col-md-6"><input name="account_receivable" type="text" class="inner form-control"  value="" placeholder="قم بادخال قيمة" /></div>`);
                }
                if($(this).val() == 'payable'){
                    $('#selectInputt2').append(`<div class="col-md-6"><input name="account_payable" type="text" class="inner form-control"  value="" placeholder="قم بادخال قيمة" /></div>`);
                }
                if($(this).val() == 'inventory'){
                    $('#selectInputt3').append(`<div class="col-md-6"><input name="inventory" type="text" class="inner form-control"  value="" placeholder="قم بادخال قيمة" /></div>`);
                }

            });


        });

        function mysummation(Loan_repayment_period, period_of_the_year)
        {
            var start_date =  parseInt($('#start_date').val().slice(0,4))
            var Loan_repayment_period = parseInt($('#Loan_repayment_period').val())
            var period_of_the_year = parseInt($('#period_of_the_year').val())
            var end_loan = $('#end_loan') ;
            end_loan.val(start_date+Loan_repayment_period+period_of_the_year);
        }
        // function ratio(self_financing,project_financing){
        //     var self_financing = parseInt($('#self_financing').val())
        //     var project_financing = parseInt($('#project_financing').val())
        //     var self_financing_ratio = $('#self_financing_ratio') ;
        //     self_financing_ratio.val((self_financing/project_financing)*100);
        //     // console.log(self_financing_ratio);
        // }

        // function theArrest(){
        //     var self_financing = parseInt($('#self_financing').val())
        //     var project_financing = parseInt($('#project_financing').val())
        //     var value_arrest=parseInt($('#value_arrest').val());
        //     value_arrest.val(project_financing-self_financing);
        // }

        document.addEventListener('click', function(e) {
            var eventTarget = e.target;
            if (e.target.id == 'storefundingsource') {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('funding-source.store', $project->id) }}",
                    method: 'post',
                    data: new FormData(form1),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        // console.log(data.status)
                        if (data.status == 1) {
                            // toastr.success("تمت العملية بنجاح", "تم تخزين البيانات بنجاح");
                            $('#vertical-example-p-0').attr('style' , 'display:none');
                            $('#vertical-example-t-0').parent().removeClass('current');
                            $('#vertical-example-p-1').removeAttr('style');
                            $('#vertical-example-t-1').parent().attr('class','current');
                            ratio();
                            theArrest()
                        } else {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                    }
                });

            }
            if (e.target.id == 'storecapitalStructure') {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('capital-structure.store', $project->id) }}",
                    method: 'post',
                    data: new FormData(form2),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        // console.log(data.error)
                        if (data.status == 1) {
                            toastr.success("تمت العملية بنجاح", "تم تخزين البيانات بنجاح");
                            $('#vertical-example-p-1').attr('style' , 'display:none');
                            $('#vertical-example-t-1').parent().removeClass('current');
                            $('#vertical-example-p-2').removeAttr('style');
                            $('#vertical-example-t-2').parent().attr('class','current');
                            mysummation();

                        } else {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                    }
                });

            }
            if (e.target.id == 'storeloanDetail') {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('loan-detail.store', $project->id) }}",
                    method: 'post',
                    data: new FormData(form3),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(document).find('span.error-text').text('');
                    },
                    success: function(data) {
                        // console.log(data.error)
                        if (data.status == 1) {
                            toastr.success("تمت العملية بنجاح", "تم تخزين البيانات بنجاح");
                            $('#vertical-example-p-2').attr('style' , 'display:none');
                            $('#vertical-example-t-2').parent().removeClass('current');
                            $('#vertical-example-p-0').removeAttr('style');
                            $('#vertical-example-t-0').parent().attr('class','current');

                        } else {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                    }
                });

            }
        });

    </script>
    <script>
        $(function() {
            $('#form111').validate({
                rules: {
                    'account_receivable': {
                        required: true,
                    },
                    'account_payable': {
                        required: true,
                    },
                    'inventory': {
                        required: true,
                    },
                },
                messages: {
                    'account_receivable': {
                        required: "هذا الحقل مطلوب",
                    },
                    'account_payable': {
                        required: "هذا الحقل مطلوب",
                    },
                    'inventory': {
                        required: "هذا الحقل مطلوب",
                    }
                }
            });
            $('#form2').validate({
                rules: {
                    'self_financing': {
                        required: true,
                    },
                },
                messages: {
                    'self_financing': {
                        required: "هذا الحقل مطلوب",
                    }
                }
            });
        })
    </script>


@endsection
