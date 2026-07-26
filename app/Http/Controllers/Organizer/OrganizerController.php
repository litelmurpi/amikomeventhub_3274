<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OrganizerController extends Controller
{
    private function getOrganization()
    {
        return Auth::user()->organization;
    }

    public function pending()
    {
        $user = Auth::user();
        $org = $user->organization;

        if ($org && $org->isApproved()) {
            return redirect()->route('organizer.dashboard');
        }

        return view('organizer.pending', compact('org'));
    }

    public function dashboard()
    {
        $org = $this->getOrganization();

        if (!$org) {
            return redirect()->route('organizer.register');
        }

        $orgEventIds = Event::where('organization_id', $org->id)->pluck('id');

        $stats = [
            'total_revenue' => number_format(
                Transaction::whereIn('event_id', $orgEventIds)
                    ->where('status', 'Success')
                    ->sum('total_price'),
                0, ',', '.'
            ),
            'tickets_sold' => Transaction::whereIn('event_id', $orgEventIds)
                ->where('status', 'Success')
                ->count(),
            'active_events' => Event::where('organization_id', $org->id)->count(),
            'pending_orders' => Transaction::whereIn('event_id', $orgEventIds)
                ->where('status', 'Pending')
                ->count(),
        ];

        $transactions = Transaction::with('event')
            ->whereIn('event_id', $orgEventIds)
            ->latest()
            ->take(5)
            ->get();

        return view('organizer.dashboard', compact('stats', 'transactions', 'org'));
    }

    public function events(Request $request)
    {
        $org = $this->getOrganization();
        $query = $request->input('search');
        $operator = DB::connection()->getDriverName() === 'pgsql' ? 'ilike' : 'like';

        $events = Event::with('category')
            ->where('organization_id', $org->id)
            ->when($query, function ($q) use ($query, $operator) {
                return $q->where('title', $operator, '%' . $query . '%');
            })
            ->latest()
            ->get();

        return view('organizer.events.index', compact('events', 'org'));
    }

    public function createEvent()
    {
        $categories = Category::all();
        $org = $this->getOrganization();
        return view('organizer.events.create', compact('categories', 'org'));
    }

    public function storeEvent(Request $request)
    {
        $org = $this->getOrganization();

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'description2' => 'nullable|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'poster' => 'nullable|image|max:2048',
        ]);

        $validated['organization_id'] = $org->id;
        $validated['organizer_name'] = $org->name;
        $validated['organizer_initials'] = strtoupper(substr($org->name, 0, 3));
        $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);

        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('posters', 'public');
            $validated['poster_path'] = 'storage/' . $path;
        }

        Event::create($validated);

        return redirect()->route('organizer.events')->with('success', 'Event berhasil ditambahkan');
    }

    public function editEvent(Event $event)
    {
        $org = $this->getOrganization();

        if ($event->organization_id !== $org->id && !Auth::user()->isSuperAdmin()) {
            abort(403, 'Akses ditolak.');
        }

        $categories = Category::all();
        return view('organizer.events.edit', compact('event', 'categories', 'org'));
    }

    public function updateEvent(Request $request, Event $event)
    {
        $org = $this->getOrganization();

        if ($event->organization_id !== $org->id && !Auth::user()->isSuperAdmin()) {
            abort(403, 'Akses ditolak.');
        }

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'description2' => 'nullable|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'poster' => 'nullable|image|max:2048',
        ]);

        if ($request->title !== $event->title) {
            $validated['slug'] = Str::slug($validated['title']) . '-' . Str::random(5);
        }

        if ($request->hasFile('poster')) {
            if ($event->poster_path && Str::startsWith($event->poster_path, 'storage/')) {
                Storage::disk('public')->delete(Str::replaceFirst('storage/', '', $event->poster_path));
            }
            $path = $request->file('poster')->store('posters', 'public');
            $validated['poster_path'] = 'storage/' . $path;
        }

        $event->update($validated);

        return redirect()->route('organizer.events')->with('success', 'Event berhasil diperbarui');
    }

    public function destroyEvent(Event $event)
    {
        $org = $this->getOrganization();

        if ($event->organization_id !== $org->id && !Auth::user()->isSuperAdmin()) {
            abort(403, 'Akses ditolak.');
        }

        if ($event->poster_path && Str::startsWith($event->poster_path, 'storage/')) {
            Storage::disk('public')->delete(Str::replaceFirst('storage/', '', $event->poster_path));
        }
        $event->delete();

        return redirect()->route('organizer.events')->with('success', 'Event berhasil dihapus');
    }

    public function profile()
    {
        $org = $this->getOrganization();
        return view('organizer.profile', compact('org'));
    }

    public function updateProfile(Request $request)
    {
        $org = $this->getOrganization();

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:organizations,name,' . $org->id,
            'description' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($org->logo_path && Str::startsWith($org->logo_path, 'storage/')) {
                Storage::disk('public')->delete(Str::replaceFirst('storage/', '', $org->logo_path));
            }
            $path = $request->file('logo')->store('organizations', 'public');
            $validated['logo_path'] = 'storage/' . $path;
        }

        $org->update($validated);

        return redirect()->route('organizer.profile')->with('success', 'Profil organisasi berhasil diperbarui.');
    }
}
