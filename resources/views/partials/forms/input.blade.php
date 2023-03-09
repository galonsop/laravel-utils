<div class="form-group">
    @if(isset($label))
        <label class="form-label" for="{{ $name }}">
            {{ $label }}{{ (!isset($required) || $required) ? '*' : ''}}
        </label>
    @endif
    <div class="controls">
        <input id="{{ $id ?? '' }}" {{ (isset($autocomplete)) ? "autocomplete = $autocomplete "  : '' }}
        type="{{ $type ?? 'text' }}"
               class="form-control {{ $class ?? '' }}"
               name="{{ $name }}"
               value="{{ old($name, $value) }}" placeholder="{{ $placeholder ?? '' }}"
                {{ (!isset($required) || $required) ? 'required' : '' }} {{ (isset($readonly) && $readonly) ? 'readonly' : '' }} {{ (isset($disabled) && $disabled) ? 'disabled' : '' }}>
        @if(!empty($help_text))
            <span class="help-block">{{ $help_text }}</span>
        @endif
    </div>
</div>