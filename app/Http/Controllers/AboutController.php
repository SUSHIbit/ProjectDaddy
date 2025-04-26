<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the About Me page.
     */
    public function aboutMe()
    {
        // TODO: Fetch GM data from database in the admin module
        // For now, we'll use static data
        $generalManager = [
            'name' => 'John Doe',
            'title' => 'General Manager',
            'image' => '/images/general-manager.jpg',
            'about' => 'Experienced General Manager with over 15 years in the industry, 
                       specializing in strategic planning, team leadership, and business development.'
        ];
        
        return view('about.me', compact('generalManager'));
    }
    
    /**
     * Display the About Company page.
     */
    public function aboutCompany()
    {
        // TODO: Fetch company data from database in the admin module
        // For now, we'll use static data
        $company = [
            'name' => 'Acme Corporation',
            'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
        ];
        
        return view('about.company', compact('company'));
    }
    
    /**
     * Display the Company Detail page.
     */
    public function companyDetail()
    {
        // TODO: Fetch company detail data from database in the admin module
        // For now, we'll use static data
        $companyDetail = [
            'name' => 'Acme Corporation',
            'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'description' => 'Acme Corporation is a leading provider of innovative solutions, 
                            dedicated to excellence and customer satisfaction.'
        ];
        
        return view('about.company-detail', compact('companyDetail'));
    }
}