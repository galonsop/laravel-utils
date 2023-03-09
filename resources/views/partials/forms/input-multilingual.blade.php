<div class="form-group">
    <label class="form-label" for="{{ $name }}"><strong>{{ $label }}</strong>{{ (!isset($required) || $required) ? '*' : ''}}</label>
    <span>Idiomas:
        <?php $first = true; ?>
        @foreach($languages as $lang)
            <a href="javascript:void(0)" class="change-language-link {{ $first ? 'active' : '' }}" data-language="{{ $lang }}">{{ strtoupper($lang) }}</a>
            <?php $first = false; ?>
        @endforeach
    </span>
    <div class="controls">
        <?php $first = true; ?>
        <?php $value = old($name, $object->id ? $object->translations()->where('field', $name)->pluck('value', 'iso_code')->all() : []); ?>
        @foreach($languages as $lang)
            <input type="{{ $type or 'text' }}" class="form-control change-language-input {{ ($first) ? '' : 'hide' }} {{ $class or '' }}" data-language="{{ $lang }}" name="{{ $name }}[{{ $lang }}]" value="{{ !empty($value[$lang]) ? $value[$lang] : '' }}" placeholder="{{ $placeholder or '' }}" {{ (!isset($required) || $required) ? 'required' : '' }} {{ (isset($disabled) && $disabled) ? 'disabled' : '' }}>
            <?php $first = false; ?>
        @endforeach
        @if(!empty($help_text))
            <span class="help-block">{{ $help_text }}</span>
        @endif
    </div>
</div>