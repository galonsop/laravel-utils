<div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary position-relative">{{ $header }}
        @if(isset($back_url))
            <a class="btn btn-sm btn-primary pull-right ml-5" href="{{ $back_url }}">
                <i class="fa fa-reply"></i> Go Back</a>
        @endif
    </h6>
</div>