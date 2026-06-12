<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::with('category')->get();
        $partners = Partner::latest()->get();
        $galleries = Gallery::latest()->take(6)->get();
        return view('welcome', compact('events', 'partners', 'galleries'));
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('gallery', compact('galleries'));
    }
}
