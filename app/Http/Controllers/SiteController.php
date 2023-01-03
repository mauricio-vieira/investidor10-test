<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $news = News::join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.*', 'categories.name AS category')
            ->where(
                [
                    ['title', '!=', null],
                    [function ($query) use ($request) {
                        if (($s = $request->s)) {
                            $query
                                ->orWhere('title', 'LIKE', '%' . $s . '%')
                                ->orWhere('content', 'LIKE', '%' . $s . '%')
                                ->get();
                        }
                    }]
                ]
            )
            ->orWhere(
                function ($query) use ($request) {
                    if (($s = $request->s)) {
                        $query
                            ->join('categories', 'categories.id', '=', 'news.category_id')
                            ->orWhere('categories.name', 'LIKE', '%' . $s . '%')
                            ->get();
                    }
                }
            )
            ->paginate(10);

        if ($news->total() === 0) {
            if ($request->s) {
                return view('site.searchnocontent')->with(['search' => $request->s]);
            }

            return view('site.nocontent');
        }

        if ($request->s) {
            $view_data['search'] = $request->s;
        }

        $view_data['news'] = $news;
        return view('site.index')->with($view_data);
    }

    /**
     * Show the details for an specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function details(News $news)
    {
        return view('site.details', compact('news'));
    }
}
