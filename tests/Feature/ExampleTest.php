<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_is_available(): void
    {
        $response = $this->get('/login');

        $response->assertOk();
    }

    public function test_home_requires_authentication(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/login');
    }

    public function test_admin_can_access_create_forms(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
            ->get('/mediciones/create')
            ->assertOk();

        $this->actingAs($admin)
            ->get('/inspecciones/create')
            ->assertOk();
    }

    public function test_consulta_cannot_access_create_forms(): void
    {
        $consulta = User::factory()->create(['role' => 'consulta']);

        $this->actingAs($consulta)
            ->get('/mediciones/create')
            ->assertForbidden();

        $this->actingAs($consulta)
            ->get('/inspecciones/create')
            ->assertForbidden();
    }

    public function test_carga_can_store_medicion(): void
    {
        $carga = User::factory()->create(['role' => 'carga']);

        $this->actingAs($carga)
            ->post('/mediciones', [
                'fecha' => '2026-06-12',
                'turno' => 'manana',
                'valor' => '15.25',
                'observacion' => 'Registro de prueba',
            ])
            ->assertRedirect('/mediciones');

        $this->assertDatabaseHas('mediciones', [
            'turno' => 'manana',
            'observacion' => 'Registro de prueba',
            'user_id' => $carga->id,
        ]);
    }

    public function test_carga_can_store_inspeccion(): void
    {
        $carga = User::factory()->create(['role' => 'carga']);

        $this->actingAs($carga)
            ->post('/inspecciones', [
                'fecha' => '2026-06-12',
                'sector' => 'Deposito',
                'estado' => 'correcto',
                'observacion' => 'Sin novedades',
            ])
            ->assertRedirect('/inspecciones');

        $this->assertDatabaseHas('inspecciones', [
            'sector' => 'Deposito',
            'estado' => 'correcto',
            'user_id' => $carga->id,
        ]);
    }
}
