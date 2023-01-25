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
                                    <td>{{$value}} 'ر.س'</td>
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
                                        <td>{{$sumSalary}} ر.س</td>
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
         ' <td>' + {{$marketing['prev']}}  + ' </td>' +
         ' <td>' + {{$marketing['nxt1']}} + ' </td>' +
         ' <td>' + {{$marketing['nxt2']}} + ' </td>' +
         ' <td>' + {{$marketing['nxt3']}} + ' </td>' +
         ' <td>' + {{$marketing['nxt4']}} + ' </td>' +
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
