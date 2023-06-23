<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Student::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'Ahmad Kokok', 'gender' => 'L', 'card' => '0101001', 'class_id' => 1],
            ['name' => 'Sharina', 'gender' => 'P', 'card' => '0101002', 'class_id' => 2],
            ['name' => 'Shiela', 'gender' => 'P', 'card' => '0101003', 'class_id' => 3],
            ['name' => 'Munawir', 'gender' => 'L', 'card' => '0101004', 'class_id' => 4],
            ['name' => 'Munawir', 'gender' => 'L', 'card' => '0101009', 'class_id' => 3],
            ['name' => 'Hafizah', 'gender' => 'P', 'card' => '0101005', 'class_id' => 2],
            ['name' => 'Bob', 'gender' => 'L', 'card' => '0101006', 'class_id' => 2],
            ['name' => 'Sumbul', 'gender' => 'L', 'card' => '0101007', 'class_id' => 4],
            ['name' => 'Jai', 'gender' => 'L', 'card' => '0101008', 'class_id' => 1],
        ];

        foreach ($data as $value) {
            Student::insert([
                'name' => $value['name'],
                'gender' => $value['gender'],
                'card' => $value['card'],
                'class_id' => $value['class_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
