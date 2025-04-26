<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmission;

class ContactController extends Controller
{
    /**
     * Display the contact form.
     */
    public function index()
    {
        return view('contact');
    }
    
    /**
     * Store a new contact message.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
        
        // Store the message in the database
        $message = ContactMessage::create($validated);
        
        // TODO: In the admin module, fetch the recipient email from settings
        $recipientEmail = 'manager@example.com';
        
        // Send email notification
        // We'll implement this mail class next
        Mail::to($recipientEmail)->send(new ContactFormSubmission($message));
        
        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }
}