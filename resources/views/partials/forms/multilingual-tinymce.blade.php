<div class="form-group form-multilingual-component form-multilingual-component-tinymce">
    @isset($label)
        <div class="row">
            <div class="col-sm-12">
                <label class="form-label">{{ $label }}{{ (isset($required) && $required) ? '*' : ''}}</label>
            </div>
        </div>
    @endif
    <div class="row">
        @if(!isset($embedded_in_form))
            <div class="col-sm-12 col-lg-5">
                <div class="pr-3">
                <button class="btn btn-primary btn-block btn-save-tiny">
                    Save content
                </button>
            </div>
            </div>
        @endif

        <div class="{{ isset($embedded_in_form) ? 'col-sm-12 pr-4' : 'col-sm-12 col-lg-7' }} ">
            @include('partials.forms.multilingual-language-selector-component', [
                'values' => $values,
                'additional_class' => 'btn-tinymce'
            ])
        </div>
    </div>
    <div class="container p-0">
        <?php $first = true ?>
        @foreach(\App\Models\Language::all() as $language)
            <?php $value = isset($values[$language->id]) ? $values[$language->id] : ''; ?>
            <div @isset($height) style="height:{{ $height }}px" @endif class="row row_{{ $language->id }} {{ !$first ? 'd-none' : '' }}">
                <div class="col">
                    <div class="tiny-mce-wrapper position-relative" >
                        <textarea class="multi-change" data-id="{{ $language->id }}"
                                  id="{{ "{$name}_{$language->id}" }}"
                                  name="{{ "{$name}_{$language->id}" }}">{{ $value }}</textarea>
                    </div>
                </div>
            </div>
            <?php $first = false ?>
        @endforeach
    </div>
</div>
@once
@push('scripts')
    <script src="{{ asset('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
    <script type="application/javascript">
        function commonEvent(editor, val) {
            let $target = $(editor.targetElm);
            const $parent = $target.parents('.form-multilingual-component').first();
            const id = $target.data('id');
            if (val !== ''){
                $parent.find('.btn_'+id).removeClass('wrong').addClass('right');
            }else{
                $parent.find('.btn_'+id).removeClass('right').addClass('wrong');
            }
        }

        function tinyEditorFormSubmit(tinyEditors, $form){
            tinyEditors.forEach(item => {
                let editor = tinymce.editors[item.id];
                if (editor === undefined){
                    return;
                }
                let content = editor.getContent();
                let $index = $('<input type="hidden" name="{0}" value="{1}">'
                    .format(item.id, b64EncodeUnicode(content)));
                $form.append($index)
            });
        }

        function initTinyMCE(id) {
            let id_t = 'textarea#' + id;
            let height = @if(isset($height)) "{{$height}}"; @else {{"100"}} @endif
            tinymce.init({
                selector: id_t,
                plugins : 'link image paste table lists textcolor',
                toolbar: 'undo redo | styleselect | fontselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | forecolor backcolor numlist bullist',
                paste_data_images: true,
                automatic_uploads: false,
                height: height,
                setup: function(editor) {
                    editor.on('keydown', function(e) {
                        const val = editor.getContent({format: 'text'});
                        commonEvent(editor, val)
                    });
                    editor.on('keyup', function(e) {
                        const val = editor.getContent({format: 'text'});
                        commonEvent(editor, val)
                    });
                    editor.on('paste', function(event) {
                        let val = (event.clipboardData || window.clipboardData).getData('text');
                        commonEvent(editor, val)
                    });
                    editor.on('drop', function(e) {
                        const val = editor.getContent()
                        commonEvent(editor, val)
                    });
                }
            });
        }
        $(document).ready(function () {
            let tinyEditors = [];
            @foreach(\App\Models\Language::all() as $language)
            tinyEditors.push({id: "{{$name}}_{{$language->id}}", init: false});
            @endforeach
            @if(!isset($embedded_in_form))
                $('.btn-save-tiny').on('click', function () {
                    let $form = $('<form type="" method="post" action="{{ $upload_url }}"></form>');
                    let $index = $('<input type="hidden" name="{0}" value="{1}">'
                        .format("_token", $('meta[name="csrf-token"]').attr('content')));
                    $form.append($index);
                    tinyEditorFormSubmit(tinyEditors, $form);
                    $('body').append($form);
                    $form.submit();
                });
            @else
                $('.form-multilingual-component-tinymce').each(function (){
                    let $form = $(this).parents('form').first();
                    $form.submit(function (){
                        tinyEditorFormSubmit(tinyEditors, $form);
                        return true;
                    })
                })
            @endif
            $('.btn-tinymce').on('click', function () {
                let index = $('.btn-tinymce').index($(this));
                if (!tinyEditors[index].init){
                    tinyEditors[index].init = true;
                    initTinyMCE(tinyEditors[index].id);
                }
            });
            $('.form-multilingual-component-tinymce')
                .on('input', '.multi-change', function () {
                    const $parent = $(this).parents('.form-multilingual-component').first();
                    const id = $(this).data('id');
                    const val = $(this).val().trim();
                    if (val !== ''){
                        $parent.find('.btn_'+id).removeClass('wrong').addClass('right');
                    }else{
                        $parent.find('.btn_'+id).removeClass('right').addClass('wrong');
                    }
                })
            initTinyMCE(tinyEditors[0].id);
            tinyEditors[0].init = true;
        });
    </script>
@endpush
@endonce
