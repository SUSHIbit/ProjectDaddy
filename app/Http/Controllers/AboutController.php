<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the About Me page.
     */
    public function aboutMe()
    {
        // Fetch GM data from settings
        $generalManager = [
            'name' => Setting::get('gm_name', 'John Doe'),
            'title' => Setting::get('gm_title', 'General Manager'),
            'image' => Setting::get('gm_image', '/images/general-manager.jpg'),
            'about' => Setting::get('gm_about', 'Experienced General Manager with over 15 years in the industry, specializing in strategic planning, team leadership, and business development.')
        ];
        
        return view('about.me', compact('generalManager'));
    }
    
    /**
     * Display the About Company page.
     */
    public function aboutCompany()
    {
        // Fetch company data from settings
        $company = [
            'name' => Setting::get('company_name', 'Acme Corporation'),
            'video_url' => Setting::get('company_about_video', 'https://www.youtube.com/embed/dQw4w9WgXcQ')
        ];
        
        return view('about.company', compact('company'));
    }
    
    /**
     * Display the Company Detail page.
     */
    public function companyDetail()
    {
        // Fetch company detail data from settings
        $companyDetail = [
            'name' => Setting::get('company_name', 'Acme Corporation'),
            'video_url' => Setting::get('company_detail_video', 'https://www.youtube.com/embed/dQw4w9WgXcQ'),
            'description' => Setting::get('company_description', 'Acme Corporation is a leading provider of innovative solutions, dedicated to excellence and customer satisfaction.')
        ];
        
        return view('about.company-detail', compact('companyDetail'));
    }
}