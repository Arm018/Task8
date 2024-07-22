<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Leads;
use App\Services\ContactService;


class ContactController extends Controller
{
    protected ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        return view('contact.contact');
    }

    public function store(ContactRequest $request)
    {
        $this->contactService->store($request->validated());
        return back()->with('success', 'Your Message has been sent successfully');
    }
}
