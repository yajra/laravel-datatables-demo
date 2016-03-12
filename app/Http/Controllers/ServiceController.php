<?php

namespace App\Http\Controllers;

use App\DataTables\Scopes\UserDataTableScope;
use App\DataTables\UsersDataTable;
use App\Http\Requests;

class ServiceController extends Controller
{
    public function getBasic(UsersDataTable $dataTable)
    {
        return $dataTable->render('datatables.service.basic');
    }

    public function getScope(UsersDataTable $dataTable)
    {
        return $dataTable->addScope(new UserDataTableScope)->render('datatables.service.scope');
    }
}
