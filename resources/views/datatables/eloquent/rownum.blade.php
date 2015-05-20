@extends('datatables.template')

@section('demo')
<table id="users-table" class="table table-condensed">
    <thead>
    <tr>
        <th>Rank</th>
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
    public function getRowNum()
    {
        return view('datatables.eloquent.rownum');
    }

    public function getRowNumData(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $users = User::select([
            DB::raw('@rownum := @rownum + 1 AS rownum'),
            'id',
            'name',
            'email',
            'created_at',
            'updated_at']);
        $datatables = Datatables::of($users);

        if ($keyword = $request->get('search')['value']) {
            $datatables->filterColumn('rownum', 'whereRaw', '@rownum + 1 like ?', ["%{$keyword}%"]);
        }

        return $datatables->make(true);
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url("eloquent/row-num-data") }}',
        columns: [
            // or just disable search since it's not really searchable. just add searchable:false
            {data: 'rownum', name: 'rownum'},
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'updated_at', name: 'updated_at'}
        ]
    });
@endsection
