<div class="form-group">
    <label class="form-label" for="{{ $name }}"><strong>{{ $label }}</strong>{{ (!isset($required) || $required) ? '*' : ''}}</label>
    <select class="form-control {{ $class or '' }}" name="{{ $name }}[]" {{ (!isset($required) || $required) ? 'required' : '' }} multiple data-live-search="true" data-old="{{ implode(',',old($name, $value)) }}">
        @foreach($options as $val => $label)
            <option value="{{ $val }}" {{ is_array(old($name, $value)) && in_array($val, old($name, $value)) ? 'selected' : '' }} >{{ $label }}</option>
        @endforeach
    </select>
</div>