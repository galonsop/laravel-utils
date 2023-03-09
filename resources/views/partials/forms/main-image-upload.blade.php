<div class="form-group">
    <label>{{ $label }}</label>
    @if($main != null && $main->count() != 0)
        <img class="img-thumbnail d-block" style="max-height: 300px" src="{{ Storage::url($main->path) }}">
    @endif
    <hr>
    <input type="file" id="main" name="main">
    <input type="hidden" name="main_changed" value="0">
    <p class="file-error warning d-none mt-1" style="color: red">
        File size is greater than 2MB. Please choose a smaller one.
    </p>
    @if(!empty($help_text))
        <span class="help-block">{{ $help_text }}</span>
    @endif
</div>
@push('scripts')
    <script type="application/javascript">
        $(document).ready(function(){
            let $input = $('#main')
            let $error = $input.parents('.form-group').first().find('.file-error').first();
            $input.click(function(){
                $(this).val("");
                $error.addClass('d-none')
            });
            $input.change(function(){
                let file_size = $input[0].files[0].size;
                // if(file_size > 2097152) {
                if(file_size > 2097152) {
                    //2 MB
                    $input.val("");
                    $error.removeClass('d-none')
                    // $("#file_error").html("File size is greater than 2MB");
                    // $(".demoInputBox").css("border-color","#FF0000");
                    return false;
                }
            });

        });
    </script>
@endpush
