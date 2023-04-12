<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User roles list. Add admin, moderator, user roles.
        DB::table("user_roles_lists")->insert([
            [
                "name" => "admin",
                "is_active" => true,
                "assigned_by" => 1
            ],
            [
                "name" => "moderator",
                "is_active" => true,
                "assigned_by" => 1
            ],
            [
                "name" => "sales",
                "is_active" => true,
                "assigned_by" => 1
            ],
            [
                "name" => "purchasing",
                "is_active" => true,
                "assigned_by" => 1
            ],
            [
                "name" => "human_resources",
                "is_active" => true,
                "assigned_by" => 1
            ],
            [
                "name" => "accounting",
                "is_active" => true,
                "assigned_by" => 1
            ],
            [
                "name" => "manager",
                "is_active" => true,
                "assigned_by" => 1
            ],
            [
                "name" => "supervisor",
                "is_active" => true,
                "assigned_by" => 1
            ],
            [
                "name" => "director",
                "is_active" => true,
                "assigned_by" => 1
            ],
            [
                "name" => "technician",
                "is_active" => true,
                "assigned_by" => 1
            ],
            [
                "name" => "delivery",
                "is_active" => true,
                "assigned_by" => 1
            ],
            [
                "name" => "employee",
                "is_active" => true,
                "assigned_by" => 1
            ],
            [
                "name" => "customer",
                "is_active" => true,
                "assigned_by" => 1
            ],
            [
                "name" => "user",
                "is_active" => true,
                "assigned_by" => 1
            ],
            [
                "name" => "guest",
                "is_active" => false,
                "assigned_by" => 1
            ]
        ]);
    }
}
