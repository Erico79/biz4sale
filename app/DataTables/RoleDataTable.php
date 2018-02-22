<?php

namespace App\DataTables;

use App\Models\Role;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class RoleDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'roles.datatables_actions')
            ->addColumn('permissions', function(Role $role){
                return '<button data-toggle="modal" data-target="#assign-permissions-modal" r-id="'.$role->id.'" class="btn btn-xs btn-success attach-pms-btn">Assign Roles</button>';
            })->rawColumns(['permissions','action'])
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Role $model)
    {
        return $model->newQuery()->orderByDesc('id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addColumn([
                'defaultContent' => '',
                'data'           => 'permissions',
                'name'           => 'permissions',
                'title'          => 'Permissions',
                'render'         => false,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
                'footer'         => '',
            ])
            ->addAction(['width' => '80px'])
            ->parameters([
                'dom'     => 'Bfrtip',
//                'lengthChange' => true,
//                'paging'=>true,
                'order'   => [[0, 'desc']],
                'buttons' => [
                 /*   'create',
                    'export',
                    'print',
                    'reset',
                    'reload',*/
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
            'name',
            'code',
//            'id'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'rolesdatatable_' . time();
    }
}