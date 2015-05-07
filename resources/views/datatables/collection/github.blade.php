@extends('datatables.template')

@section('demo')
<div class="row">
    <div class="col-md-12">
        <table id="datatable" class="table table-condensed">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Repo</th>
                    <th>Owner</th>
                    <th>Description</th>
                    <th>Private</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
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
        $repositories = \Cache::get($keyword, function() use($keyword) {
            $client = new \GuzzleHttp\Client();
            $response = $client->get('https://api.github.com/search/repositories', [
                    'query' => ['q' => $keyword]
                ]);
            $repositories = $response->json();
            \Cache::put($keyword, $repositories, 1);

            return $repositories;
        });

        $data = new Collection($repositories['items']);

        return Datatables::of($data)
            ->editColumn('full_name', function($row) {
                return \HTML::link($row['url'], $row['full_name']);
            })
            ->editColumn('private', function($row) {
                return $row['private'] ? 'Y' : 'N';
            })
            ->filter(function(){}) // disable built-in search function
            ->make(true);
    }
@endsection

@section('js')
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("collection/github-data") }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'full_name', name: 'full_name'},
            {data: 'owner.login', name: 'owner.login'},
            {data: 'description', name: 'description'},
            {data: 'private', name: 'private'}
        ]
    });
@endsection
