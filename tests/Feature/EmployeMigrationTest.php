<?php

namespace Tests\Feature;

use App\Models\Employe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_employe_factory_and_seeder_create_ten_records(): void
    {
        $this->seed(\Database\Seeders\EmployeSeeder::class);

        $this->assertDatabaseCount('employes', 10);
        $this->assertDatabaseHas('employes', [
            'id' => Employe::query()->value('id'),
        ]);
        $this->assertContains(Employe::query()->firstOrFail()->gender, ['L', 'P']);
    }
}
