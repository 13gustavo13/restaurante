<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_login_page(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Iniciar sesión');
    }

    public function test_guest_can_view_register_page(): void
    {
        $this->get(route('register'))
            ->assertOk()
            ->assertSee('Crear cuenta');
    }

    public function test_guest_cannot_view_dashboard(): void
    {
        $this->get(route('dashboard'))
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_view_locations(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('sedes.index'))
            ->assertOk()
            ->assertSee('Sede Centro')
            ->assertSee('Sede Planta Norte');
    }

    public function test_user_can_log_in(): void
    {
        $user = User::factory()->create();

        $this->post(route('login.post'), [
            'email' => $user->email,
            'password' => 'password',
        ])->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_invalid_credentials_are_rejected(): void
    {
        $user = User::factory()->create();

        $this->from(route('login'))->post(route('login.post'), [
            'email' => $user->email,
            'password' => 'incorrect-password',
        ])->assertRedirect(route('login'))
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_guest_can_register_and_is_redirected_to_dashboard(): void
    {
        $this->post(route('register.post'), [
            'nombre' => 'Ana',
            'apellido_p' => 'López',
            'apellido_m' => 'Díaz',
            'email' => 'ana@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ])->assertRedirect(route('dashboard'));

        $this->assertAuthenticated();
        $this->assertDatabaseHas('usuarios', [
            'nombre' => 'Ana',
            'correo' => 'ana@example.com',
        ]);
    }

    public function test_user_can_log_out(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('logout'))
            ->assertRedirect(route('login'));

        $this->assertGuest();
    }
}
