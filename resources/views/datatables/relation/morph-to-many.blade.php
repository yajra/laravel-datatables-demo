@extends('datatables.template')

@section('demo')
<table id="users-table" class="table table-condensed">
    <caption>
        <div class="alert alert-info">
            <strong>NOTE:</strong>
            MorphToMany only works for search.
            Sorting is subjective since it will do nothing if the orderable column is from a morphToMany relationship.
        </div>
    </caption>
    <thead>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Tag</th>
    </tr>
    </thead>
</table>
@endsection

@section('controller')
    public function getMorphToMany(Request $request)
    {
        if ($request->ajax()) {
            $query = Post::with('tags')->select('posts.*');

            return $this->dataTable->eloquent($query)
                ->addColumn('tags', function (Post $post) {
                    return $post->tags->pluck('name')->implode('&lt;br&gt;');
                })
                ->make(true);
        }

        return view('datatables.relation.morph-to-many', [
            'title'      => 'Morph To Many Demo',
            'controller' => 'Relation Controller',
        ]);
    }
@endsection

@section('js')
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '',
        columns: [
            {data: 'id', name: 'posts.id'},
            {data: 'title', name: 'posts.title'},
            {data: 'tags', name: 'tags.name'},
        ]
    });
@endsection
