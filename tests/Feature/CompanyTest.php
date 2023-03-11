<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanCreateCompany()
    {
//        $this->withoutExceptionHandling();

        $this->actingAs($user = User::factory()->create());

        $this->post('/company', $attributes = [
            'name' => 'AkkerCO',
        ]);

        $this->assertDatabaseHas('companies', $attributes);
    }

    public function testItRequiresNameOnCreate()
    {
        $this->actingAs($user = User::factory()->create());

        $this->post('/company', [])->assertSessionHasErrors(['name']);
    }

    public function testGuestsMayNotCreateACompany()
    {
        $this->post('/company', [])->assertRedirect('/login');
    }
}
