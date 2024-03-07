<?php

namespace Database\Seeders;

use App\Models\Medication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medications = [
            [
                'name' => 'Ibuprofeno',
                'dosage' => 600,
                'unit' => 'mg',
                'image' => null,
                'description' => null,
            ],
            [
                'name' => 'Paracetamol',
                'dosage' => 500,
                'unit' => 'mg',
                'image' => null,
                'description' => null,
            ],
            [
                'name' => 'Amoxicilina',
                'dosage' => 500,
                'unit' => 'mg',
                'image' => null,
                'description' => null,
            ],
            [
                'name' => 'Omeprazol',
                'dosage' => 20,
                'unit' => 'mg',
                'image' => null,
                'description' => null,
            ],
        ];

        foreach ($medications as $medication) {
            $medication = new Medication($medication);
            $medication->save();
        }
    }
}
