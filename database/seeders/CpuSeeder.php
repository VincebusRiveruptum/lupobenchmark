<?php

namespace Database\Seeders;

use App\Models\Architecture;
use App\Models\Cpu;
use App\Models\Family;
use App\Models\Manufacturer;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CpuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try{
            $csvFile = fopen(base_path('/database/csv/processor.csv'), 'r');
            fgetcsv($csvFile, 5000, ',');
            $i = 0;
            while(($csvLine = fgetcsv($csvFile, 5000, ',')) !== false){
                $i++;
                Cpu::create([
                    'id' => $csvLine[0],
                    'manufacturer_id' => Manufacturer::find($csvLine[3])->id ?? null,
                    'family_id' => Family::find($csvLine[4])->id ?? null,
                    'architecture_id' => Architecture::find($csvLine[5])->id ?? null,
                    'model_name' => $csvLine[11],
                    'release_date' => $csvLine[12] !== '' ? date('y-m-d',strtotime($csvLine[12])) : null,
                    'cores' => (int)$csvLine[16],
                    'base_clock' => (float)$csvLine[13],
                    'tdp' => (int)$csvLine[17],
                    'source' => $csvLine[18],
                ]);
            }
            echo 'CPUs read from the CSV file: ' . $i ;
            fclose($csvFile);
        }catch(\Exception $e){
            $errorMsg = $e->getMessage();
            echo 'CPU Seeder Error : ' . $errorMsg;
        }
    }
}
