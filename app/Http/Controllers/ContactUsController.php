<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contact.contact');
    }

    public function store(ContactRequest $request)
    {
        $contact = new ContactUs();
        $contact->fill($request->validated());
        $contact->save();
        return back()->with('success', 'Your Message has been sent successfully');
    }
}
