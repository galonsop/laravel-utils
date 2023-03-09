
@if($active == 0)
    @include('polls.active-button', ['active_route' => $active_route, 'modal_title' => $modal_title, 'modal_body' => $modal_body])
@elseif(!date_has_started($start))
    <a href="{{ $deactivate_route }}" class="btn btn-warning pull-right">{!! $warning_message !!}</a>
@endif