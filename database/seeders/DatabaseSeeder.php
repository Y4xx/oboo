<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user= User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
        $user= User::create([
            'name' => 'Y4x',
            'email' => 'Y4x@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
        $role = Role::create([
            'slug' => 'admin',
            'name' => 'Adminstrator',
        ]);
        $role = Role::create([
            'slug' => 'employer',
            'name' => 'Employer',
        ]);
        $user->roles()->sync($role->id);
    }
}
