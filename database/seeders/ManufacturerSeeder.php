<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $i = 0;
        try{
            $csvFile = fopen(base_path('/database/csv/manufacturer.csv'), 'r');

            fgetcsv($csvFile, 5000, ',');
            while(($csvLine = fgetcsv($csvFile, 5000, ',')) !== false){
                $i++;
                Manufacturer::create([
                    'id' => $csvLine[0],
                    'name' => $csvLine[1],
                ]);
            }
            echo 'Manufacturers read from the CSV file: ' . $i ;
            fclose($csvFile);
        }catch(\Exception $e){
            $errorMsg = $e->getMessage();
            Log::error($errorMsg);
            echo 'Manufacturer seeding error : '. $errorMsg;
        }
    }
}
