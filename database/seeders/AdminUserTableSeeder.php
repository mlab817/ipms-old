<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'  => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

//        $permission = Permission::create(['name' => 'admin']);

        $admin->assignRole('admin');
    }
}
