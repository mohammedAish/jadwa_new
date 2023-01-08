<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">

            @if(isset($title) && isset($name))
            <h4 class="mb-sm-0 font-size-18">{{ $title  . ' > ' .$name  }}</h4>
            @elseif(isset($title) && isset($li_1))
            <h4 class="mb-sm-0 font-size-18">{{ $li_1 . ' > ' . $title }}</h4>
            @else
            <h4 class="mb-sm-0 font-size-18">{{  $title /* . ' > ' .$name  */}}</h4>
            @endif
            {{-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $li_1 }}</a></li>
                    @if(isset($title))
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    @endif
                    @if(isset($name))
                        <li class="breadcrumb-item active">{{ $name }}</li>
                    @endif
                </ol>
            </div> --}}

        </div>
    </div>
</div>
<!-- end page title -->
