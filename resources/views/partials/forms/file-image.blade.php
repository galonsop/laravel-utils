<div class="form-group">
    <label class="form-label" for="{{ $name }}"><strong>{{ $label }}</strong>{{ (!isset($required) || $required) ? '*' : ''}}</label>
    <div class="controls">
        <input type="file" class="form-control {{ $class or '' }}" name="{{ $name }}" {{ (!isset($required) || $required) ? 'required' : '' }} {{ (isset($disabled) && $disabled) ? 'disabled' : '' }}>
        @if(!empty($help_text))
            <span class="help-block">{{ $help_text }}</span>
        @endif
    </div>
    @if(!empty($value))
        <div class="clearfix"></div><br>
        <img src="{{ !empty($base64) ? "data:image/png;base64,$value" : url(Storage::url($value)) }}" class="img-responsive">
    @endif
</div>