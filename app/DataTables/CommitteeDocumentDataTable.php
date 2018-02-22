<?php

namespace App\DataTables;

use App\Models\CommitteeDocument;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CommitteeDocumentDataTable extends DataTable
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

            ->editColumn('upload_date', function (CommitteeDocument $document){
                return date_format(Carbon::createFromTimestamp(strtotime($document->upload_date)),"d M Y");
            })
            ->editColumn('document_path',function(CommitteeDocument $document){

                return '<form method="post" action="'.url("download").'">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                
                            <input type="hidden" name="path" value="'.$document->document_path.'">
                            <button type="submit" class="btn btn-success btn-xs">download</button>
</form>';
            })
            ->addColumn('action', 'committee_documents.datatables_actions')
            ->rawColumns(['document_path','action'])
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CommitteeDocument $model)
    {
        return CommitteeDocument::query()
            ->select(['committee_documents.*','committee_doc_categories.name as cat_name','committees.name','sessions.session_name'])
            ->leftJoin('committee_doc_categories','committee_doc_categories.id','=','committee_documents.committee_doc_category')
            ->leftJoin('sessions','committee_documents.session_id','=','sessions.id')
            ->leftJoin('committees','committees.id','=','committee_documents.committee')
            ->orderByDesc('id')
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
            ->parameters([
                'dom'     => 'Bfrtip',
//                'order'   => [[0, 'desc']],
                'length'=>true,
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
            'session_name'=>[
                'title'=>'Session'
            ],
            'name'=>[
                'title'=>'Committee'
            ],
            'cat_name'=>[
                'title'=>'Category',
            ],
            'upload_date'=>[
                'title'=>"Uploaded on"
            ],
            'document_path'=>[
                'title'=>'Document'
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'committee_documentsdatatable_' . time();
    }
}