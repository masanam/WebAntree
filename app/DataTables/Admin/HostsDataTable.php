<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Hosts;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class HostsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.hosts.datatables_actions')
        ->editColumn('image', function ($host) 
        {  return '<img src='.$host->image.' height="80px"/>'; })
            ->rawColumns(['image','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Hosts $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Hosts $model)
    {
        return $model->newQuery()
        ->with('category')
        ->with('status');
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
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
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
            'title',
            'contact',
            'email',
            'phone',
            'city',
            'image',
            'description',
            'category' => ['name' => 'category.title', 'data' => 'category.title', 'defaultContent'=> '', 'searchable'=>false],        
            'status' => ['name' => 'status.title', 'data' => 'status.title', 'defaultContent'=> '', 'searchable'=>false]        
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'hosts_datatable_' . time();
    }
}
