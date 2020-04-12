<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use App\Models\Language;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales = Language::all();
        return view('admin.about.create', compact('locales'));
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
            'content' => 'array|required|min:1',
        ]);

        $about = new About();
        $about->content = $request->get('content');
        if($request->img){
            $image=$request->file('img');
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/about',$image_name);
            $about->img = $image_name;
        }

        $about->save();
        return redirect()->route('about.index')->with('success', __('site.Successfuly_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        return view('admin.about.show', compact('about'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        $locales = Language::all();
        return view('admin.about.edit', compact('locales', 'about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'content' => 'array|required|min:1',
        ]);

        $about->content = $request->get('content');

        if($request->img){
            $image=$request->file('img');
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/about',$image_name);
            if(File::exists('uploads/about/'.$about->img)){
                File::delete('uploads/about/'.$about->img);
            }
            $about->img = $image_name;

        }

        $about->save();
        return redirect()->route('about.index')->with('success', __('site.Successfuly_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        if(File::exists('uploads/about/'.$about->img)){
            File::delete('uploads/about/'.$about->img);
        }
        $about->delete();
        return redirect()->route('about.index')->with('success', __('site.successfully_deleted'));
    }
}
