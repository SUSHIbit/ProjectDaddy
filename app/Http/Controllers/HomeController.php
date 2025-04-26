<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the single page application.
     */
    public function index()
    {
        // TODO: Fetch data from database in the admin module
        // For now, we'll use static data
        $generalManager = [
            'name' => 'John Doe',
            'title' => 'General Manager',
            'image' => '/images/general-manager.jpg',
            'about' => 'Experienced General Manager with over 15 years in the industry, 
                       specializing in strategic planning, team leadership, and business development.'
        ];
        
        $company = [
            'name' => 'Acme Corporation',
            'logo' => '/images/company-logo.png',
            'about_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'detail_video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'description' => 'Acme Corporation is a leading provider of innovative solutions, 
                            dedicated to excellence and customer satisfaction.'
        ];
        
        $portfolios = [
            [
                'id' => 1,
                'title' => 'Portfolio 1',
                'company_logo' => '/images/company-logo.png',
                'pdf_file' => '/files/portfolio1.pdf'
            ],
            [
                'id' => 2,
                'title' => 'Portfolio 2',
                'company_logo' => '/images/company-logo.png',
                'pdf_file' => '/files/portfolio2.pdf'
            ]
        ];
        
        return view('home', compact('generalManager', 'company', 'portfolios'));
    }
}