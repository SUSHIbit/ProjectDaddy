<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display the portfolio list.
     */
    public function index()
    {
        // TODO: Fetch portfolios from database in the admin module
        // For now, we'll use static data
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
        
        return view('portfolio.index', compact('portfolios'));
    }
    
    /**
     * Display a specific portfolio item.
     */
    public function show($id)
    {
        // TODO: Fetch specific portfolio from database in the admin module
        // For now, we'll use static data
        $portfolio = [
            'id' => $id,
            'title' => 'Portfolio ' . $id,
            'company_logo' => '/images/company-logo.png',
            'pdf_file' => '/files/portfolio' . $id . '.pdf'
        ];
        
        return view('portfolio.show', compact('portfolio'));
    }
}