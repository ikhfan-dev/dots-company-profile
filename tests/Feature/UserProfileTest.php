<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_access_edit_profile_page(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@dotscorporate.com',
        ]);

        $response = $this->actingAs($user)->get('/cms/profile');

        $response->assertStatus(200);
    }

    public function test_user_can_update_profile_info_and_password(): void
    {
        $user = User::factory()->create([
            'name' => 'Original Name',
            'email' => 'admin@dotscorporate.com',
            'password' => Hash::make('password123'),
        ]);

        $user->update([
            'name' => 'Updated Admin Name',
            'avatar_url' => 'avatars/profile-avatar.jpg',
            'password' => Hash::make('newpassword123'),
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Admin Name',
            'avatar_url' => 'avatars/profile-avatar.jpg',
        ]);

        $this->assertTrue(Hash::check('newpassword123', $user->fresh()->password));
    }
}
