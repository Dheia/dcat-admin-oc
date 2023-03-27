<div class="{{ $viewClass['form-group'] }}" style="padding-top: 5px;">

    <div class="vs-checkbox-con vs-checkbox-primary">

        <input name="{{ $name }}" type="hidden" value="0" />
        <input type="checkbox" name="{{ $name }}" class="field_meets _normal_ Dcat_Admin_Widgets_Checkbox {{ $class }}" {{ $value==1 ? 'checked' : ''
            }} {!! $attributes !!} />

        <span class="vs-checkbox vs-checkbox-">
            <span class="vs-checkbox--check">
                <i class="vs-icon feather icon-check"></i>
            </span>
        </span>
        <span>{!! $label !!}</span>

        @include('admin::form.error')
        @include('admin::form.help-block')

    </div>
</div>

<script require="@switchery" init="{!! $selector !!}"></script>