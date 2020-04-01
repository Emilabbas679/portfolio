<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\Process;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processes = Process::all();
        return view('admin.process.index', compact('processes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales = Language::all();
        return view('admin.process.create', compact('locales'));
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
            'text' => 'array|required|min:1',
        ]);

        $process = new Process();
        $process->text = $request->get('text');
        $process->icon = $request->get('icon');
        $process->title = $request->get('title');
        $process->status = $request->get('status');

        $process->save();
        return redirect()->route('process.index')->with('success', __('site.Successfuly_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Process $process)
    {
        return view('admin.process.show', compact('process'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Process $process)
    {
        $locales = Language::all();
        return view('admin.process.edit', compact('locales', 'process'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Process $process)
    {
        $request->validate([
            'text' => 'array|required|min:1',
            'icon' => 'required',
            'title' => 'required',
            'status' => 'required',
        ]);

        $process->text = $request->get('text');
        $process->icon = $request->get('icon');
        $process->title = $request->get('title');
        $process->status = $request->get('status');

        $process->save();
        return redirect()->route('process.index')->with('success', __('site.Successfuly_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Process $process)
    {
        $process->delete();
        return redirect()->route('process.index')->with('success', __('site.Successfully_deleted'));
    }
}
