<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

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
        $csvData  = fopen(storage_path('data/test-data.csv'), 'r');
        $transRow = true;

        while (($data = fgetcsv($csvData,0, ',')) !== false) {
            if (!$transRow) {
                Employee::create([
                    'name'    => $data['1'],
                    'email'   => $data['2'],
                    'phone'   => $data['3'],
                    'dob'     => $data['4'],
                    'country' => $data['5'],
                    'ip'      => $data['6'],
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}
