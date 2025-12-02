<?php

namespace App\Http\Controllers;

use App\Mail\AdminContactNotification;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome');
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'request' => 'nullable|in:general,support,feedback,other',
            'message' => 'nullable|string',
        ]);

        $contact = Contact::create($request->all());

        Mail::to('venture.purushottam@gmail.com')->send(new AdminContactNotification($contact));

        return back()->with('success', 'Contact saved successfully!');
    }




    public function inbox()
    {
        $contacts = Contact::latest()->get();

        return view('backend.contacts.inbox', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

}
