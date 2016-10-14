@extends('app')

@section('content')
    <h1 class="" style="">Basic Two DataTables</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                Two DataTables in a Page Implementation
                <small>Tutorial is available at <a href="{{ url('service') }}">{{ url('service') }}</a>.</small>
            </h3>
        </div>
        <div class="panel-body">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#users" role="tab" data-toggle="tab">
                            <icon class="fa fa-home"></icon>
                            Users
                        </a>
                    </li>
                    <li><a href="#posts" role="tab" data-toggle="tab" onclick="postsDataTables()">
                            <i class="fa fa-user"></i> Posts
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="users">
                        <div>
                            {!! $dataTable->table(['class' => 'table table-bordered table-condensed']) !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="posts">
                        <table class="table table-bordered table-condensed" id="postsTable">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="lead">routes.php</h3>
            <pre><code>Route::get('services/two-datatables', 'ServiceController@getUsersDataTables');
Route::get('services/two-datatables/posts','ServiceController@getPostsDataTables');</code></pre>
            <h3 class="lead">ServiceController.php</h3>
            <pre><code>public function getUsersDataTables(UsersDataTable $dataTable){
    return $dataTable->render('datatables.service.two-datatables');
}</code></pre>
            <pre><code>public function getPostsDataTables(PostsDataTable $postsDataTable){
    return $postsDataTable->render('datatables.service.two-datatables');
}</code></pre>
            <h3 class="lead">PostsDataTable.php</h3>
            <pre><code>use App\Post;

public function ajax()
{
    return $this->datatables
    ->eloquent($this->query())
    ->make(true);
}</code></pre>
<pre><code>public function query(){
    $users = Post::query()
            ->select([
                'posts.id as id',
                'posts.title as title',
                'posts.created_at as created_at',
                'posts.updated_at as updated_at',
                'users.name as created_by'
            ])
            ->leftJoin('users', 'posts.user_id', '=', 'users.id');

    return $users;
}</code></pre>
            <h3 class="lead">two-datatables.blade.php</h3>
            <pre><code>{{
'<div class="tabs">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#users" role="tab" data-toggle="tab">
                <icon class="fa fa-home"></icon>Users
            </a>
        </li>
        <li>
            <a href="#posts" role="tab" data-toggle="tab" onclick="postsDataTables()">
                <i class="fa fa-user"></i>Posts
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="users">
            {!!$dataTable->table([\'class\' => \'table table-bordered table-condensed\'])!!}
        </div>
        <div class="tab-pane fade" id="posts">
            <table class="table table-bordered table-condensed" id="postsTable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>'
                        }}</code></pre>
            <h3 class="lead">Javascript</h3>
            <pre><code>function postsDataTables() {
    if (!$.fn.dataTable.isDataTable('#postsTable')) {
        $('#postsTable').DataTable({
            dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            order: [[0, 'desc']],
            buttons: [
                'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
            ],
            ajax: '/services/two-datatables/posts',
            columns: [
                {data: 'id', name: 'posts.id'},
                {data: 'title', name: 'posts.title'},
                {data: 'created_by', name: 'users.name', width: '110px'},
                {data: 'created_at', name: 'posts.created_at', width: '120px'},
                {data: 'updated_at', name: 'posts.updated_at', width: '120px'},
            ],
            order: [[0, 'desc']]
        });
    }
}</code></pre>

        </div>
    </div>
@endsection

@push('scripts')
<link rel="stylesheet" href="/js/buttons/css/buttons.dataTables.css">
<script src="/js/buttons/js/dataTables.buttons.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
<script>
    function postsDataTables() {
        if (!$.fn.dataTable.isDataTable('#postsTable')) {
            $('#postsTable').DataTable({
                dom: 'Bfrtip',
                processing: true,
                serverSide: true,
                order: [[0, 'desc']],
                buttons: [
                    'csv', 'excel', 'pdf', 'print', 'reset', 'reload'
                ],
                ajax: '/services/two-datatables/posts',
                columns: [
                    {data: 'id', name: 'posts.id'},
                    {data: 'title', name: 'posts.title'},
                    {data: 'created_by', name: 'users.name', width: '110px'},
                    {data: 'created_at', name: 'posts.created_at', width: '120px'},
                    {data: 'updated_at', name: 'posts.updated_at', width: '120px'},
                ],
                order: [[0, 'desc']]
            });
        }
    }
</script>
@stop
