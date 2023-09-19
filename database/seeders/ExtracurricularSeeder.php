<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Extracurricular;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExtracurricularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            ['name' => 'Bola Sepak '],
            ['name' => 'Takraw'],
            ['name' => 'Badminton'],
            ['name' => 'Silat'],
            ['name' => 'Chess'],
            ['name' => 'Berenang'],
            ['name' => 'Menari'],
           
        ];

        foreach ($data as $value) {
            Extracurricular::insert([
                'name' => $value['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
