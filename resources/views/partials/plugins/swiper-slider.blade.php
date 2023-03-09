@extends ('templates.front.main')
@section('content')
    <!-- Slider Section-->
    <section class="page-section">
        @include('partials.components.slider', ['autoplay' => 1])
    </section>
@endsection
