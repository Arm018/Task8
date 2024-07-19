<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            'air_conditioning',
            'swimming_pool',
            'central_heating',
            'laundry_room',
            'gym',
            'alarm',
            'window_covering'
        ];

        foreach ($features as $feature) {
            Feature::create(['name' => $feature]);
        }
    }
}
