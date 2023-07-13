<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends AdminController
{
    public function create(User $user)
    {
        return view('Admin.Users.Permissions',[
            'roles' => Role::all(),
            'permissions' => Permission::all(),
            'user' => $user
            ]);

    }

    public function store(Request $request , User $user)
    {

        $user->permissions()->sync($request->permissions);
        $user->roles()->sync($request->roles);

        toast('دسترسی کاربر با موفقیت ویرایش شد ','success');
        return redirect(route('users.index'));

    }
}
