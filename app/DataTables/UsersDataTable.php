<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('office', function ($user) {
                return $user->office->name ?? '';
            })
            ->addColumn('roles', function($user) {
                return $user->roles->pluck('name')->join(', ') ?? '';
            })
            ->addColumn('permissions', function($user) {
                $htmlEl = '';
                foreach ($user->getAllPermissions()->take(5) as $permission) {
                    $htmlEl .= '<span class="badge badge-primary m-1">' . $permission->name . '</span>';
                }
                $permCount = $user->getAllPermissions()->count();

                return $htmlEl . (($permCount > 5) ? ' +' . ($permCount - 5) .' others' : '');
//                return $user->getAllPermissions()->take(5)->pluck('name')->join('<br/>') . ' +' . $user->getAllPermissions()->count() . ' others' ?? '';
            })
            ->addColumn('avatar', function ($user) {
                return '<img class="img-circle img-bordered-sm" src="'. $user->avatar .'" alt="user" width="50" height="50" />';
            })
            ->addColumn('action', function ($user) {
                return '
                    <a href="'. route('admin.users.edit', $user->id).'" class="btn btn-info btn-sm">
                        <i class="fas fa-pencil-alt"></i>
                        Edit
                    </a>
                ';
            })
            ->rawColumns(['permissions','avatar','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->with('permissions','roles.permissions','office')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->parameters([
                        'responsive' => true,
                    ])
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('name')
                ->addClass('text-center'),
            Column::make('email')
                ->addClass('text-center'),
            Column::make('office')
                ->addClass('text-center'),
            Column::make('roles')
                ->addClass('text-center'),
            Column::make('permissions')
                ->addClass('text-center')
                ->width(200),
            Column::computed('avatar')
                ->addClass('text-center'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
