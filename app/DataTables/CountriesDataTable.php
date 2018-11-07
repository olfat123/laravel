<?php

namespace App\DataTables;

use App\Country;
use Yajra\DataTables\Services\DataTable;

class CountriesDataTable extends DataTable
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
            ->addColumn('action', 'Countriesdatatable.action')
            ->rawColumns([
                'action'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Country $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Country $model)
    {
        return $model->newQuery()->select('id', 'country_name_ar', 'country_name_en','mob','code','logo', 'created_at', 'updated_at');
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
                            ['text' => '<i class="fa fa-plus"></i>  Add Country </a>','className' =>'btn btn-info','action'=>"function(){

                            	window.location.href='".\URL::current()."/create';
                            }"],
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
                'name'=>'id',
                'data'=>'id',
                'title'=>'ID'
            ],
            [
                'name'=>'country_name_ar',
                'data'=>'country_name_ar',
                'title'=>'Arabic Name'
            ],
            [
                'name'=>'country_name_en',
                'data'=>'country_name_en',
                'title'=>'English Name'
            ],
            [
                'name'=>'mob',
                'data'=>'mob',
                'title'=>'Mob'
            ], 
            [
                'name'=>'code',
                'data'=>'code',
                'title'=>'Code'
            ], 
            [
                'name'=>'logo',
                'data'=>'logo',
                'title'=>'Logo'
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
        return 'Countries_' . date('YmdHis');
    }
}
