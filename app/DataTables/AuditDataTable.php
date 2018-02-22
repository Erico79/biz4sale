<?php

namespace App\DataTables;

use App\Models\Audit;
use OwenIt\Auditing\Auditable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AuditDataTable extends DataTable
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
//            ->addColumn('action', 'audits.datatables_actions')
            ->editColumn('user_id',function(Audit $audit){
                if($audit->user_id !=null){
                    return $audit->user->name;
                }
            })
            ->editColumn('old_values',function (Audit $audit){
                if(strlen($audit->old_values) > 50){
                    return '<span>'.substr($audit->old_values,0,50).'...</span>';
                }else{
                    return $audit->old_values;
                }
            })
            ->editColumn('new_values',function (Audit $audit){
                if(strlen($audit->new_values) > 50){
                    return '<span>'.substr($audit->new_values,0,50).'...</span>';
                }else{
                    return $audit->new_values;
                }
            })
            ->rawColumns(['old_values','new_values'])
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Audit $model)
    {
        return $model->newQuery()->with('user')->orderByDesc('id');
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
//            ->addAction(['width' => '80px'])
            ->parameters([
                'dom'     => 'Bfrtip',
//                'order'   => [[0, 'desc']],
                'buttons' => [
//                    'create',
//                    'export',
//                    'print',
//                    'reset',
//                    'reload',
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
//            'user_id',
            'user_id',
            'event',
//            'auditable_id',
            'auditable_type',
            'old_values',
            'new_values',
            'url',
            'ip_address',
//            'user_agent'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'auditsdatatable_' . time();
    }
}