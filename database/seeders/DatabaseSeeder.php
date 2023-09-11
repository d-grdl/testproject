<?php

namespace Database\Seeders;

use App\Models\House;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("storage/data.csv"), "r");

        $isFirstLine = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$isFirstLine) {
                House::factory()->create([
                    "name" => $data['0'],
                    "price" => $data['1'],
                    'bedrooms' => $data['2'],
                    'bathrooms' => $data['3'],
                    'storeys' => $data['4'],
                    'garages' => $data['5'],
                ]);
            }
            $isFirstLine = false;
        }

        fclose($csvFile);
    }
}
