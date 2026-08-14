<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_loads_successfully()
    {
        $this->seed();

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('PT. Digital Otentikasi Teknologi Semesta');
        $response->assertSee('Menara Bank Danamon');
    }

    public function test_language_switcher_works()
    {
        $this->seed();

        $response = $this->get('/lang/id');
        $response->assertRedirect();

        $pageResponse = $this->get('/');
        $pageResponse->assertSee('Tentang');
    }

    public function test_contact_form_submission_stores_inquiry()
    {
        $this->seed();

        $response = $this->post('/contact', [
            'name' => 'Budi Santoso Test',
            'email' => 'budi@example.com',
            'subject' => 'Pertanyaan Kerjasama IoT',
            'message' => 'Halo tim DOTS, mohon info penawaran sistem smart parking.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('inquiries', [
            'email' => 'budi@example.com',
            'subject' => 'Pertanyaan Kerjasama IoT',
        ]);
    }
}
