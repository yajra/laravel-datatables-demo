use Yajra\Datatables\Html\Builder; // import class on controller

/**
 * Datatables Html Builder
 * @var Builder
 */
protected $htmlBuilder;

public function __construct(Builder $htmlBuilder)
{
    $this->htmlBuilder = $htmlBuilder;
}

public function getBasic(Request $request)
{
    if ($request->ajax()) {
        return Datatables::of(User::select(['id', 'name', 'email', 'created_at', 'updated_at']))->make(true);
    }

    $html = $this->htmlBuilder
        ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'Id'])
        ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Name'])
        ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Email'])
        ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'])
        ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated At']);

    return view('datatables.html.basic', compact('html'));
}