<?php

namespace App\DataTables;

use App\Model\City;
use Yajra\DataTables\Services\DataTable;

class CitiesDataTable extends DataTable
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
            ->addColumn('edit', '<a href="/admin/cities/{{$id}}/edit" class="btn btn-info"><i class="fa fa-edit"></i></a>')
            ->addColumn('delete', '<a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>')
            ->rawColumns([
                'edit',
                'delete'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Country $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(City $model)
    {
        return City::query()->with('country_id')->select('cities.*');

        //$model->newQuery()->select('id', 'city_name_ar', 'city_name_en','country_id', 'created_at', 'updated_at');
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
                            ['text' => '<i class="fa fa-plus"></i>  Add City </a>','className' =>'btn btn-info','action'=>"function(){

                            	window.location.href='".\URL::current()."/create';
                            }"],
                          ],
                            'initComplete' => 'function () {
                                this.api().columns([1,2,3]).every(function () {
                                var column = this;
                                var input = document.createElement("input");
                                $(input).appendTo($(column.footer()).empty())
                                .on(\'keyup\', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                        }',
                        'language' => [ 
                            "sProcessing" => __('admin.sProcessing'),
                            "sLengthMenu" => __('admin.sLengthMenu'),
                            "sZeroRecords" => __('admin.sZeroRecords'),
                            "sEmptyTable" => __('admin.sEmptyTable'),
                            "sInfo" => __('admin.sInfo'),
                            "sInfoEmpty" => __('admin.sInfoEmpty'),
                            "sInfoFiltered" => __('admin.sInfoFiltered'),
                            "sInfoPostFix" => __('admin.sInfoPostFix'),
                            "sSearch" => __('admin.sSearch'),
                            "sUrl" => __('admin.sUrl'),
                            "sInfoThousands" => __('admin.sInfoThousands'),
                            "sLoadingRecords" => __('admin.sLoadingRecords'),
                            "oPaginate" => [
                                "sFirst" => __('admin.sFirst'),
                                "sLast" => __('admin.sLast'),
                                "sNext" => __('admin.sNext'),
                                "sPrevious" => __('admin.sPrevious')
                            ],
                            "oAria" => [
                                "sSortAscending" => __('admin.sSortAscending'),
                                "sSortDescending" => __('admin.sSortDescending')
                            ]
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
                'name'=>'city_name_ar',
                'data'=>'city_name_ar',
                'title'=>'Arabic Name'
            ],
            [
                'name'=>'city_name_en',
                'data'=>'city_name_en',
                'title'=>'English Name'
            ],
            [
                'name'=>'country_id.country_name_'.session('lang'),
                'data'=>'country_id.country_name_'.session('lang'),
                'title'=>'Country'
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
                'sortable' => false,
                'searchable'=> false
            ],
            [
                'name'=>'delete',
                'data'=>'delete',
                'title'=>'Delete',
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
        return 'Cities_' . date('YmdHis');
    }
}
