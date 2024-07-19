<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Leads;


class ContactController extends Controller
{
    public function index()
    {
        return view('contact.contact');
    }

    public function store(ContactRequest $request)
    {
        $contact = new Leads();
        $contact->fill($request->validated());
        $contact->save();
        return back()->with('success', 'Your Message has been sent successfully');
    }
}
