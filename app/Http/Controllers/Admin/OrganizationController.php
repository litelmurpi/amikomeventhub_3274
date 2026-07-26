<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * List all registered organizations for superadmin approval.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        $operator = \Illuminate\Support\Facades\DB::connection()->getDriverName() === 'pgsql' ? 'ilike' : 'like';

        $organizations = Organization::with('owner')
            ->withCount('events')
            ->when($query, function ($q) use ($query, $operator) {
                return $q->where('name', $operator, '%' . $query . '%');
            })
            ->latest()
            ->get();

        return view('admin.organizations.index', compact('organizations'));
    }

    /**
     * Approve an organization.
     */
    public function approve(Organization $organization)
    {
        $organization->update([
            'status' => 'approved',
            'is_verified' => true,
            'rejection_reason' => null,
        ]);

        return redirect()->back()->with('success', "Organisasi [{$organization->name}] berhasil disetujui!");
    }

    /**
     * Reject or deactivate an organization.
     */
    public function reject(Request $request, Organization $organization)
    {
        $request->validate([
            'rejection_reason' => 'nullable|string|max:1000',
        ]);

        $organization->update([
            'status' => 'rejected',
            'is_verified' => false,
            'rejection_reason' => $request->input('rejection_reason', 'Persyaratan dokumen organisasi belum lengkap/tidak valid.'),
        ]);

        return redirect()->back()->with('success', "Pendaftaran organisasi [{$organization->name}] ditolak.");
    }
}
