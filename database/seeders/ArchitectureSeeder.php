<?php

namespace Database\Seeders;

use App\Models\Architecture;
use App\Models\Manufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ArchitectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        try{
            $csvFile = fopen(base_path('/database/csv/microarchitecture.csv'), 'r');
            fgetcsv($csvFile, 1000, ',');
            $i = 0;
            while(($csvLine = fgetcsv($csvFile, 1000, ',')) !== false){
                $i++;
                Architecture::create([
                    'manufacturer_id' => Manufacturer::find($csvLine[1])->id ?? null,
                    'name' => $csvLine[2],
                ]);
            }
            echo 'Architectures read : ' . $i;
            fclose($csvFile);
        }catch(\Exception $e){
            $errorMsg = $e->getMessage();
            Log::error($errorMsg);
            echo 'Architecture Seeder Error : ' . $errorMsg;
        }
    }
}
