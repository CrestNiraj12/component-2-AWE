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
            'slug' => 'customer',
            'permissions' => [
                'review-product' => true,
            ]
        ]);

        $admin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'permissions' => [
                'create-product' => true,
                'update-product' => true,
                'delete-product' => true,
                'create-product-category' => true,
                'update-product-category' => true,
                'delete-product-category' => true,
                'access-dashboard' => true
            ]
        ]);
    }
}
