<?php
declare(strict_types=1);

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Util;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that guests can't view the list of all users.
     */
    public function testIndex()
    {
        $response = $this->get(route('users.index'));
        $response->assertStatus(403);
    }

    /**
     * Test that admins can view the list of all users.
     */
    public function testIndexAdmin()
    {
        $admin = Util::createAdmin();

        $response = $this->actingAs($admin)->get(route('users.index'));
        $response->assertStatus(200);
    }

    /**
     * Test that everyone can view all profiles.
     */
    public function testShow()
    {
        $user = factory(User::class)->create();

        $response = $this->get(route('users.show', $user));
        $response->assertStatus(200);
    }

    /**
     * Test that guests can't delete users.
     */
    public function testDestroy()
    {
        $user = factory(User::class)->create();

        $response = $this->delete(route('users.destroy', $user));
        $response->assertStatus(403);
        $this->assertNotEquals(0, User::count());
    }

    /**
     * Test that admins can delete users.
     */
    public function testDestroyAdmin()
    {
        $user = factory(User::class)->create();
        $admin = Util::createAdmin();

        $response = $this->actingAs($admin)->followingRedirects()->delete(route('users.destroy', $user));
        $response->assertStatus(200);
        // Remaining user is the admin user itself.
        $this->assertEquals(1, User::count());
    }
}
