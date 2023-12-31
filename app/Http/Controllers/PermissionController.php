<?php

namespace App\Http\Controllers;


use App\Tables\Permissions;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\Facades\Splade;
use Spatie\Permission\Models\Permission;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Submit;
use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

class PermissionController extends Controller
{
    public function index(){
        return view('admin.permissions.index',[
            'permissions' => Permissions::class
        ]);
    }

    public function create(){

        return view('admin.permissions.create', [
            'roles' => Role::pluck('name','id')->toArray()
        ]);
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePermissionRequest $request)
    {
        $permission = Permission::create($request->validated());
        $permission->syncRoles($request->roles);
        Splade::toast('Permission created successfully')->autoDismiss(3);

        return to_route('admin.permissions.index');
    }

    public function edit(Permission $permission)
    {


        return view('admin.permissions.edit', [
            'permission' => $permission,
            'roles' => Role::pluck('name','id')->toArray()
        ]);
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());
        $permission->syncRoles($request->roles);
        Splade::toast('Permission updated successfully')->autoDismiss(3);

        return to_route('admin.permissions.index');
    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        Splade::toast('Permission deleted successfully')->autoDismiss(3);

        return back();
    }
}
