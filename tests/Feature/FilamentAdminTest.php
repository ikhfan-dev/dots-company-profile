<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FilamentAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_dashboard_and_all_resources()
    {
        $this->seed();

        $admin = User::first();

        $this->actingAs($admin);

        $this->get('/cms')->assertStatus(200);
        $this->get('/cms/capabilities')->assertStatus(200);
        $this->get('/cms/company-pillars')->assertStatus(200);
        $this->get('/cms/projects')->assertStatus(200);
        $this->get('/cms/partners')->assertStatus(200);
        $this->get('/cms/site-settings')->assertStatus(200);
        $this->get('/cms/inquiries')->assertStatus(200);
    }
}
