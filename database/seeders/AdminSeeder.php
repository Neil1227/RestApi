<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin; // Import your Admin model

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::updateOrCreate(
            ['user' => 'admin'], // Ensure only one admin exists
            ['password' => Hash::make('admin123')]
        );
    }
}

