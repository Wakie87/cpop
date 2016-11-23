<div class="box">
    <div class="box-body">
        <a href="{{ route('users.index') }}" class="btn btn-warning text-bold">
            {{trans('button.back')}}
        </a>
        <button type="submit" class="btn btn-primary text-bold">
            <i class="fa fa-check"></i> {{trans('button.save')}}
        </button>
    </div>
</div>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#user-content" data-toggle="tab">
                <i class="fa fa-info"></i> {{trans('user.tab.info')}}
            </a>
        </li>
        <li>
            <a href="#user-role" data-toggle="tab" class="{!! $errors->first('roles', 'text-red') !!}">
                <i class="fa fa-shield"></i> {{trans('user.tab.role')}}
            </a>
        </li>
        <li>
            <a href="#user-advanced" data-toggle="tab">
                <i class="fa fa-recycle"></i> {{trans('user.tab.advanced')}}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="active tab-pane" id="user-content">
            <div class="content">
                @include('users.partials.forms.account')
            </div>
        </div>
        <div class="tab-pane" id="user-role">
            <div class="content">
                @include('users.partials.forms.roles')
            </div>
        </div>
        <div class="tab-pane" id="user-advanced">
            <div class="content">
                @include('users.partials.parameters')
            </div>
        </div>
    </div>
</div>