<?php

namespace Tests\Feature;

use App\Models\Tier;
use App\Models\User;
use Database\Seeders\TiersTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TierTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_list_of_tiers()
    {
        $this->user->assignRole('admin');

        $this->actingAs($this->user);

        $response = $this->get(route('admin.tiers.index'))
            ->assertStatus(200)
            ->assertViewIs('admin.tiers.index')
            ->assertSee('Budget Tiers');
    }

    public function test_it_shows_create_tier()
    {
        $this->user->assignRole('admin');

        $this->actingAs($this->user);

        $response = $this->get(route('admin.tiers.create'))
            ->assertStatus(200)
            ->assertViewIs('admin.tiers.create')
            ->assertSee('Add Budget Tier');
    }

    public function test_it_stores_tier()
    {
        $this->user->assignRole('admin');

        $this->actingAs($this->user);

        $response = $this->post(route('admin.tiers.store'), [
            'name' => 'Tier 3',
        ])
            ->assertStatus(302)
            ->assertRedirect(route('admin.tiers.index'));

        $this->assertDatabaseHas('tiers', [
            'name' => 'Tier 3'
        ]);
    }

    public function test_it_shows_edit_tier()
    {
        $this->user->assignRole('admin');

        $this->actingAs($this->user);

        $tier = Tier::factory()->create();

        $response = $this->get(route('admin.tiers.edit', $tier))
            ->assertStatus(200)
            ->assertViewIs('admin.tiers.edit')
            ->assertSee('Edit Budget Tier');
    }

    public function test_it_updates_tier()
    {
        $this->user->assignRole('admin');

        $this->actingAs($this->user);

        $tier = Tier::factory()->create();

        $response = $this
            ->from(route('admin.tiers.edit', $tier))
            ->put(route('admin.tiers.update', $tier), [
            'name' => 'Tier 4',
        ])
            ->assertStatus(302)
            ->assertRedirect(route('admin.tiers.edit', $tier));

        $this->assertDatabaseHas('tiers', [
            'id'    => $tier->id,
            'name'  => 'Tier 4',
        ]);
    }

    public function test_it_deletes_tier()
    {
        $this->user->assignRole('admin');

        $this->actingAs($this->user);

        $tier = Tier::factory()->create();

        $response = $this->delete(route('admin.tiers.destroy', $tier));
        $response->assertStatus(302);
        $response->assertRedirect(route('admin.tiers.index'));

        $this->assertDatabaseHas('tiers', [
            'id'            => $tier->id,
            'deleted_at'    => now(),
        ]);
    }
}
