<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Partner;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::with('category')->get();
        $partners = Partner::latest()->get();
        return view('welcome', compact('events', 'partners'));
    }
}
