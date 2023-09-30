<?php

namespace App\DataTables;

use App\Models\MasterTransaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MasterTransactionDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->editColumn('product_id', function ($query) {
                return ($query->product_id) ? $query->product->product_name . ' (' . $query->product->product_code . ')' : "-";
            })
            ->editColumn('created_at', function ($query) {
                return Carbon::parse($query->created_at)->format('d M, Y H:i');
            })
            ->editColumn('updated_at', function ($query) {
                return Carbon::parse($query->updated_at)->format('d M, Y H:i');
            })
            ->addColumn('action', function ($data) {
                $action = '';
                $action = '<a type="button" data-id=' . $data->id . ' data-type="edit" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto me-1 edit-data" data-bs-toggle="modal"
                data-bs-target="#kt-modal-edit-product" data-bs-toggle="tooltip" title="Edit"><i class="ki-solid ki-setting-3 fs-3"></i></a>';
                $action .= '<a href="javascript:void(0)" data-id=' . $data->id . ' class="btn btn-icon btn-active-light-danger w-30px h-30px ms-auto me-1 destroy-data" data-bs-toggle="tooltip" title="Delete"><i class="ki-solid ki-trash fs-3"></i></a>';
                return $action;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Master\MasterTransaction $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MasterTransaction $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('id', 'desc');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('master-transaction-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->postAjax([
                'data' => 'function(d) {
                            d._token = "' . csrf_token() . '";
                        }',
            ])
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(1)
            ->drawCallback("function() { KTMenu.createInstances(); }");
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('#')->searchable(false)->orderable(false),
            // Column::make('id'),
            Column::make('transaction_name')->title('Transaction Name'),
            Column::make('order_number')->title('Order Number'),
            Column::make('order_date')->title('Order Date')->searchable(false),
            Column::make('product_id')->title('Product'),
            Column::make('amount')->title('Amount'),
            Column::make('total_price')->title('Total Price'),
            Column::make('created_at')->searchable(false),
            Column::make('updated_at')->searchable(false),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center')->responsivePriority(-1),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'MasterTransaction_' . date('YmdHis');
    }
}
