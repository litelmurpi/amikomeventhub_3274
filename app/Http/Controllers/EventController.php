<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function show($slug)
    {
        $event = Event::with('category')->where('slug', $slug)->firstOrFail();

        return view('event-detail', compact('event'));
    }

    public function checkout($slug)
    {
        $event = Event::with('category')->where('slug', $slug)->firstOrFail();

        return view('checkout', compact('event'));
    }
}
