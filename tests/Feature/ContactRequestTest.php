<?php

namespace Tests\Feature;

use App\ContactRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Util;

class ContactRequestTest extends TestCase
{
    use RefreshDatabase;

    /*
     * INDEX
     */

    public function testIndex()
    {
        $response = $this->get(route('contact-requests.index'));
        $response->assertStatus(403);
    }

    public function testIndexRandomUser()
    {
        $user = Util::createUser();
        $response = $this->actingAs($user)->get(route('contact-requests.index'));
        $response->assertStatus(403);
    }

    public function testIndexAdmin()
    {
        $admin = Util::createAdmin();
        $response = $this->actingAs($admin)->get(route('contact-requests.index'));
        $response->assertStatus(200);
    }

    /*
     * CREATE
     */

    public function testCreate()
    {
        $response = $this->followingRedirects()
            ->get(route('contact-requests.create'));
        $response->assertStatus(200);
    }

    public function testCreateRandomUser()
    {
        $user = Util::createUser();
        $response = $this->actingAs($user)
            ->followingRedirects()
            ->get(route('contact-requests.create'));
        $response->assertStatus(200);
    }

    /*
     * STORE
     */

    public function testStore()
    {
        $response = $this->followingRedirects()
            ->post(route('contact-requests.store', [
                'title' => 'foo',
                'message' => 'bar',
            ]));

        $response->assertStatus(200);
        $cr = ContactRequest::first();
        $this->assertNull($cr->user);
        $this->assertEquals('foo', $cr->title);
        $this->assertEquals('bar', $cr->message);
    }

    public function testStoreRandomUser()
    {
        $user = Util::createUser();
        $response = $this->actingAs($user)
            ->followingRedirects()
            ->post(route('contact-requests.store', [
                'title' => 'foo',
                'message' => 'bar',
            ]));

        $response->assertStatus(200);
        $cr = ContactRequest::first();
        $this->assertEquals($user->id, $cr->user->id);
        $this->assertEquals('foo', $cr->title);
        $this->assertEquals('bar', $cr->message);
    }
}
