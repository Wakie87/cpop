<div class="row">
    <div class="col-md-6">
        <div class="form-group {!! $errors->has('first_name') ? 'has-error' : '' !!}">
            <label class="form-label-style block" for="first_name">
                {{trans('user.form.field.first_name')}}
                @tooltip('user.form.tooltip.first_name')
            </label>
            {!! form()->input('text', 'first_name', null, ['id'=>'first_name','class'=>'form-control input-sm','placeholder'=>trans('user.form.placeholder.first_name')]) !!}
            {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
        </div>
        <div class="form-group {!! $errors->has('last_name') ? 'has-error' : '' !!}">
            <label class="form-label-style block" for="last_name">
                {{trans('user.form.field.last_name')}}
                @tooltip('user.form.tooltip.last_name')
            </label>
            {!! form()->input('text', 'last_name', null, ['id'=>'last_name','class'=>'form-control input-sm','placeholder'=>trans('user.form.placeholder.last_name')]) !!}
            {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
        </div>
        <div class="form-group {!! $errors->has('username') ? 'has-error' : '' !!}">
            <label class="form-label-style block" for="username">
                {{trans('user.form.field.username')}}
                @tooltip('user.form.tooltip.username')
            </label>
            {!! form()->input('text', 'username', null, ['id'=>'username','class'=>'form-control input-sm','placeholder'=>trans('user.form.placeholder.username')]) !!}
            {!! $errors->first('username', '<span class="help-block">:message</span>') !!}
        </div>
        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
            <label class="form-label-style block" for="email">
                {{trans('user.form.field.email')}}
                @tooltip('user.form.tooltip.email')
            </label>
            {!! form()->input('text', 'email', null, ['id'=>'email','class'=>'form-control input-sm','placeholder'=>trans('user.form.placeholder.email')]) !!}
            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
            <label class="form-label-style block" for="password">
                {{trans('user.form.field.password')}}
                @tooltip('user.form.tooltip.password')
            </label>
            {!! form()->password('password', ['id'=>'password','class'=>'form-control input-sm','placeholder'=>trans('user.form.placeholder.password')]) !!}
            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
        </div>
        <div class="form-group {!! $errors->has('password_confirmation') ? 'has-error' : '' !!}">
            <label class="form-label-style block" for="password_confirmation">
                {{trans('user.form.field.password_confirmation')}}
                @tooltip('user.form.tooltip.password_confirmation')
            </label>
            {!! form()->password('password_confirmation', ['id'=>'password_confirmation','class'=>'form-control input-sm','placeholder'=>trans('user.form.placeholder.password_confirmation')]) !!}
            {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group {!! $errors->has('confirmed') || $errors->has('confirmed') ? 'has-error' : '' !!}">
                    <label class="form-label-style">
                        {{trans('user.form.field.confirmed')}}
                        @tooltip('user.form.tooltip.confirmed')
                    </label>
                    <br>
                    {!! form()->checkbox('confirmed', $value = 1, $checked = null, ['id'=>'confirmed','class'=>'bootstrap-checkbox']) !!}
                    {!! $errors->first('confirmed', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group {!! $errors->has('blocked') ? 'has-error' : '' !!}">
                    <label class="form-label-style">
                        {{trans('user.form.field.blocked')}}
                        @tooltip('user.form.tooltip.blocked')
                    </label>
                    <br>
                    {!! form()->checkbox('blocked', $value = 1, $checked = null, ['id'=>'blocked','class'=>'bootstrap-checkbox']) !!}
                    {!! $errors->first('blocked', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group {!! $errors->has('administrator') ? 'has-error' : '' !!}">
                    <label class="form-label-style">
                        {{trans('user.form.field.administrator')}}
                        @tooltip('user.form.tooltip.administrator')
                    </label>
                    <br>
                    {!! form()->checkbox('administrator', $value = 1, $checked = null, ['id'=>'administrator','class'=>'bootstrap-checkbox']) !!}
                    {!! $errors->first('administrator', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
    </div>
</div>