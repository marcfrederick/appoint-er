<?php
declare(strict_types=1);

namespace Tests\Feature;

use App\Location;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Util;

class LocationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that everyone can view the list of locations.
     */
    public function testIndex()
    {
        $response = $this->get(route('locations.index'));
        $response->assertStatus(200);
    }

    /**
     * Test that authenticated users can view the location creation form.
     */
    public function testCreate()
    {
        $this->markTestSkipped();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('locations.create'));
        $response->assertStatus(200);
    }

    /**
     * Test that guests can't view the location creation form.
     */
    public function testCreateGuest()
    {
        $this->markTestSkipped();
        $response = $this->get(route('locations.create'));
        $response->assertStatus(403);
    }

    /**
     * Test that authenticated users can create new locations.
     */
    public function testStore()
    {
        $this->markTestSkipped();
        $user = factory(User::class)->create();
        $data = [
            'title' => 'My test location',
            'description' => 'Lorem ipsum',
            'street' => 'Foostr. 5',
            'city' => 'Barcity',
            'postcode' => '12345',
            'country' => 'DEU',
        ];

        $response = $this->actingAs($user)->followingRedirects()->post(route('locations.store'), $data);
        $response->assertStatus(200);

        // Validate that the location was stored correctly.
        $location = Location::first();
        $this->assertEquals($data['title'], $location->title);
        $this->assertEquals($data['description'], $location->description);
        $this->assertEquals($data['street'], $location->address->street);
        $this->assertEquals($data['city'], $location->address->city);
        $this->assertEquals($data['postcode'], $location->address->postcode);
        $this->assertEquals($data['country'], $location->address->country);
        $this->assertEquals($user->id, $location->user_id);
    }

    /**
     * Test that guests can't create new locations.
     */
    public function testStoreGuest()
    {
        $data = [
            'title' => 'My test location',
            'description' => 'Lorem ipsum',
            'street' => 'Foostr. 5',
            'city' => 'Barcity',
            'postcode' => '12345',
            'country' => 'DEU',
        ];

        $response = $this->post(route('locations.store'), $data);
        $response->assertStatus(403);
    }

    /**
     * Test that everyone can location details.
     */
    public function testShow()
    {
        factory(User::class)->create();
        $location = factory(Location::class)->create();

        $response = $this->get(route('locations.show', $location));
        $response->assertStatus(200);
    }

    /**
     * Test that the owner can delete his own locations.
     */
    public function testDestroyOwner()
    {
        # FIXME
        $this->markTestSkipped('Returns 403 for some reason');

        $user = factory(User::class)->create();
        $location = factory(Location::class)->create();

        // Make sure the created location is actually owned by the previously created user.
        // This is an implementation detail of the factory but necessary for the following tests.
        // We should probably find a way to make this relationship explicit.
        $this->assertEquals($user->id, $location->user_id);

        $response = $this->actingAs($user)->delete(route('locations.destroy', $location));
        $response->assertStatus(200);
        $this->assertEquals(0, Location::count());
    }

    /**
     * Test that admins can delete all locations.
     */
    public function testDestroyAdmin()
    {
        factory(User::class)->create();
        $location = factory(Location::class)->create();
        $admin = Util::createAdmin();

        $response = $this->actingAs($admin)->followingRedirects()->delete(route('locations.destroy', $location));
        $response->assertStatus(200);
        $this->assertEquals(0, Location::count());
    }

    /**
     * Test that guests can't delete locations.
     */
    public function testDestroyGuest()
    {
        factory(User::class)->create();
        $location = factory(Location::class)->create();

        $response = $this->delete(route('locations.destroy', $location));
        $response->assertStatus(403);
        $this->assertNotEquals(0, Location::count());
    }

    public function testSearch()
    {
        $response = $this->get(route('locations.search', ['query' => 'foo']));
        $response->assertStatus(200);
    }
}
