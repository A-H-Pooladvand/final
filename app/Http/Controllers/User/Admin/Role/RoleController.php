<?php

namespace App\Http\Controllers\User\Admin\Role;

use App\Http\Controllers\Controller;
use App\PermissionTitle;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('user.admin.role.index');
    }

    public function items(Request $request)
    {
        $roles = Role::select('id', 'name', 'display_name', 'description', 'created_at', 'updated_at');

        return $this->getGrid($request)->items($roles);
    }

    public function create()
    {
        $permissionTitles = PermissionTitle::with('permissions:id,display_name,title_id')->get(['id', 'title']);

        $form = ['action' => route('admin.role.store')];

        return view('user.admin.role.form', compact('permissionTitles', 'form'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->validator($request));

        $role = new Role();
        $role->name = $request['name'];
        $role->display_name = $request['display_name'];
        $role->description = $request['description'];
        $role->save();

        $role->attachPermissions($request['permissions']);

        return ['message' => 'نقش جدید با موفقیت ایجاد گردید'];
    }

    public function show($id)
    {
        $role = Role::find($id);

        $permissionTitles = PermissionTitle::with('permissions:id,display_name,title_id')->get(['id', 'title']);

        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('user.admin.role.show', compact('role', 'rolePermissions', 'permissionTitles'));
    }

    public function edit($id)
    {
        $role = Role::find($id);

        $permissionTitles = PermissionTitle::with('permissions:id,display_name,title_id')->get(['id', 'title']);

        $rolePermissions = $role->permissions->pluck('id')->toArray();

        $form = [
            'action' => route('admin.role.update', $role->id),
            'method' => 'PUT'
        ];

        return view('user.admin.role.form', compact('permissionTitles', 'rolePermissions', 'role', 'form'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        if ($this->preventEditSuperRoles($role))
            return ['denied' => 'شما اجازه ویرایش دسترسی این نقش را ندارید'];

        $this->validate($request, $this->validator($request, $role));

        $role->name = $request['name'];
        $role->display_name = $request['display_name'];
        $role->description = $request['description'];
        $role->save();

        $role->syncPermissions($request['permissions']);

        return ['message' => 'نقش جدید با موفقیت ایجاد گردید'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        if ($this->preventUserToDeleteSuperAdminRoles($ids))
            return ['error' => 'شما اجازه حذف ادمین های برتر را ندارید'];


        try {
            Role::whereIn('id', $ids)->delete();
        } catch (\Exception $e) {
            return $e;
        }

        return ['message' => 'رکورد ها به درستی حذف گردیدند'];
    }

    /**
     * @param Request $request
     * @param Role|null $role
     * @return array
     */
    private function validator(Request $request, Role $role = null)
    {
        $rules = [
            'name' => 'required|unique:roles|regex:/(^[A-Za-z-_ ]+$)+/',
            'display_name' => 'required',
            'description' => 'required'
        ];

        if ($request->method() === 'PUT')
            $rules['name'] = 'required|regex:/(^[A-Za-z-_ ]+$)+/|unique:roles,name,' . $role->id;

        return $rules;
    }

    /**
     * @param array $ids
     * @return bool
     */
    private function preventUserToDeleteSuperAdminRoles(array $ids)
    {
        $super_admin_ids = [1, 2, 3, 4];

        foreach ($super_admin_ids as $item) {
            if (in_array($item, $ids))
                return true;
        }

        return false;
    }

    /**
     * Prevent users to manipulate super roles
     *
     * @param Role $role
     * @return bool
     */
    private function preventEditSuperRoles(Role $role)
    {
        if (in_array($role->id, [1, 2, 3, 4]))
            return true;

        return false;
    }
}
