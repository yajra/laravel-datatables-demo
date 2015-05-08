@extends('datatables.template')

@section('demo')
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
    public function getBasic()
    {
        return view('datatables.eloquent.basic');
    }

    public function getBasicData()
    {
        $users = User::select(['id','name','email','created_at','updated_at']);

        return Datatables::of($users)->make();
    }
@endsection

@section('js')
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url("eloquent/basic-data") }}'
        });
    });
@endsection
