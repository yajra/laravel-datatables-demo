<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Carbon\Carbon;
use Datatables;
use DB;
use Illuminate\Http\Request;

class FluentController extends Controller
{
    public function __construct()
    {
        view()->share('controller', 'FluentController.php');
        view()->share('title', $this->getTitle('fluent'));
        view()->share('description', $this->getDescription('fluent'));
    }

    public function getIndex()
    {
        return view('datatables.fluent.index');
    }

    public function getBasic()
    {
        return view('datatables.fluent.basic');
    }

    public function getBasicData()
    {
        $users = DB::table('users')->select(['id', 'name', 'email', 'created_at', 'updated_at']);

        return Datatables::of($users)->make();
    }

    public function getUnion()
    {
        return view('datatables.fluent.union');
    }

    public function getUnionData()
    {
        $first = DB::table('users')
            ->select(['id', 'name', 'email', 'created_at', 'updated_at'])
            ->where('name', 'like', '%jon%');

        $users = DB::table('users')
            ->select(['id', 'name', 'email', 'created_at', 'updated_at'])
            ->where('name', 'like', '%sus%')
            ->union($first);

        return Datatables::of($users)->make(true);
    }

    public function getBasicObject()
    {
        return view('datatables.fluent.basic-object');
    }

    public function getBasicObjectData()
    {
        $users = DB::table('users')->select(['id', 'name', 'email', 'created_at', 'updated_at']);

        return Datatables::of($users)->make(true);
    }

    public function getAddEditRemoveColumn()
    {
        return view('datatables.fluent.add-edit-remove-column');
    }

    public function getAddEditRemoveColumnData()
    {
        $users = DB::table('users')
            ->select(['id', 'name', 'email', 'password', 'created_at', 'updated_at']);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="#edit-'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')
            ->make(true);
    }

    public function getDtRow()
    {
        return view('datatables.fluent.dt-row');
    }

    public function getDtRowData()
    {
        $users = DB::table('users')
            ->select(['id', 'name', 'email', 'password', 'created_at', 'updated_at']);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="#edit-'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->editColumn('id', '{{$id}}')
            ->removeColumn('password')
            ->setRowId('id')
            ->setRowClass(function ($user) {
                return $user->id % 2 == 0 ? 'alert-success' : 'alert-warning';
            })
            ->setRowData([
                'id' => 'test',
            ])
            ->setRowAttr([
                'color' => 'red',
            ])
            ->make(true);
    }

    public function getCustomFilter()
    {
        return view('datatables.fluent.custom-filter');
    }

    public function getCustomFilterData(Request $request)
    {
        $users = DB::table('users')->select(['id', 'name', 'email', 'created_at', 'updated_at']);

        return Datatables::of($users)
            ->filter(function ($query) use ($request) {
                if ($request->has('name')) {
                    $query->where('name', 'like', "%{$request->get('name')}%");
                }

                if ($request->has('email')) {
                    $query->where('email', 'like', "%{$request->get('email')}%");
                }
            })
            ->make(true);
    }

    public function getCarbon()
    {
        return view('datatables.fluent.carbon');
    }

    public function getCarbonData()
    {
        $users = DB::table('users')->select(['id', 'name', 'email', 'created_at', 'updated_at']);

        return Datatables::of($users)
            ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at ? with(new Carbon($user->updated_at))->format('Y/m/d') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%Y/%m/%d') like ?", ["%$keyword%"]);
            })
            ->make(true);
    }

    public function getJoins()
    {
        return view('datatables.fluent.joins');
    }

    public function getJoinsData()
    {
        $posts = DB::table('posts')->join('users', 'posts.user_id', '=', 'users.id')
            ->select(['posts.id', 'posts.title', 'users.name', 'users.email', 'posts.created_at', 'posts.updated_at']);

        return Datatables::of($posts)
            ->editColumn('title', '{!! str_limit($title, 60) !!}')
            ->editColumn('name', function ($model) {
                return \HTML::mailto($model->email, $model->name);
            })
            ->make(true);
    }

    public function getMultiFilterSelect()
    {
        return view('datatables.fluent.multi-filter-select');
    }

    public function getMultiFilterSelectData()
    {
        $users = DB::table('users')->select(['id', 'name', 'email', 'created_at', 'updated_at']);

        return Datatables::of($users)->make(true);
    }

    public function getAdvanceFilter()
    {
        return view('datatables.fluent.advance-filter');
    }

    public function getAdvanceFilterData(Request $request)
    {
        $users = DB::table('users')->select([
                DB::raw("CONCAT(users.id,'-',users.id) as id"),
                'users.name',
                'users.email',
                DB::raw('count(posts.user_id) AS count'),
                'users.created_at',
                'users.updated_at'
        ])->leftJoin('posts', 'posts.user_id', '=', 'users.id')
        ->groupBy('users.id');

        $datatables =  Datatables::of($users);
        if ($request->get('post')) {
            $datatables->having('count', $request->get('operator'), $request->get('post')); // having count search
        }

        if ($name = $request->get('name')) {
            $datatables->where('users.name', 'like', "$name%"); // additional users.name search
        }

        // Global search function
        if ($keyword = $request->get('search')['value']) {
            // override users.name global search
            $datatables->filterColumn('users.name', 'where', 'like', "$keyword%");

            // override users.id global search - demo for concat
            $datatables->filterColumn('users.id', 'whereRaw', "CONCAT(users.id,'-',users.id) like ? ", ["%$keyword%"]);
        }

        return $datatables->make(true);
    }

    public function getIoc()
    {
        return view('datatables.fluent.ioc');
    }

    public function getIocData()
    {
        $users      = DB::table('users')->select(['id', 'name', 'email', 'created_at', 'updated_at']);
        $datatables = app('datatables');

        return $datatables->queryBuilder($users)->make(true);
    }
}
