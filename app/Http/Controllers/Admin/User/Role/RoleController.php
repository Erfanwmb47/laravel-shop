<?php

namespace App\Http\Controllers\Admin\User\Role;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class RoleController extends AdminController

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('Admin.ACL.Roles.index',[
            'roles'=>$this->PaginatePagez(Role::query(),$request,['name','label'],[]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.ACL.Roles.Create',[
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {

       // $data = $request->validate();
          $role =   Role::create($request->all());
          $role->permissions()->sync($request['permissions']);
        toast('مقام جدید با موفقیت افزوده شد','success');
        return redirect(route('roles.index'));
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
        return view('Admin.ACL.Roles.Edit',[
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $request->validate([
            'name'=> [Rule::unique('roles','name')->ignore($role->id)],
            'label'=>[Rule::unique('roles','label')->ignore($role->id)]
        ]);

        $role->update($request->all());
        $role->permissions()->sync($request['permissions']);
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
        $role->delete();
        toast('مقام  با موفقیت حذف شد','error');

        return redirect()->back();
    }
}
