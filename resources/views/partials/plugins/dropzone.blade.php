@push('scripts')
    <script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('js/components/dropzone/dropzone.js') }}"></script>
@endpush
@push('styles')
    <link href="{{ asset('plugins/dropzone/basic.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css">
@endpush
<small class="text-muted font-weight-bold">Only one file at a time. Max filesize: 2MB. Allowed file types: jpg, png.</small>
<form action="{{ $action }}"
      class="dropzone"
      id="my-awesome-dropzone">
    @csrf
    <input type="hidden" name="id" value="{{ $id }}">
</form>
