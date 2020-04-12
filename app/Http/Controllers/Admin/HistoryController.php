<?php

namespace App\Http\Controllers\Admin;

use App\Models\History;
use App\Models\Language;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $histories = History::all();
        return view('admin.history.index', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales = Language::all();
        return view('admin.history.create', compact('locales'));
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
            'date' => 'required',
            'content' => 'array|required|min:1',
        ]);

        $history = new History();
        $history->content = $request->get('content');
        if($request->img){
            $image=$request->file('img');
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/history',$image_name);
            $history->img = $image_name;
        }
        $history->date = $request->get('date');

        $history->save();
        return redirect()->route('history.index')->with('success', __('site.Successfuly_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        return view('admin.history.show', compact('history'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        $locales = Language::all();
        return view('admin.history.edit', compact('locales', 'history'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history)
    {
        $request->validate([
            'date' => 'required',
            'content' => 'array|required|min:1',
        ]);

        $history->content = $request->get('content');
        $history->date = $request->get('date');

        if($request->img){
            $image=$request->file('img');
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/history',$image_name);
            if(File::exists('uploads/history/'.$history->img)){
                File::delete('uploads/history/'.$history->img);
            }
            $history->img = $image_name;

        }

        $history->save();
        return redirect()->route('history.index')->with('success', __('site.Successfuly_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        if(File::exists('uploads/history/'.$history->img)){
            File::delete('uploads/history/'.$history->img);
        }
        $history->delete();
        return redirect()->route('history.index')->with('success', __('site.successfully_deleted'));
    }
}
