<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_news = News::all();
        return view('admin.news.index', compact('all_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales = Language::all();
        return view('admin.news.create', compact('locales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'array|required|min:1',
            'content' => 'array|required|min:1',
        ]);

        $news = new News();
        $news->title = $request->get('title');
        $news->content = $request->get('content');
        if($request->img){
            $image=$request->file('img');
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/news',$image_name);
            $news->img = $image_name;
        }
        $news->status = $request->get('status');

        $news->created_by = Auth::id();
        $news->updated_by = Auth::id();
        $news->save();
        return redirect()->route('news.index')->with('success', __('site.Successfuly_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $locales = Language::all();
        return view('admin.news.edit', compact('locales', 'news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'array|required|min:1',
            'content' => 'array|required|min:1',
        ]);
        $news->title = $request->get('title');
        $news->content = $request->get('content');
        $news->status = $request->get('status');

        if($request->img){
            $image=$request->file('img');
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/news',$image_name);
            if(File::exists('uploads/news/'.$news->img)){
                File::delete('uploads/news/'.$news->img);
            }
            $news->img = $image_name;

        }

        $news->updated_by = Auth::id();
        $news->save();
        return redirect()->route('news.index')->with('success', __('site.Successfuly_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if(File::exists('uploads/news/'.$news->img)){
            File::delete('uploads/news/'.$news->img);
        }
        $news->delete();
        return redirect()->route('news.index')->with('success', __('site.successfully_deleted'));
    }
}
