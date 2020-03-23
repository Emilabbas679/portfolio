<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Scalar\LNumber;

class LanguageController extends Controller
{
    public function index()
    {
        $langs = Language::all();
        return view('admin.langs.index', compact('langs'));
    }


    public function create()
    {
        return view('admin.langs.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string', 'max:255'],
            'language' => ['required', 'string', 'max:255'],
        ]);
        Language::create($request->all());
        return redirect()->route('langs.index')->with('success', __('site.Successfuly_added'));

    }


    public function edit(Language $lang)
    {
        return view('admin.langs.edit', compact('lang'));
    }


    public function update(Request $request, Language $lang)
    {
        $request->validate([
            'code' => ['required', 'string', 'max:255'],
            'language' => ['required', 'string', 'max:255'],
        ]);

        $lang->code = $request->get('code');
        $lang->language = $request->get('language');

        $lang->save();
        return redirect()->route('langs.index')->with('success', __('site.successfully_updated'));

    }


    public function destroy($id)
    {
        $language = Language::find($id);
        $language->delete();
        return redirect()->route('langs.index')->with('success', __('site.Successfully_deleted'));
    }
}

