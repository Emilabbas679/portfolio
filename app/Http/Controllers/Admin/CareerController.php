<?php

namespace App\Http\Controllers\Admin;

use App\Models\Career;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers = Career::all();
        return view('admin.careers.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales = Language::all();
        return view('admin.careers.create', compact('locales'));
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
            'about' => 'array|required|min:1',
            'requirements' => 'array|required|min:1',
            'offers' => 'array|required|min:1',
            'status' => 'required',
        ]);

        Career::create($request->all());
        return redirect()->route('career.index')->with('success', __('site.successfully_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        return view('admin.careers.show', compact('career'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        $locales = Language::all();
        return view('admin.careers.edit', compact('career', 'locales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $career)
    {
        $request->validate([
            'position' => 'array|required|min:1',
            'about' => 'array|required|min:1',
            'requirements' => 'array|required|min:1',
            'offers' => 'array|required|min:1',
            'status' => 'required',
        ]);

        $career->position = $request->get('position');
        $career->about = $request->get('about');
        $career->requirements = $request->get('requirements');
        $career->offers = $request->get('offers');
        $career->status = $request->get('status');
        $career->save();
        return redirect()->route('career.index')->with('success', __('site.successfully_updated'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->route('career.index')->with('success', __('site.successfully_deleted'));

    }
}
