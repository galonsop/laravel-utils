<div class="form-group">
    @if($label)
        <label class="form-label" for="{{ $name }}"><strong>{{ $label }}</strong>{{ (!isset($required) || $required) ? '*' : ''}}</label>
    @endif
    <div class="controls">
        <input autocomplete="off" type="{{ $type or 'text' }}" class="form-control datetimepicker {{ $class or '' }}"
               name="{{ $name }}"
               value = "{{ $value ? Carbon\Carbon::parse($value)->format('Y/m/d H:i') :
               old($name, isset($default) ? $default : Carbon\Carbon::parse($value)->format('Y/m/d H:i')) }}"
               placeholder="{{ $placeholder or '' }}" {{ (!isset($required) || $required) ? 'required' : '' }}
                {{ (isset($disabled) && $disabled) ? 'disabled' : '' }} {{ (isset($readonly) && $readonly) ? 'readonly' : '' }} >
    </div>
</div>