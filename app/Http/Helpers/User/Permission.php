<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 3/17/2018
 * Time: 5:27 PM
 */

namespace App\Http\Helpers\User;


use App\User;

class Permission
{
    /**
     * Indicates name of the permission
     *
     * @property string permission
     */
    protected $permission;

    /**
     * Validates either user has the given permission
     * or it's role has the given permission
     *
     * @param string $permission
     * @return Permission|\Illuminate\Database\Eloquent\Builder
     */
    public static function allowedUsersWithPermission(string $permission)
    {
        return User::whereHas('roles', function ($query) use ($permission) {

            $query->whereHas('permissions', function ($query) use ($permission) {
                $query->where('name', $permission);
            });

        })->orWhereHas('permissions', function ($query) use ($permission) {

            $query->where('name', $permission);

        });
    }

    public static function hasPermission($query, $permission)
    {
        return $query->whereHas('roles', function ($query) use ($permission) {

            $query->whereHas('permissions', function ($query) use ($permission) {
                $query->where('name', $permission);
            });

        })->orWhereHas('permissions', function ($query) use ($permission) {

            $query->where('name', $permission);

        });
    }

}