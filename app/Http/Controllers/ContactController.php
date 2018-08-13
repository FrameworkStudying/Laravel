<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// load Uuid libiary for generating uuid
use Ramsey\Uuid\Uuid;
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
        // A ModelNotFoundExcepption will be return if a model is not found.
        $contact = Contact::findOrFail($request->id);
        $contents = [
            'content' => $contact
        ];
        return view('contact_detail', $contents);
    }

    public function updateUUID(Request $request)
    {
        $contact = Contact::findOrFail($request->id);
        $oldUUid = $contact->uuid;
        $contact->uuid = Uuid::uuid1();
        $msg = 'failure';
        if ($contact->save()) {
            $contact->uuid = '';
            // Reload current model from DB
            $contact->refresh();
            $msg = $oldUUid == $contact->uuid ? 'failure' : 'successfully';
        }
        $contents = [
            'content' => 'UUID update '.$msg.'! '.'UUID is '.$contact->uuid
        ];
        return view('hello_world', $contents);
    }
}
