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
                        </table>
                    </div>

                    {{-- <ul class="pagination pagination-rounded justify-content-center mb-2">
                        {{ $project->links() }}
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>

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





    const formatter = new Intl.NumberFormat('en-US');</script>
@endsection

@section('script-bottom')

 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>

@endsection
