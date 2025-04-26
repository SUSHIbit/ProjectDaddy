<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Setting;
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
        // Get contact information from settings
        $contactInfo = [
            'email' => Setting::get('contact_email', 'contact@example.com'),
            'phone' => Setting::get('contact_phone', '+1 (555) 123-4567'),
            'address' => Setting::get('contact_address', '123 Business Avenue, Suite 100, San Francisco, CA 94107')
        ];
        
        return view('contact', compact('contactInfo'));
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
        
        // Get recipient email from settings
        $recipientEmail = Setting::get('contact_email', 'manager@example.com');
        
        // Send email notification
        Mail::to($recipientEmail)->send(new ContactFormSubmission($message));
        
        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }
}