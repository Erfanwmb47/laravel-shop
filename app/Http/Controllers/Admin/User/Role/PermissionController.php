<?php

namespace App\Http\Controllers\Admin\User\Role;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\PermissionRequest;
use App\Models\permission;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class PermissionController extends AdminController

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('Admin.ACL.permissions.index',[
            'permissions'=>$this->PaginatePagez(Permission::query(),$request,['name','label'],[]),
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
    public function store(PermissionRequest $request)
    {
        Permission::query()->create([
           'name' => $request->get('name'),
            'label' => $request->get('label')
        ]);

        toast('دسترسی جدید با موفقیت افزوده شد','success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, permission $permission)
    {
        $request->validate([
           'name'=> [Rule::unique('permissions','name')->ignore($permission->id)],
           'label'=>[Rule::unique('permissions','label')->ignore($permission->id)]
        ]);

        $permission->update([
           'name' => $request->get('name'),
           'label' => $request->get('label')
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(permission $permission)
    {
        $permission->delete();
        toast('دسترسی  با موفقیت حذف شد','error');

        return redirect()->back();
    }
}
