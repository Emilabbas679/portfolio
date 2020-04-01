<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Comment;
use App\Models\News;
use App\Models\Process;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $processes = Process::where('status', 'active')->orderby('id', 'desc')->get();
        $services = Service::where('status', 'active')->orderby('id', 'desc')->get();
        return view('home', compact('processes', 'services'));
    }


    public function about()
    {
        return view('about');
    }


    public function career()
    {
        $careers = Career::where('status', 'active')->get();
        return view('career', compact('careers'));
    }


    public function team()
    {
        $members = Team::where('status', 'active')->orderby('id', 'desc')->get();
        return view('team', compact('members'));
    }


    public function news()
    {
        $all_news = News::where('status', 'active')->get();
        return view('news', compact('all_news'));
    }


    public function singleNews($slug)
    {
        $news = News::where('slug', $slug)->where('status', 'active')->first();
        if ($news){
            $recent_posts = News::orderby('id', 'desc')->limit(5)->get();
            return view('news-single', compact('news', 'recent_posts'));

        }
        else{
            abort(404);
        }
    }


    public function addComment(Request $request, $news_id)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $news = News::find($news_id);
        if($news){
            $comment = new Comment();
            $comment->user_id = Auth::id();
            $comment->news_id = $news_id;
            $comment->comment = $request->get('comment');
            $comment->save();
            $news->comments = $news->comments+1;
            $news->save();
            return redirect()->route('site.single-news', $news->slug)->with('success', __('site.Comment_successfully_added'));
        }
        else{
            abort(404);
        }
    }


    public function contact()
    {
        return view('contact');
    }
}
