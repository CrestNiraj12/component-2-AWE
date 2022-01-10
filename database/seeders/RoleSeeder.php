<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $customer = Role::create([
            'name' => 'Customer',
            'slug' => 'customer'
        ]);

        $trader = Role::create([
            'name' => 'Trader',
            'slug' => 'trader',
            'permissions' => [
                'create-product' => true,
                'update-product' => true,
                'delete-product' => true,
                'view-product' => true
            ]
        ]);

        $admin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'permissions' => [
                'update-product' => true,
                'delete-product' => true,
                'view-product' => true
            ]
        ]);
    }
}
