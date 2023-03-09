<div class="form-group">
    <label class="form-label" for="{{ $name }}"><strong>{{ $label }}</strong>{{ (!isset($required) || $required) ? '*' : ''}}</label>
    <textarea class="form-control" name="{{ $name }}" style="width: 100%;" rows="{{ $rows or 5 }}" placeholder="{{ $placeholder or '' }}" {{ (!isset($required) || $required) ? 'required' : '' }} {{ (isset($readonly) && $readonly) ? 'readonly' : '' }} {{ (isset($disabled) && $disabled) ? 'disabled' : '' }}>{{ old($name, $value) }}</textarea>
</div>