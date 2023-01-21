@extends('layouts.master')

@section('title')
    مشاريعي
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            مشاريعي
        @endslot
        @slot('title')
        {{ $project->name }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-4">
                            <img src="{{ url('public/logo/' . $project->logo) }}" alt="" width="50" height="50"
                                class="avatar-sm">
                        </div>

                        <div class="flex-grow-1 overflow-hidden" style="
                    padding-top: 15px;">
                            <h5 class="text-truncate font-size-17">{{ $project->name }}</h5>
                        </div>
                    </div>

                    <h5 class="font-size-15 mt-4 font-weight-700">تفاصيل المشروع </h5>

                    <p class="font-size-17">{!! $project->idea !!}</p>



                    <div class="row task-dates">

                        <div class="col-sm-3 col-3">
                            <div class="mt-4">
                                <h5 class="font-size-14 orange"><i class="bx bx-calendar me-1 orange"></i> نوع المشروع </h5>
                                <p class="text-muted mb-0 gray">{{ $project->projectType->title }}</p>
                            </div>
                        </div>

                        <div class="col-sm-3 col-3">
                            <div class="mt-4">
                                <h5 class="font-size-14 orange"><i class="bx bx-calendar me-1  orange"></i> الدولة , المدينة
                                </h5>
                                <p class="text-muted mb-0 gray">{{ $project->city }} ,{{ $project->country }} </p>
                            </div>
                        </div>

                        <div class="col-sm-3 col-3">
                            <div class="mt-4">
                                <h5 class="font-size-14 orange"><i class="bx bx-calendar me-1 orange"></i> مدة المشروع </h5>
                                <p class="text-muted mb-0 gray">{{ $project->study_duration }} أشهر</p>
                            </div>
                        </div>

                        <div class="col-sm-3 col-3">
                            <div class="mt-4">
                                <h5 class="font-size-14 orange"><i class="bx bx-calendar-check me-1 orange"></i> تاريخ
                                    البداية </h5>
                                <p class="text-muted mb-0 gray">{{ $project->start_date }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <a href="{{ route('feasibility-study', $project->id) }}" class="py-5">دراسة جدوي</a>
            </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="font-size-13 m-0"> <i class="bx bx-calendar me-1 orange"></i>
                                            <a href="javascript: void(0);" class="orange">فترة التأسيس </a>
                                        </h5>
                                    </td>
                                    <td>
                                        <div>
                                            <p class="text-black mb-0 gray">{{ $project->development_duration }}شهر </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-size-13 m-0"> <i class="bx bx-calendar me-1 orange"></i>
                                            <a href="javascript: void(0);" class="orange">تاريخ بداية التشغيل </a>
                                        </h5>
                                    </td>
                                    <td>
                                        <div>
                                            <p class="text-black mb-0 gray">{{ $operationDate }}</p>
                                        </div>
                    </div>
                    </td>
                    </tr>
                    <tr>

                        <td>
                            <h5 class="font-size-13 m-0"> <i class="bx bx-calendar me-1 orange"></i>
                                <a href="javascript: void(0);" class="orange">سنة بداية التشغيل </a>
                            </h5>
                        </td>
                        <td>
                            <div>
                                <p class="text-black mb-0 gray">{{ $year }}</p>
                            </div>
                </div>
                </td>
                </tr>
                <tr>
                    <td>
                        <h5 class="font-size-13 m-0"> <i class="bx bx-calendar me-1 orange"></i>
                            <a href="javascript: void(0);" class="orange">عدد ايام السنة </a>
                        </h5>
                    </td>
                    <td>
                        <div>
                            <p class="text-black mb-0 gray">365 يوم</p>
                        </div>
            </div>
            </td>
            </tr>
            <tr>

                <td>
                    <h5 class="font-size-13 m-0"> <i class="bx bx-calendar me-1 orange"></i>
                        <a href="javascript: void(0);" class="orange">عدد ايام السنة المتبقية </a>
                    </h5>
                </td>
                <td>
                    <div>
                        <p class="text-black mb-0 gray">{{ $remainingDays }} يوم</p>
                    </div>
        </div>
        </td>
        </tr>
        <tr>

            <td>
                <h5 class="font-size-13 m-0"> <i class="bx bx-calendar me-1 orange"></i>
                    <a href="javascript: void(0);" class="orange"> الأشهر المتبقة لنهاية السنة </a>
                </h5>
            </td>
            <td>
                <div>
                    <p class="text-black mb-0 gray">{{ $remainingmonths }} أشهر</p>
                </div>
    </div>
    </td>
    </tr>

    <tr>

        <td>
            <h5 class="font-size-13 m-0"> <i class="bx bx-calendar me-1 orange"></i>
                <a href="javascript: void(0);" class="orange"> ضريبة القيمة المضافة</a>
            </h5>
        </td>
        <td>
            <div>
                <p class="text-black mb-0 gray">{{ $project->vat }}%</p>
            </div>
            </div>
        </td>
    </tr>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <h5 class="font-size-18 mt-6 font-weight-900 pb-12"> الخدمات المتوفرة </h5>

        @foreach ($services as $service)
            <div class="col-lg-4">
                <!-- Simple card -->
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{ url('public/image/' . $service->image) }}"
                        alt="Card image cap">
                    <div class="card-body">

                        <h4 class="card-title mt-0 " style="display: -webkit-inline-box;">{{ $service->title }}
                            <p class="orange" style=" padding-right: 150px ;">
                                {{ $service->price }} ر.س</p>
                        </h4>
{{--                        <a href="{{ route($service->route, $project->id) }}" class="btn btn-outline-warning waves-effect border-ora"--}}
{{--                            style="width: -webkit-fill-available; ">ابدا الان</a>--}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Simple card -->
                <div class="card">
                    <img class="card-img-top img-fluid" style="" src="{{ asset('images/feasibilityStudy.png') }}"
                         alt="Card image cap">
                    <div class="card-body">

                        <h4 class="card-title mt-0 "style="font-size:13px; text-align:center ">دراسة الجدوى (Feasibility Study)
                            {{-- <p class="orange" style=" padding-right: 100px ;">
                                    {{ $services->price }} ر.س</p> --}}
                        </h4>

                        <a href="{{ route('feasibility-study') }}"
                           class="btn btn-outline-warning waves-effect border-ora"
                           style="width: -webkit-fill-available; ">ابدا الان</a>
                    </div>
                </div>

            </div>
            <!-- end col -->
        @endforeach



    </div>
    <!-- end row -->
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- project-overview init -->
    <script src="{{ URL::asset('/assets/js/pages/project-overview.init.js') }}"></script>
@endsection
