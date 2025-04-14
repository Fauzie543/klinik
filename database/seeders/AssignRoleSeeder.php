<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AssignRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first(); // bisa ganti dengan user tertentu
        $role = Role::where('name', 'admin')->first();
    
        if ($user && $role && !$user->roles->contains($role->id)) {
            $user->roles()->attach($role->id);
        }
    }
}