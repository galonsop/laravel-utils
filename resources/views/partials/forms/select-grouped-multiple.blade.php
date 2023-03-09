<div class="form-group">
    <label class="form-label" for="{{ $name }}"><strong>{{ $label }}</strong>{{ (!isset($required) || $required) ? '*' : ''}}</label>
    <select class="form-control" name="{{ $name }}[]" {{ (!isset($required) || $required) ? 'required' : '' }} multiple data-live-search="true" data-old="{{ implode(',',old($name, $value)) }}">
        @foreach($options as $option)
            <optgroup data-{{ $parent_type }}="{{ $option['id'] }}" label="{{ $option['name'] }}">
                @foreach($option[$items] as $item)
                    <option value="{{ $item['id'] }}" {{ is_array(old($name, $value)) && in_array($item['id'], old($name, $value)) ? 'selected' : '' }} >{{ $item['name'] }}</option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
</div>