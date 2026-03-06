<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\PatternFill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class PatientTemplateExport implements FromArray, WithHeadings, WithStyles
{
    protected $campaignTypeId;

    public function __construct($campaignTypeId = 7)
    {
        $this->campaignTypeId = $campaignTypeId;
    }

    public function array(): array
    {
        return match($this->campaignTypeId) {
            7 => $this->generalScreeningData(),
            8 => $this->swatchBharatData(),
            9 => $this->specialHCData(),
            10 => $this->awarenessCampData(),
            default => $this->generalScreeningData(),
        };
    }

    private function generalScreeningData(): array
    {
        return [
            [
                'John Doe',                    // patient_name
                28,                            // age
                'Male',                        // sex
                '15/12/2025',                  // date (DD/MM/YYYY format)
                'Village Name',                // village
                'India',                       // country (reference info)
                'Maharashtra',                 // state (reference info)
                'Pune',                        // district (reference info)
                1,                             // taluka_id
                '9876543210',                  // mobile
                '123456789012',                // aadhar
                170.50,                        // height (cm, decimal 5,2)
                70.50,                         // weight (kg, decimal 5,2)
                '120/80',                      // bp
                150,                           // rbs (integer)
                90,                            // bsl (integer)
                13.50,                         // hb (decimal 5,2)
                'Headache, Fever',             // complaints (required)
                'Hypertension',                // known_conditions
                'Common Cold',                 // diagnosis (required)
                'Paracetamol',                 // treatment (required)
                '500mg x 2',                   // dosage (required)
                'Blood Test, Urine Test',      // lab_tests (comma-separated)
                'Yes',                         // sample_collected (Yes/No/NA)
                'Doctor Referral',             // referral_type
                'General practitioner advised', // referral_details
                'Patient recovery good'        // notes
            ],
        ];
    }

    private function swatchBharatData(): array
    {
        return [
            [
                'Jane Smith',                  // patient_name
                35,                            // age
                'Female',                      // sex
                '20/12/2025',                  // date (DD/MM/YYYY format)
                'Village Name',                // village
                'India',                       // country (reference info)
                'Maharashtra',                 // state (reference info)
                'Pune',                        // district (reference info)
                1,                             // taluka_id
                '8765432109',                  // mobile
                '987654321098',                // aadhar
            ],
        ];
    }

    private function specialHCData(): array
    {
        return [
            [
                'Rajesh Kumar',                // patient_name
                45,                            // age
                'Male',                        // sex
                '18/12/2025',                  // date (DD/MM/YYYY format)
                'Village Name',                // village
                'India',                       // country (reference info)
                'Maharashtra',                 // state (reference info)
                'Pune',                        // district (reference info)
                1,                             // taluka_id
                '9123456789',                  // mobile
                '456789123456',                // aadhar
                'Health Awareness',            // topic_covered (REQUIRED)
                170.50,                        // height (cm, decimal 5,2)
                70.50,                         // weight (kg, decimal 5,2)
                '120/80',                      // bp
                150,                           // rbs (integer)
                90,                            // bsl (integer)
                13.50,                         // hb (decimal 5,2)
                'Headache, Fever',             // complaints (required)
                'Hypertension',                // known_conditions
                'Common Cold',                 // diagnosis (required)
                'Paracetamol',                 // treatment (required)
                '500mg x 2',                   // dosage (required)
                'Blood Test, Urine Test',      // lab_tests (comma-separated)
                'Yes',                         // sample_collected (Yes/No/NA)
                'Doctor Referral',             // referral_type
                'General practitioner advised', // referral_details
                'Patient recovery good'        // notes
            ],
        ];
    }

    private function awarenessCampData(): array
    {
        return [
            [
                'Priya Sharma',                // patient_name
                32,                            // age
                'Female',                      // sex
                '22/12/2025',                  // date (DD/MM/YYYY format)
                'Village Name',                // village
                'India',                       // country (reference info)
                'Maharashtra',                 // state (reference info)
                'Pune',                        // district (reference info)
                1,                             // taluka_id
                '9234567890',                  // mobile
                '321654987321',                // aadhar
                'Disease Prevention',          // topic_covered (REQUIRED)
                168.50,                        // height (cm, decimal 5,2)
                65.50,                         // weight (kg, decimal 5,2)
                '118/78',                      // bp
                140,                           // rbs (integer)
                85,                            // bsl (integer)
                12.50,                         // hb (decimal 5,2)
                'Awareness session attended, good health' // notes/advice
            ],
        ];
    }

    public function headings(): array
    {
        return match($this->campaignTypeId) {
            7 => $this->generalScreeningHeadings(),
            8 => $this->swatchBharatHeadings(),
            9 => $this->specialHCHeadings(),
            10 => $this->awarenessCampHeadings(),
            default => $this->generalScreeningHeadings(),
        };
    }

    private function generalScreeningHeadings(): array
    {
        return [
            'Patient Name *',
            'Age *',
            'Sex (Male/Female/Other) *',
            'Date (DD/MM/YYYY) *',
            'Village *',
            'Country (Reference)',
            'State (Reference)',
            'District (Reference)',
            'Taluka ID *',
            'Mobile (10 digits) *',
            'Aadhar (12 digits)',
            'Height (cm)',
            'Weight (kg)',
            'BP',
            'RBS (Blood Sugar)',
            'BSL (Fasting)',
            'HB (Hemoglobin)',
            'Complaints *',
            'Known Conditions',
            'Diagnosis *',
            'Treatment *',
            'Dosage *',
            'Lab Tests (comma-separated)',
            'Sample Collected (Yes/No/NA)',
            'Referral Type',
            'Referral Details',
            'Notes'
        ];
    }

    private function swatchBharatHeadings(): array
    {
        return [
            'Patient Name *',
            'Age *',
            'Sex (Male/Female/Other) *',
            'Date (DD/MM/YYYY) *',
            'Village *',
            'Country (Reference)',
            'State (Reference)',
            'District (Reference)',
            'Taluka ID *',
            'Mobile (10 digits) *',
            'Aadhar (12 digits)',
        ];
    }

    private function specialHCHeadings(): array
    {
        return [
            'Patient Name *',
            'Age *',
            'Sex (Male/Female/Other) *',
            'Date (DD/MM/YYYY) *',
            'Village *',
            'Country (Reference)',
            'State (Reference)',
            'District (Reference)',
            'Taluka ID *',
            'Mobile (10 digits) *',
            'Aadhar (12 digits)',
            'Topic Covered *',
            'Height (cm)',
            'Weight (kg)',
            'BP',
            'RBS (Blood Sugar)',
            'BSL (Fasting)',
            'HB (Hemoglobin)',
            'Complaints *',
            'Known Conditions',
            'Diagnosis *',
            'Treatment *',
            'Dosage *',
            'Lab Tests (comma-separated)',
            'Sample Collected (Yes/No/NA)',
            'Referral Type',
            'Referral Details',
            'Notes'
        ];
    }

    private function awarenessCampHeadings(): array
    {
        return [
            'Patient Name *',
            'Age *',
            'Sex (Male/Female/Other) *',
            'Date (DD/MM/YYYY) *',
            'Village *',
            'Country (Reference)',
            'State (Reference)',
            'District (Reference)',
            'Taluka ID *',
            'Mobile (10 digits) *',
            'Aadhar (12 digits)',
            'Topic Covered *',
            'Height (cm)',
            'Weight (kg)',
            'BP',
            'RBS (Blood Sugar)',
            'BSL (Fasting)',
            'HB (Hemoglobin)',
            'Advice & Notes'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Style the header row
        $sheet->getStyle('1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 11,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '1F4E78'], // Dark blue
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
        ]);

        // Set column widths based on campaign type
        $this->setColumnWidths($sheet);

        // Set header row height
        $sheet->getRowDimension(1)->setRowHeight(35);

        // Style data rows with alternating colors
        $sheet->getStyle('2')->applyFromArray([
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'D9E1F2'], // Light blue
            ],
        ]);

        // Add borders to all cells with data
        $maxColumn = $this->getMaxColumn();
        $sheet->getStyle('A1:' . $maxColumn . '2')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        return [];
    }

    private function setColumnWidths(Worksheet $sheet): void
    {
        match($this->campaignTypeId) {
            7 => $this->setGeneralScreeningWidths($sheet),
            8 => $this->setSwatchBharatWidths($sheet),
            9 => $this->setSpecialHCWidths($sheet),
            10 => $this->setAwarenessCampWidths($sheet),
            default => $this->setGeneralScreeningWidths($sheet),
        };
    }

    private function setGeneralScreeningWidths(Worksheet $sheet): void
    {
        $sheet->getColumnDimension('A')->setWidth(20); // Patient Name
        $sheet->getColumnDimension('B')->setWidth(8);  // Age
        $sheet->getColumnDimension('C')->setWidth(10); // Sex
        $sheet->getColumnDimension('D')->setWidth(18); // Date
        $sheet->getColumnDimension('E')->setWidth(20); // Village
        $sheet->getColumnDimension('F')->setWidth(15); // Country
        $sheet->getColumnDimension('G')->setWidth(18); // State
        $sheet->getColumnDimension('H')->setWidth(15); // District
        $sheet->getColumnDimension('I')->setWidth(12); // Taluka ID
        $sheet->getColumnDimension('J')->setWidth(15); // Mobile
        $sheet->getColumnDimension('K')->setWidth(15); // Aadhar
        $sheet->getColumnDimension('L')->setWidth(12); // Height
        $sheet->getColumnDimension('M')->setWidth(12); // Weight
        $sheet->getColumnDimension('N')->setWidth(12); // BP
        $sheet->getColumnDimension('O')->setWidth(10); // RBS
        $sheet->getColumnDimension('P')->setWidth(10); // BSL
        $sheet->getColumnDimension('Q')->setWidth(10); // HB
        $sheet->getColumnDimension('R')->setWidth(20); // Complaints
        $sheet->getColumnDimension('S')->setWidth(20); // Known Conditions
        $sheet->getColumnDimension('T')->setWidth(20); // Diagnosis
        $sheet->getColumnDimension('U')->setWidth(20); // Treatment
        $sheet->getColumnDimension('V')->setWidth(15); // Dosage
        $sheet->getColumnDimension('W')->setWidth(25); // Lab Tests
        $sheet->getColumnDimension('X')->setWidth(18); // Sample Collected
        $sheet->getColumnDimension('Y')->setWidth(20); // Referral Type
        $sheet->getColumnDimension('Z')->setWidth(25); // Referral Details
        $sheet->getColumnDimension('AA')->setWidth(25); // Notes
    }

    private function setSwatchBharatWidths(Worksheet $sheet): void
    {
        $sheet->getColumnDimension('A')->setWidth(20); // Patient Name
        $sheet->getColumnDimension('B')->setWidth(8);  // Age
        $sheet->getColumnDimension('C')->setWidth(10); // Sex
        $sheet->getColumnDimension('D')->setWidth(18); // Date
        $sheet->getColumnDimension('E')->setWidth(20); // Village
        $sheet->getColumnDimension('F')->setWidth(15); // Country
        $sheet->getColumnDimension('G')->setWidth(18); // State
        $sheet->getColumnDimension('H')->setWidth(15); // District
        $sheet->getColumnDimension('I')->setWidth(12); // Taluka ID
        $sheet->getColumnDimension('J')->setWidth(15); // Mobile
        $sheet->getColumnDimension('K')->setWidth(15); // Aadhar
    }

    private function setSpecialHCWidths(Worksheet $sheet): void
    {
        $this->setGeneralScreeningWidths($sheet);
        // Insert Topic column (between Aadhar and Height)
        $sheet->insertNewColumnBefore('L');
        $sheet->getColumnDimension('L')->setWidth(20); // Topic Covered
    }

    private function setAwarenessCampWidths(Worksheet $sheet): void
    {
        $sheet->getColumnDimension('A')->setWidth(20); // Patient Name
        $sheet->getColumnDimension('B')->setWidth(8);  // Age
        $sheet->getColumnDimension('C')->setWidth(10); // Sex
        $sheet->getColumnDimension('D')->setWidth(18); // Date
        $sheet->getColumnDimension('E')->setWidth(20); // Village
        $sheet->getColumnDimension('F')->setWidth(15); // Country
        $sheet->getColumnDimension('G')->setWidth(18); // State
        $sheet->getColumnDimension('H')->setWidth(15); // District
        $sheet->getColumnDimension('I')->setWidth(12); // Taluka ID
        $sheet->getColumnDimension('J')->setWidth(15); // Mobile
        $sheet->getColumnDimension('K')->setWidth(15); // Aadhar
        $sheet->getColumnDimension('L')->setWidth(20); // Topic Covered
        $sheet->getColumnDimension('M')->setWidth(12); // Height
        $sheet->getColumnDimension('N')->setWidth(12); // Weight
        $sheet->getColumnDimension('O')->setWidth(12); // BP
        $sheet->getColumnDimension('P')->setWidth(10); // RBS
        $sheet->getColumnDimension('Q')->setWidth(10); // BSL
        $sheet->getColumnDimension('R')->setWidth(10); // HB
        $sheet->getColumnDimension('S')->setWidth(25); // Advice & Notes
    }

    private function getMaxColumn(): string
    {
        return match($this->campaignTypeId) {
            7 => 'AA', // General Screening
            8 => 'K',  // Swatch Bharat
            9 => 'AB', // Special HC (with Topic)
            10 => 'S', // Awareness Camp
            default => 'AA',
        };
    }
}
