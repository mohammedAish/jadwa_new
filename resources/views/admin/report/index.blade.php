@extends('layouts.master')

@section('title') التقارير @endsection

@section('content')



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap table-check">

                                <tbody class="bg-p" id="expenses_incremental_data">



                                </tbody>
                        </table>
                        <caption>جدول : جدول تكاليف التسويق</caption>
                    </div>

                    {{-- <ul class="pagination pagination-rounded justify-content-center mb-2">
                        {{ $project->links() }}
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class=" table align-middle table-nowrap table-check table-bordered " id="summry_table">
                            <thead>
                            <tr style="background: rgba(244, 244, 244, 0.5); color:  #0A0A0A; font-weight: 700 ">
                                <th class="align-middle">الخدمة</th>
                                <th class="align-middle">عدد الوحدات  <span style="font-size: 12px; font-weight: 500;color: #000000;">(شهرياً)</span></th>
                                <th class="align-middle">قيمة الوحدة</th>
                                @if($project->revenu_entry == "m")
                                    <th class="align-middle"> المبيعات الشهرية</th>
                                @else
                                    <th class="align-middle"> المبيعات السنوية</th>
                                @endif
                                <th class="align-middle">مبيعات لنهاية العام</th>
                                <th class="align-middle">مبيعات العام</th>

                            </tr>
                            </thead>


                            <tbody id="incremental_data" style="color: #0A0A0A; font-weight: 400">
                              @foreach($firstYearEarnings['data'] as $firstYearEarning)
                                  <tr>

                                      <td> {{$firstYearEarning->item}}</td>
                                      <td> {{$firstYearEarning->quantity}} </td>
                                      <td> {{$firstYearEarning->value}} </td>
                                      @if($project->revenu_entry == "m")
                                      <td>  {{number_format(($firstYearEarning->value*$firstYearEarning->quantity),2)}} 'ر.س'</td>
                                      @else
                                      <td>  {{number_format((($firstYearEarning->value*$firstYearEarning->quantity) * 12),2)}} 'ر.س'</td>
                                      @endif

                                      <td> {{number_format((($firstYearEarning->value*$firstYearEarning->quantity) * $firstYearEarnings['remainingmonths']),2)}} 'ر.س'
                                      </td>
                                      <td> {{number_format((($firstYearEarning->value*$firstYearEarning->quantity) * 12),2)}} 'ر.س' </td>
                                  </tr>
                              @endforeach
                            </tbody>
                            <tfoot class="align-middle"  id="incremental_data_totle">

                            </tfoot>
                        </table>
                        <caption id="caption"><p id="current_year"> جدول : جدول الايرادات للعام الاول </p> </caption>
                    </div>

                    {{-- <ul class="pagination pagination-rounded justify-content-center mb-2">
                        {{ $project->links() }}
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
<!--revenue growth-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap table-check">
                        <thead>
                        <tr>


                        </tr>
                        </thead>
                            <tbody class="bg-p" id="">
                            <tr> <th>السنة</th>
                                @foreach($numberOfyears['years'] as $numberOfyear)
                                <td>{{$numberOfyear}}</td>
                                @endforeach
                            </tr>
                            <tr>  <th>الإيرادات</th>

                             @foreach($annualGrowthRateOfRevenuesDuringTheStudyPeriod['data'] as $item)
                                <td>{{$item->incremental}} '%'</td>
                               @endforeach
                            </tr>


                            </tbody>
                            <caption>جدول : جدول نسبة النمو السنوي للإيرادات خلال مدة الدراسة</caption>
                        </table>
                    </div>

                    {{-- <ul class="pagination pagination-rounded justify-content-center mb-2">
                        {{ $project->links() }}
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="GeneratedTable" id="revenue_summry_table">


                            <tbody class="bg-p" id="">
                            <tr> <th>السنة</th>
                                <td>{{$TotalAnnualRevenuesDuringTheStudyPeriod['yearCurrent']}}</td>
                                @foreach($TotalAnnualRevenuesDuringTheStudyPeriod['totleYear'] as $key=>$value)
                                    <td>{{$key}}</td>
                                @endforeach
                            </tr>
                            <tr>

                                <th>الإيرادات</th>
                                <th>{{$firstYearEarnings['totleIncomeToEndYear']}} 'ر.س'</th>
                                @foreach($TotalAnnualRevenuesDuringTheStudyPeriod['totleYear'] as $key=>$value)
                                    <td>{{ number_format($value,3)}} 'ر.س'</td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                        <caption>جدول : جدول إجمالي الإيرادات السنوية خلال مدة الدراسة</caption>
                    </div>

                    {{-- <ul class="pagination pagination-rounded justify-content-center mb-2">
                        {{ $project->links() }}
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table "  style="width: 100%">
                            <thead>
                            <tr>
                                <th>الوظيفة</th>
                                <th>العدد</th>
                                <th>الراتب</th>
                                <th>راتب شهري</th>
                                <th>لنهاية السنة</th>
                                <th>سنوي</th>
                            </tr>
                            </thead>
                            <tbody id="summeryـincrementals_employes">

                                @foreach($firstYearJob['employees'] as $firstYear)
                                    <tr>
                                   <td>{!!$firstYear->job!!}</td>
                                    <td>{{$firstYear->quantity}}</td>
                                     <td>{{$firstYear->annual_salary}}</td>
                                     <td>{{($firstYear->annual_salary*$firstYear->quantity)}} </td>
                                    <td>{{($firstYear->annual_salary*$firstYear->quantity*$firstYearJob['remainingmonths'])}} </td>
                                    <td>{{ 12 *($firstYear->annual_salary*$firstYear->quantity)}}</td>
                                    </tr>
                                @endforeach



                            </tbody>
                            <tfoot id="totle_summeryـincrementals_employes">
                            <tr>
                                <td>الاجمالي</td>
                                <td>{{$firstYearJob['sumOfQuantity']}}</td>
                                <td></td>
                                <td>{{$firstYearJob['totleEmployeMounth']}} </td>
                                <td>{{$firstYearJob['totleEmployeToEndYear']}} </td>
                                <td>{{$firstYearJob['totleEmployeYear']}}</td>
                            </tr>
                            </tfoot>
                        </table>
                        <caption>جدول وظائف السنة الاولي</caption>
                    </div>

                    {{-- <ul class="pagination pagination-rounded justify-content-center mb-2">
                        {{ $project->links() }}
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-5">


                        <table id="" class="table mb-0 " style="width: 100%">

                            <thead class="text-center">
                            <tr>
                                <th>الوظيفة</th>
                                @foreach(years($project->id)['years'] as $year)
                                    <th>{{$year}} </th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody id="table_quantity_employes" class="text-center">

                            @foreach($changeNumberOfEmployee['empDataQuantity'] as $key=>$value)
                            <tr>
                                @foreach($value as $key)
                                <td>{{$key}}</td>
                                @endforeach
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <caption>تغير عدد  الموظفين</caption>
                    </div>

                    {{-- <ul class="pagination pagination-rounded justify-content-center mb-2">
                        {{ $project->links() }}
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-5">


                        <table id="" class="table mb-0  " style="width: 100%">

                            <thead class="text-center">
                            <tr>
                                <th>الوظيفة</th>
                                @foreach(years($project->id)['years'] as $year)
                                    <th>{{$year}} </th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody id="table_quantity_employes" class="text-center">

                            @foreach($change_incremental_of_employee['empDataIncremental'] as $key=>$value)
                                <tr>
                                    @foreach($value as $key)
                                        <td>{{$key}}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <caption>تغير النسبة</caption>
                    </div>

                    {{-- <ul class="pagination pagination-rounded justify-content-center mb-2">
                        {{ $project->links() }}
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-5">
                        <table class="table mb-0  text-center"  style="width: 100%;font-size: 15px;">
                            <thead>
                            <tr>
                                <th>الوظيفة</th>
                                <th id="yearCurrent">{{$TotalAnnualRevenuesDuringTheStudyPeriod['yearCurrent']}}</th>
                                @foreach(years($project->id)['years'] as $year)
                                    <th>{{$year}} </th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody id="table_salary_employes" class="text-center">
                            @foreach($changeSalariesOfEmployee['empDataS'] as $changeSalary)
                                <tr>
                                    @foreach($changeSalary as $key)
                                        <td>{{$key}} </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot style="font-weight: bold;">
                                <tr>
                                    <td>الاجمالي</td>
                                    @foreach($sumSummaryOfChangeOfSalaries['sumSalaryy'] as $sumSalary)
                                        <td>{{ number_format($sumSalary,3)}} ر.س</td>
                                    @endforeach
                                </tr>
                            </tfoot>
                        </table>
                        <caption>تغير الرواتب</caption>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-5">
                        <table class="table mb-0  text-center"  style="width: 100%;font-size: 15px;">
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

                        @foreach($firstYearExpensesIncremental['expensesIncome'] as $expensesIncremental)
                            <tr>
                                <td>{{$expensesIncremental->item}}</td>
                                @if($expensesIncremental->expensis_type ==  "0")
                                    <td>{{$expensesIncremental->quantity}}</td>
                                @elseif($expensesIncremental->expensis_type ==  "1")
                                    <td>{{$expensesIncremental->quantity}}</td>
                                @elseif($expensesIncremental->expensis_type ==  "2")
                                    <td></td>
                                @endif
                                @if($expensesIncremental->expensis_type ==  "0")
                                    <td>{{$expensesIncremental->value}}</td>
                                @elseif($expensesIncremental->expensis_type ==  "1")
                                    <td>{{($expensesIncremental->value/100 ) * ($expensesIncremental->fs_income->value)}}</td>
                                @elseif($expensesIncremental->expensis_type ==  "2")
                                    <td>{{($expensesIncremental->value/100 ) * ($firstYearExpensesIncremental['totleIncomeMounthFS'])}}</td>
                                @endif
                                @if($project->revenu_entry == "m")
                                    @if($expensesIncremental->expensis_type ==  "0")
                                        <td>{{($expensesIncremental->value*$expensesIncremental->quantity)}}</td>
                                    @elseif($expensesIncremental->expensis_type ==  "1")
                                        <td>{{($expensesIncremental->value/100 ) * ($expensesIncremental->fs_income->value)*($expensesIncremental->quantity)}}</td>
                                    @elseif($expensesIncremental->expensis_type ==  "2")
                                        <td>{{($expensesIncremental->value/100 ) * ($firstYearExpensesIncremental['totleIncomeMounthFS'])}}</td>
                                    @endif
                                @else
                                    <td>{{($expensesIncremental->value*$expensesIncremental->quantity)*12}}</td>
                                @endif
                                @if($expensesIncremental->expensis_type ==  "0")
                                    <td>{{($expensesIncremental->value)*($expensesIncremental->quantity)*($firstYearExpensesIncremental['remainingmonths'])}}</td>
                                @elseif($expensesIncremental->expensis_type ==  "1")
                                    <td>{{($expensesIncremental->value/100 ) * ($expensesIncremental->fs_income->value)*($expensesIncremental->quantity) *($firstYearExpensesIncremental['remainingmonths'])}}</td>
                                @elseif($expensesIncremental->expensis_type ==  "2")
                                    <td>{{($expensesIncremental->value/100 ) * ($firstYearExpensesIncremental['totleIncomeToEndYearFS'])}}</td>
                                @endif

                                @if($expensesIncremental->expensis_type ==  "0")
                                    <td>{{($expensesIncremental->value*$expensesIncremental->quantity)*12}}</td>
                                @elseif($expensesIncremental->expensis_type ==  "1")
                                    <td>{{($expensesIncremental->value/100 ) * ($expensesIncremental->fs_income->value)*($expensesIncremental->quantity) *(12)}}</td>
                                @elseif($expensesIncremental->expensis_type ==  "2")
                                    <td>{{($expensesIncremental->value/100 ) * ($firstYearExpensesIncremental['totleIncomeYearFS'])}}</td>
                                @endif


                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot id="expenses_data_totle">
                        <tr>
                            <th>الاجمالي</th>
                            <th></th><th></th>
                            <th>{{$totalFirstYearExpensesIncremental['totleIncomeMounth']}}</th>
                            <th>{{$totalFirstYearExpensesIncremental['totleIncomeToEndYear']}}</th>
                            <th>{{$totalFirstYearExpensesIncremental['totleIncomeYear']}}</th>
                        </tr>
                        </tfoot>

                    </table>
                        <caption>جدول تكاليف الايرادات للسنة الاولي </caption>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-5">

                        <table class="table mb-0  text-center"  style="width: 100%;font-size: 15px;" id="incremental_summry_table">
                            <thead>
                            <tr>
                                <th>السنة</th>
                                <th>نسبة النمو  السنوية</th>
                            </tr>
                            </thead>
                            <tbody id="view_exp_incremental_data">
                            @foreach($growthOfExpensesIncremental['dataOfGrowthExpenses'] as $growthOfExpenses)
                            <tr>
                                <td style="background: rgba(244, 244, 244, 0.5);">{{$growthOfExpenses->year}}</td>
                                <td>{{$growthOfExpenses->incremental}} "%</td>
                            </tr>
                            @endforeach

                            </tbody>

                            <tr>
                                <td>معدل النمو السنوي</td>
                                <td id="view_exp_incremental_data_avareg_persent">{{$growthOfExpensesIncremental['IncomeAvargePersent']}} '%'</td>
                            </tr>
                            </tfoot>
                        </table>
                        <caption>جدول  نمو تكاليف الايرادات </caption>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-5">
                        <table class="table mb-0  text-center"  style="width: 100%;font-size: 15px;" id="revenue_summry_table">
                            <thead>

                            <tr id="head_exp_data">
                                <th>السنة</th>
{{--                                <th>{{$TotalExpensesIncremental['yearCurrent']}}</th>--}}
                                @foreach($TotalExpensesIncremental['totleYear'] as $key=>$value)

                                <th id="total_exp_revenue_current_head">{{$key}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody >

                            <tr id="total_exp_revenue_data">
                                <td>اجمالي التكاليف</td>
{{--                                <td>{{$TotalExpensesIncremental['totleIncomeToEndYear']}}</td>--}}
                                @foreach($TotalExpensesIncremental['totleYear'] as $totalExpenses)

                                <td id="total_exp_revenue_current">{{ number_format($totalExpenses,3)}}</td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                        <caption>جدول اجمالي تكاليف الايرادات لمدة الدراسة </caption>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-5">
                        @if($firstYearAdministrativeExpenses['data']->type=="ratio")
                        <table class="table mb-0  text-center"  style="width: 100%;font-size: 15px;">
                            <thead>
                            <tr>
                                <th>البند</th>
                                <th>القيمة</th>
                                <th>الايرادات</th>
                                <th>الاجمالي</th>
                            </tr>
                            </thead>
                            <tbody id="view_incremental_data">
                            <th id="title_expenses">المصاريف الادارية</th>
                            <th id="th_expenses1">{{$firstYearAdministrativeExpenses['data']->value}}</th>
                            <th id="th_expenses2">{{incomeData($project->id)['totleIncomeToEndYear']}}</th>
                            <th id="total_expenses">{{number_format(($firstYearAdministrativeExpenses['income']),3)}} </th>
                            </tbody>
                            <tfoot id="adexpenses_data_totle">

                            </tfoot>

                        </table>

                        @elseif($firstYearAdministrativeExpenses['data']->type=="amount")
                            <table class="table mb-0  text-center"  style="width: 100%;font-size: 15px;">
                                <thead>
                                <tr>
                                    <th>البند</th>
                                    <th>القيمة</th>
                                    <th>الايرادات</th>

                                </tr>
                                </thead>
                                <tbody id="view_incremental_data">
                                <th id="title_expenses">المصاريف الادارية</th>
                                <th id="th_expenses1">{{$firstYearAdministrativeExpenses['data']->value}}</th>
                                <th id="th_expenses2">{{number_format($firstYearAdministrativeExpenses['income'],3)}}</th>
                                </tbody>
                                <tfoot id="adexpenses_data_totle">

                                </tfoot>

                            </table>
                        @elseif($firstYearAdministrativeExpenses['data']->type=="custom")
                            <table class="table mb-0  text-center"  style="width: 100%;font-size: 15px;">
                                <thead>
                                <tr>
                                    <th>البند</th>
                                    <th>القيمة</th>

                                </tr>
                                </thead>
                                <tbody id="view_incremental_data">
                                @foreach($firstYearAdministrativeExpenses['item'] as $item)
                                 <tr>
                                <th id="title_expenses">{{$item->expensis_type}}</th>
                                <th id="th_expenses1">{{$item->value}}</th>

                                 </tr>
                                @endforeach
                                 </tbody>
                                <tfoot id="adexpenses_data_totle">
                                <th>الاجمالي</th>
                                <th id="th_expenses2">{{$firstYearAdministrativeExpenses['totalOfExpenses']}}</th>
                                </tfoot>

                            </table>
                        @endif
                        <caption>جدول المصاريف الإدارية للسنة الاولي </caption>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-5">

                        <table class="table mb-0  text-center"  style="width: 100%;font-size: 15px;" id="incremental_summry_table">
                            <thead>
                            <tr>
                                <th>السنة</th>
                                <th>نسبة النمو  السنوية</th>
                            </tr>
                            </thead>
                            <tbody id="view_exp_incremental_data">
                            @foreach($growthOfAdministrativeExpenses['data'] as $growth)
                                <tr>
                                    <td style="background: rgba(244, 244, 244, 0.5);">{{$growth->year}}</td>
                                    <td>{{$growth->incremental}} "%</td>
                                </tr>
                            @endforeach

                            </tbody>

                            <tr>
                                <td>معدل النمو السنوي</td>
                                <td id="view_exp_incremental_data_avareg_persent">{{$growthOfAdministrativeExpenses['IncomeAvargePersent']}} '%'</td>
                            </tr>
                            </tfoot>
                        </table>
                        <caption>جدول  نمو المصاريف الإدارية </caption>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-5">
                        <table class="table mb-0  text-center"  style="width: 100%;font-size: 15px;" id="">
                            <thead>

                            <tr id="head_exp_data">
                                <th>السنة</th>
                                <td>{{$ToltalOfAdministraitiveExpenses['year']}}</td>
                                @foreach(numberOfyears($project->id)['years'] as $year)
                                <td>{{$year}}</td>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody >

                            <tr id="total_exp_revenue_data">
                                <th id="title_expenses">مصاريف الإدارية</th>\
                                <th id="th_expenses_a">{{number_format($ToltalOfAdministraitiveExpenses['current_value'],3)}}</th>
                                <th id="th_expenses_b">{{number_format($ToltalOfAdministraitiveExpenses['prev'],3)}}</th>
                                <th id="th_expenses_c">{{number_format($ToltalOfAdministraitiveExpenses['nxt1'],3)}}</th>
                                <th id="th_expenses_d">{{number_format($ToltalOfAdministraitiveExpenses['nxt2'],3)}}</th>
                                <th id="th_expenses_e">{{number_format($ToltalOfAdministraitiveExpenses['nxt3'],3)}}</th>
                                <th id="th_expenses_f">{{number_format($ToltalOfAdministraitiveExpenses['nxt4'],3)}}</th>
                            </tr>
                            <tr>
                                <th id="title_expenses">الإيرادات</th>\
                                <th id="th_expenses1">{{incomeData($project->id)['totleIncomeToEndYear']}}</th>
                                @foreach(incomeData($project->id)['totleYear'] as $totleYears)
                                <th id="th_expenses1">{{number_format($totleYears,3)}}</th>
                                @endforeach
                            </tr>
                            <tr id="total_exp_revenue_data">
                                <th id="title_expenses">نسبة مصاريف إدارية<br> من الإيرادات</th>
                                <th id="th_expenses_a">{{number_format($ToltalOfAdministraitiveExpenses['current'],3)}} %</th>
                                <th id="th_expenses_b">{{number_format($ToltalOfAdministraitiveExpenses['pre'],3)}} %</th>
                                <th id="th_expenses_c">{{number_format($ToltalOfAdministraitiveExpenses['next1'],3)}} %</th>
                                <th id="th_expenses_d">{{number_format($ToltalOfAdministraitiveExpenses['next2'],3)}} %</th>
                                <th id="th_expenses_e">{{number_format($ToltalOfAdministraitiveExpenses['next3'],3)}} %</th>
                                <th id="th_expenses_f">{{number_format($ToltalOfAdministraitiveExpenses['next4'],3)}} %</th>
                            </tr>
                            </tbody>
                        </table>
                        <caption>جدول اجمالي المصاريف الإدارية لمدة الدراسة </caption>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-5">

                        @if($firstYearRent['data']->type=="amount")
                            <table class="table mb-0  text-center"  style="width: 100%;font-size: 15px;">
                                <thead>
                                <tr>
                                    <th>البند</th>
                                    <th>القيمة</th>


                                </tr>
                                </thead>
                                <tbody id="view_incremental_data">
                                <th id="th_expenses1">{{$firstYearRent['data']->value}}</th>
                                <th id="th_expenses2">{{$firstYearRent['data']->growth_rate_rent}}</th>
                                </tbody>
                                <tfoot id="adexpenses_data_totle">

                                </tfoot>

                            </table>
                        @elseif($firstYearRent['data']->type=="custom")
                            <table class="table mb-0  text-center"  style="width: 100%;font-size: 15px;">
                                <thead>
                                <tr>
                                    <th>البند</th>
                                    <th>القيمة</th>
                                    <th>نسبة النمو</th>\

                                </tr>
                                </thead>
                                <tbody id="view_incremental_data">
                                @foreach($firstYearRent['item'] as $item)
                                    <tr>
                                        <th >{{$item->title}}</th>
                                        <th >{{$item->value}}</th>
                                        <th >{{$item->growth_rent}}</th>

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot id="adexpenses_data_totle">
                                <th>الاجمالي</th>
                                <th id="th_expenses2">{{$firstYearRent['total']}}</th>
                                </tfoot>

                            </table>
                        @endif
                        <caption>جدول الإيجارات للسنة الاولي </caption>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-5">
                        @if($TotalOfRent['data']->type == "amount"){
                        <table class="table mb-0  text-center"  style="width: 100%;font-size: 15px;" id="">
                            <thead>

                            <tr id="head_exp_data">
                                <th>السنة</th>
                                <td>{{$TotalOfRent['year']}}</td>
                                @foreach(numberOfyears($project->id)['years'] as $year)
                                    <td>{{$year}}</td>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody >

                            <tr id="total_exp_revenue_data">
                                <th id="title_expenses">قيمة الايجارات</th>\
                                <th id="th_expenses_a">{{number_format($TotalOfRent['current_value'],3)}}</th>
                                <th id="th_expenses_b">{{number_format($TotalOfRent['prev'],3)}}</th>
                                <th id="th_expenses_c">{{number_format($TotalOfRent['nxt1'],3)}}</th>
                                <th id="th_expenses_d">{{number_format($TotalOfRent['nxt2'],3)}}</th>
                                <th id="th_expenses_e">{{number_format($TotalOfRent['nxt3'],3)}}</th>
                                <th id="th_expenses_f">{{number_format($TotalOfRent['nxt4'],3)}}</th>
                            </tr>
                            <tr>
                                <th id="title_expenses">الإيرادات</th>\
                                <th id="th_expenses1">{{incomeData($project->id)['totleIncomeToEndYear']}}</th>
                                @foreach(incomeData($project->id)['totleYear'] as $totleYears)
                                    <th id="th_expenses1">{{number_format($totleYears,3)}}</th>
                                @endforeach
                            </tr>
                            <tr id="total_exp_revenue_data">
                                <th id="title_expenses">نسبة مصاريف إدارية<br> من الإيرادات</th>
                                <th id="th_expenses_a">{{number_format($TotalOfRent['current'],3)}} %</th>
                                <th id="th_expenses_b">{{number_format($TotalOfRent['pre'],3)}} %</th>
                                <th id="th_expenses_c">{{number_format($TotalOfRent['next1'],3)}} %</th>
                                <th id="th_expenses_d">{{number_format($TotalOfRent['next2'],3)}} %</th>
                                <th id="th_expenses_e">{{number_format($TotalOfRent['next3'],3)}} %</th>
                                <th id="th_expenses_f">{{number_format($TotalOfRent['next4'],3)}} %</th>
                            </tr>
                            </tbody>
                        </table>
                        @elseif($TotalOfRent['data']->type == "custom")
                            <table class="table mb-0  text-center"  style="width: 100%;font-size: 15px;" id="">
                                <thead>

                                <tr id="head_exp_data">
                                    <th>السنة</th>
                                    <td>{{$TotalOfRent['year']}}</td>
                                    @foreach(numberOfyears($project->id)['years'] as $year)
                                        <td>{{$year}}</td>
                                    @endforeach
                                </tr>
                                </thead>
                                <tbody >
                                @foreach($TotalOfRent['item'] as $item)
                                    <tr>  @foreach($item as $i)

                                        @if(is_numeric($i))

                                                <td> {{number_format($i,3)}}</td>

                                        @else

                                                <td>{{$i}}</td>

                                        @endif

                                    @endforeach   </tr>
                                @endforeach

                                </tbody>
                            </table>
                        @endif
                        <caption>جدول اجمالي الايجارات لمدة الدراسة </caption>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-5">

                            <table class="table mb-0  text-center"  style="width: 100%;font-size: 15px;">
                                <thead>
                                <tr>
                                    <th>البند</th>
                                    <th>القيمة</th>


                                </tr>
                                </thead>
                                @foreach($firstYearUtilitiesTable['item'] as $item)
                                <tr>
                                <th id="th_expenses1">{{$item->title}}</th>
                                <th id="th_expenses2">{{$item->value}}</th>
                                </tr>
                                    @endforeach
                                <tr style="background: #413886CC;"><th id="title_rent">الاجمالي</th>
                                    <th>{{$firstYearUtilitiesTable['total']}}</th>
                                </tr>
                                </tbody>
                                <tfoot id="adexpenses_data_totle">

                                </tfoot>

                            </table>

                        <caption>جدول المرافق للسنة الاولي </caption>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive mt-5">
                        <table class="table mb-0  text-center"  style="width: 100%;font-size: 15px;" id="">
                            <thead>

                            <tr id="head_exp_data">
                                <th>السنة</th>
                                <td>{{$totalOfUtilitiesTable['year']}}</td>
                                @foreach(numberOfyears($project->id)['years'] as $year)
                                    <td>{{$year}}</td>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody >

                            <tr id="total_exp_revenue_data">
                                <th id="title_expenses">المرافق</th>\
                                <th id="th_expenses_a">{{number_format($totalOfUtilitiesTable['current_value'],3)}}</th>
                                <th id="th_expenses_b">{{number_format($totalOfUtilitiesTable['prev'],3)}}</th>
                                <th id="th_expenses_c">{{number_format($totalOfUtilitiesTable['nxt1'],3)}}</th>
                                <th id="th_expenses_d">{{number_format($totalOfUtilitiesTable['nxt2'],3)}}</th>
                                <th id="th_expenses_e">{{number_format($totalOfUtilitiesTable['nxt3'],3)}}</th>
                                <th id="th_expenses_f">{{number_format($totalOfUtilitiesTable['nxt4'],3)}}</th>
                            </tr>
                            <tr>
                                <th id="title_expenses">الإيرادات</th>\
                                <th id="th_expenses1">{{incomeData($project->id)['totleIncomeToEndYear']}}</th>
                                @foreach(incomeData($project->id)['totleYear'] as $totleYears)
                                    <th id="th_expenses1">{{number_format($totleYears,3)}}</th>
                                @endforeach
                            </tr>
                            <tr id="total_exp_revenue_data">
                                <th id="title_expenses">نسبة المرافق من الإيرادات</th>
                                <th id="th_expenses_a">{{number_format($totalOfUtilitiesTable['current'],3)}} %</th>
                                <th id="th_expenses_b">{{number_format($totalOfUtilitiesTable['prre'],3)}} %</th>
                                <th id="th_expenses_c">{{number_format($totalOfUtilitiesTable['next1'],3)}} %</th>
                                <th id="th_expenses_d">{{number_format($totalOfUtilitiesTable['next2'],3)}} %</th>
                                <th id="th_expenses_e">{{number_format($totalOfUtilitiesTable['next3'],3)}} %</th>
                                <th id="th_expenses_f">{{number_format($totalOfUtilitiesTable['next4'],3)}} %</th>
                            </tr>
                            </tbody>
                        </table>

                        <caption>جدول اجمالي المرافق لمدة الدراسة </caption>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-bottom')

 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
 <script>

     $('#expenses_incremental_data').append(
         '<tr>'+
         '<td>' + 'السنة' + '</td>'+
         @foreach($numberOfyears['years'] as $numberOfyear)
             ' <td>' + {{$numberOfyear}} + ' </td>'+
         @endforeach +
             '</tr>'+
         '<tr>'+
         '<td>' + 'تكلفة التسويق'+ '</td>'+
         ' <td>' + {{ number_format($marketing['prev'],3)}}  + ' </td>' +
         ' <td>' + {{ number_format($marketing['nxt1'],3)}} + ' </td>' +
         ' <td>' + {{ number_format($marketing['nxt2'],3)}} + ' </td>' +
         ' <td>' + {{ number_format($marketing['nxt3'],3)}} + ' </td>' +
         ' <td>' + {{ number_format($marketing['nxt4'],3)}} + ' </td>' +
         '</tr>'

     )

    $('#summeryـincrementals_employes').append('<tr>' +
             @foreach($firstYearJob['employees'] as $firstYear)
                 ' <td>' + {!!$firstYear->job!!} + ' </td>' +
             ' <td>' + formatter.format({!!$firstYear->quantity!!}) + ' </td>' +
             ' <td>' + formatter.format({!!$firstYear->annual_salary!!}) + ' </td>' +
             ' <td>' + formatter.format({!!($firstYear->annual_salary*$firstYear->quantity)!!}) + ' </td>' +
             ' <td>' + formatter.format({!!($firstYear->annual_salary*$firstYear->quantity*$firstYearJob['remainingmonths'])!!}) + ' </td>' +
             ' <td>' + formatter.format(12 * {!!($firstYear->annual_salary*$firstYear->quantity)!!}) + ' </td>' +
             @endforeach +
                 '</tr>'
         )



     const formatter = new Intl.NumberFormat('en-US');</script>
@endsection
