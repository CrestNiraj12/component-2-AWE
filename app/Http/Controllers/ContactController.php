<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Alert;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::orderBy("created_at", "desc")->paginate(10);
        return view("admin.contacts.contacts", ['contacts' => $contacts]);
    }

    public function show($id) {
        $contact = Contact::find($id);
        return view("admin.contacts.contact", ['contact' => $contact]);
    }

    public function message(Request $request) {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "subject" => "required",
            "message" => "required"
        ]);

        Contact::create($request->all());
        Alert::success("Success", "Thank you for your message! We will get back to you soon!");
        return redirect()->back();
    }
}
