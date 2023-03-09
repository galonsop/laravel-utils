<div class="form-group">
    <label class="form-label" for="{{ $name }}"><strong>{{ $label }}</strong>{{ (!isset($required) || $required) ? '*' : ''}}</label>
    <div class="row">
        @foreach($options as $val => $label)
        <div class="col-xs-4">
            <label class="radio-inline">
                <input name="{{ $name }}" value="{{ $val }}" type="radio" {{ ($val == $value) ? 'checked' : '' }} {{ (isset($disabled) && $disabled) ? 'disabled' : '' }}> {{ $label }}
            </label>
        </div>
        @endforeach
    </div>
</div>