<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_resource_supports_create_read_update_and_delete(): void
    {
        $this->get('/admin')->assertOk()->assertSee('Data Admin');
        $this->get('/admin/create')->assertOk()->assertSee('Tambah Admin');

        $this->post('/admin', [
            'id_admin' => 1,
            'username' => 'operator',
            'password' => 'rahasia123',
        ])->assertRedirect(route('admin.index'));

        $admin = Admin::findOrFail(1);
        $this->assertTrue(Hash::check('rahasia123', $admin->password));

        $this->get('/admin')
            ->assertOk()
            ->assertSee('operator')
            ->assertDontSee($admin->password);
        $this->get('/admin/1')->assertOk()->assertSee('operator');
        $this->get('/admin/1/edit')->assertOk()->assertSee('Edit Admin');

        $this->put('/admin/1', [
            'username' => 'operator-baru',
            'password' => '',
        ])->assertRedirect(route('admin.index'));

        $this->assertDatabaseHas('admins', [
            'id_admin' => 1,
            'username' => 'operator-baru',
        ]);
        $this->assertTrue(Hash::check('rahasia123', $admin->fresh()->password));

        $this->delete('/admin/1')->assertRedirect(route('admin.index'));
        $this->assertDatabaseMissing('admins', ['id_admin' => 1]);
    }
}
