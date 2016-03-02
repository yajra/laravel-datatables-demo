<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Http\Requests;

class ButtonsController extends Controller
{

    public function getIndex(UsersDataTable $dataTable)
    {
        return $dataTable->render('datatables.buttons.basic');
    }

    public function getTutorial()
    {
        return view('datatables.buttons.tutorial');
    }
}
