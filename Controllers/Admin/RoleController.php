<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//
        // dd($request->pagezz);
        $users = User::all();
            $roles = Role::paginate(10);


        return view('Admin.roles.Index', [
            'roles' => $roles,
            'users' => $users

        ]);
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
//        dd($request);
        $name = $request->get('name');
        $users = Role::roleCounter($request->get('users'));
        $categories = Role::roleCounter($request->get('categories'));
        $brands = Role::roleCounter($request->get('brands'));
        $roles = Role::roleCounter($request->get('roles'));
        $comments = Role::roleCounter($request->get('comments'));
        $products = Role::roleCounter($request->get('products'));
        Role::query()->create([
            'name' => $name,
            'categories' => $categories,
            'brands' => $brands,
            'comments' => $comments,
            'products' => $products,
            'users' => $users,
            'roles' => $roles
        ]);
        return redirect(route('roles.index'));
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $name = $request->get('name');
        $users = Role::roleCounter($request->get('users'));
        $categories = Role::roleCounter($request->get('categories'));
        $brands = Role::roleCounter($request->get('brands'));
        $roles = Role::roleCounter($request->get('roles'));
        $comments = Role::roleCounter($request->get('comments'));
        $products = Role::roleCounter($request->get('products'));
        $role->update([
            'name' => $name,
            'categories' => $categories,
            'brands' => $brands,
            'comments' => $comments,
            'products' => $products,
            'users' => $users,
            'roles' => $roles
        ]);
        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
//        dd($role);
        User::query()->where('role_id',$role->id)->update([
            'role_id'  => 2
        ]);
        $role->delete();
        return redirect(route('roles.index'));
    }

    public function indexpaginate(Request $request)
    {
        // dd($request->pagezz);
        $users = User::all();
        $roles = Role::paginate($request->pagez);
        return view('Admin.roles.Index', [
            'roles' => $roles,
            'users' => $users

        ]);
    }
}
