<?php
/**
 * Created by Amirhossein Pooladvand
 */

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\PermissionTitle;
use App\Province;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Morilog\Jalali\jDateTime;

class UserController extends Controller
{
    public function index()
    {
        return view('user.admin.index');
    }

    public function items(Request $request)
    {
        $users = User::withTrashed()->select('id', 'name', 'family', 'username', 'mobile', 'is_active', 'created_at', 'deleted_at');

        return $this->getGrid($request)->items($users);
    }

    public function create()
    {
        $roles = Role::get();

        $provinces = Province::get(['id', 'title']);

        $form = ['action' => route('admin.user.store')];

        $user = new User();

        return view('user.admin.form', compact('roles', 'form', 'provinces', 'user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->validator($request));

        $user = User::create($this->fields($request));

        $user->attachRoles($request['roles']);

        return ['message' => 'کاربر جدید با موفقیت ثبت شد.'];
    }

    public function show($id)
    {
        $user = User::withTrashed()->with('roles')->findOrFail($id);

        $userPermissions = $user->permissions->pluck('id')->toArray();

        $permissionTitles = PermissionTitle::with('permissions')->get();

        return view('user.admin.show', compact('user', 'permissionTitles', 'userPermissions'));
    }

    public function edit($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        $provinces = Province::get(['id', 'title']);

        $form = [
            'action' => route('admin.user.update', $user['id']),
            'method' => 'PUT'
        ];

        $roles = Role::get(['id', 'display_name']);

        $userRoles = $user->roles()->get()->pluck('id')->toArray();

        return view('user.admin.form', compact('userRoles', 'user', 'roles', 'form', 'provinces'));
    }

    public function update(Request $request, $id)
    {
        $user = User::withTrashed()->find($id);
        $this->validate($request, $this->validator($request, $user));
        $user->update($this->fields($request, $user));
        $user->syncRoles($request['roles']);

        return ['message' => 'کاربر با موفقیت ویرایش گردید.'];
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        if ($this->preventUserToDeleteSuperAdmins($ids))
            return ['error' => 'شما اجازه حذف کاربران برتر را ندارید'];

        User::withTrashed()->whereIn('id', $ids)->forceDelete();
    }

    public function softDestroy($id)
    {
        $ids = explode(',', $id);

        if ($this->preventUserToDeleteSuperAdmins($ids))
            return ['error' => 'شما اجازه معلق کردن کاربران برتر را ندارید'];

        Role::whereIn('id', $ids)->delete();

        $users = User::withTrashed()->findMany($ids);

        foreach ($users as $user) {
            if ($user->deleted_at === null)
                $user->delete();
            else
                $user->restore();
        }
    }

    // Methods

    protected function validator(Request $request, User $user = null)
    {
        $rules = [
            'name' => 'required|string|max:100',
            'family' => 'string|max:100',
            'username' => 'string|max:100|alpha_dash',
            'mobile' => 'string|max:100',
            'phone' => 'string|max:100',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'roles' => 'required|array',
        ];

        if ($request->method() === 'PUT') {
            $rules['email'] = 'required|string|email|max:255|unique:users,email,' . $user->id;
            $rules['password'] = 'nullable|string|min:6|confirmed';
        }

        return $rules;
    }

    protected function fields(Request $request, User $user = null)
    {
        return [
            'is_active' => true,
            'province_id' => $request['province'],
            'province_city_id' => $request['province_city'],
            'name' => $request['name'],
            'family' => $request['family'],
            'username' => $request['username'],
            'email' => $request['email'],
            'mobile' => $request['mobile'],
            'phone' => $request['phone'],
            'password' => $request['password'] === null ? $user->password : $request['password'],
            'avatar' => $request['avatar'] === null ? $user->avatar : $request['avatar'],
            'first_address' => $request['first_address'],
            'second_address' => $request['second_address'],
            'education' => $request['education'],
            'birth_certificate' => $request['birth_certificate'],
            'national_id' => $request['national_id'],
            'biography' => $request['biography'],
            'birthday' => $this->mergeBirthdayFields($request),
            'artwork' => $request['artwork'],
            'scientific_document' => $request['scientific_document'],
        ];
    }

    private function preventUserToDeleteSuperAdmins($ids)
    {
        $super_admin_ids = [1, 2, 3];

        foreach ($super_admin_ids as $item) {
            if (in_array($item, $ids))
                return true;
        }

        return false;
    }

    private function mergeBirthdayFields(Request $request)
    {
        $birthday = "{$request->year}/{$request->month}/{$request->day}";
        return json_decode(json_encode(jDatetime::createDatetimeFromFormat('Y/m/d', $birthday)), true)['date'];
    }
}
