<div class="form-group state-partial">
    <label class="form-label"><strong>@lang('core::core.state')</strong></label>
    <div class="row">
        <div class="col-xs-4">
            <label class="radio-inline">
                <input name="state" value="enabled" type="radio" {{ ($state == 'enabled') ? 'checked' : '' }}> @lang('core::core.state_enabled')
            </label>
        </div>
        <div class="col-xs-4">
            <label class="radio-inline">
                <input name="state" value="disabled" type="radio" {{ ($state == 'disabled') ? 'checked' : '' }}> @lang('core::core.state_disabled')
            </label>
        </div>
        <div class="col-xs-4">
            <label class="radio-inline">
                <input name="state" value="deleted" type="radio" {{ ($state == 'deleted') ? 'checked' : '' }}> @lang('core::core.state_deleted')
            </label>
        </div>
    </div>
</div>