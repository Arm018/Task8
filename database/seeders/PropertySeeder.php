<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\PropertyDetail;
use App\Models\PropertyImage;
use Carbon\Carbon;
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
                'title' => fake()->sentence,
                'status' => fake()->randomElement([0, 1]), // 0 for Sale, 1 for Rent
                'type' => fake()->randomElement([0, 1, 2, 3, 4]), // 0 to 4 for Property Types
                'price' => fake()->numberBetween(10000,1000000), // Random price between 50,000 and 500,000
                'area' => fake()->numberBetween(500, 5000), // Random area between 500 and 5,000 sq ft
                'rooms' => fake()->numberBetween(1, 10), // Random number of rooms between 1 and 10
                'address' => fake()->address,
                'city' => fake()->city,
                'state' => fake()->state,
                'zip_code' => fake()->postcode,
                'expiration_date' => Carbon::tomorrow(), // Random expiration date
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            PropertyDetail::create([
                'property_id' => $property->id,
                'description' => fake()->paragraph,
                'building_age' => fake()->randomElement([
                    '0 - 1 Years',
                    '0 - 5 Years',
                    '0 - 10 Years',
                    '0 - 20 Years',
                    '0 - 50 Years',
                    '50 + Years'
                ]),
                'bedrooms' => fake()->optional()->numberBetween(1, 10),
                'bathrooms' => fake()->optional()->numberBetween(1, 10),
                'contact_name' => fake()->name,
                'contact_email' => fake()->safeEmail,
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
