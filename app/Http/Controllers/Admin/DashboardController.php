<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        // Get counts for dashboard statistics
        $stats = [
            'portfolios' => Portfolio::count(),
            'published_portfolios' => Portfolio::where('is_published', true)->count(),
            'unread_messages' => ContactMessage::where('read', false)->count(),
            'total_messages' => ContactMessage::count(),
        ];
        
        // Get latest messages for dashboard
        $latestMessages = ContactMessage::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        return view('admin.dashboard', compact('stats', 'latestMessages'));
    }
}