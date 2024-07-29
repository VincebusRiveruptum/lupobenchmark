<?php

namespace Database\Seeders;

use App\Models\Family;
use App\Models\Manufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try{
            $csvFile = fopen(base_path('/database/csv/processor_familie.csv'), 'r');

            fgetcsv($csvFile, 1000, ',');      // First line ignore

            $i = 0;

            while(($csvLine = fgetcsv($csvFile, 1000, ',')) !== false){
                $i++;

                Family::create([
                    'id' => $csvLine[0],
                    'manufacturer_id' => Manufacturer::find($csvLine[1])->id ?? null,
                    'name' => $csvLine[2],
                ]);
            }
            echo 'CPU/GPU Families readed from the CSV file: ' . $i;
            fclose($csvFile);
        }catch(\Exception $e){
            $error = 'Seeding error : ' . $e->getMessage();
            Log::error($error);
            echo $error;
        }
    }
}
