<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function home()
    {
        $featuredNews = News::where('is_featured', true)->latest()->take(5)->get();
        $latestNews = News::latest()->take(8)->get();
        $popularNews = News::inRandomOrder()->take(4)->get();
        
        return view('news.home', compact('featuredNews', 'latestNews', 'popularNews'));
    }
    
    public function category($category)
    {
        $news = News::where('category', $category)->latest()->paginate(10);
        return view('news.category', compact('news', 'category'));
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $featuredNews = News::where('is_featured', true)->latest()->take(5)->get();
        $latestNews = News::latest()->paginate(5);
        
        return view('news.index', compact('featuredNews', 'latestNews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $relatedNews = News::where('category', $news->category)
                        ->where('id', '!=', $news->id)
                        ->latest()
                        ->take(3)
                        ->get();
        
        return view('news.show', compact('news', 'relatedNews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
