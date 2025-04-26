<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Display the general manager settings form.
     */
    public function generalManager()
    {
        $settings = Setting::getByGroup('gm');
        
        // Add extra settings for experience and education if they exist
        $experience = json_decode(Setting::get('gm_experience', '[]'), true);
        $education = json_decode(Setting::get('gm_education', '[]'), true);
        
        return view('admin.settings.general-manager', compact('settings', 'experience', 'education'));
    }
    
    /**
     * Update the general manager settings.
     */
    public function updateGeneralManager(Request $request)
    {
        $validated = $request->validate([
            'gm_name' => 'required|string|max:255',
            'gm_title' => 'required|string|max:255',
            'gm_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gm_about' => 'required|string',
            'experience' => 'nullable|array',
            'experience.*.title' => 'required|string|max:255',
            'experience.*.company' => 'required|string|max:255',
            'experience.*.period' => 'required|string|max:255',
            'education' => 'nullable|array',
            'education.*.degree' => 'required|string|max:255',
            'education.*.school' => 'required|string|max:255',
            'education.*.period' => 'required|string|max:255',
        ]);
        
        // Handle image upload
        if ($request->hasFile('gm_image')) {
            // Delete old image if it exists
            $oldImage = Setting::get('gm_image');
            if ($oldImage && Storage::exists('public' . str_replace('/storage', '', $oldImage))) {
                Storage::delete('public' . str_replace('/storage', '', $oldImage));
            }
            
            $imagePath = $request->file('gm_image')->store('public/gm');
            Setting::set('gm_image', Storage::url($imagePath), 'gm');
        }
        
        // Update basic settings
        Setting::set('gm_name', $validated['gm_name'], 'gm');
        Setting::set('gm_title', $validated['gm_title'], 'gm');
        Setting::set('gm_about', $validated['gm_about'], 'gm');
        
        // Update experience and education
        if (isset($validated['experience'])) {
            Setting::set('gm_experience', json_encode($validated['experience']), 'gm');
        }
        
        if (isset($validated['education'])) {
            Setting::set('gm_education', json_encode($validated['education']), 'gm');
        }
        
        return redirect()->route('admin.settings.general-manager')
            ->with('success', 'General Manager settings updated successfully.');
    }
    
    /**
     * Display the company settings form.
     */
    public function company()
    {
        $settings = Setting::getByGroup('company');
        
        return view('admin.settings.company', compact('settings'));
    }
    
    /**
     * Update the company settings.
     */
    public function updateCompany(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_about_video' => 'required|url',
            'company_detail_video' => 'required|url',
            'company_description' => 'required|string',
            'company_services' => 'nullable|array',
            'company_services.*' => 'required|string|max:255',
        ]);
        
        // Handle logo upload
        if ($request->hasFile('company_logo')) {
            // Delete old logo if it exists
            $oldLogo = Setting::get('company_logo');
            if ($oldLogo && Storage::exists('public' . str_replace('/storage', '', $oldLogo))) {
                Storage::delete('public' . str_replace('/storage', '', $oldLogo));
            }
            
            $logoPath = $request->file('company_logo')->store('public/company');
            Setting::set('company_logo', Storage::url($logoPath), 'company');
        }
        
        // Update other settings
        Setting::set('company_name', $validated['company_name'], 'company');
        Setting::set('company_about_video', $validated['company_about_video'], 'company');
        Setting::set('company_detail_video', $validated['company_detail_video'], 'company');
        Setting::set('company_description', $validated['company_description'], 'company');
        
        // Update services if present
        if (isset($validated['company_services'])) {
            Setting::set('company_services', json_encode($validated['company_services']), 'company');
        }
        
        return redirect()->route('admin.settings.company')
            ->with('success', 'Company settings updated successfully.');
    }
    
    /**
     * Display the contact settings form.
     */
    public function contact()
    {
        $settings = Setting::getByGroup('contact');
        
        return view('admin.settings.contact', compact('settings'));
    }
    
    /**
     * Update the contact settings.
     */
    public function updateContact(Request $request)
    {
        $validated = $request->validate([
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:255',
            'contact_address' => 'required|string',
            'social_links' => 'nullable|array',
            'social_links.facebook' => 'nullable|url',
            'social_links.twitter' => 'nullable|url',
            'social_links.linkedin' => 'nullable|url',
            'social_links.instagram' => 'nullable|url',
        ]);
        
        // Update settings
        Setting::set('contact_email', $validated['contact_email'], 'contact');
        Setting::set('contact_phone', $validated['contact_phone'], 'contact');
        Setting::set('contact_address', $validated['contact_address'], 'contact');
        
        // Update social links if present
        if (isset($validated['social_links'])) {
            Setting::set('social_links', json_encode($validated['social_links']), 'contact');
        }
        
        return redirect()->route('admin.settings.contact')
            ->with('success', 'Contact settings updated successfully.');
    }
}