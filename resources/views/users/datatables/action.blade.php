<div class="actions">
    <div class="btn-group submenu">
        <button class="btn btn-default btn-sm"
                data-toggle="dropdown"
                data-hover="dropdown"
                data-close-others="true"
        >
            <i class="fa fa-wrench"></i>
            <span>Manage</span>
            <i class="fa fa-angle-down"></i>
        </button>
        <ul class="dropdown-menu pull-right" role="menu">
            <li>
                <button data-href="{{ route('users', $id) }}"
                        class="btn btn-link"
                >
                    <i class="fa fa-pencil"></i> {{trans('user.edit-user')}}
                </button>
            </li>
            <li>
                <button data-href=""
                        class="btn btn-link"
                >
                    <i class="fa fa-refresh"></i> {{trans('user.change-password')}}
                </button>
            </li>
            <li>
                <button data-remote=""
                        class="btn btn-link btn-delete"
                >
                    <i class="fa fa-trash"></i> {{trans('user.delete')}}
                </button>
            </li>
        </ul>
    </div>
</div>