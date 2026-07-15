<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $customerRole = Role::create(['name' => 'customer']);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => $adminRole->id,
            'phone' => '081234567890',
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => $customerRole->id,
            'phone' => '081234567891',
        ]);

        $brands = ['Nike', 'Adidas', 'Puma', 'Uniqlo', 'Zara'];
        foreach ($brands as $name) {
            Brand::create(['name' => $name, 'slug' => str()->slug($name)]);
        }

        $categories = ['Elektronik', 'Pakaian', 'Makanan', 'Minuman', 'Buku'];
        foreach ($categories as $name) {
            Category::create(['name' => $name, 'slug' => str()->slug($name)]);
        }

        Product::factory(50)->create();
    }
}
