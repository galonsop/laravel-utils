@push('scripts')
    <script src="{{ asset('plugins/cropperjs/Blob.js') }}"></script>
    <script src="{{ asset('plugins/cropperjs/canvas-toBlob.js') }}"></script>
    <script src="{{ asset('plugins/cropperjs/cropper.js') }}"></script>
    <script src="{{ asset('js/components/cropperjs/cropperjs.js') }}"></script>
@endpush
@push('styles')
    <link href="{{ asset('plugins/cropperjs/cropper.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/cropperjs/custom_cropper.css') }}" rel="stylesheet" type="text/css">
@endpush

<div>
    <img id="image" src="{{ $img }}" style="display: block; max-width: 100%">
</div>
