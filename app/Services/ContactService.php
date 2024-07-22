<?php

namespace App\Services;

use App\Http\Requests\ContactRequest;
use App\Models\Leads;

class ContactService
{
    public function store($data)
    {
        $contact = new Leads();
        $contact->fill($data);
        $contact->save();
    }
}
