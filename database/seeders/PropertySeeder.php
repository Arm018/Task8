<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\PropertyDetail;
use App\Models\PropertyImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 2; $i < 10; $i++) {
            $property = Property::create([
                'user_id' => 1,
                'title' => 'Sample Property ' . ($i + 1),
                'status' => ['For Sale', 'For Rent'][rand(0, 1)],
                'type' => 'Apartment',
                'price' => rand(100000, 500000),
                'area' => rand(10, 1500),
                'rooms' => rand(1, 5),
                'address' => fake()->streetAddress,
                'city' => fake()->city,
                'state' => 'CA',
                'zip_code' => '12345',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            PropertyDetail::create([
                'property_id' => $property->id,
                'description' => fake()->realText,
                'building_age' => ['0 - 1 Years', '0 - 5 Years', '0 - 10 Years', '0 - 20 Years', '0 - 50 Years', '50 + Years'][rand(0, 5)],
                'bedrooms' => rand(1, 5),
                'bathrooms' => rand(1, 3),
                'air_conditioning' => rand(0, 1),
                'swimming_pool' => rand(0, 1),
                'central_heating' => rand(0, 1),
                'laundry_room' => rand(0, 1),
                'gym' => rand(0, 1),
                'alarm' => rand(0, 1),
                'window_covering' => rand(0, 1),
                'contact_name' => fake()->firstName,
                'contact_email' => fake()->email,
                'contact_phone' => fake()->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            for ($j = 0; $j < 2; $j++) {
                $imagePath = 'public/images/' . (fake()->imageUrl(800, 600, 'houses', true));
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image' => $imagePath,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
