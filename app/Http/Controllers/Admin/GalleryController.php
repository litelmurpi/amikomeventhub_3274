<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
        $operator = DB::connection()->getDriverName() === 'pgsql' ? 'ilike' : 'like';
        $galleries = Gallery::when($query, function($q) use ($query, $operator) {
            return $q->where('caption', $operator, '%' . $query . '%');
        })
        ->latest()
        ->get();

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required|string|max:255',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $file = $request->file('image');
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/galleries'), $fileName);
        $imagePath = 'uploads/galleries/' . $fileName;

        Gallery::create([
            'caption' => $request->caption,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.galleries')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'caption' => 'required|string|max:255',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = $gallery->image;

        if ($request->hasFile('image')) {
            // Delete old file if exists locally
            if ($gallery->image && File::exists(public_path($gallery->image))) {
                File::delete(public_path($gallery->image));
            }

            $file = $request->file('image');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/galleries'), $fileName);
            $imagePath = 'uploads/galleries/' . $fileName;
        }

        $gallery->update([
            'caption' => $request->caption,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.galleries')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        // Delete local image file
        if ($gallery->image && File::exists(public_path($gallery->image))) {
            File::delete(public_path($gallery->image));
        }

        $gallery->delete();

        return redirect()->route('admin.galleries')->with('success', 'Galeri berhasil dihapus.');
    }
}
