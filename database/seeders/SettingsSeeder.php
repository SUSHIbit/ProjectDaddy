<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // General Manager settings
        Setting::set('gm_name', 'John Doe', 'gm');
        Setting::set('gm_title', 'General Manager', 'gm');
        Setting::set('gm_image', '/images/general-manager.jpg', 'gm');
        Setting::set('gm_about', 'Experienced General Manager with over 15 years in the industry, specializing in strategic planning, team leadership, and business development.', 'gm');
        
        // Company settings
        Setting::set('company_name', 'Acme Corporation', 'company');
        Setting::set('company_logo', '/images/company-logo.png', 'company');
        Setting::set('company_about_video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'company');
        Setting::set('company_detail_video', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'company');
        Setting::set('company_description', 'Acme Corporation is a leading provider of innovative solutions, dedicated to excellence and customer satisfaction.', 'company');
        
        // Contact settings
        Setting::set('contact_email', 'manager@example.com', 'contact');
        Setting::set('contact_phone', '+1 (555) 123-4567', 'contact');
        Setting::set('contact_address', '123 Business Avenue, Suite 100, San Francisco, CA 94107', 'contact');
    }
}