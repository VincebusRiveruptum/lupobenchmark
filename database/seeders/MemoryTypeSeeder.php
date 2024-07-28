<?php

namespace Database\Seeders;

use App\Models\MemoryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class MemoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try{
            $csvFile = fopen(base_path('/database/csv/memory_types.csv'), 'r');
            $i = 0;
            fgetcsv($csvFile, 255, ';');
            while(($csvLine = fgetcsv($csvFile, 255, ';')) !== false){
                    MemoryType::create([
                        'name' => $csvLine[0],
                    ]);
                    $i++;
            }
            echo 'Memory Types readed from the CSV file: ' . $i ;
            fclose($csvFile);
        }catch(\Exception $e){
            $error = 'Seeding error : ' . $e->getMessage();
            Log::error($error);
            echo $error;
        }
    }
}
