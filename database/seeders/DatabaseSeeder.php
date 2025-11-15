<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Admin Jamtanganku',
            'email' => 'admin@jamtanganku.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'balance' => 0,
        ]);

        // Create sample user
        User::create([
            'name' => 'John Doe',
            'email' => 'user@jamtanganku.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'balance' => 1000000,
        ]);

        // Create sample products
        $products = [
            [
                'name' => 'Rolex Submariner',
                'description' => 'Jam tangan diving ikonik dengan desain klasik dan tahan air hingga 300m.',
                'type' => 'diver',
                'price' => 150000000,
                'stock' => 5,
            ],
            [
                'name' => 'Seiko 5 Sports',
                'description' => 'Jam tangan automatic dengan movement yang handal dan tahan lama.',
                'type' => 'analog',
                'price' => 3500000,
                'stock' => 15,
            ],
            [
                'name' => 'Casio G-Shock GA-2100',
                'description' => 'G-Shock dengan desain slim dan tahan benturan, perfect for daily wear.',
                'type' => 'digital',
                'price' => 2500000,
                'stock' => 20,
            ],
            [
                'name' => 'Tissot PRX',
                'description' => 'Jam tangan chronograph dengan desain retro dan movement quartz.',
                'type' => 'chronograph',
                'price' => 4500000,
                'stock' => 10,
            ],
            [
                'name' => 'Apple Watch Series 9',
                'description' => 'Smartwatch terbaru dari Apple dengan berbagai fitur kesehatan.',
                'type' => 'smartwatch',
                'price' => 8000000,
                'stock' => 8,
            ],
            [
                'name' => 'Orient Bambino',
                'description' => 'Jam tangan dress class dengan desain elegan dan movement automatic.',
                'type' => 'analog',
                'price' => 2800000,
                'stock' => 12,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        $this->call([
            // Additional seeders if any
        ]);
    }
}