@extends('datatables.template')

@section('demo')
<br/>
<div class="alert alert-info">
    <p><strong>Heads Up!</strong> Data used here are random using faker. Filtering/sorting results data will be on a luck basis</p>
</div>
<table id="users-table" class="table table-condensed">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
</table>
@endsection

@section('controller')
    public function getArray()
    {
        return view('datatables.collection.array');
    }

    public function getArrayData()
    {
        $users = new Collection;
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            $users->push([
                'id'         => $i + 1,
                'name'       => $faker->name,
                'email'      => $faker->email,
                'created_at' => Carbon::now()->format('m-d-Y'),
                'updated_at' => Carbon::now()->format('m-d-Y'),
            ]);
        }

        return Datatables::of($users)->make(true);
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("collection/array-data") }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'}
        ]
    });
@endsection
