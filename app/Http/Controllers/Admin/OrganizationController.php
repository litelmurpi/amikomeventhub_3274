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
        $search = $request->input('search');
        $status = $request->input('status');
        $operator = \Illuminate\Support\Facades\DB::connection()->getDriverName() === 'pgsql' ? 'ilike' : 'like';

        $counts = [
            'all' => Organization::count(),
            'approved' => Organization::where(function($q) { $q->where('status', 'approved')->orWhere('is_verified', true); })->count(),
            'pending' => Organization::where('status', 'pending')->where('is_verified', false)->count(),
            'rejected' => Organization::where('status', 'rejected')->where('is_verified', false)->count(),
        ];

        $organizations = Organization::with('owner')
            ->withCount('events')
            ->when($search, function ($q) use ($search, $operator) {
                return $q->where('name', $operator, '%' . $search . '%');
            })
            ->when($status, function ($q) use ($status) {
                if ($status === 'approved') {
                    return $q->where(function($sub) { $sub->where('status', 'approved')->orWhere('is_verified', true); });
                } elseif ($status === 'pending') {
                    return $q->where('status', 'pending')->where('is_verified', false);
                } elseif ($status === 'rejected') {
                    return $q->where('status', 'rejected')->where('is_verified', false);
                }
            })
            ->latest()
            ->get();

        return view('admin.organizations.index', compact('organizations', 'counts'));
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

        $wasApproved = $organization->isApproved();

        $organization->update([
            'status' => 'rejected',
            'is_verified' => false,
            'rejection_reason' => $request->input('rejection_reason', 'Persyaratan dokumen organisasi belum lengkap/tidak valid.'),
        ]);

        $message = $wasApproved 
            ? "Organisasi [{$organization->name}] telah dinonaktifkan."
            : "Pendaftaran organisasi [{$organization->name}] ditolak.";

        return redirect()->back()->with('success', $message);
    }
}
