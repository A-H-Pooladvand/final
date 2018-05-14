<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 3/4/2018
 * Time: 12:38 PM
 */

namespace App\Http\Controllers\Follow\Front;


use App\User;
use Illuminate\Http\Request;

class ValidateFollowers
{
    /**
     *
     * @param Request $request
     * @param User $followed_id
     * @return bool
     */
    public static function canFollow(Request $request, $followed_id): bool
    {
        $validateFollowers = new ValidateFollowers();

        if ($validateFollowers->isFollowingHimself($request, $followed_id) || $validateFollowers->isAlreadyFollower($followed_id))
            return false;

        return true;
    }

    /**
     * Indicates if user is following himself or not
     *
     * @param Request $request
     * @param User $followed_id
     * @return bool
     */
    public static function isFollowingHimself(Request $request, $followed_id): bool
    {
        if ($request->user()->id === intval($followed_id))
            return true;

        return false;
    }

    /**
     * Indicates if user is already following requested user or not
     * Also it checks if user is logged in or not
     *
     * @param User $followed_id
     * @return bool
     */
    public static function isAlreadyFollower($followed_id): bool
    {
        if ( ! auth()->check())
            return false;

        $user = User::with(['followings' => function ($query) use ($followed_id) {
            $query->where('id', '=', $followed_id);
        }])->findOrFail(auth()->id());

        if ($user->followings->isEmpty())
            return false;

        return true;
    }
}