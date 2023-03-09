<div class="col-xs-12">
    <div class="alert alert-{{ $type }} m-t-0" style="width:100%;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        @if(isset($title))
            <strong>{{$title}}</strong>
        @endif
        {{ $msg }}
    </div>
</div>