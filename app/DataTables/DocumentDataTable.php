<?php

namespace App\DataTables;

use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class DocumentDataTable extends DataTable
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
            ->editColumn('name',function(Document $document){
                return str_plural($document->name);
            })
            ->editColumn('upload_date', function (Document $document){
                return date_format($document->upload_date,"d M Y");
            })
            ->editColumn('document_path',function(Document $document){

                return '<form method="post" action="'.url("download").'">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                
                            <input type="hidden" name="path" value="'.$document->document_path.'">
                            <button type="submit" class="btn btn-success btn-xs">download</button>
</form>';
            })
            ->addColumn('action', 'documents.datatables_actions')
            ->rawColumns(['document_path','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Document $model)
    {
        return Document::query()
            ->select(['documents.*','sessions.session_name','document_categories.category_name','roles.name'])
            ->leftJoin('document_categories','documents.document_category','=','document_categories.id')
            ->leftJoin('roles','documents.user_group','=','roles.id')
            ->leftJoin('sessions','documents.session_id','=','sessions.id')
            /*->with([
            'session',
//            'dCategory'
        ])*/
            ;
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
            ->addAction(['width' => '80px'])
//                ->addColumnBefore([
//                    'title'=>'Session',
//                'data'=>'session.session_name'
//            ])
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
            'session_name'=>[
                'title'=>'Session'
            ],
//            'session.session_name',
            'category_name'=>[
                'title'=>'Document category'
            ],
            'name'=>[
                'title'=>'User group',
            ],
            'upload_date'=>[
                'title'=>'Uploaded on'
            ],
            'document_path'=>[
                'title'=>'Document'
            ]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'documentsdatatable_' . time();
    }
}