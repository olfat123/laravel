<?php

namespace App\DataTables;

use App\Model\product;
use Yajra\DataTables\Services\DataTable;

class ProductsDataTable extends DataTable
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
            ->addColumn('action', 'Productsdatatable.action')
            ->rawColumns([
                'action'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
    {
        return $model->newQuery()->select('id', 'Name', 'Price','Image','category_id', 'created_at', 'updated_at');
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
                            ['text' => '<i class="fa fa-plus"></i>  Add Product ','className' =>'btn btn-info','action'=>"function(){

                            	window.location.href='".\URL::current()."/create';
                            }"],
                        ],
                        'initComplete' => 'function () {
                            this.api().columns([0,1,2,3,4]).every(function () {
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
                'name'=>'Name',
                'data'=>'Name',
                'title'=>'Name'
            ],
            [
                'name'=>'Price',
                'data'=>'Price',
                'title'=>'Price'
            ],
            [
                'name'=>'Image',
                'data'=>'Image',
                'title'=>'Image'
            ],
            [
                'name'=>'category_id',
                'data'=>'category_id',
                'title'=>'category_id'
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
        return 'Products_' . date('YmdHis');
    }
}
