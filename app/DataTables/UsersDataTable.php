<?php

namespace App\DataTables;

use App\User;
use yajra\Datatables\Services\DataTable;

class UsersDataTable extends DataTable
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
            ->of($this->query())
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

        return $this->applyScopes($users);
    }

    /**
     * Get html builder.
     *
     * @return \yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
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
