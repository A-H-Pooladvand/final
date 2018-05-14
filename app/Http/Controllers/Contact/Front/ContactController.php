<?php

namespace App\Http\Controllers\Contact\Front;

use App\Contact;
use App\ContactUs;
use App\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {

        $this->seo()->setTitle('تماس با ما');
        $this->seo()->setDescription('تماس با ما');


        $this->setBreadcrumb([
            [
                'title' => 'تماس با ما',
                'link' => route('contact.show'),
            ],
        ]);

        $contact = ContactUs::findOrFail(1);
        return view('contact.front.show', compact('contact'));
    }

    public function feedback(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'title' => 'required|max:50',
            'email' => 'nullable|email|min:3|max:100',
            'mobile' => ['nullable', 'regex:/^09[0-9]{9}$/'],
            'content' => 'required|max:500',
        ], [], [
            'name' => 'نام',
            'title' => 'عنوان',
            'email' => 'پست الکترونیکی',
            'mobile' => 'شماره همراه',
            'content' => 'متن',
        ]);

        $me = $request->user();

        $feedback = Feedback::create([
            'user_id' => $me ? $me->id : null,
            'name' => e(trim($request->input('name'))),
            'title' => e(trim($request->input('title'))),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
            'content' => e(trim($request->input('content'))),
        ]);

        if ($feedback)
            return redirect()->back()->with('message', 'پیام شما با موفقیت ثبت شد.');
        return redirect()->back()->with('message', 'متاسفانه اشکالی در ثبت پیام شما وجود دارد لطفا مجدد تلاش نمایید.');
    }
}
