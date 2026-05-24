<?php

use App\Models\Category;
use App\Models\Partner;
use App\Models\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

uses(RefreshDatabase::class);

test('homepage renders seeded partners list', function () {
    // Seed database
    $partner1 = Partner::create([
        'name' => 'Universitas Amikom Yogyakarta',
        'logo_url' => 'https://ui-avatars.com/api/?name=Amikom'
    ]);
    
    $partner2 = Partner::create([
        'name' => 'Google Cloud',
        'logo_url' => 'https://ui-avatars.com/api/?name=Google'
    ]);

    $response = $this->get(route('home'));

    $response->assertStatus(200);
    $response->assertSee('Universitas Amikom Yogyakarta');
    $response->assertSee('Google Cloud');
});

test('admin categories page supports search parameter', function () {
    $cat1 = Category::create(['name' => 'Music Concert', 'slug' => 'music-concert']);
    $cat2 = Category::create(['name' => 'Tech Workshop', 'slug' => 'tech-workshop']);

    // Without search, shows both
    $response = $this->get(route('admin.categories'));
    $response->assertSee('Music Concert');
    $response->assertSee('Tech Workshop');

    // With search, filters
    $response = $this->get(route('admin.categories', ['search' => 'Tech']));
    $response->assertSee('Tech Workshop');
    $response->assertDontSee('Music Concert');

    // Case insensitive search
    $response = $this->get(route('admin.categories', ['search' => 'tech']));
    $response->assertSee('Tech Workshop');
    $response->assertDontSee('Music Concert');

    $response = $this->get(route('admin.categories', ['search' => 'TECH']));
    $response->assertSee('Tech Workshop');
    $response->assertDontSee('Music Concert');
});

test('admin partners page supports CRUD operations', function () {
    // 1. Create Partner
    $response = $this->post(route('admin.partners.store'), [
        'name' => 'Gojek Indonesia',
        'logo_url' => 'https://ui-avatars.com/api/?name=Gojek'
    ]);

    $response->assertRedirect(route('admin.partners'));
    $this->assertDatabaseHas('partners', [
        'name' => 'Gojek Indonesia',
        'logo_url' => 'https://ui-avatars.com/api/?name=Gojek'
    ]);

    // 2. Read and Search
    $partner = Partner::first();
    $response = $this->get(route('admin.partners', ['search' => 'Gojek']));
    $response->assertSee('Gojek Indonesia');

    $response = $this->get(route('admin.partners', ['search' => 'Grab']));
    $response->assertDontSee('Gojek Indonesia');

    // Case insensitive search
    $response = $this->get(route('admin.partners', ['search' => 'gojek']));
    $response->assertSee('Gojek Indonesia');

    $response = $this->get(route('admin.partners', ['search' => 'GOJEK']));
    $response->assertSee('Gojek Indonesia');

    // 3. Edit Form
    $response = $this->get(route('admin.partners.edit', $partner->id));
    $response->assertStatus(200);

    // 4. Update Partner
    $response = $this->put(route('admin.partners.update', $partner->id), [
        'name' => 'Gojek Updated',
        'logo_url' => 'https://ui-avatars.com/api/?name=Gojek2'
    ]);
    $response->assertRedirect(route('admin.partners'));
    $this->assertDatabaseHas('partners', [
        'id' => $partner->id,
        'name' => 'Gojek Updated',
        'logo_url' => 'https://ui-avatars.com/api/?name=Gojek2'
    ]);

    // 5. Delete Partner
    $response = $this->delete(route('admin.partners.destroy', $partner->id));
    $response->assertRedirect(route('admin.partners'));
    $this->assertDatabaseMissing('partners', [
        'id' => $partner->id
    ]);
});

test('admin partners page supports SVG upload', function () {
    $file = UploadedFile::fake()->create('amikom.svg', 100, 'image/svg+xml');

    $response = $this->post(route('admin.partners.store'), [
        'name' => 'Amikom Sponsor',
        'logo' => $file,
    ]);

    $response->assertRedirect(route('admin.partners'));
    
    $partner = Partner::where('name', 'Amikom Sponsor')->first();
    expect($partner)->not->toBeNull();
    expect($partner->logo_url)->toStartWith('uploads/partners/');
    
    // Clean up file if created during test
    if (File::exists(public_path($partner->logo_url))) {
        File::delete(public_path($partner->logo_url));
    }
});

test('admin events page supports search parameter', function () {
    $cat = Category::create(['name' => 'Music', 'slug' => 'music']);
    $event1 = Event::create([
        'category_id' => $cat->id,
        'title' => 'Jazz Fest',
        'slug' => 'jazz-fest',
        'date' => '2024-11-16 19:30:00',
        'location' => 'The Blue Note Lounge',
        'price' => 150000,
        'stock' => 150,
        'organizer_name' => 'Jogja Jazz Community',
    ]);
    $event2 = Event::create([
        'category_id' => $cat->id,
        'title' => 'Rock Fest',
        'slug' => 'rock-fest',
        'date' => '2024-11-16 19:30:00',
        'location' => 'The Blue Note Lounge',
        'price' => 150000,
        'stock' => 150,
        'organizer_name' => 'Jogja Jazz Community',
    ]);

    // Without search, shows both
    $response = $this->get(route('admin.events'));
    $response->assertSee('Jazz Fest');
    $response->assertSee('Rock Fest');

    // Case-insensitive search filters correctly
    $response = $this->get(route('admin.events', ['search' => 'jazz']));
    $response->assertSee('Jazz Fest');
    $response->assertDontSee('Rock Fest');

    $response = $this->get(route('admin.events', ['search' => 'JAZZ']));
    $response->assertSee('Jazz Fest');
    $response->assertDontSee('Rock Fest');
});

test('uts guide route renders correctly', function () {
    $response = $this->get(route('uts-guide'));
    $response->assertStatus(200);
    $response->assertSee('Amikom Event Hub');
    $response->assertSee('24.12.3274');
    $response->assertSee('Debounce');
});

