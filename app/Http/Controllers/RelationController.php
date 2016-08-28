<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class RelationController extends Controller
{
    /**
     * @var \Yajra\Datatables\Datatables
     */
    private $dataTable;

    /**
     * RelationController constructor.
     *
     * @param \Yajra\Datatables\Datatables $dataTable
     */
    public function __construct(Datatables $dataTable)
    {
        $this->dataTable = $dataTable;
    }

    public function getHasOne(Request $request)
    {
        if ($request->ajax()) {
            $query = User::with('onePost')->select('users.*');

            return $this->dataTable
                    ->eloquent($query)
                    ->addColumn('title', function (User $user) {
                        return $user->onePost ? str_limit($user->onePost->title, 30, '...') : '';
                    })
                    ->make(true);
        }

        return view('datatables.relation.has-one', [
            'title' => 'Has One Demo',
            'controller' => 'Relation Controller',
        ]);
    }
}
