<div class="form-group">
    @if($label)
        <label class="form-label" for="{{ $name }}"><strong>{{ $label }}</strong>{{ (!isset($required) || $required) ? '*' : ''}}</label>
    @endif
    <input data-onselect="{{ $onSelect or '' }}" value="{{ $value_text }}" data-url="{{ $url or '' }}" placeholder="{{ $placeholder or '' }}" id="{{ $id or '' }}"
           class="form-control autocomplete {{ $class or '' }} " {{ (!isset($required) || $required) ? 'required' : '' }}
            {{ (isset($disabled) && $disabled) ? 'disabled' : '' }} />
    <input type="hidden" name="{{ $name }}" value="{{ $value_id }}">
</div>