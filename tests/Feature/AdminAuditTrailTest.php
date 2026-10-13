<?php

namespace Tests\Feature;

use App\Models\Field;
use App\Models\SportCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuditTrailTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_suspend_field_and_creates_audit_log(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $category = SportCategory::create([
            'name' => 'Futsal',
            'slug' => 'futsal',
        ]);

        $field = Field::create([
            'sport_category_id' => $category->id,
            'name' => 'Lapangan A',
            'price_per_hour' => 100000,
            'is_active' => true,
        ]);

        $this->actingAs($admin)
            ->patchJson(
                route('admin.fields.status', [
                    'field' => $field->id,
                ]),
                [
                    'status' => 'suspended',
                ]
            )
            ->assertOk();

        $this->assertDatabaseHas('fields', [
            'id' => $field->id,
            'is_active' => false,
        ]);

        $this->assertDatabaseHas('audit_logs', [
            'actor_id' => $admin->id,
            'action' => 'field.status_change',
            'entity' => 'fields',
            'entity_id' => (string) $field->id,
        ]);
    }

    public function test_non_admin_cannot_access_admin_field_status_route(): void
    {
        $user = User::factory()->create([
            'role' => 'customer',
        ]);

        $category = SportCategory::create([
            'name' => 'Badminton',
            'slug' => 'badminton',
        ]);

        $field = Field::create([
            'sport_category_id' => $category->id,
            'name' => 'Lapangan B',
            'price_per_hour' => 50000,
            'is_active' => true,
        ]);

        $this->actingAs($user)
            ->patchJson(
                route('admin.fields.status', [
                    'field' => $field->id,
                ]),
                [
                    'status' => 'suspended',
                ]
            )
            ->assertForbidden();
    }
}