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
    public function getObject()
    {
        return view('datatables.collection.object');
    }

    public function getObjectData()
    {
        $faker = Faker::create();
        $data  = [];
        for ($i = 0; $i < 100; $i++) {
            $obj = new \stdClass;
            $obj->id = $i + 1;
            $obj->name = $faker->name;
            $obj->email = $faker->email;
            $obj->created_at = Carbon::now();
            $obj->updated_at = Carbon::now();
            $data[] = $obj;
        }
        $users = new Collection($data);

        return Datatables::of($users)->make(true);
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("collection/object-data") }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at.date', name: 'created_at'},
            {data: 'updated_at.date', name: 'updated_at'}
        ]
    });
@endsection
