<div class="form-group">
    @if($label)
        <label class="form-label" for="{{ $name }}">{{ $label }}{{ (!isset($required) || $required) ? '*' : ''}}</label>
    @endif
    <select id="{{ $id ?? '' }}"
            class="form-control {{ $class ?? '' }}"
            name="{{ $name }}" {{ (!isset($required) || $required) ? 'required' : '' }}
            {{ (isset($disabled) && $disabled) ? 'disabled' : '' }}
            {{ isset($search) ? 'data-live-search="true"' : '' }} data-old="{{ old($name, $value) }}">
        @foreach($options as $val => $label)
            <option value="{{ $val }}" {{ (old($name, $value) == $val) ? 'selected' : '' }} >{{ $label }}</option>
        @endforeach
    </select>
</div>
