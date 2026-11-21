<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PracticalAssignmentsTest extends TestCase
{
    use RefreshDatabase;

    public function test_shop_pages_display_products_and_prices(): void
    {
        $this->actingAs(User::factory()->create())
            ->get('/home')
            ->assertOk()
            ->assertSee('Selamat Datang di web laravel Hasya')
            ->assertSee('--font-sans', false);

        $this->actingAs(User::factory()->create())
            ->get('/product')
            ->assertOk()
            ->assertSee('Sepatu')
            ->assertSee('Rp 300.000');

        $this->actingAs(User::factory()->create())
            ->get('/produk/detail/200000')
            ->assertOk()
            ->assertSee('Baju')
            ->assertSee('Rp 200.000');

        $this->actingAs(User::factory()->create())
            ->get('/produk/detail/123456')
            ->assertNotFound();
    }

    public function test_student_list_displays_the_assigned_students(): void
    {
        $this->actingAs(User::factory()->create())
            ->get('/daftar/mahasiswa')
            ->assertOk()
            ->assertSee('Anton')
            ->assertSee('Surabaya')
            ->assertSee('Sinta')
            ->assertSee('Perempuan');
    }

    public function test_calculators_return_the_expected_results(): void
    {
        $this->actingAs(User::factory()->create())
            ->post('/kalkulator/proses', ['angka1' => 3, 'angka2' => 7])
            ->assertOk()
            ->assertSee('21,00');

        $this->actingAs(User::factory()->create())
            ->post('/kalkulator/segitiga', ['alas' => 10, 'tinggi' => 6])
            ->assertOk()
            ->assertSee('30,00');
    }
}
