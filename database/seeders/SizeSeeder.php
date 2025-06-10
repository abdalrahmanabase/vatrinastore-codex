<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Size;

class SizeSeeder extends Seeder
{
    public function run(): void
    {
        $defaultSizes = ['40', '41', '42', '43', '44', '45'];

        foreach ($defaultSizes as $size) {
            \App\Models\Size::firstOrCreate(['label' => $size]);
        }
    }
}
