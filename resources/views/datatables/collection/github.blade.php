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
                    <th>Url</th>
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
        $repositories = \Cache::get('repositories', function() use($request) {
            $client = new \GuzzleHttp\Client();
            $response = $client->get('https://api.github.com/repositories');
            $repositories = $response->json();
            \Cache::put('repositories', $repositories, 5);
            return $repositories;
        });

        $data = new Collection($repositories);

        return Datatables::of($data)->make(true);
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
            {data: 'private', name: 'private'},
            {data: 'url', name: 'url'}
        ]
    });
@endsection
