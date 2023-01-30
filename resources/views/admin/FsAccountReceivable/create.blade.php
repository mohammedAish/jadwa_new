@extends('layouts.master')

@section('title')
    {{ 'دراسة رأس المال العامل' }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('title')
            {{ 'دراسة جدوى' }}
        @endslot
        @slot('name')
            {{ 'دراسة رأس المال العامل' }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="vertical-example" class="vertical-wizard">
                        <h3>تصدير الأصول والخصوم المتداولة</h3>
                        <section>
                            <h4 class="mb-4"><strong>تصدير الأصول والخصوم المتداولة</strong></h4>
                            <form id="form1" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3 @error('account_receivable') is-invalid @enderror">
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
                                                الفترة المتوقعة لتحصيل المبيعات ( أيام )
                                            </h4>
{{--                                            <input type="text" name="account_receivable" class="form-control" id="verticalnav-pancard-input">--}}
                                           <div class="row " id="selectInputt">

                                               <div class="col-md-6" id="divselect">
                                                   <select name="account_receivable" id="selectreceivable" onchange="checkAlert(event)" class=" form-control" id="receivableselect">
                                                       @if( isset($fsAccountReceivable[0]))
                                                           @foreach($fsAccountReceivable as $item)
                                                               <option id="receivable" selected value="{{$item->account_receivable}}" >{{$item->account_receivable}}</option>
                                                               <?php
                                                               $i=15;
                                                               for ($i=15;$i<=120;$i+=15){
                                                                   echo  '<option   value="'. $i .'">'. $i .'</option>';
                                                               }
                                                               ?>
                                                               <option id="receivable" value="receivable" value="أخرى">أخرى</option>
                                                           @endforeach

                                                       @else
                                                           <option selected disabled> -- إختر -- </option>
                                                           <?php
                                                           $i=15;
                                                           for ($i=15;$i<=120;$i+=15){
                                                               echo  '<option   value="'. $i .'">'. $i .'</option>';
                                                           }
                                                           ?>
                                                           <option id="receivable" value="receivable" value="أخرى">أخرى</option>
                                                       @endif
                                                   </select>
                                                   <span class="text-danger error-text account_receivable_error"></span>
                                               </div>
                                           </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3 @error('account_payable') is-invalid @enderror">
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
                                                الفترة المتوقعة لسداد الفواتير ( أيام )
                                            </h4>
                                            <div class="row " id="selectInputt2">
                                            <div class="col-md-6">
                                             <select name="account_payable" class="form-control" id="payableselect">

                                                @if(isset($fsAccountReceivable[0]))
                                                    @foreach($fsAccountReceivable as $item)
                                                        <option id="payable" selected value="{{$item->account_payable}}" >{{$item->account_payable}}</option>
                                                        <?php
                                                        $i=15;
                                                        for ($i=15;$i<=120;$i+=15){
                                                            echo  '<option   value="'. $i .'">'. $i .'</option>';
                                                        }
                                                        ?>
                                                        <option id="payable" value="payable" value="أخرى">أخرى</option>
                                                    @endforeach
                                                @else
                                                    <option selected disabled> -- إختر -- </option>
                                                    <?php
                                                    $i=15;
                                                    for ($i=15;$i<=120;$i+=15){
                                                        echo  '<option   value="'. $i .'">'. $i .'</option>';
                                                    }
                                                    ?>
                                                    <option id="payable" value="payable" value="أخرى">أخرى</option>
                                                @endif
                                            </select>
                                             <span class="text-danger error-text account_payable_error"></span>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3 @error('inventory') is-invalid @enderror">
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
                                                فترة دورات المخزون ( أيام )
                                            </h4>
{{--                                            <select name="message" class="form-control" id="verticalnav-pancard-input">--}}
{{--                                                <option selected disabled> -- إختر -- </option>--}}
{{--                                            </select>--}}
                                            <div class="row " id="selectInputt3">
                                                <div class="col-md-6">
                                            <select name="inventory" class="form-control" id="inventoryselect">
                                                @if(isset($fsAccountReceivable[0]))
                                                    @foreach($fsAccountReceivable as $item)
                                                        <option id="inventory" selected value="{{$item->inventory}}" >{{$item->inventory}}</option>
                                                        <?php
                                                        $i=15;
                                                        for ($i=15;$i<=120;$i+=15){
                                                            echo  '<option   value="'. $i .'">'. $i .'</option>';
                                                        }
                                                        ?>
                                                        <option id="inventory" value="inventory" value="أخرى">أخرى</option>
                                                    @endforeach
                                                @else
                                                    <option selected disabled> -- إختر -- </option>
                                                    <?php
                                                    $i=15;
                                                    for ($i=15;$i<=120;$i+=15){
                                                        echo  '<option   value="'. $i .'">'. $i .'</option>';
                                                    }
                                                    ?>
                                                    <option id="inventory" value="inventory" value="أخرى">أخرى</option>
                                                @endif
                                            </select>
                                            <span class="text-danger error-text inventory_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-4" style="float: left">
                                    <div class="col-md-3 " style="float: left">
                                        {{-- <button name="save1" onclick="return form1()" type="button" class="btn btn-warning inner"
                                            id="save1">حفظ والتالي</button>  --}}
                                        <input type="submit" value="حفظ والتالي" name="storefsaccountreceivable"  class="btn btn-warning inner go storefsaccountreceivable"
                                               id="storefsaccountreceivable">
                                    </div>
                                </div>
                            </form>
                        </section>
                        <h3>رأس المال العامل
                            (الدورة التشغيلية الأولى)</h3>
                        <section>
                            <h4 class="mb-4"><strong>رأس المال العامل</strong></h4>
                            <form id="form2"
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
                                                البند</th>
                                            <th class="align-middle">
                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1581_101)">
                                                        <path d="M3.50312 14.1969C3.50312 14.3937 3.55988 14.5856 3.66825 14.7497L4.20388 15.5525C4.36794 15.7986 4.74044 15.9987 5.03638 15.9987H6.96356C7.2585 15.9987 7.63106 15.7987 7.79513 15.5525L8.32887 14.75C8.42069 14.6113 8.496 14.3634 8.496 14.1969L8.5 12.9719H3.5L3.50312 14.1969ZM6 0C2.81312 0.01 0.5 2.59281 0.5 5.47188C0.5 6.85875 1.01375 8.12313 1.86125 9.09062C2.37781 9.67937 3.18438 10.9103 3.49312 11.9484C3.49409 11.9563 3.49606 11.9646 3.49703 11.9729H8.50328C8.50425 11.9646 8.50622 11.9567 8.50719 11.9484C8.81578 10.9103 9.6225 9.67937 10.1391 9.09062C10.9875 8.15 11.5 6.8875 11.5 5.47188C11.5 2.4625 9.0375 0.000125 6 0ZM9.0125 8.12813C8.52312 8.68594 7.9175 9.575 7.47969 10.4997H4.52313C4.08531 9.575 3.47969 8.68594 2.99062 8.12844C2.35125 7.4 2 6.44063 2 5.47188C2 3.54063 3.50313 1.50781 5.97188 1.5C8.20625 1.5 10 3.29375 10 5.47188C10 6.44063 9.65 7.4 9.0125 8.12813ZM5.5 2.5C4.12188 2.5 3 3.62188 3 5C3 5.27637 3.22362 5.5 3.5 5.5C3.77638 5.5 4 5.275 4 5C4 4.17281 4.67281 3.5 5.5 3.5C5.77637 3.5 6 3.27663 6 3.00031C6 2.724 5.775 2.5 5.5 2.5Z" fill="#0A0A0A" fill-opacity="0.6"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1581_101">
                                                            <rect width="12" height="16" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                عدد الأشهر</th>
                                        </tr>
                                        </thead>
                                            <tbody>
                                            <tr style=" border: white;">
                                                <td>تكاليف الإيرادات</td>
                                                <td>
                                                    <input type="hidden" name="cogs[type]" class="form-control" id="type"
                                                           value="{{ 'cogs' }}">
                                                    <div class="col-3 @error('cogs[period]') is-invalid @enderror">
                                                @if(isset($fsWorkingCapital[0]))

                                                    <input name="cogs[period]" type="text"  class="inner form-control validate"
                                                           style="background-color: rgba(244, 244, 244, 0.5);"
                                                           value="{{$fsWorkingCapital[0]->period}}" required  placeholder=""/>
                                                    <span class="text-danger error-text cogs[period]"></span>
                                                 @else
                                                    <input name="cogs[period]" type="text"  class="inner form-control validate"
                                                           style="background-color: rgba(244, 244, 244, 0.5);" required
                                                           value=""  placeholder=""/>
                                                    <span class="text-danger error-text" ></span>
                                                    @endif
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr style=" border: white;">
                                                <td>الإيجارات</td>
                                                <td> <div class="col-3 @error('rent[period]') is-invalid @enderror">
                                                        <input type="hidden" name="rent[type]" class="form-control" id="type"
                                                               value="{{ 'rent' }}">
                                                        @if(isset($fsWorkingCapital[1]))
                                                        @foreach($fsWorkingCapital->where('type','rent') as $workingCapital)
                                                            <input name="rent[period]" required type="text" class="inner form-control validate"
                                                                   style="background-color: rgba(244, 244, 244, 0.5);"
                                                                   value="{{$fsWorkingCapital[1]->period}}"  placeholder=""/>
                                                            <span class="text-danger error-text rent[period]_error"></span>
                                                        @endforeach
                                                        @else
                                                        <input name="rent[period]" required type="text" class="inner form-control validate"
                                                               style="background-color: rgba(244, 244, 244, 0.5);"
                                                               value=""  placeholder=""/>
                                                        <span class="text-danger error-text rent[period]_error"></span>

                                                        @endif
                                                       </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr style=" border: white;">
                                                <td>الرواتب</td>
                                                <td>
                                                    <div class="col-3">
                                                        <input type="hidden" name="salary[type]" class="form-control" id="type"
                                                               value="{{ 'salary' }}">

                                                        @if(isset($fsWorkingCapital[2]))
                                                            @foreach($fsWorkingCapital->where('type','salary') as $workingCapital)
                                                                <input name="salary[period]" required type="text" class="inner validate form-control"
                                                                       style="background-color: rgba(244, 244, 244, 0.5);"
                                                                       value="{{$fsWorkingCapital[2]->period}}"  placeholder=""/>
                                                            @endforeach
                                                        @else
                                                            <input name="salary[period]" required type="text" class="inner validate form-control"
                                                                   style="background-color: rgba(244, 244, 244, 0.5);"
                                                                   value=""  placeholder=""/>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr style=" border: white;">
                                                <td>تكاليف البيع</td>
                                                <td>
                                                    <div class="col-3">
                                                        <input type="hidden" name="marketing[type]" class="form-control" id="type"
                                                               value="{{ 'marketing' }}">
                                                        @if(isset($fsWorkingCapital[3]))
                                                            @foreach($fsWorkingCapital->where('type','marketing') as $workingCapital)
                                                                <input name="marketing[period]" required type="text" class="inner validate form-control"
                                                                       style="background-color: rgba(244, 244, 244, 0.5);"
                                                                       value="{{$fsWorkingCapital[3]->period}}"  placeholder=""/>
                                                            @endforeach
                                                        @else
                                                            <input name="marketing[period]" required type="text" class="inner validate form-control"
                                                                   style="background-color: rgba(244, 244, 244, 0.5);"
                                                                   value=""  placeholder=""/>

                                                        @endif
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr style=" border: white;">
                                                <td>المصاريف الإدارية</td>
                                                <td> <div class="col-3">
                                                        <input type="hidden" name="admin-expenses[type]" class="form-control" id="type"
                                                               value="{{ 'admin-expenses' }}">
                                                       @if(isset($fsWorkingCapital[4]))
                                                            @foreach($fsWorkingCapital->where('type','admin-expenses') as $workingCapital)

                                                                <input name="admin-expenses[period]" required type="text" class="inner form-control validate"
                                                                       style="background-color: rgba(244, 244, 244, 0.5);"
                                                                       value="{{$fsWorkingCapital[4]->period}}"  placeholder=""/>
                                                            @endforeach
                                                        @else
                                                            <input name="admin-expenses[period]" required type="text" class="inner form-control validate"
                                                                   style="background-color: rgba(244, 244, 244, 0.5);"
                                                                   value=""  placeholder=""/>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr style=" border: white;">
                                                <td>الإحتياطي
                                                 <span class="" style="background-color: #f4f4f480; color:black;font-weight: bold;">%</span>
                                                    </td>
                                                <td> <div class="col-3">
                                                        <input type="hidden" name="spare[type]" class="form-control" id="type"
                                                               value="{{'spare'}}">
                                                        @if(isset($fsWorkingCapital[5]))
                                                            @foreach($fsWorkingCapital->where('type','spare') as $workingCapital)

                                                                <input name="spare[period]" required type="text" class="inner form-control validate"
                                                                       style="background-color: rgba(244, 244, 244, 0.5);"
                                                                       value="{{$fsWorkingCapital[5]->period}}"  placeholder=""

                                                                />
                                                            @endforeach
                                                        @else
                                                            <input name="spare[period]" required type="text" class="inner form-control validate"
                                                                   style="background-color: rgba(244, 244, 244, 0.5);"
                                                                   value=""  placeholder=""/>
                                                        @endif
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
                                        {{-- <button name="save1" onclick="return form2()" type="button" class="btn btn-warning inner"
                                            id="save1">حفظ والتالي</button>  --}}
                                        <input type="submit" value="حفظ والتالي" name="storefsworkingcapital"  class="btn btn-warning inner go storefsworkingcapital"
                                               id="storefsworkingcapital">

                                </div>
                            </form>
                        </section>
                        <h3>ملخص</h3>
                        <section>
                            <h4 class="mb-4"><strong>ملخص</strong></h4>
                            <form id=""
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
                                                البند</th>

                                            <th class="align-middle">
                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1581_101)">
                                                        <path d="M3.50312 14.1969C3.50312 14.3937 3.55988 14.5856 3.66825 14.7497L4.20388 15.5525C4.36794 15.7986 4.74044 15.9987 5.03638 15.9987H6.96356C7.2585 15.9987 7.63106 15.7987 7.79513 15.5525L8.32887 14.75C8.42069 14.6113 8.496 14.3634 8.496 14.1969L8.5 12.9719H3.5L3.50312 14.1969ZM6 0C2.81312 0.01 0.5 2.59281 0.5 5.47188C0.5 6.85875 1.01375 8.12313 1.86125 9.09062C2.37781 9.67937 3.18438 10.9103 3.49312 11.9484C3.49409 11.9563 3.49606 11.9646 3.49703 11.9729H8.50328C8.50425 11.9646 8.50622 11.9567 8.50719 11.9484C8.81578 10.9103 9.6225 9.67937 10.1391 9.09062C10.9875 8.15 11.5 6.8875 11.5 5.47188C11.5 2.4625 9.0375 0.000125 6 0ZM9.0125 8.12813C8.52312 8.68594 7.9175 9.575 7.47969 10.4997H4.52313C4.08531 9.575 3.47969 8.68594 2.99062 8.12844C2.35125 7.4 2 6.44063 2 5.47188C2 3.54063 3.50313 1.50781 5.97188 1.5C8.20625 1.5 10 3.29375 10 5.47188C10 6.44063 9.65 7.4 9.0125 8.12813ZM5.5 2.5C4.12188 2.5 3 3.62188 3 5C3 5.27637 3.22362 5.5 3.5 5.5C3.77638 5.5 4 5.275 4 5C4 4.17281 4.67281 3.5 5.5 3.5C5.77637 3.5 6 3.27663 6 3.00031C6 2.724 5.775 2.5 5.5 2.5Z" fill="#0A0A0A" fill-opacity="0.6"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1581_101">
                                                            <rect width="12" height="16" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                تكاليف شهرية</th>
                                            <th class="align-middle">
                                                <svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_1581_101)">
                                                        <path d="M3.50312 14.1969C3.50312 14.3937 3.55988 14.5856 3.66825 14.7497L4.20388 15.5525C4.36794 15.7986 4.74044 15.9987 5.03638 15.9987H6.96356C7.2585 15.9987 7.63106 15.7987 7.79513 15.5525L8.32887 14.75C8.42069 14.6113 8.496 14.3634 8.496 14.1969L8.5 12.9719H3.5L3.50312 14.1969ZM6 0C2.81312 0.01 0.5 2.59281 0.5 5.47188C0.5 6.85875 1.01375 8.12313 1.86125 9.09062C2.37781 9.67937 3.18438 10.9103 3.49312 11.9484C3.49409 11.9563 3.49606 11.9646 3.49703 11.9729H8.50328C8.50425 11.9646 8.50622 11.9567 8.50719 11.9484C8.81578 10.9103 9.6225 9.67937 10.1391 9.09062C10.9875 8.15 11.5 6.8875 11.5 5.47188C11.5 2.4625 9.0375 0.000125 6 0ZM9.0125 8.12813C8.52312 8.68594 7.9175 9.575 7.47969 10.4997H4.52313C4.08531 9.575 3.47969 8.68594 2.99062 8.12844C2.35125 7.4 2 6.44063 2 5.47188C2 3.54063 3.50313 1.50781 5.97188 1.5C8.20625 1.5 10 3.29375 10 5.47188C10 6.44063 9.65 7.4 9.0125 8.12813ZM5.5 2.5C4.12188 2.5 3 3.62188 3 5C3 5.27637 3.22362 5.5 3.5 5.5C3.77638 5.5 4 5.275 4 5C4 4.17281 4.67281 3.5 5.5 3.5C5.77637 3.5 6 3.27663 6 3.00031C6 2.724 5.775 2.5 5.5 2.5Z" fill="#0A0A0A" fill-opacity="0.6"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1581_101">
                                                            <rect width="12" height="16" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                القيمة
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr style=" border: white;">
                                            <td>تكاليف الإيرادات </td>
                                            @foreach($fsWorkingCapital->where('type','cogs') as $workingCapital)
                                            <td>
                                                <div class="col-3 @error('cogs[period]') is-invalid @enderror">
                                                           {{$workingCapital->period}}
                                                </div>
                                            </td>
                                            <td> {{($workingCapital->period * incomeData($project->id)['totleIncomeMounth'])}}</td>
                                            @endforeach
                                        </tr>
                                        <tr style=" border: white;">
                                            <td>الإيجار</td>
                                            @foreach($fsWorkingCapital->where('type','rent') as $workingCapital)
                                            <td>   {{$workingCapital->period}}
                                            </td>
                                            <td> {{(( $workingCapital->period / 12) * projectFsRent($project->id)['totalRent'])}}</td>
                                            @endforeach
                                        </tr>
                                        <tr style=" border: white;">
                                            <td>الرواتب</td>
                                            @foreach($fsWorkingCapital->where('type','salary') as $workingCapital)
                                                <td>   {{$workingCapital->period}}
                                                </td>
                                                <td>{{number_format((($workingCapital->period)*employe($project->id)['totleEmployeMounth']),3)}}</td>
                                            @endforeach
                                        </tr>
                                        <tr style=" border: white;">
                                            <td>تكاليف البيع</td>
                                            @foreach($fsWorkingCapital->where('type','marketing') as $workingCapital)
                                            <td>
                                                {{$workingCapital->period}}
                                            </td>
                                            <td>{{number_format((($workingCapital->period/12)*marketingCost($project->id)['marketingTotle']),3)}}</td>
                                            @endforeach
                                        </tr>
                                        <tr style="">
                                            <td>المصاريف الإدارية</td>
                                            @foreach($fsWorkingCapital->where('type','admin-expenses') as $workingCapital)

                                            <td>
                                                {{$workingCapital->period}}
                                            </td>
                                            <td>{{number_format((($workingCapital->period/12)*administrativeExpenses($project->id)['administrativeExpensesTotle']),3)}}</td>
                                            @endforeach
                                        </tr>
                                        <tr style="">
                                            <td style="font-weight: 800;">المجموع</td>
                                           <td></td>
                                            <td style="font-weight: 800;">{{number_format($sumOfWorkingCapital,3)}}</td>
{{--                                            @if(isset($fsWorkingCapitalSpare[0]))--}}
{{--                                            <td style="font-weight: 800;">{{(($sumOfWorkingCapital)+(($fsWorkingCapitalSpare[0]/100)*200))}}--}}
{{--                                            </td>--}}
{{--                                            @endif--}}
                                        </tr>
                                        <tr style="">
                                            <td style="font-weight: 800;">الإحتياطي%</td>
                                            @foreach($fsWorkingCapital->where('type','spare') as $workingCapital)

                                            <td>{{$workingCapital->period}}
                                                </td>
                                                @endforeach

                                                <td style="font-weight: 800;">{{number_format($reserveOfWorkingCapital,3)}}
                                                </td>
                                        </tr>
                                        <tr style=" border: white;">
                                            <td style="font-weight: 800;">الإجمالي</td>

                                                <td>
                                                </td>
                                                    <td style="font-weight: 800;">{{number_format($totleOfWorkingCapital,3)}}
                                                    </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-between" >
                                        <button type="button" value="السابق" name="previous_2" class="btn btn-warning" id="previous_2" >
                                            السابق
                                        </button>
                                        {{-- <button name="save1" onclick="return form1()" type="button" class="btn btn-warning inner"
                                            id="save1">حفظ والتالي</button>  --}}

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

    <!-- form wizard init -->
    <script src="{{ asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-steps/jquery-steps.min.js') }}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>




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
        })
        // function checkAlert(evt) {
        //     if (evt.target.value === "receivable") {
        //         $('#divselect').toggleClass('hide');
        //         $('#right').toggleClass('col-md-3 col-md-12');
        //         // $('#sales_channels').hide();
        //         $('#selectInputt').append(`<div class="col-md-8"><input name="account_receivable" type="text" class="inner form-control"  value="" placeholder="قم بادخال قيمة" /></div>`);
        //     }else{
        //         $('#sales_channels').hide();
        //
        //     }
        // }

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



        document.addEventListener('click', function(e) {
            var eventTarget = e.target;
            if (e.target.id == 'storefsaccountreceivable') {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('fs-account-receivable.store', $project->id) }}",
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
                            $('#vertical-example-p-0').attr('style' , 'display:none');
                            $('#vertical-example-t-0').parent().removeClass('current');
                            $('#vertical-example-p-1').removeAttr('style');
                            $('#vertical-example-t-1').parent().attr('class','current');
                        } else {
                            $.each(data.error, function(prefix, val) {
                                $('span.' + prefix + '_error').text(val[0]);
                            });
                        }
                    }
                });

            }
            if (e.target.id == 'storefsworkingcapital') {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('fs-working-capital.store', $project->id) }}",
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
                            $('#vertical-example-p-1').attr('style' , 'display:none');
                            $('#vertical-example-t-1').parent().removeClass('current');
                            $('#vertical-example-p-2').removeAttr('style');
                            $('#vertical-example-t-2').parent().attr('class','current');
                        } else {
                            // $.each(data.error, function(prefix, val) {
                            //     // console.log(prefix);     console.log(val);
                            //     console.log($('span.' + prefix + '_error'));
                            // });
                        }
                    }
                });

            }
        });

    </script>
    <script>
        $(function() {
            $('#form1').validate({
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
                    'cogs[period]': {
                        required: true,
                    },
                    'rent[period]': {
                        required: true,
                    },
                    'salary[period]': {
                        required: true,
                    },
                    'marketing[period]': {
                        required: true,
                    },
                    'admin-expenses[period]': {
                        required: true,
                    },
                },
                messages: {
                    'cogs[period]': {
                        required: "هذا الحقل مطلوب",
                    },
                    'rent[period]': {
                        required: "هذا الحقل مطلوب",
                    },
                    'salary[period]': {
                        required: "هذا الحقل مطلوب",
                    },
                    'marketing[period]': {
                        required: "هذا الحقل مطلوب",
                    },
                    'admin-expenses[period]': {
                        required: "هذا الحقل مطلوب",
                    }
                }
            });
        })
    </script>


@endsection
