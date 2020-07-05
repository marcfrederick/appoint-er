<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Util;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    /*
     * CREATE
     */

    public function testCreateGuest()
    {
        $slot = Util::createSlot();

        $request = $this->get(route('bookings.create', [$slot->location, $slot]));
        $request->assertRedirect('login');
    }

    public function testCreateRandomUser()
    {
        $slot = Util::createSlot();
        $user = Util::createUser();

        $request = $this->actingAs($user)
            ->get(route('bookings.create', [$slot->location, $slot]));
        $request->assertStatus(200);
    }

    public function testCreateOwner()
    {
        $slot = Util::createSlot();

        $request = $this->actingAs($slot->user)
            ->get(route('bookings.create', [$slot->location, $slot]));
        $request->assertStatus(200);
    }

    public function testCreateAdmin()
    {
        $slot = Util::createSlot();
        $admin = Util::createAdmin();

        $request = $this->actingAs($admin)
            ->get(route('bookings.create', [$slot->location, $slot]));
        $request->assertStatus(200);
    }

    /*
     * STORE
     */

    public function testStoreGuest()
    {
        $slot = Util::createSlot();

        $request = $this->post(route('bookings.store', [$slot->location, $slot]));
        $request->assertRedirect('login');
    }

    public function testStoreRandomUser()
    {
        $slot = Util::createSlot();
        $user = Util::createUser();

        $request = $this->actingAs($user)
            ->followingRedirects()
            ->post(route('bookings.store', [$slot->location, $slot]));
        $request->assertStatus(200);
    }

    public function testStoreOwner()
    {
        $slot = Util::createSlot();

        $request = $this->actingAs($slot->user)
            ->followingRedirects()
            ->post(route('bookings.store', [$slot->location, $slot]));
        $request->assertStatus(200);
    }

    public function testStoreAdmin()
    {
        $slot = Util::createSlot();
        $admin = Util::createAdmin();

        $request = $this->actingAs($admin)
            ->followingRedirects()
            ->post(route('bookings.store', [$slot->location, $slot]));
        $request->assertStatus(200);
    }

    /*
     * DESTROY
     */

    public function testDestroyGuest()
    {
        $booking = Util::createBooking();
        $slot = $booking->slot;

        $request = $this->delete(route('bookings.destroy', [$slot->location, $slot, $booking]));
        $request->assertRedirect('login');

        self::assertTrue($booking->exists());
    }

    public function testDestroyRandomUser()
    {
        $this->markTestSkipped('FIXME');

        $booking = Util::createBooking();
        $slot = $booking->slot;
        $user = Util::createUser();

        $request = $this->actingAs($user)
            ->followingRedirects()
            ->delete(route('bookings.destroy', [$slot->location, $slot, $booking]));
        $request->assertStatus(200);

        self::assertTrue($booking->exists());
    }

    public function testDestroyOwner()
    {
        $booking = Util::createBooking();
        $slot = $booking->slot;

        $request = $this->actingAs($slot->user)
            ->followingRedirects()
            ->delete(route('bookings.destroy', [$slot->location, $slot, $booking]));
        $request->assertStatus(200);

        self::assertFalse($booking->exists());
    }

    public function testDestroyAdmin()
    {
        $booking = Util::createBooking();
        $slot = $booking->slot;
        $admin = Util::createAdmin();

        $request = $this->actingAs($admin)
            ->followingRedirects()
            ->delete(route('bookings.destroy', [$slot->location, $slot, $booking]));
        $request->assertStatus(200);

        self::assertFalse($booking->exists());
    }
}
