<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPermissions = Permission::all();
        Role::updatedOrCreate([
            'name' => 'Admin',
            'slug' => 'admin',
            'deletable' => false
        ])->permissions()->sync($adminPermissions->pluck('id'));

        Role::updatedOrCreate([
            'name' => 'User',
            'slug' => 'user',
            'deletable' => false
        ]);
    }
}
