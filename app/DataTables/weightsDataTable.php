<?php

namespace App\DataTables;

use App\Model\weight;
use Yajra\DataTables\Services\DataTable;

class WeightsDataTable extends DataTable
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
            ->addColumn('checkbox', 'admin.weights.btn.checkbox')
            ->addColumn('edit', '<a href="/admin/weights/{{$id}}/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>')
            ->addColumn('delete', '<a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Weight $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(weight $model)
    {
        return $model->newQuery()->select('id', 'weight_name_ar', 'weight_name_en', 'created_at', 'updated_at');
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
                        'buttons'      => [
                            ['extend' =>'print','className' =>'btn btn-primary','text'=>'print Page'],
                            
                            ['extend' =>'csv','className' =>'btn btn-info','text'=>'CSV Page'],
                            ['extend' =>'excel','className' =>'btn btn-info','text'=>'Excel Page'],
                            ['extend' =>'reload','className' =>'btn btn-info','text'=>'Reload Page'],
                            ['text' => '<i class="fa fa-plus"></i>  Add Weight ','className' =>'btn btn-info','action'=>"function(){

                            	window.location.href='".\URL::current()."/create';
                            }"],
                            ['text' => '<i class="fa fa-trash"></i>','className' =>'btn btn-danger delBtn'],
                        ]
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
                'name'=>'checkbox',
                'data'=>'checkbox',
                'title'=>'<input type="checkbox" class="check_all" onclick="check_all()"/>',
                'printable' => false,
                'exportable' => false,
                'orderable' => false,
                'searchable'=> false
            ],
            [
                'name'=>'id',
                'data'=>'id',
                'title'=>'ID'
            ],
            [
                'name'=>'weight_name_ar',
                'data'=>'weight_name_ar',
                'title'=>'Arabic Name'
            ],
            [
                'name'=>'weight_name_en',
                'data'=>'weight_name_en',
                'title'=>'English Name'
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
                'name'=>'edit',
                'data'=>'edit',
                'title'=>'Edit',
                'printable' => false,
                'exportable' => false,
                'orderable' => false,
                'searchable'=> false
            ],
            [
                'name'=>'delete',
                'data'=>'delete',
                'title'=>'Delete',
                'printable' => false,
                'exportable' => false,
                'orderable' => false,
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
        return 'Weights_' . date('YmdHis');
    }
}
