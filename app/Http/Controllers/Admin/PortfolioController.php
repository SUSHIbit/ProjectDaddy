<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the portfolios.
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy('order')->get();
        
        return view('admin.portfolios.index', compact('portfolios'));
    }
    
    /**
     * Show the form for creating a new portfolio.
     */
    public function create()
    {
        return view('admin.portfolios.create');
    }
    
    /**
     * Store a newly created portfolio in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf_file' => 'required|mimes:pdf|max:10240',
            'description' => 'nullable|string',
            'highlights' => 'nullable|array',
            'order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);
        
        // Handle file uploads
        if ($request->hasFile('company_logo')) {
            $logoPath = $request->file('company_logo')->store('public/logos');
            $validated['company_logo'] = Storage::url($logoPath);
        }
        
        if ($request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->store('public/portfolios');
            $validated['pdf_file'] = Storage::url($pdfPath);
        }
        
        // Set default values
        $validated['is_published'] = $request->has('is_published');
        $validated['order'] = $validated['order'] ?? Portfolio::count() + 1;
        
        Portfolio::create($validated);
        
        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio created successfully.');
    }
    
    /**
     * Show the form for editing the specified portfolio.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }
    
    /**
     * Update the specified portfolio in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf_file' => 'nullable|mimes:pdf|max:10240',
            'description' => 'nullable|string',
            'highlights' => 'nullable|array',
            'order' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);
        
        // Handle file uploads
        if ($request->hasFile('company_logo')) {
            // Delete old logo if it exists
            if ($portfolio->company_logo && Storage::exists('public' . str_replace('/storage', '', $portfolio->company_logo))) {
                Storage::delete('public' . str_replace('/storage', '', $portfolio->company_logo));
            }
            
            $logoPath = $request->file('company_logo')->store('public/logos');
            $validated['company_logo'] = Storage::url($logoPath);
        }
        
        if ($request->hasFile('pdf_file')) {
            // Delete old PDF if it exists
            if ($portfolio->pdf_file && Storage::exists('public' . str_replace('/storage', '', $portfolio->pdf_file))) {
                Storage::delete('public' . str_replace('/storage', '', $portfolio->pdf_file));
            }
            
            $pdfPath = $request->file('pdf_file')->store('public/portfolios');
            $validated['pdf_file'] = Storage::url($pdfPath);
        }
        
        // Set default values
        $validated['is_published'] = $request->has('is_published');
        
        $portfolio->update($validated);
        
        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio updated successfully.');
    }
    
    /**
     * Remove the specified portfolio from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        // Delete associated files
        if ($portfolio->company_logo && Storage::exists('public' . str_replace('/storage', '', $portfolio->company_logo))) {
            Storage::delete('public' . str_replace('/storage', '', $portfolio->company_logo));
        }
        
        if ($portfolio->pdf_file && Storage::exists('public' . str_replace('/storage', '', $portfolio->pdf_file))) {
            Storage::delete('public' . str_replace('/storage', '', $portfolio->pdf_file));
        }
        
        $portfolio->delete();
        
        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Portfolio deleted successfully.');
    }
    
    /**
     * Update the order of portfolios.
     */
    public function updateOrder(Request $request)
    {
        $validated = $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:portfolios,id',
        ]);
        
        foreach ($validated['order'] as $index => $id) {
            Portfolio::where('id', $id)->update(['order' => $index + 1]);
        }
        
        return response()->json(['success' => true]);
    }
}