<div class="row justify-content-end mb-2">
    <?php $first = true ?>
    @foreach(\App\Models\Language::all() as $language)
        <?php $value = isset($values[$language->id]) ? $values[$language->id] : ''; ?>
        <a class="btn btn-lang {{ $first ? 'active' : '' }} @isset($additional_class) {{ $additional_class }}@endif
        {{ $value == '' ? 'wrong' : 'right' }} btn_{{ $language->id }}" data-iso="{{ $language->iso }}"
           data-id="{{ $language->id }}">
            <img src="{{ asset("img/language/{$language->iso}.png") }}" />
            <i class="fa fa-circle"></i>
        </a>
        <?php $first = false ?>
    @endforeach
</div>