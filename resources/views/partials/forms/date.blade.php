<div class="form-group">
    @if($label)
        <label class="form-label" for="{{ $name }}"><strong>{{ $label }}</strong>{{ (!isset($required) || $required) ? '*' : ''}}</label>
    @endif
    <div class="controls">
        <input autocomplete="off" id="{{ $id or "" }}" type="{{ $type or 'text' }}" class="form-control datepicker {{ $class or '' }}" name="{{ $name }}"
               value = "{{ $value ? Carbon\Carbon::parse($value)->format('Y/m/d') :
               old($name, isset($default) ? $default : Carbon\Carbon::parse($value)->format('Y/m/d')) }}"
               data-date-format="yyyy/mm/dd"
               placeholder="{{ $placeholder or '' }}" {{ (!isset($required) || $required) ? 'required' : '' }}
                {{ (isset($disabled) && $disabled) ? 'disabled' : '' }}>
    </div>
</div>