<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;






use App\Models\Meeting;
use App\Models\Moc;
use App\Models\Poc;
use App\Models\Requirement;
use App\Models\Endproduct;
use App\Models\Witness;
use App\Models\Verification;












use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Support\Facades\DB;

class RolesPermissionsController extends Controller
{
    
    public function usrview (Request $request) {

        $this->action = 'read';

        return view('admin.user-view', [
            'action' => $this->action,
            'user' => User::find($request->id)
        ]);
    }

    public function roleview (Request $request) {

        $this->action = 'read';

        return view('admin.role-view', [
            'action' => $this->action,
            'role' => Role::find($request->id)
        ]);
    }

    public function permissionview (Request $request) {

        $this->action = 'read';

        return view('admin.permission-view', [
            'action' => $this->action,
            'permission' => Permission::find($request->id)
        ]);
    }





    public function usrform (Request $request) {

        $action = 'create';
        $user = false;

        $available_usr_perms = [];
        $available_usr_roles = [];

        if ( isset($request->id) && !empty($request->id) ) {
            $user = User::find($request->id);
            $action = 'update';

            foreach ($user->roles as $role) {
                $available_usr_roles[] = $role->id;
            }

            foreach ($user->permissions as $perm) {
                $available_usr_perms[] = $perm->id;
            }
        }

        return view('admin.user-form', [
            'action' => $action,
            'user' => $user,
            'roles' => Role::all()->sortBy('name'),
            'permissions' => Permission::all()->sortBy('name'),
            'available_usr_perms' => $available_usr_perms,
            'available_usr_roles' => $available_usr_roles,
        ]);
    }

    public function roleform (Request $request) {

        $action = 'create';
        $role = false;
        $available_perms = [];

        if ( isset($request->id) && !empty($request->id) ) {
            $role = Role::find($request->id);
            $action = 'update';
        }

        if ( isset($role->permissions)) {
            foreach($role->permissions as $perm) {
                $available_perms[] = $perm->id;
            }
        }

        return view('admin.role-form', [
            'action' => $action,
            'role' => $role,
            'available_perms' => $available_perms,
            'permissions' => Permission::all()->sortBy('name')
        ]);
    }

    public function permissionform (Request $request) {

        $action = 'create';
        $permission = false;

        if ( isset($request->id) && !empty($request->id) ) {
            $permission = Permission::find($request->id);
            $action = 'update';
        }

        return view('admin.permission-form', [
            'action' => $action,
            'permission' => $permission,
        ]);
    }




    public function usrstore (Request $request) {

        $id = false;

        if ( isset($request->id) && !empty($request->id)) {

            $validated = $request->validate([
                'name' => ['required'],
                'lastname' => ['required'],
                'email' => ['required'],
            ]);

            // $props['user_id'] = Auth::id();
            $props['name'] = $request->name;
            $props['lastname'] = $request->lastname;
            $props['email'] = $request->email;

            // update
            User::find($request->id)->update($props);
            $user = User::find($request->id);
            $id = $request->id;
        } else {

            $validated = $request->validate([
                'name' => ['required'],
                'lastname' => ['required'],
                'email' => ['required', 'unique:users'],
            ]);

            // $props['user_id'] = Auth::id();
            $props['name'] = $request->name;
            $props['lastname'] = $request->lastname;
            $props['email'] = $request->email;

            // create
            $user = User::create($props);
            $id = $user->id;
        }

        // ROLES

        $roles = Role::all()->sortBy('name');

        $selected_roles = [];

        foreach ($roles as $role) {

            $degisken = 'role'.$role->id;

            if (request($degisken)) {

                $selected_roles[] = Role::find($role->id);
            }
        }

        $user->syncRoles($selected_roles);



        // USER PERMISSIONS
        $permissions = Permission::all()->sortBy('name');

        $selected_perms = [];

        foreach ($permissions as $permission) {

            $degisken = 'perm'.$permission->id;

            if (request($degisken)) {

                $selected_perms[] = Permission::find($permission->id);
            }
        }

        $user->syncPermissions($selected_perms);













        return redirect('/admin/users/view/'.$id);
    }

    public function rolestore (Request $request) {

        $id = false;

        //$props['user_id'] = Auth::id();

        if ( isset($request->id) && !empty($request->id)) {

            $validated = $request->validate([
                'name' => ['required'],
            ]);

            // update
            Role::find($request->id)->update(['name' => $request->name]);
            $role = Role::find($request->id);

            $id = $request->id;
        } else {

            $validated = $request->validate([
                'name' => ['required', 'unique:roles'],
            ]);

            // create
            $role = Role::create(['name' => $request->name]);
            $id = $role->id;
        }



        // Get Role Permissions
        $permissions = Permission::all()->sortBy('name');

        if ( count($permissions) > 0 ) {
            foreach ($permissions as $permission) {

                $degisken = 'perm'.$permission->id;

                if (request($degisken)) {

                    $selected_perms[] = Permission::find($permission->id);
                }
            }

            $role->syncPermissions($selected_perms);
        }


        return redirect('/admin/roles/view/'.$id);

    }

    public function permissionstore (Request $request) {

        $validated = $request->validate([
            'name' => ['required', 'unique:permissions'],
        ]);

        $id = false;

        //$props['user_id'] = Auth::id();

        if ( isset($request->id) && !empty($request->id)) {

            // update
            $permission = Permission::find($request->id)->update(['name' => $request->name]);
            $id = $request->id;
        } else {

            // create
            $permission = Permission::create(['name' => $request->name]);
            $id = $permission->id;
        }

        return redirect('/admin/permissions/view/'.$id);

    }

















    public function convertOldToNew () {


        $meetings = DB::connection('Yeni')->select('select * from dgs');

        foreach ($meetings as $meeting) {

            $props = [];
            # code...
            $props['id'] = $meeting->id;
            $props['user_id'] = 1;
            $props['updated_uid'] = 1;
            $props['project_id'] = 1;
            $props['code'] = $meeting->code;
            $props['name'] = $meeting->name;
            $props['created_at'] = $meeting->created_at;
            $props['updated_at'] = $meeting->updated_at;

            Meeting::create($props);
        }





        $mocs = DB::connection('Yeni')->select('select * from mocs');

        foreach ($mocs as $moc) {

            $props = [];
            # code...
            $props['id'] = $moc->id;
            $props['user_id'] = 1;
            $props['updated_uid'] = 1;
            $props['project_id'] = 1;
            $props['code'] = $moc->code;
            $props['name'] = $moc->name;
            $props['created_at'] = $moc->created_at;
            $props['updated_at'] = $moc->updated_at;

            Moc::create($props);
        }


        $pocs = DB::connection('Yeni')->select('select * from pocs');

        foreach ($pocs as $poc) {

            $props = [];
            # code...
            $props['id'] = $poc->id;
            $props['user_id'] = 1;
            $props['updated_uid'] = 1;
            $props['project_id'] = 1;
            $props['code'] = $poc->code;
            $props['name'] = $poc->name;
            $props['description'] = $poc->description;
            $props['created_at'] = $poc->created_at;
            $props['updated_at'] = $poc->updated_at;

            Poc::create($props);
        }

        Endproduct::create(['id' => 1,'updated_uid'=>1,'user_id'=>1,'project_id'=>1,'code' => 'PVR','title'=>'Pressure Regulating Valve']);
        Endproduct::create(['id' => 2,'updated_uid'=>1,'user_id'=>1,'project_id'=>1,'code' => 'HS','title'=>'Hydraulic System']);

        $reqs = DB::connection('Yeni')->select('select * from requirements');

        foreach ($reqs as $req) {

            $props = [];
            # code...
            $props['id'] = $req->id;
            $props['user_id'] = 1;
            $props['updated_uid'] = 1;
            $props['project_id'] = 1;
            $props['cross_ref_no'] = $req->no;
            $props['rtype'] = $req->type == 'SOW' ? 'GR':'TR';
            $props['text'] = $req->text;
            $props['created_at'] = $req->created_at;
            $props['updated_at'] = $req->updated_at;

            DB::insert('insert into requirements (id, user_id,updated_uid,project_id,cross_ref_no,rtype,text,created_at,updated_at) values (?, ?,?,?,?,?,?,?,?)', [$req->id, 1,1,1,$req->no,$req->type == 'SOW' ? 'GR':'TR',$req->text,$req->created_at,$req->updated_at]);


            if ($req->product_id == 1) {
                DB::insert('insert into endproduct_requirement (requirement_id,endproduct_id) values (?, ?)', [$req->id, 1]);
                DB::insert('insert into endproduct_requirement (requirement_id,endproduct_id) values (?, ?)', [$req->id, 2]);
            }

            if ($req->product_id == 2) {
                DB::insert('insert into endproduct_requirement (requirement_id,endproduct_id) values (?, ?)', [$req->id, 1]);
            }

            if ($req->product_id == 3) {
                DB::insert('insert into endproduct_requirement (requirement_id,endproduct_id) values (?, ?)', [$req->id, 2]);
            }
        }






        Witness::create(['updated_uid'=>1,'user_id'=>1,'project_id'=>1,'code' => 'Administration','name'=>'Administration']);
        Witness::create(['updated_uid'=>1,'user_id'=>1,'project_id'=>1,'code' => 'Third-Party','name'=>'Third-Party']);






        $vers = DB::connection('Yeni')->select('select * from verifications');

        foreach ($vers as $ver) {

            $props = [];
            # code...
            $props['id'] = $ver->id;
            $props['user_id'] = 1;
            $props['project_id'] = 1;
            $props['requirement_id'] = $ver->requirement_id;
            $props['meeting_id'] = $ver->dg_id;
            $props['moc_id'] = $ver->moc_id;
            $props['poc_id'] = $ver->poc_id;
            $props['witness_id'] = $ver->witness_id;
            $props['remarks'] = $ver->remarks;
            $props['created_at'] = $ver->created_at;
            $props['updated_at'] = $ver->updated_at;

            Verification::create($props);
        }












        dd($reqs);
    }
}
