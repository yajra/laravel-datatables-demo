<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
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
            'title'      => 'Has One Demo',
            'controller' => 'RelationController.php',
        ]);
    }

    public function getHasMany(Request $request)
    {
        if ($request->ajax()) {
            $query = User::with('posts')->select('users.*');

            return $this->dataTable
                ->eloquent($query)
                ->addColumn('title', function (User $user) {
                    return $user->posts->map(function ($post) {
                        return str_limit($post->title, 30, '...');
                    })->implode('<br>');
                })
                ->make(true);
        }

        return view('datatables.relation.has-many', [
            'title'      => 'Has Many Demo',
            'controller' => 'RelationController.php',
        ]);
    }

    public function getBelongsToMany(Request $request)
    {
        if ($request->ajax()) {
            $query = User::with('blogs')->selectRaw('distinct users.*');

            return $this->dataTable
                ->eloquent($query)
                ->addColumn('title', function (User $user) {
                    return $user->blogs->map(function ($blog) {
                        return str_limit($blog->title, 30, '...');
                    })->implode('<br>');
                })
                ->make(true);
        }

        return view('datatables.relation.belongs-to-many', [
            'title'      => 'Belongs To Many Demo',
            'controller' => 'RelationController.php',
        ]);
    }

    public function getBelongsTo(Request $request)
    {
        if ($request->ajax()) {
            $query = Post::with('user')->select('posts.*');

            return $this->dataTable->eloquent($query)->make(true);
        }

        return view('datatables.relation.belongs-to', [
            'title'      => 'Model Belongs To Demo',
            'controller' => 'RelationController.php',
        ]);
    }

    public function getMorphToMany(Request $request)
    {
        if ($request->ajax()) {
            $query = Post::with('tags')->select('posts.*');

            return $this->dataTable->eloquent($query)
                ->addColumn('tags', function (Post $post) {
                    return $post->tags->pluck('name')->implode('<br>');
                })
                ->make(true);
        }

        return view('datatables.relation.morph-to-many', [
            'title'      => 'Morph To Many Demo',
            'controller' => 'RelationController.php',
        ]);
    }
}
