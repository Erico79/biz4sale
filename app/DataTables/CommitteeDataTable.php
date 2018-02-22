<?php

namespace App\DataTables;

use App\Models\Committee;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CommitteeDataTable extends DataTable
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

        return $dataTable
            ->editColumn('name',function (Committee $committee){
                return '<input type="hidden" value="'.$committee->id.'" class="m-id">'.$committee->name;
            })
//            ->editColumn('add_members',function(Committee $committee){
//                return '<button class="btn btn-success btn-sm">Add/view members</button>';
//            })

            ->addColumn('action', 'committees.datatables_actions')
            ->rawColumns(['action','name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Committee $model)
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
//            ->addColumn([
//                'defaultContent' => '',
//                'data'           => 'add_members',
//                'name'           => 'add_members',
//                'title'          => 'View/Add members',
//                'render'         => null,
//                'orderable'      => false,
//                'searchable'     => false,
//                'exportable'     => false,
//                'printable'      => true,
//                'footer'         => '',
//            ])
            ->addAction(['width' => '80px'])
            ->parameters([
                'dom'     => 'Bfrtip',
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
//            'created_by'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'committeesdatatable_' . time();
    }
}