<div class="form-group">
    <label class="form-label" for="{{ $name }}"><strong>{{ $label }}</strong>{{ (!isset($required) || $required) ? '*' : ''}}</label>
    <div class="controls">
        <input type="number" @if (isset($min)) min="{{ $min }}" @endif class="form-control {{ $class or '' }}" name="{{ $name }}" value="{{ old($name, $value) }}" placeholder="{{ $placeholder or '' }}" {{ (!isset($required) || $required) ? 'required' : ''}} {{ (isset($disabled) && $disabled) ? 'disabled' : '' }}>
        @if(!empty($help_text))
            <span class="help-block">{{ $help_text }}</span>
        @endif
    </div>
</div>