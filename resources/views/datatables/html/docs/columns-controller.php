public function getColumns(Datatables $datatables)
{
    $columns = ['id', 'name', 'email', 'created_at', 'updated_at'];

    if ($datatables->getRequest()->ajax()) {
        return $datatables->of(User::select($columns))->make(true);
    }

    $html = $datatables->getHtmlBuilder()->columns($columns);

    return view('datatables.html.columns', compact('html'));
}