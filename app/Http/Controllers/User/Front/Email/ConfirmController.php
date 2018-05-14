<?php

namespace App\Http\Controllers\User\Front\Email;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ConfirmController extends Controller
{
    public function requestConfirm()
    {
        return view('user.front.confirm_email.create');
    }

    /**
     * @param Request $request
     * @param $id
     * @param $token
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function confirmUser(Request $request, $id, $token)
    {
        $user = User::findOrFail($id);

        if ($token === $user->verifyToken) {
            $user->is_active = true;
            $user->save();
            Session::flash('welcome', "با تشکر از عضویت شما. <br> حساب شما فعال شد و میتوانید از امکانات سایت استفاده نمایید.");
        }

        return redirect('/');
    }
}
