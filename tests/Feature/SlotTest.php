<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Util;

class SlotTest extends TestCase
{
    use RefreshDatabase;

    /*
     * CREATE
     */

    public function testCreateGuest()
    {
        $location = Util::createLocation();

        $response = $this->get(route('slots.create', $location));
        $response->assertRedirect('login');
    }

    public function testCreateRandomUser()
    {
        $john_doe = Util::createUser();
        $location = Util::createLocation();

        $response = $this->actingAs($john_doe)
            ->get(route('slots.create', $location));
        $response->assertStatus(403);
    }

    public function testCreateOwner()
    {
        $location = Util::createLocation();

        $response = $this->actingAs($location->user)
            ->get(route('slots.create', $location));
        $response->assertStatus(200);
    }

    public function testCreateAdmin()
    {
        $admin = Util::createAdmin();
        $location = Util::createLocation();

        $response = $this->actingAs($admin)
            ->get(route('slots.create', $location));
        $response->assertStatus(200);
    }

    /*
     * STORE
     */

    public function testStoreGuest()
    {
        $location = Util::createLocation();

        $response = $this->post(route('slots.store', $location));
        $response->assertRedirect('login');
    }

    public function testStoreRandomUser()
    {
        $john_doe = Util::createUser();
        $location = Util::createLocation();
        $data = ['date' => '2050-10-10', 'time' => '00:00', 'duration' => '90', 'location' => $location];

        $response = $this->actingAs($john_doe)
            ->post(route('slots.store', $location), $data);
        $response->assertStatus(403);
    }

    public function testStoreOwner()
    {
        $location = Util::createLocation();
        $data = ['date' => '2050-10-10', 'time' => '00:00', 'duration' => '90', 'location' => $location];

        $response = $this->actingAs($location->user)
            ->post(route('slots.store', $location), $data);
        $response->assertRedirect(route('locations.show', $location));
    }

    public function testStoreAdmin()
    {
        $admin = Util::createAdmin();
        $location = Util::createLocation();
        $data = ['date' => '2050-10-10', 'time' => '00:00', 'duration' => '90', 'location' => $location];

        $response = $this->actingAs($admin)
            ->post(route('slots.store', $location), $data);
        $response->assertRedirect(route('locations.show', $location));
    }

    /*
     * DESTROY
     */

    public function testDestroyGuest()
    {
        $slot = Util::createSlot();

        $response = $this->delete(route('slots.destroy', [$slot->location, $slot]));
        $response->assertRedirect('login');
    }

    public function testDestroyRandomUser()
    {
        $john_doe = Util::createUser();
        $slot = Util::createSlot();

        $response = $this->actingAs($john_doe)
            ->delete(route('slots.destroy', [$slot->location, $slot]));
        $response->assertStatus(403);

        self::assertTrue($slot->exists());
    }

    public function testDestroyOwner()
    {
        $slot = Util::createSlot();
        $location = $slot->location;

        $response = $this->actingAs($location->user)
            ->followingRedirects()
            ->delete(route('slots.destroy', [$location, $slot]));
        $response->assertStatus(200);

        self::assertFalse($slot->exists());
    }

    public function testDestroyAdmin()
    {
        $admin = Util::createAdmin();
        $slot = Util::createSlot();
        $location = $slot->location;

        $response = $this->actingAs($admin)
            ->followingRedirects()
            ->delete(route('slots.destroy', [$location, $slot]));
        $response->assertStatus(200);

        self::assertFalse($slot->exists());
    }
}
