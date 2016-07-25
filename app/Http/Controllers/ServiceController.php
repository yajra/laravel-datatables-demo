<?php

namespace App\Http\Controllers;

use App\DataTables\PostsDataTable;
use App\DataTables\Scopes\UserDataTableScope;
use App\DataTables\UsersDataTable;

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

    public function getUsersDataTables(UsersDataTable $dataTable)
    {
        return $dataTable->render('datatables.service.two-datatables');
    }

    public function getPostsDataTables(PostsDataTable $postsDataTable)
    {
        return $postsDataTable->render('datatables.service.two-datatables');
    }

    public function getUsersWithFooter(UsersDataTable $dataTable)
    {
        $title = 'Service implementation with footer column search.';

        return $dataTable->render('datatables.service.footer', compact('title'));
    }
}
