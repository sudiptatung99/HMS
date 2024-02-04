<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['name' => 'Super Admin', 'slug' => Str::slug('Super Admin')]
        ]);
        Role::insert([
            ['name' => 'Doctor', 'slug' => Str::slug('Doctor')]
        ]);
    }
}
