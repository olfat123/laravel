<?php

namespace App\DataTables;

use App\User;
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
        return datatables($query)
            ->addColumn('action', 'usersdatatable.action')
            ->rawColumns([
                'action'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->select('id', 'name', 'email', 'created_at', 'updated_at');
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
                   // ->addAction(['width' => '80px'])
                    //->parameters($this->getBuilderParameters());
                    ->parameters([
                        'dom'       => 'Blfrtip',
                        'lengthMenu'=> [[10, 25, 50, 100,-1], [10, 25, 50, 100, 'All Rercords']],
                        'buttons'      => ['pdf', 'print', 'reset', 'reload', 'postExcel', 'postCsv', 'postPdf'],
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
            [
                'name'=>'id',
                'data'=>'id',
                'title'=>'ID'
            ],
            [
                'name'=>'name',
                'data'=>'name',
                'title'=>'Name'
            ],
            [
                'name'=>'email',
                'data'=>'email',
                'title'=>'Email'
            ],
            [
                'name'=>'created_at',
                'data'=>'created_at',
                'title'=>'created at'
            ],            
            [
                'name'=>'updated_at',
                'data'=>'updated_at',
                'title'=>'Updated at'
            ],
            [
                'name'=>'action',
                'data'=>'action',
                'title'=>'Actions',
                'printable' => false,
                'exportable' => false,
                'sortable' => false,
                'searchable'=> false
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
        return 'Users_' . date('YmdHis');
    }
}
