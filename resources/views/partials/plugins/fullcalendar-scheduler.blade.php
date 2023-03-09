@push('styles')
<link href="{{ asset('assets/plugins/fullcalendar-scheduler/lib/fullcalendar.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/fullcalendar-scheduler/lib/fullcalendar.print.min.css') }}" rel="stylesheet" media="print">
<link href="{{ asset('assets/plugins/fullcalendar-scheduler/scheduler.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/plugins/fullcalendar-scheduler/lib/moment.min.js') }}" ></script>
<script src="{{ asset('assets/plugins/fullcalendar-scheduler/lib/fullcalendar.min.js') }}" ></script>
<script src="{{ asset('assets/plugins/fullcalendar-scheduler/scheduler.min.js') }}" ></script>
@endpush