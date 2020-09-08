<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Lokets;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class LoketsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.lokets.datatables_actions')
        ->editColumn('image', function ($loket) 
        {  return '<img src='.$loket->image.' height="80px"/>'; })
            ->rawColumns(['image','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Lokets $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Lokets $model)
    {
        return $model->newQuery()
        ->with('host')
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
            'image',
            'description',
            'schedule',
            'quota',
            'host' => ['name' => 'host.title', 'data' => 'host.title', 'defaultContent'=> '', 'searchable'=>false],        
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
        return 'lokets_datatable_' . time();
    }
}
