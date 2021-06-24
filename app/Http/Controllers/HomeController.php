<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        /************************** **************************/
        /* Roles and Permission Assign */

        // Role::create(['name' => 'writer']);
        // Permission::create(['name' => 'write post']);
        // $permission = Permission::create(['name' => 'edit post']);
        // $role = Role::findById(4);
        // $permission = Permission::findById(4);
        // $permission->removeRole($role);
        // $role->revokePermissionTo($permission);
        // $role->givePermissionTo($permission);

        /************************** **************************/
        /* Roles and Permission Assign to the User */

        // auth()->user()->assignRole('writer');
        // auth()->user()->givePermissionTo('edit post');
        // return auth()->user()->getAllPermissions();

        // auth()->user()->getPermissionsViaRoles();
        // return auth()->user()->getPermissionsViaRoles();

        return view('home');
    }
}
