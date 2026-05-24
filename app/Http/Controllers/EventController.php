<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

class EventController extends Controller
{
    public function katalog(Request $request)
    {
        $categories = Category::all();

        $query = Event::with('category');

        if ($request->has('category') && $request->category != '') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $events = $query->latest()->get();

        return view('katalog', compact('events', 'categories'));
    }

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
