@extends('layouts.master')

@section('title')
    {{ 'دراسة جدوى' }}
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            الخدمات
        @endslot
        @slot('title')
            دراسة جدوى
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="h4 card-title mb-4">تقدم العملية</div>
                    <div class="">
                        <div class="progress-xl progress">
                            <div class="progress-bar bg-success" style="width: 39%;" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100">39%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-center" style="border: 3px solid #F9AA1C ;border-radius: 7px;">
                <div class="card-body ">

                    <div class="col-sm center">
                     <a href="{{ route('strategic-plan', $project->id) }}" class="btn btn-outline-warning">الخطة الإستراتيجية</a>
                    </div>
                        <span class="font-size-20"  style="color: green ;font-size: 40px !important;"> <i class="fas fa-check-circle"></i></span>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="border: 3px solid #F9AA1C ;border-radius: 7px;">
                <div class="card-body ">

                    <div class="col-sm center">
                        <a href="{{ route('market-study' ,$project->id) }}" class="btn btn-outline-warning">دراسة السوق</a>
                    </div>
                    <span class="font-size-20" style="color: green  ;font-size: 40px !important;"> <i class="fas fa-check-circle"></i></span>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="border: 3px solid #F9AA1C ;border-radius: 7px;">
                <div class="card-body ">

                    <div class="col-sm center">
                        <a href="{{ route('administrators', $project->id) }}" class="btn btn-outline-warning">الإداريين</a>
                    </div>
                    <span class="font-size-20" style="color: green;font-size: 40px !important;"> <i class="fas fa-check-circle"></i></span>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="border: 3px solid #F9AA1C ;border-radius: 7px;">
                <div class="card-body ">

                    <div class="col-sm center">

                        <a href="{{ route('generalAdministrativeExpenses') }}" class="btn btn-outline-warning">المصاريف الإدارية والعمومية</a>
                    </div>
                    <span class="font-size-20" style="color: green;font-size: 40px !important;"> <i class="fas fa-check-circle"></i></span>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="border: 3px solid #F9AA1C ;border-radius: 7px;">
                <div class="card-body ">

                    <div class="col-sm center">

                        <a href="{{ route('revenues', $project->id) }}" class="btn btn-outline-warning">الإيرادات وتكاليف الإيرادات</a>

                    </div>
                    <span class="font-size-20" style="color: grey;font-size: 40px !important;"> <i class="fas fa-check-circle"></i></span>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="border: 3px solid #F9AA1C ;border-radius: 7px;">
                <div class="card-body ">

                    <div class="col-sm center">
                        <a class="btn btn-outline-warning" href="{{route('employe.index', $project->id)}}">الموظفين</a>
                    </div>
                    <span class="font-size-20" style="color: gray;font-size: 40px !important;"> <i class="fas fa-check-circle"></i></span>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="border: 3px solid #F9AA1C ;border-radius: 7px;">
                <div class="card-body ">

                    <div class="col-sm center">
                        <a class="btn btn-outline-warning" href="{{route('balance_sheet.index', $project->id)}}">الميزانية العمومية</a>
                    </div>
                    <span class="font-size-20" style="color: gray;font-size: 40px !important;"> <i class="fas fa-check-circle"></i></span>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="border: 3px solid #F9AA1C ;border-radius: 7px;">
                <div class="card-body ">

                    <div class="col-sm center">
                        <a  href="{{ route('fs-account-receivable.create', $project->id) }}" class="btn btn-outline-warning">رأس المال العامل</a>
                    </div>
                    <span class="font-size-20" style="color: gray;font-size: 40px !important;"> <i class="fas fa-check-circle"></i></span>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="border: 3px solid #F9AA1C ;border-radius: 7px;">
                <div class="card-body ">

                    <div class="col-sm center">
                        <a href="{{ route('fs-startup-cost.create', $project->id) }}" class="btn btn-outline-warning">مصاريف التأسيس</a>
                    </div>
                    <span class="font-size-20" style="color: green;font-size: 40px !important;"> <i class="fas fa-check-circle"></i></span>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center" style="border: 3px solid #F9AA1C ;border-radius: 7px;">
                <div class="card-body ">

                    <div class="col-sm center">
                        <a href="{{ route('funding-source.create', $project->id) }}" class="btn btn-outline-warning">مصادر التمويل</a>
                    </div>
                    <span class="font-size-20" style="color: green;font-size: 40px !important;"> <i class="fas fa-check-circle"></i></span>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection
