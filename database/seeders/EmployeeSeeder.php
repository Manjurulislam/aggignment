<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;



class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();

        LazyCollection::make(function () {
            $csvFile = storage_path('data/test-data.csv');
            $handle  = fopen($csvFile, 'r');

            while (($line = fgetcsv($handle, 4096, ',')) !== false) {
                yield $line;
            }
            fclose($handle);
        })->skip(1)->chunk(500)->each(function (LazyCollection $chunk) {
            $records = $chunk->map(function ($row) {
                return [
                    "name"    => $row[1],
                    "email"   => $row[2],
                    "phone"   => $row[3],
                    "dob"     => $row[4],
                    "country" => $row[5],
                    "ip"      => $row[6],
                ];
            })->toArray();
            DB::table('employees')->insert($records);
        });
    }

}
