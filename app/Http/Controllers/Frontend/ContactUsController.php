<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Rules\ReCaptcha;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('frontend.pages.contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email', 'max:255', 'string'],
            'phone' => ['required', 'string', 'max:20'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
            'g-recaptcha-response'=>[new ReCaptcha()]
        ]);

        Contact::create($data);
        return back()->with('success', 'Thanks for contacting us!');
    }
    
    
}
