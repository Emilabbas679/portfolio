<?php

namespace App\Http\Controllers\Admin;

use App\Models\Roles;
use App\Models\UserRoles;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = UserRoles::all();
        return view('admin.user-roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_role = UserRoles::where('model_id', $id)->first();
        $users = User::all();
        $roles = Roles::all();
        return view('admin.user-roles.edit', compact('user_role', 'roles', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'role_id' => ['required', 'string', 'max:255'],
            'model_id' => ['required', 'string', 'max:255'],
        ]);


        $user_role = UserRoles::where('model_id', $id)->first();
        $user_role->model_id = $request->get('model_id');
        $user_role->role_id = $request->get('role_id');

        $user_role->save();

        return redirect()->route('user-role.index')->with('success', __('site.Successfully_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
