<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the single page application.
     */
    public function index()
    {
        // Fetch General Manager data from settings
        $generalManager = [
            'name' => Setting::get('gm_name', 'John Doe'),
            'title' => Setting::get('gm_title', 'General Manager'),
            'image' => Setting::get('gm_image', '/images/general-manager.jpg'),
            'about' => Setting::get('gm_about', 'Experienced General Manager with over 15 years in the industry, specializing in strategic planning, team leadership, and business development.'),
            'experience' => json_decode(Setting::get('gm_experience', '[]'), true) ?: [
                [
                    'title' => 'CEO & Co-Founder',
                    'company' => 'Acme Corporation',
                    'period' => '2015 - Present'
                ],
                [
                    'title' => 'VP of Operations',
                    'company' => 'XYZ Industries',
                    'period' => '2010 - 2015'
                ],
                [
                    'title' => 'Senior Manager',
                    'company' => 'ABC Company',
                    'period' => '2005 - 2010'
                ]
            ],
            'education' => json_decode(Setting::get('gm_education', '[]'), true) ?: [
                [
                    'degree' => 'MBA, Business Administration',
                    'school' => 'Harvard Business School',
                    'period' => '2003 - 2005'
                ],
                [
                    'degree' => 'Bachelor of Science, Engineering',
                    'school' => 'MIT',
                    'period' => '1999 - 2003'
                ]
            ]
        ];
        
        // Fetch Company data from settings
        $company = [
            'name' => Setting::get('company_name', 'Acme Corporation'),
            'logo' => Setting::get('company_logo', '/images/company-logo.png'),
            'about_video_url' => Setting::get('company_about_video', 'https://www.youtube.com/embed/dQw4w9WgXcQ'),
            'detail_video_url' => Setting::get('company_detail_video', 'https://www.youtube.com/embed/dQw4w9WgXcQ'),
            'description' => Setting::get('company_description', 'Acme Corporation is a leading provider of innovative solutions, dedicated to excellence and customer satisfaction.'),
            'services' => json_decode(Setting::get('company_services', '[]'), true) ?: [
                'Strategic Business Consulting',
                'Digital Transformation Solutions',
                'Technology Implementation',
                'Process Optimization'
            ]
        ];
        
        // Fetch Contact information
        $contactInfo = [
            'email' => Setting::get('contact_email', 'contact@example.com'),
            'phone' => Setting::get('contact_phone', '+1 (555) 123-4567'),
            'address' => Setting::get('contact_address', '123 Business Avenue, Suite 100, San Francisco, CA 94107'),
            'social_links' => json_decode(Setting::get('social_links', '{}'), true) ?: [
                'facebook' => '#',
                'twitter' => '#',
                'linkedin' => '#',
                'instagram' => '#'
            ]
        ];
        
        // Fetch Portfolios from database
        $portfolios = Portfolio::where('is_published', true)
            ->orderBy('order')
            ->get()
            ->map(function($portfolio) {
                return [
                    'id' => $portfolio->id,
                    'title' => $portfolio->title,
                    'company_logo' => $portfolio->company_logo,
                    'pdf_file' => $portfolio->pdf_file,
                    'description' => $portfolio->description,
                    'highlights' => $portfolio->highlights ?: []
                ];
            });
        
        return view('home', compact('generalManager', 'company', 'portfolios', 'contactInfo'));
    }
}