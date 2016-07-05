<?php

namespace App\DataTables;

use App\Post;
use Yajra\Datatables\Services\DataTable;

class PostsDataTable extends DataTable
{
    // protected $printPreview  = 'path.to.print.preview.view';

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $users = Post::query()
                     ->select([
                         'posts.id as id',
                         'posts.title as title',
                         'posts.created_at as created_at',
                         'posts.updated_at as updated_at',
                         'users.name as created_by',
                     ])
                     ->leftJoin('users', 'posts.user_id', '=', 'users.id');

        return $users;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns([
                        'posts.id' => ['title' => 'Id'],
                        'posts.title' => ['title' => 'Title'],
                        'created_by' => ['name' => 'users.name'],
                        'posts.created_at' => ['title' => 'Created At'],
                        'posts.updated_at' => ['title' => 'Updated At'],
                    ]);
    }
}
