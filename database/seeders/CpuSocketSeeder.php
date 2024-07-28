<?php

namespace Database\Seeders;

use App\Models\CpuSocket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class CpuSocketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try{
            $csvFile = fopen(base_path('/database/csv/cpu_sockets.csv'), 'r');

            fgetcsv($csvFile, 1000, ';');      // First line ignore

            $i = 0;

            while(($csvLine = fgetcsv($csvFile, 1000, ';')) !== false){
                $i++;
                CpuSocket::create([
                    'name' => $csvLine[0],
                ]);
            }
            echo 'Cpu sockets readed from the CSV file: ' . $i;
            fclose($csvFile);
        }catch(\Exception $e){
            $error = 'Seeding error : ' . $e->getMessage() . '\n';
            Log::error($error);
            echo $error;
        }
    }
}
