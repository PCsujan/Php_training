<?php

namespace App\Http\Controllers;

use App\Mail\AdminContactNotification;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // Welcome page
    public function index()
    {
        return view('welcome');
    }
    // Store contact
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'request' => 'nullable|in:general,support,feedback,other',
            'message' => 'nullable|string',
            'attachement' => 'nullable|file|max:2048'
        ]);

        $filePath = null;
        if ($request->hasFile('attachement')) {
            $filePath = $request->file('attachement')->store('contact_attachements', 'public');
        }

        $data = $request->all();
        $data['attachement'] = $filePath;

        $contact = Contact::create($data);

        Mail::to('venture.purushottam@gmail.com')->send(new AdminContactNotification($contact));

        return back()->with('success', 'Contact saved successfully!');
    }

    // Inbox
    public function inbox()
    {
        $contacts = Contact::latest()->get();
        return view('backend.contacts.inbox', compact('contacts'));
    }

    // Single Message
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('backend.contacts.show', compact('contact'));
    }

    // Delete
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.inbox')->with('success', 'Message deleted successfully!');
    }

    // Mark as Read
    public function markRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->is_read = 1;
        $contact->save();
        return redirect()->back()->with('success', 'Message marked as read.');
    }
}
