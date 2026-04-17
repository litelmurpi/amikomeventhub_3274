<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Seminar',
                'slug' => 'seminar',
                'event_count' => 12
            ],
            [
                'id' => 2,
                'name' => 'Konser',
                'slug' => 'konser',
                'event_count' => 8
            ],
            [
                'id' => 3,
                'name' => 'Workshop',
                'slug' => 'workshop',
                'event_count' => 15
            ],
        ];

        return view('admin.categories.index', compact('categories'));
    }
}
