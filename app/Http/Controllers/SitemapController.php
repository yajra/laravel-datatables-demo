<?php namespace app\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function getIndex()
    {
        $yesterday = new Carbon('yesterday');
        $lastWeek  = new Carbon('last week');
        $lastMonth = new Carbon('last month');

        $sitemap = app()->make("sitemap");
        $sitemap->setCache('laravel.sitemap', 3600);

        if (! $sitemap->isCached()) {
            // add item to the sitemap (url, date, priority, freq)
            $sitemap->add(url('/'), $yesterday, '1.0', 'daily');
            $sitemap->add(url('eloquent'), $lastMonth, '0.9', 'monthly');
            $sitemap->add(url('fluent'), $lastMonth, '0.9', 'monthly');
            $sitemap->add(url('collection'), $lastMonth, '0.9', 'monthly');
            $sitemap->add(url('html'), $lastMonth, '0.9', 'monthly');
        }

        return $sitemap->render('xml');
    }
}
