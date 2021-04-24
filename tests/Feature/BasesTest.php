<?php

namespace Tests\Feature;

use App\Models\Basis;
use Database\Seeders\BasesTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_implementation_bases()
    {
        $this->seed(BasesTableSeeder::class);

        $response = $this->get(route('admin.bases.index'));

        $response->assertStatus(200);

        $response->assertSee('Implementation Basis');
    }

    public function test_it_shows_edit_implementation_basis()
    {

    }

    public function test_it_deletes_implementation_basis()
    {
        $basis = Basis::factory()->create();

        $response = $this->delete(route('admin.bases.destroy', ['basis' => $basis->id]));

        $response->assertStatus(200);
    }
}
