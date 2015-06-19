@extends('datatables.template')

@section('demo')
    {!! $datatables->table() !!}
@endsection

@section('controller')
    use yajra\Datatables\Html\Builder; // import class on controller

    public function getBasic(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            return Datatables::of(User::select(['id', 'name', 'email', 'created_at', 'updated_at']))->make(true);
        }

        $datatables = $htmlBuilder
            ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'Id'])
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Name'])
            ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Email'])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'])
            ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated At']);

        return view('datatables.html.method', compact('datatables'));
    }
@endsection

@section('extra')
    <h3 class="lead">Html Builder Usage on View</h3>
    <ul>
        <li>
            <h4>Generate the table</h4>
            <pre><code>@{!! $datatables->table() !!}</code></pre>
        </li>
        <li>
            <h4>Generate the scripts</h4>
            <pre><code>@{!! $datatables->scripts() !!}</code></pre>
        </li>
    </ul>
@stop

@section('js')
    {!! $datatables->generateScripts() !!}
@endsection
