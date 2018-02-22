<?php

namespace App\DataTables;

use App\Models\MasterFile;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class MasterFileDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'master_files.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MasterFile $model)
    {
        return $model->newQuery();
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
            ->addAction(['width' => '138px'])
            ->parameters([
                'dom'     => 'Bfrtip',
//                "pagingType"=> "full_numbers",
                'order'   => [[0, 'desc']],
                'language'=>[
                    'search'=>"_INPUT_",
                    "searchPlaceholder"=>"Search records"
                ],
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
            'surname',
            'firstname',
            'middlename',
            'gender',
            'national_id'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'master_filesdatatable_' . time();
    }
}