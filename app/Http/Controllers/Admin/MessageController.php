<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the messages.
     */
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(15);
        
        return view('admin.messages.index', compact('messages'));
    }
    
    /**
     * Display the specified message.
     */
    public function show(ContactMessage $message)
    {
        // Mark message as read if it's not already
        if (!$message->read) {
            $message->update(['read' => true]);
        }
        
        return view('admin.messages.show', compact('message'));
    }
    
    /**
     * Remove the specified message from storage.
     */
    public function destroy(ContactMessage $message)
    {
        $message->delete();
        
        return redirect()->route('admin.messages.index')
            ->with('success', 'Message deleted successfully.');
    }
    
    /**
     * Mark a message as read.
     */
    public function markAsRead(ContactMessage $message)
    {
        $message->update(['read' => true]);
        
        return redirect()->route('admin.messages.index')
            ->with('success', 'Message marked as read.');
    }
    
    /**
     * Mark a message as unread.
     */
    public function markAsUnread(ContactMessage $message)
    {
        $message->update(['read' => false]);
        
        return redirect()->route('admin.messages.index')
            ->with('success', 'Message marked as unread.');
    }
}