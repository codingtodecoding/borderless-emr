<?php

namespace Database\Seeders;

use App\Models\LabTest;
use Illuminate\Database\Seeder;

class LabTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tests = [
            'BIOCHEMISTRY',
            'Sr. Bilirubin total',
            'Sr. Bilirubin direct',
            'Sr. Bilirubin indirect',
            'SGOT',
            'SGPT',
            'ALKALINE PHOSPHATASE',
            'PROTEIN TOTAL',
            'ALBUMIN',
            'UREA',
            'CREATININE',
            'CALCIUM',
            'URIC ACID',
            'BLOOD SUGAR',
            'CHOLESTEROL',
            'TRIGLYCERIDE',
            'HDL',
            'LDL',
            'HEMATOLOGY',
            'CBC',
            'ESR',
            'BLOOD GROUP',
            'HBA1C',
            'SEROLOGY',
            'CRP',
            'R. A. FACTOR',
            'WIDAL',
            'HIV',
            'HBSAG',
            'HCV',
            'DENGUE',
            'URINE ANALYSIS',
        ];

        foreach ($tests as $test) {
            LabTest::firstOrCreate(
                ['name' => $test],
                ['is_active' => true]
            );
        }
    }
}
