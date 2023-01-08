@extends('layouts.master')

@section('title') {{'تعديل سلايدر'}} @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') السلايدر @endslot
        @slot('title') تعديل سلايدر @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">قم بتعديل بيانات السلايدر</h4>

                    <form action="{{ route('sliders.update' , $slider->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">العنوان</label>
                                    <input type="text"  name="title" class="form-control @error('title') is-invalid @enderror" value="{{$slider->title}}" id="title" >
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="description" class="form-label">الوصف </label>
                                    <textarea type="text" name="description"  class="form-control @error('description')"  is-invalid @enderror" id="formrow-description-input" >
                                        {{$slider->description}}   </textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>
                            </div>

                       
                        </div>

            

                        <div class="text-center">
                            <button type="submit" class="btn btn-success w-lg bg-o">حفظ</button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>
@endsection
