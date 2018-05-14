<?php

namespace App\Http\Controllers\Contact\Admin;

use App\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Objects\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.admin.contacts.index');
    }

    public function items(Request $request)
    {
        $contacts = Feedback::query();

        return $this->getGrid($request)->items($contacts);
    }

    public function show($id)
    {
        $contact = Feedback::findOrFail($id);
//        return $contact;
        return view('contact.admin.contacts.show', compact('contact'));
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);

        Feedback::whereIn('id', $ids)->delete();
    }
}
