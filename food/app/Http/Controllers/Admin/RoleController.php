<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use App\Exports\PermissionExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PermissionImport;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    public function RolePermission(){
        $permissions = Permission::all();
        return view('admin.backend.pages.permission.all_permissions', compact('permissions'));
    }

    public function AddPermission(){
        return view('admin.backend.pages.permission.add_permission');
    }

    public function StorePermission(Request $request)
    {
        // Добавляем валидацию
        $request->validate([
            'name' => 'required|string|max:255',
            'group_name' => 'required|string|max:255',
        ]);

        Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
            'guard_name' => 'admin',
        ]);

        $notification = array(
            'message' => 'Permission Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    }

    public function EditPermission($id){
        $permission = Permission::findOrFail($id);
        return view('admin.backend.pages.permission.edit_permission', compact('permission'));
    }

    public function UpdatePermission(Request $request){
        $per_id = $request->id;

        Permission::find($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name, 
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    }
      //End Method

    public function DeletePermission($id){

        Permission::find($id)->delete();

        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ImportPermission(){
        return view('admin.backend.pages.permission.import_permission');
    }

    public function Export(){
        return Excel::download(new PermissionExport, 'permission.xlsx');
    }

    public function Import(Request $request)
    {
        $request->validate([
            'import_file' => 'required|file|mimes:xlsx,csv',
        ]);

        Excel::import(new PermissionImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Permission Imported Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AllRoles(){
        $roles = Role::all();
        return view('admin.backend.pages.role.all_roles', compact('roles'));
    }

    public function AddRoles(){
        return view('admin.backend.pages.role.add_role');
    }

    public function StoreRole(Request $request){
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create([
            'name' => $request->name,
            'guard_name' => 'admin',
        ]);

        $notification = array(
            'message' => 'Role Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }

    public function EditRoles($id){
        $role = Role::findOrFail($id);
        return view('admin.backend.pages.role.edit_role', compact('role'));
    }

    public function RoleUpdate(Request $request){
        $role_id = $request->id;

       Role::find($role_id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }

    public function DeleteRoles($id){
        Role::find($id)->delete();

        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AddRolePermission(){
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = Admin::getPermissionGroups();
        return view('admin.backend.pages.rolesetup.add_roles_permission',compact('roles','permissions','permission_groups'));
    }

    public function StoreRolesPermission(Request $request)
    {
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
           $data['role_id'] = $request->role_id;
           $data['permission_id'] = $item;

           DB::table('role_has_permissions')->insert($data);
        } //end foreach

        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
        ); 
        return redirect()->route('all.roles.permission')->with($notification);

    }

    public function AllRolePermission(){
        $roles = Role::all();
        return view('admin.backend.pages.rolesetup.all_roles_permission',compact('roles'));
     }

     public function AdminEditRoles($id){
        $role = Role::find($id);
        $permissions = Permission::all();
        $permission_groups = Admin::getPermissionGroups();
        return view('admin.backend.pages.rolesetup.edit_roles_permission', compact('role', 'permissions', 'permission_groups'));
     }

     public function AdminUpdateRoles(Request $request, $id)
     {
        $role = Role::find($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $permissionNames = Permission::whereIn('id', $permissions)->pluck('name')->toArray();
            $role->syncPermissions($permissionNames);
        }else {
            $role->syncPermissions([]);
         }

        $notification = array(
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);
     }

    public function AdminDeleteRoles($id){
        $role = Role::find($id);
        $role->permissions()->detach();

        $notification = array(
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
     }

     public function AllAdmin()
     {
        $admins = Admin::latest()->get();
        return view('admin.backend.pages.admin.all_admin', compact('admins')); 
    }

    public function AddAdmin()
    {
        $roles = Role::all();
        return view('admin.backend.pages.admin.add_admin', compact('roles'));
    }

    public function StoreAdmin(Request $request)
    {

        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->addres = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = '1';
        $user->save();

        if ($request->roles) {
            $role = Role::where('id', $request->roles)
                        ->where('guard_name', 'admin')
                        ->first();
            
            if ($role) {
                $user->assignRole($role->name); 
            }
        }

        $notification = array(
            'message' => 'Admin Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    }

    public function EditAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        $roles = Role::all();
        return view('admin.backend.pages.admin.edit_admin', compact('admin', 'roles'));
    }

    public function UpdateAdmin(Request $request, $id)
    {
        $user = Admin::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->addres = $request->address;
        $user->role = 'admin';
        $user->status = '1';
        $user->save();
        $user->roles()->detach(); 
        if ($request->roles) {
            $role = Role::where('id', $request->roles)
                        ->where('guard_name', 'admin')
                        ->first();
            
            if ($role) {
                $user->assignRole($role->name); 
            }
        }

        $notification = array(
            'message' => 'Admin Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    }

    public function DeleteAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->roles()->detach();
        $admin->delete();


        $notification = array(
            'message' => 'Admin Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
