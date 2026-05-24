<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
        $operator = DB::connection()->getDriverName() === 'pgsql' ? 'ilike' : 'like';
        $partners = Partner::when($query, function($q) use ($query, $operator) {
            return $q->where('name', $operator, '%' . $query . '%');
        })
        ->latest()
        ->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_url' => 'nullable|url|max:2048',
        ]);

        // At least one of logo or logo_url must be provided
        if (!$request->hasFile('logo') && !$request->filled('logo_url')) {
            return back()->withErrors(['logo' => 'Harap unggah berkas logo atau masukkan URL logo.'])->withInput();
        }

        $logoUrl = '';
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/partners'), $fileName);
            $logoUrl = 'uploads/partners/' . $fileName;
        } else {
            $logoUrl = $request->logo_url;
        }

        Partner::create([
            'name' => $request->name,
            'logo_url' => $logoUrl,
        ]);

        return redirect()->route('admin.partners')->with('success', 'Partner berhasil ditambahkan.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_url' => 'nullable|url|max:2048',
        ]);

        $logoUrl = $partner->logo_url;

        if ($request->hasFile('logo')) {
            // Delete old file if exists locally
            if ($partner->logo_url && !str_starts_with($partner->logo_url, 'http') && File::exists(public_path($partner->logo_url))) {
                File::delete(public_path($partner->logo_url));
            }

            $file = $request->file('logo');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/partners'), $fileName);
            $logoUrl = 'uploads/partners/' . $fileName;
        } elseif ($request->filled('logo_url')) {
            // If they provided a URL instead, use it and delete old local file
            if ($partner->logo_url && !str_starts_with($partner->logo_url, 'http') && File::exists(public_path($partner->logo_url))) {
                File::delete(public_path($partner->logo_url));
            }
            $logoUrl = $request->logo_url;
        }

        $partner->update([
            'name' => $request->name,
            'logo_url' => $logoUrl,
        ]);

        return redirect()->route('admin.partners')->with('success', 'Partner berhasil diperbarui.');
    }

    public function destroy(Partner $partner)
    {
        // Delete local logo file
        if ($partner->logo_url && !str_starts_with($partner->logo_url, 'http') && File::exists(public_path($partner->logo_url))) {
            File::delete(public_path($partner->logo_url));
        }

        $partner->delete();

        return redirect()->route('admin.partners')->with('success', 'Partner berhasil dihapus.');
    }
}
