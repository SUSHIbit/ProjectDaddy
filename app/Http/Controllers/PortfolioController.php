<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display the portfolio list.
     */
    public function index()
    {
        // Fetch published portfolios ordered by the order field
        $portfolios = Portfolio::where('is_published', true)
            ->orderBy('order')
            ->get();
        
        return view('portfolio.index', compact('portfolios'));
    }
    
    /**
     * Display a specific portfolio item.
     */
    public function show($id)
    {
        // Find the specific portfolio or throw 404 if not found
        $portfolio = Portfolio::where('is_published', true)->findOrFail($id);
        
        return view('portfolio.show', compact('portfolio'));
    }
}