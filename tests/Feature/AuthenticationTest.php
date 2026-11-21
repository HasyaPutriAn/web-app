<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_sees_login_page_and_is_redirected_from_protected_pages(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Login Users')
            ->assertSee(route('login.authenticate'));

        $this->get('/dashboard')->assertRedirect(route('login'));
        $this->get('/gallery')->assertRedirect(route('login'));
        $this->get('/employe')->assertRedirect(route('login'));
        $this->get('/admin')->assertRedirect(route('login'));
        $this->post('/employe/store')->assertRedirect(route('login'));
    }

    public function test_user_can_login_and_logout(): void
    {
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => 'secret123',
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret123',
        ])->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($user);
        $this->get('/dashboard')->assertOk();

        $this->post('/logout')->assertRedirect(route('login'));
        $this->assertGuest();
        $this->get('/dashboard')->assertRedirect(route('login'));
    }

    public function test_invalid_credentials_do_not_authenticate(): void
    {
        User::factory()->create([
            'email' => 'user@example.com',
            'password' => 'secret123',
        ]);

        $this->from('/')
            ->post('/login', [
                'email' => 'user@example.com',
                'password' => 'wrong-password',
            ])
            ->assertRedirect('/')
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }
}
