<?php

namespace App\DataTables;

use App\User;
use Yajra\Datatables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->editColumn('first_name', function($model) {
               return $model->fullname;
            })
            ->editColumn('roles', function (User $user) {
                return dt_render('users.datatables.roles', compact('user'));
            })
            ->addColumn('action', 'users.datatables.action')
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = User::query();

        if ($status = $this->datatables->getRequest()->get('status')) {
            $users->whereIn('confirmed', $status);
        }

        if ($roles = $this->datatables->getRequest()->get('roles')) {
            $users->havingRoles($roles);
        }
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->ajax('')
                    ->addAction(['width' => '80px'])
                    ->parameters([
                        'order'     => [[0, 'asc']],
                        'buttons'   => [

                            [
                                'extend' => 'create',
                                'text'   => '<i class="fa fa-plus"></i>&nbsp;&nbsp;New User',
                            ],
                            'export',
                            'print',
                            'reset',
                            'reload',
                        ],
                    ]);
    }                

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => ['width' => '20px'],
            'first_name' => ['title' => 'Name'],
            'reg_id' => ['title' => 'AHPRA No.'],
            'roles' => ['name' => 'roles.name', 'orderable' => false],
            'confirmed'     => [
                    'width' => '20px',
                    'title' => '<i class="fa fa-check" data-toggle="tooltip" data-title="IsActivated"></i>',
                ],
            'created_at',
            'updated_at',
        ];
    }


    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'usersdatatables_' . time();
    }
}
