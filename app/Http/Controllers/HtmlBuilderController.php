<?php namespace app\Http\Controllers;

use App\Http\Requests;
use App\Post;
use App\User;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\Html\Builder;

class HtmlBuilderController extends Controller
{
    /**
     * Datatables Html Builder
     * @var Builder
     */
    protected $htmlBuilder;

    public function __construct(Builder $htmlBuilder)
    {
        $this->htmlBuilder = $htmlBuilder;

        view()->share('controller', 'HtmlBuilderController.php');
        view()->share('title', $this->getTitle('html'));
        view()->share('description', $this->getDescription('html'));
    }

    public function getIndex()
    {
        return view('datatables.html.index');
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

    public function getColumns(Datatables $datatables)
    {
        $columns = ['id', 'name', 'email', 'created_at', 'updated_at'];

        if ($datatables->getRequest()->ajax()) {
            return $datatables->of(User::select($columns))->make(true);
        }

        $html = $datatables->getHtmlBuilder()->columns($columns);

        return view('datatables.html.columns', compact('html'));
    }

    public function getMethod(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            return Datatables::of(User::select(['id', 'name', 'email', 'created_at', 'updated_at']))->make(true);
        }

        $html = $htmlBuilder
            ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'Id'])
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Name'])
            ->addColumn(['data' => 'email', 'name' => 'email', 'title' => 'Email'])
            ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'])
            ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated At']);

        return view('datatables.html.method', compact('html'));
    }
}
