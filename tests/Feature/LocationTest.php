<?php
declare(strict_types=1);

namespace Tests\Feature;

use App\Address;
use App\Category;
use App\Location;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Util;

class LocationTest extends TestCase
{
    use RefreshDatabase;

    /*
     * INDEX
     */

    /**
     * Test that everyone can view the list of locations.
     */
    public function testIndex()
    {
        $response = $this->get(route('locations.index'));
        $response->assertStatus(200);
    }

    /*
     * CREATE
     */

    /**
     * Test that authenticated users can view the location creation form.
     */
    public function testCreate()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route("locations.create_1"));
        $response->assertStatus(200);
    }

    /**
     * Test that guests can't view the location creation form.
     */
    public function testCreateGuest()
    {
        $response = $this->get(route("locations.create_1"));
        $response->assertStatus(403);
    }

    /*
     * STORE
     */

    /**
     * Test that authenticated users can create new locations.
     */
    public function testStore()
    {
        $category = factory(Category::class)->create();
        $user = factory(User::class)->create();
        $data = [
            'title' => 'My test location',
            'description' => 'Lorem ipsum',
            'street' => 'Foostr. 5',
            'city' => 'Barcity',
            'postcode' => '12345',
            'country' => 'DEU',
            'category' => $category->name,
        ];

        $response = $this->withSession(['location_data' => $data])
            ->actingAs($user)
            ->followingRedirects()
            ->post(route('locations.store'), $data);
        $response->assertStatus(200);

        // Validate that the location was stored correctly.
        $location = Location::first();
        $this->assertEquals($data['title'], $location->title);
        $this->assertEquals($data['description'], $location->description);
        $this->assertEquals($data['street'], $location->address->street);
        $this->assertEquals($data['city'], $location->address->city);
        $this->assertEquals($data['postcode'], $location->address->postcode);
        $this->assertEquals($data['country'], $location->address->country);
        $this->assertEquals($data['category'], $location->categories->first()->name);
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

        $response = $this->withSession(['location_data' => $data])
            ->followingRedirects()
            ->post(route('locations.store'), $data);
        $response->assertStatus(403);
    }

    /*
     * SHOW
     */

    /**
     * Test that everyone can location details.
     */
    public function testShow()
    {
        Util::createUser();
        $location = factory(Location::class)->create();

        $response = $this->get(route('locations.show', $location));
        $response->assertStatus(200);
    }

    /*
     * DESTROY
     */

    /**
     * Test that the owner can delete his own locations.
     */
    public function testDestroyOwner()
    {
        $location = Util::createLocation(null);

        $this->assertEquals(1, Location::count());
        $this->actingAs($location->user)
            ->followingRedirects()
            ->delete(route('locations.destroy', $location))
            ->assertStatus(200);

        self::assertFalse($location->exists());
    }

    /**
     * Test that admins can delete all locations.
     */
    public function testDestroyAdmin()
    {
        $location = Util::createLocation(null);
        $admin = Util::createAdmin();

        $response = $this->actingAs($admin)->followingRedirects()->delete(route('locations.destroy', $location));
        $response->assertStatus(200);

        self::assertFalse($location->exists());
    }

    /**
     * Test that guests can't delete locations.
     */
    public function testDestroyGuest()
    {
        $location = Util::createLocation(null);

        $response = $this->delete(route('locations.destroy', $location));
        $response->assertStatus(403);

        self::assertTrue($location->exists());
    }

    /*
     * SEARCH
     */

    public function testSearch()
    {
        $response = $this->get(route('locations.search', ['query' => 'foo']));
        $response->assertStatus(200);
    }

    /*
     * JSON SEARCH
     */

    public function testJsonSearch()
    {
        $user = Util::createUser();
        Location::create([
            'title' => 'a',
            'description' => 'b',
            'address_id' => Address::create([
                'street' => 'c',
                'postcode' => 'd',
                'city' => 'e',
                'country' => 'DEU',
            ])->id,
            'user_id' => $user->id,
        ]);

        $response = $this->get(route('locations.ajax-search'));
        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }
}
