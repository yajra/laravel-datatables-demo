<?php namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;

class ButtonsController extends Controller
{

    public function getIndex(UsersDataTable $dataTable)
    {
        return $dataTable->render('datatables.buttons.basic');
    }

}
