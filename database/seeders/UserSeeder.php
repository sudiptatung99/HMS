<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_role = Role::where('slug', 'super-admin')->first();
        $user = new User();
        $user->name = 'Super Admin';
        $user->email = 'super@admin.com';
        $user->password = Hash::make('password');
        $user->save();
        DB::table('users_roles')->insert(
            ['user_id' => $user->id, 'role_id' => $user_role->id]
        );
        $doctor_role = Role::where('slug', 'doctor')->first();
        $user = new User();
        $user->name = 'doctor';
        $user->email = 'doctor@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
        DB::table('users_roles')->insert(
            ['user_id' => $user->id, 'role_id' => $doctor_role->id]
        );
    }
}
