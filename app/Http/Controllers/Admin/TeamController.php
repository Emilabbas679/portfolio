<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Team::all();
        return view('admin.team.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales = Language::all();
        return view('admin.team.create', compact('locales'));
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
            'position' => 'array|required|min:1',
            'content' => 'array|required|min:1',
        ]);

        $team = new Team();
        $team->position = $request->get('position');
        $team->content = $request->get('content');
        if($request->img){
            $image=$request->file('img');
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/members',$image_name);
            $team->img = $image_name;
        }
        $team->name = $request->get('name');
        $team->status = $request->get('status');

        $team->save();
        return redirect()->route('team.index')->with('success', __('site.Successfuly_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('admin.team.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $locales = Language::all();
        return view('admin.team.edit', compact('locales', 'team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'position' => 'array|required|min:1',
            'content' => 'array|required|min:1',
        ]);

        $team->position = $request->get('position');
        $team->content = $request->get('content');
        $team->name = $request->get('name');
        $team->status = $request->get('status');

        if($request->img){
            $image=$request->file('img');
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/members',$image_name);
            if(File::exists('uploads/members/'.$team->img)){
                File::delete('uploads/members/'.$team->img);
            }
            $team->img = $image_name;

        }

        $team->save();
        return redirect()->route('team.index')->with('success', __('site.Successfuly_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        if(File::exists('uploads/members/'.$team->img)){
            File::delete('uploads/members/'.$team->img);
        }
        $team->delete();
        return redirect()->route('team.index')->with('success', __('site.successfully_deleted'));
    }
}
