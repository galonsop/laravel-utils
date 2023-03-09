<div class="form-group form-multilingual-component">
    <label class="form-label">{{ $label }}{{ (isset($required) && $required) ? '*' : ''}}</label>
    <div class="container p-0">
        @include('partials.forms.multilingual-language-selector-component', [
            'values' => $values
        ])
        <?php $first = true ?>
        @foreach(\App\Models\Language::all() as $language)
            <?php $value = isset($values[$language->id]) ? $values[$language->id] : ''; ?>
            <div class="row row_{{ $language->id }} {{ !$first ? 'd-none' : '' }}">
                <div class="col">
                    @if(isset($type) && $type == 'textarea')
                        <textarea name="{{$name}}_{{$language->id}}" title=""
                                  placeholder="{{ strtoupper($language->iso) }}"
                                  @if(isset($height)) style="height:{{$height}}" @endif
                                  class="form-control multi-change" data-id="{{ $language->id }}">{{ $value }}</textarea>
                    @else
                        <input name="{{$name}}_{{$language->id}}" placeholder="{{ strtoupper($language->iso) }}" title="" type="text"
                               class="form-control multi-change" data-id="{{ $language->id }}" value="{{ $value }}">
                    @endif
                </div>
            </div>
            <?php $first = false ?>
        @endforeach
        @if(!empty($help_text))
            <span class="help-block d-inline-block mt-1">{{ $help_text }}</span>
        @endif
    </div>
</div>