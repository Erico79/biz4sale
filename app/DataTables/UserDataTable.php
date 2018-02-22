<?php

namespace App\DataTables;

use App\Models\User;
use function foo\func;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UserDataTable extends DataTable
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

        return $dataTable->addColumn('action', function(User $user){
            if($user->account_status){
                return '<button  action="Deactivate" url="'.url('activatedeactivate',$user->id).'" class="btn btn-xs btn-danger act-deact">Deactivate</button>';
            }else{
                return '<button action="Activate" url="'.url('activatedeactivate',$user->id).'" class="btn btn-xs btn-success act-deact">Activate</button>';
            }
        })
            ->editColumn('email_confirmed',function(User $user){
                if($user->email_confirmed){
                    return '<button class="btn btn-xs btn-success">Yes</button>';
                }else{
                    return '<button class="btn btn-xs btn-warning">No</button>';

                }
            })
            ->editColumn('account_status',function(User $user){
                if($user->account_status){
                    return '<button class="btn btn-xs btn-success">Active</button>';
                }else{
                    return '<button class="btn btn-xs btn-warning">Blocked</button>';
                }
            })
//            ->editColumn('status',['title'=>'Account status'])
            ->rawColumns(['action','email_confirmed','account_status'])
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->with('role');
//        return User::with('role')->get();
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
            ->addAction()
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
            'name',
            'email',
            'role.name',
            'email_confirmed',
            'account_status',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'usersdatatable_' . time();
    }
}