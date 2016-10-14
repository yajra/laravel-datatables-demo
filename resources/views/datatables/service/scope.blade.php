@extends('app')

@section('content')
    <h1 class="" style="">Service Scope Implementation</h1>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                DataTables Service Implementation with Scope
                <small>Tutorial is available at <a href="{{ url('service') }}">{{ url('service') }}</a>.</small>
            </h3>
        </div>
        <div class="panel-body">
            {!! $dataTable->table(['class' => 'table table-bordered table-condensed']) !!}
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <h3>CREATING A SCOPE.</h3>
            <pre><code>php artisan datatables:scope UserDataTableScope</code></pre>
            <pre><code>namespace App\DataTables\Scopes;

use Yajra\Datatables\Contracts\DataTableScopeContract;

class UserDataTableScope implements DataTableScopeContract
{
    public function apply($query)
    {
        return $query->whereBetween('id', [500, 550]);
    }
}
</code></pre>
            
            <h3>APPLYING A SCOPE</h3>
            <pre><code>public function getUsers(UsersDataTable $dataTable)
{
    return $dataTable->addScope(new UserDataTableScope)->render('path.to.view');
}
</code></pre>
        </div>
    </div>
@endsection

@push('scripts')
<link rel="stylesheet" href="/js/buttons/css/buttons.dataTables.css">
<script src="/js/buttons/js/dataTables.buttons.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
@stop
