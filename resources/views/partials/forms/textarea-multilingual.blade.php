<div class="form-group">
    <label class="form-label" for="{{ $name }}"><strong>{{ $label }}</strong>{{ (!isset($required) || $required) ? '*' : ''}}</label>
    <span>Idiomas:
        <?php $first = true; ?>
        @foreach($languages as $lang)
            <a href="javascript:void(0)" class="change-language-link {{ $first ? 'active' : '' }}" data-language="{{ $lang }}">{{ strtoupper($lang) }}</a>
            <?php $first = false; ?>
        @endforeach
    </span>
    <?php $first = true; ?>
    <?php $value = old($name, $object->id ? $object->translations()->where('field', $name)->pluck('value', 'iso_code')->all() : []); ?>
    @foreach($languages as $lang)
        <textarea name="{{ $name }}[{{ $lang }}]" class="form-control change-language-input {{ ($first) ? '' : 'hide' }} {{ $class or '' }}" data-language="{{ $lang }}" style="width: 100%;" rows="{{ $rows or 5 }}" placeholder="{{ $placeholder or '' }}" {{ (!isset($required) || $required) ? 'required' : '' }} {{ (isset($disabled) && $disabled) ? 'disabled' : '' }}>{{ !empty($value[$lang]) ? $value[$lang] : '' }}</textarea>
        <?php $first = false; ?>
    @endforeach
</div>