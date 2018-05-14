<?php

namespace App\Http\Controllers\Contact\Admin;

use App\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function show()
    {
        $contact = ContactUs::findOrFail(1);
        return view('contact.admin.show', compact('contact'));
    }

    public function edit()
    {
        $contact = ContactUs::findOrFail(1);

        return view('contact.admin.form', compact('contact'));
    }

    public function update(Request $request)
    {
        $contact = ContactUs::findOrFail(1);
        $contact->content = $request['content'];
        $contact->save();

        return ['message' => 'تماس با ما با موفقیت ویرایش گردید.'];
    }
}
