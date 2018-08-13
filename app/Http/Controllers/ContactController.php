<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// load Contact Model file.
use App\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->firstname = $request->firstname;
        $contact->lastname = $request->lastname;
        $contact->save();
    }

    public function retrieve(Request $request)
    {
    	# A ModelNotFoundExcepption will be return if a model is not found.
    	$contact = Contact::findOrFail($request->id);
    	$contents = [
            'content' => $contact
        ];
    	return view('contact_detail', $contents);
    }
}
