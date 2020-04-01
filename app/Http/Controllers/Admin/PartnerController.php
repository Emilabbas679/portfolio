<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales = Language::all();
        return view('admin.partners.create', compact('locales'));
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
            'about' => 'array|required|min:1',
        ]);

        $partner = new Partner();
        $partner->title = $request->get('title');
        $partner->about = $request->get('about');
        if($request->img){
            $image=$request->file('img');
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/partners',$image_name);
            $partner->img = $image_name;
        }
        $partner->status = $request->get('status');

        $partner->save();
        return redirect()->route('partner.index')->with('success', __('site.Successfuly_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        return view('admin.partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        $locales = Language::all();
        return view('admin.partners.edit', compact('locales', 'partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'title' => 'array|required|min:1',
            'about' => 'array|required|min:1',
        ]);

        $partner->title = $request->get('title');
        $partner->about = $request->get('about');
        $partner->status = $request->get('status');

        if($request->img){
            $image=$request->file('img');
            $image_name=uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/partners',$image_name);
            if(File::exists('uploads/partners/'.$partner->img)){
                File::delete('uploads/partners/'.$partner->img);
            }
            $partner->img = $image_name;

        }

        $partner->save();
        return redirect()->route('partner.index')->with('success', __('site.Successfuly_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        if(File::exists('uploads/partners/'.$partner->img)){
            File::delete('uploads/partners/'.$partner->img);
        }
        $partner->delete();
        return redirect()->route('partner.index')->with('success', __('site.successfully_deleted'));
    }
}
