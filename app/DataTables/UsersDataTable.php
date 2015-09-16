<?php

namespace App\DataTables;

use App\User;
use yajra\Datatables\Services\DataTableAbstract;
use yajra\Datatables\Services\DataTableInterface;

class UsersDataTable extends DataTableAbstract implements DataTableInterface
{

//    protected $printPreview = 'print-users-table';
//    protected $exportColumns = ['id', 'name'];

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->editColumn('created_at', '{{ $created_at->diffForHumans() }}')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $users = User::select();

        return $users;
    }

    public function html()
    {
        return $this->datatables
            ->getHtmlBuilder()
            ->columns([
                'id',
                'name',
                'email',
                'created_at',
                'updated_at',
            ])
            ->parameters([
                'dom'     => 'Bfrtip',
                'buttons' => ['csv', 'excel', 'pdf', 'print'],
            ]);
    }
}
