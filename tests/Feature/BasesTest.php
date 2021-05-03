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
        $this->loginAsAdmin();

        $this->seed(BasesTableSeeder::class);

        $response = $this->get(route('admin.bases.index'), []);

        $response->assertStatus(200);

        $response->assertSee('Basis for Implementation');
    }

    public function test_it_shows_edit_implementation_basis()
    {
        $this->withoutExceptionHandling();

        $this->loginAsAdmin();

        $basis = Basis::factory()->create();

        $response = $this->get(route('admin.bases.edit', ['basis' => $basis->slug]));

        $response->assertStatus(200);
    }

    public function test_it_creates_implementation_basis()
    {
        $this->loginAsAdmin();

        $data = [
            'name' => 'New Basis'
        ];

        $response = $this->post(route('admin.bases.store'), $data);

        $response->assertRedirect();

        $this->assertDatabaseHas('bases', $data);
    }

    public function test_it_updates_implementation_basis()
    {
        $this->loginAsAdmin();

        $basis = Basis::factory()->create();

        $data = [
            'name' => 'New Basis'
        ];

        $response = $this->put(route('admin.bases.update', $basis->slug), $data);

        $response->assertRedirect();

        $this->assertDatabaseHas('bases', $data);
    }

    public function test_it_deletes_implementation_basis()
    {
        $this->loginAsAdmin();

        $basis = Basis::factory()->create();

        $response = $this->delete(route('admin.bases.destroy', ['basis' => $basis->slug]));

        $response->assertStatus(200);
    }
}
