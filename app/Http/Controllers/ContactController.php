<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        dd($request->all());
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|max:200',
            'subject' => 'required|max:255',
            'message' => 'required|min:10',
        ]);

        // Save this data to database or send email

        return redirect()->back()->with('success', 'Contact form submitted successfully for '.$request->name);
    }
}

// Name, Email, Subject, Message
