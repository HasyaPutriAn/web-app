<?php

namespace Tests\Feature;

use Tests\TestCase;

class PracticalAssignmentsTest extends TestCase
{
    public function test_shop_pages_display_products_and_prices(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Selamat Datang di web laravel Hasya')
            ->assertSee('--font-sans', false);

        $this->get('/product')
            ->assertOk()
            ->assertSee('Sepatu')
            ->assertSee('Rp 300.000');

        $this->get('/produk/detail/200000')
            ->assertOk()
            ->assertSee('Baju')
            ->assertSee('Rp 200.000');

        $this->get('/produk/detail/123456')->assertNotFound();
    }

    public function test_student_list_displays_the_assigned_students(): void
    {
        $this->get('/daftar/mahasiswa')
            ->assertOk()
            ->assertSee('Anton')
            ->assertSee('Surabaya')
            ->assertSee('Sinta')
            ->assertSee('Perempuan');
    }

    public function test_calculators_return_the_expected_results(): void
    {
        $this->post('/kalkulator/proses', ['angka1' => 3, 'angka2' => 7])
            ->assertOk()
            ->assertSee('21,00');

        $this->post('/kalkulator/segitiga', ['alas' => 10, 'tinggi' => 6])
            ->assertOk()
            ->assertSee('30,00');
    }
}
