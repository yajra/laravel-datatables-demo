@extends('datatables.template')

@section('demo')
<table id="datatable" class="table table-condensed">
    <thead>
        <tr>
            <th>Stars</th>
            <th>Repo</th>
            <th>Owner</th>
            <th>Description</th>
            <th>Private</th>
        </tr>
    </thead>
</table>
@endsection

@section('controller')
    public function getGithub()
    {
        return view('datatables.collection.github');
    }

    public function getGithubData()
    {
        $search = $request->get('search');
        $keyword = $search['value']?: 'laravel';
        $repositories = Cache::get($keyword, function() use($keyword) {
            $client = new \GuzzleHttp\Client();
            $response = $client->get('https://api.github.com/search/repositories', [
                    'query' => ['q' => $keyword]
                ]);
            $repositories = $response->json();
            Cache::put($keyword, $repositories, 10);

            return $repositories;
        });

        $data = new Collection($repositories['items']);

        return Datatables::of($data)
            ->editColumn('stargazers_count', function($row) {
                return '&ltdiv class="input-group input-group-sm"&gt
                            &ltspan class="input-group-addon"&gt&lti class="glyphicon glyphicon-star"&gt&lt/i&gt&lt/span&gt
                            &ltinput type="text" class="form-control" style="width:64px" readonly
                                value="'. number_format($row['stargazers_count'] , 0) .'"&gt
                        &lt/div&gt';
            })
            ->editColumn('full_name', function($row) {
                return HTML::link($row['html_url'], $row['full_name']);
            })
            ->editColumn('private', function($row) {
                return $row['private'] ? 'Y' : 'N';
            })
            ->filter(function(){}) // disable built-in search function
            ->make(true);
    }
@endsection

@section('js')
    $('#datatable').dataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("collection/github-data") }}',
        columns: [
            {data: 'stargazers_count', name: 'stargazers_count'},
            {data: 'full_name', name: 'full_name'},
            {data: 'owner.login', name: 'owner.login', orderable: false, searchable: false},
            {data: 'description', name: 'description'},
            {data: 'private', name: 'private'}
        ],
        order: [[0, 'desc']],
        displayLength: -1
    }).fnFilterOnReturn();
@endsection
