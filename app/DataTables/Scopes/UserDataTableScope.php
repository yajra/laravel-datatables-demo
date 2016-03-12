<?php

namespace App\DataTables\Scopes;

use Yajra\Datatables\Contracts\DataTableScopeContract;

class UserDataTableScope implements DataTableScopeContract
{
    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
         return $query->whereBetween('id', [500, 550]);
    }
}
