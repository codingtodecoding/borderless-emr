<?php

namespace App\Http\Controllers\Admin;

use App\Models\Patient;
use App\Models\Country;
use App\Models\CampaignType;
use App\Models\Complaint;
use App\Models\Diagnosis;
use App\Models\KnownCondition;
use App\Models\Treatment;
use App\Models\LabTest;
use App\Imports\PatientImport;
use App\Exports\PatientTemplateExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as ExcelFormat;

class PatientController extends Controller
{

    public function index()
    {
        $patients = Patient::with(['createdBy', 'taluka', 'district', 'state', 'country', 'campaignType'])
                           ->latest()
                           ->paginate(20);
        return view('admin.patients.index', compact('patients'));
    }

    public function create()
    {
        $countries = Country::active()->get();
        $campaignTypes = CampaignType::active()->get();
        $complaints = Complaint::orderBy('complaint')->get();
        $diagnoses = Diagnosis::orderBy('title')->get();
        $knownConditions = KnownCondition::orderBy('title')->get();
        $treatments = Treatment::orderBy('name')->get();
        $labTests = LabTest::active()->orderBy('name')->get();
        return view('admin.patients.create', compact('countries', 'campaignTypes', 'complaints', 'diagnoses', 'knownConditions', 'treatments', 'labTests'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_name' => 'required|string',
            'age' => 'required|integer|min:0|max:150',
            'sex' => 'required|in:Male,Female,Other',
            'date' => 'required|date',
            'campaign_type_id' => 'nullable|exists:campaign_types,id',
            'village' => 'required|string',
            'country_id' => 'nullable|exists:countries,id',
            'state_id' => 'nullable|exists:states,id',
            'district_id' => 'nullable|exists:districts,id',
            'taluka_id' => 'nullable|exists:talukas,id',
            'mobile' => 'required|digits:10',
            'aadhar' => 'nullable|digits:12',
            'height' => 'nullable|numeric|min:0',
            'weight' => 'nullable|numeric|min:0',
            'bp' => 'nullable|string',
            'rbs' => 'nullable|integer',
            'bsl' => 'nullable|integer',
            'hb' => 'nullable|numeric',
            'complaints' => 'nullable|string',
            'known_conditions' => 'nullable|string',
            'diagnosis' => 'nullable|string',
            'treatment' => 'nullable|string',
            'dosage' => 'nullable|string',
            'lab_tests' => 'nullable|array',
            'sample_collected' => 'nullable|in:Yes,No,NA',
            'referral_type' => 'nullable|string',
            'referral_details' => 'nullable|string',
            'notes' => 'nullable|string',
            'topic_covered' => 'nullable|string',
            'bmi' => 'nullable|numeric|min:0',
            'investigation' => 'nullable|string',
            'advice' => 'nullable|string',
        ]);

        $validated['created_by'] = auth()->id();

        // Set default values based on campaign type
        if ($validated['campaign_type_id']) {
            $campaign = CampaignType::find($validated['campaign_type_id']);

            // Swatch Bharat campaign (ID: 2)
            if ($campaign && strtolower($campaign->name) === 'swatch bharat') {
                // Set default values for hidden fields
                $validated['height'] = null;
                $validated['weight'] = null;
                $validated['bp'] = null;
                $validated['rbs'] = null;
                $validated['bsl'] = null;
                $validated['hb'] = null;
                $validated['bmi'] = null;
                $validated['complaints'] = null;
                $validated['known_conditions'] = null;
                $validated['diagnosis'] = null;
                $validated['topic_covered'] = null;
                $validated['investigation'] = null;
                $validated['advice'] = null;
                $validated['treatment'] = null;
                $validated['dosage'] = null;
                $validated['lab_tests'] = null;
                $validated['sample_collected'] = null;
                $validated['referral_type'] = null;
                $validated['referral_details'] = null;
                $validated['notes'] = null;
            }

            // Special HC. Beneficiary campaign (ID: 3)
            // Visible: Patient Name, Age, Sex, Location, Mobile, Aadhar, Complaints, Investigation, Diagnosis, Treatment, Dosage, Referral Type, Referral Details, Advice
            if ($campaign && strpos(strtolower($campaign->name), 'special hc') !== false) {
                // Set default values for hidden fields
                $validated['height'] = null;
                $validated['weight'] = null;
                $validated['bp'] = null;
                $validated['rbs'] = null;
                $validated['bsl'] = null;
                $validated['hb'] = null;
                $validated['bmi'] = null;
                $validated['known_conditions'] = null;
                $validated['topic_covered'] = null;
                $validated['lab_tests'] = null;
                $validated['sample_collected'] = null;
                $validated['notes'] = null;
            }

            // Awareness camp campaign (ID: 4)
            // Visible: Patient Name, Age, Sex, Location, Mobile, Aadhar, Topic Covered, Height, Weight, BMI, Investigation, Advice
            if ($campaign && strpos(strtolower($campaign->name), 'awareness camp') !== false) {
                // Set default values for hidden fields
                $validated['complaints'] = null;
                $validated['known_conditions'] = null;
                $validated['diagnosis'] = null;
                $validated['bp'] = null;
                $validated['rbs'] = null;
                $validated['bsl'] = null;
                $validated['hb'] = null;
                $validated['treatment'] = null;
                $validated['dosage'] = null;
                $validated['lab_tests'] = null;
                $validated['sample_collected'] = null;
                $validated['referral_type'] = null;
                $validated['referral_details'] = null;
                $validated['notes'] = null;
            }
        }

        Patient::create($validated);

        return redirect()->route('admin.patients.index')
                       ->with('success', 'Patient created successfully');
    }

    public function edit(Patient $patient)
    {
        $countries = Country::active()->get();
        $campaignTypes = CampaignType::active()->get();
        $complaints = Complaint::orderBy('complaint')->get();
        $diagnoses = Diagnosis::orderBy('title')->get();
        $knownConditions = KnownCondition::orderBy('title')->get();
        $treatments = Treatment::orderBy('name')->get();
        $labTests = LabTest::active()->orderBy('name')->get();
        return view('admin.patients.edit', compact('patient', 'countries', 'campaignTypes', 'complaints', 'diagnoses', 'knownConditions', 'treatments', 'labTests'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'patient_name' => 'required|string',
            'age' => 'required|integer|min:0|max:150',
            'sex' => 'required|in:Male,Female,Other',
            'date' => 'required|date',
            'campaign_type_id' => 'nullable|exists:campaign_types,id',
            'village' => 'required|string',
            'country_id' => 'nullable|exists:countries,id',
            'state_id' => 'nullable|exists:states,id',
            'district_id' => 'nullable|exists:districts,id',
            'taluka_id' => 'nullable|exists:talukas,id',
            'mobile' => 'required|digits:10',
            'aadhar' => 'nullable|digits:12',
            'height' => 'nullable|numeric|min:0',
            'weight' => 'nullable|numeric|min:0',
            'bp' => 'nullable|string',
            'rbs' => 'nullable|integer',
            'bsl' => 'nullable|integer',
            'hb' => 'nullable|numeric',
            'complaints' => 'nullable|string',
            'known_conditions' => 'nullable|string',
            'diagnosis' => 'nullable|string',
            'treatment' => 'nullable|string',
            'dosage' => 'nullable|string',
            'lab_tests' => 'nullable|array',
            'sample_collected' => 'nullable|in:Yes,No,NA',
            'referral_type' => 'nullable|string',
            'referral_details' => 'nullable|string',
            'notes' => 'nullable|string',
            'topic_covered' => 'nullable|string',
            'bmi' => 'nullable|numeric|min:0',
            'investigation' => 'nullable|string',
            'advice' => 'nullable|string',
        ]);

        // Set default values based on campaign type
        if ($validated['campaign_type_id']) {
            $campaign = CampaignType::find($validated['campaign_type_id']);

            // Swatch Bharat campaign (ID: 2)
            if ($campaign && strtolower($campaign->name) === 'swatch bharat') {
                // Set default values for hidden fields
                $validated['height'] = null;
                $validated['weight'] = null;
                $validated['bp'] = null;
                $validated['rbs'] = null;
                $validated['bsl'] = null;
                $validated['hb'] = null;
                $validated['bmi'] = null;
                $validated['complaints'] = null;
                $validated['known_conditions'] = null;
                $validated['diagnosis'] = null;
                $validated['topic_covered'] = null;
                $validated['investigation'] = null;
                $validated['advice'] = null;
                $validated['treatment'] = null;
                $validated['dosage'] = null;
                $validated['lab_tests'] = null;
                $validated['sample_collected'] = null;
                $validated['referral_type'] = null;
                $validated['referral_details'] = null;
                $validated['notes'] = null;
            }

            // Special HC. Beneficiary campaign (ID: 3)
            // Visible: Patient Name, Age, Sex, Location, Mobile, Aadhar, Complaints, Investigation, Diagnosis, Treatment, Dosage, Referral Type, Referral Details, Advice
            if ($campaign && strpos(strtolower($campaign->name), 'special hc') !== false) {
                // Set default values for hidden fields
                $validated['height'] = null;
                $validated['weight'] = null;
                $validated['bp'] = null;
                $validated['rbs'] = null;
                $validated['bsl'] = null;
                $validated['hb'] = null;
                $validated['bmi'] = null;
                $validated['known_conditions'] = null;
                $validated['topic_covered'] = null;
                $validated['lab_tests'] = null;
                $validated['sample_collected'] = null;
                $validated['notes'] = null;
            }

            // Awareness camp campaign (ID: 4)
            // Visible: Patient Name, Age, Sex, Location, Mobile, Aadhar, Topic Covered, Height, Weight, BMI, Investigation, Advice
            if ($campaign && strpos(strtolower($campaign->name), 'awareness camp') !== false) {
                // Set default values for hidden fields
                $validated['complaints'] = null;
                $validated['known_conditions'] = null;
                $validated['diagnosis'] = null;
                $validated['bp'] = null;
                $validated['rbs'] = null;
                $validated['bsl'] = null;
                $validated['hb'] = null;
                $validated['treatment'] = null;
                $validated['dosage'] = null;
                $validated['lab_tests'] = null;
                $validated['sample_collected'] = null;
                $validated['referral_type'] = null;
                $validated['referral_details'] = null;
                $validated['notes'] = null;
            }
        }

        $patient->update($validated);

        return redirect()->route('admin.patients.index')
                       ->with('success', 'Patient updated successfully');
    }

    public function show(Patient $patient)
    {
        $patient->load(['createdBy', 'taluka', 'district', 'state', 'country', 'campaignType']);
        return view('admin.patients.show', compact('patient'));
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('admin.patients.index')
                       ->with('success', 'Patient deleted successfully');
    }

    public function importForm()
    {
        $campaignTypes = CampaignType::active()->get();
        return view('admin.patients.import', compact('campaignTypes'));
    }

    public function downloadTemplate($campaignTypeId = 7)
    {
        $campaignTypeId = (int) $campaignTypeId;

        // Validate campaign type exists
        $campaignType = CampaignType::find($campaignTypeId);
        if (!$campaignType) {
            $campaignTypeId = 7; // Default to General Screening
        }

        $filename = match($campaignTypeId) {
            7 => 'patient_template_general_screening.xlsx',
            8 => 'patient_template_swatch_bharat.xlsx',
            9 => 'patient_template_special_hc.xlsx',
            10 => 'patient_template_awareness_camp.xlsx',
            default => 'patient_template_general_screening.xlsx',
        };

        return Excel::download(new PatientTemplateExport($campaignTypeId), $filename);
    }

    public function import(Request $request)
    {
        $request->validate([
            'campaign_type_id' => 'required|integer|exists:campaign_types,id',
            'file' => 'required|file|mimes:xlsx,xls,csv|max:10240',
        ]);

        try {
            $campaignTypeId = (int) $request->input('campaign_type_id');

            // Create import instance with campaign type
            $import = new PatientImport($campaignTypeId);

            Excel::import($import, $request->file('file'));

            $successCount = $import->getSuccessCount();
            $failureCount = $import->getFailureCount();
            $duplicates = $import->getDuplicates();

            if ($successCount === 0 && $failureCount === 0) {
                return redirect()->route('admin.patients.index')
                                ->with('warning', 'No valid patient records found in the file.');
            }

            return redirect()->route('admin.patients.index')
                            ->with([
                                'success' => "Successfully imported {$successCount} patients.",
                                'failureCount' => $failureCount,
                                'duplicates' => $duplicates,
                            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.patients.index')
                            ->with('error', 'Error importing file: ' . $e->getMessage());
        }
    }

    public function downloadSampleCsv($campaignTypeId = 7)
    {
        $campaignTypeId = (int) $campaignTypeId;

        // Validate campaign type exists
        $campaignType = CampaignType::find($campaignTypeId);
        if (!$campaignType) {
            $campaignTypeId = 7; // Default to General Screening
        }

        $filename = match($campaignTypeId) {
            7 => 'sample_general_screening.csv',
            8 => 'sample_swatch_bharat.csv',
            9 => 'sample_special_hc.csv',
            10 => 'sample_awareness_camp.csv',
            default => 'sample_general_screening.csv',
        };

        $data = $this->getSampleCsvData($campaignTypeId);
        $csv = $this->arrayToCsv($data);

        return response($csv, 200, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ]);
    }

    protected function getSampleCsvData($campaignTypeId): array
    {
        return match($campaignTypeId) {
            7 => $this->getGeneralScreeningSample(),
            8 => $this->getSwatchBharatSample(),
            9 => $this->getSpecialHCSample(),
            10 => $this->getAwarenessCampSample(),
            default => $this->getGeneralScreeningSample(),
        };
    }

    protected function getGeneralScreeningSample(): array
    {
        return [
            ['Patient Name', 'Age', 'Sex (Male/Female/Other)', 'Date (DD/MM/YYYY)', 'Village', 'Country (Reference)', 'State (Reference)', 'District (Reference)', 'Taluka ID', 'Mobile (10 digits)', 'Aadhar (12 digits)', 'Height (cm)', 'Weight (kg)', 'BP', 'RBS (Blood Sugar)', 'BSL (Fasting)', 'HB (Hemoglobin)', 'Complaints', 'Known Conditions', 'Diagnosis', 'Treatment', 'Dosage', 'Lab Tests (comma-separated)', 'Sample Collected (Yes/No/NA)', 'Referral Type', 'Referral Details', 'Notes'],
            ['John Doe', 28, 'Male', '15/12/2025', 'Village Name', 'India', 'Maharashtra', 'Pune', '1', '9876543210', '123456789012', '170.50', '70.50', '120/80', '150', '90', '13.50', 'Headache, Fever', 'Hypertension', 'Common Cold', 'Paracetamol', '500mg x 2', 'Blood Test, Urine Test', 'Yes', 'Doctor Referral', 'General practitioner advised', 'Patient recovery good'],
            ['Jane Smith', 35, 'Female', '16/12/2025', 'Another Village', 'India', 'Maharashtra', 'Pune', '1', '8765432109', '987654321098', '165.50', '65.50', '118/78', '140', '85', '12.50', 'Cough', 'Diabetes', 'Asthma', 'Cetirizine', '10mg x 1', 'Chest X-ray, ECG', 'No', 'Hospital', 'Requires specialist care', 'Follow-up needed'],
        ];
    }

    protected function getSwatchBharatSample(): array
    {
        return [
            ['Patient Name', 'Age', 'Sex (Male/Female/Other)', 'Date (DD/MM/YYYY)', 'Village', 'Country (Reference)', 'State (Reference)', 'District (Reference)', 'Taluka ID', 'Mobile (10 digits)', 'Aadhar (12 digits)'],
            ['Priya Sharma', 32, 'Female', '20/12/2025', 'Village A', 'India', 'Maharashtra', 'Pune', '1', '9234567890', '321654987321'],
            ['Rajesh Kumar', 45, 'Male', '21/12/2025', 'Village B', 'India', 'Maharashtra', 'Pune', '1', '9123456789', '456789123456'],
            ['Meena Patel', 28, 'Female', '22/12/2025', 'Village C', 'India', 'Maharashtra', 'Pune', '1', '9012345678', '789012345678'],
        ];
    }

    protected function getSpecialHCSample(): array
    {
        return [
            ['Patient Name', 'Age', 'Sex (Male/Female/Other)', 'Date (DD/MM/YYYY)', 'Village', 'Country (Reference)', 'State (Reference)', 'District (Reference)', 'Taluka ID', 'Mobile (10 digits)', 'Aadhar (12 digits)', 'Topic Covered', 'Height (cm)', 'Weight (kg)', 'BP', 'RBS (Blood Sugar)', 'BSL (Fasting)', 'HB (Hemoglobin)', 'Complaints', 'Known Conditions', 'Diagnosis', 'Treatment', 'Dosage', 'Lab Tests (comma-separated)', 'Sample Collected (Yes/No/NA)', 'Referral Type', 'Referral Details', 'Notes'],
            ['Rajesh Kumar', 45, 'Male', '18/12/2025', 'Village Name', 'India', 'Maharashtra', 'Pune', '1', '9123456789', '456789123456', 'Health Awareness', '170.50', '70.50', '120/80', '150', '90', '13.50', 'Headache, Fever', 'Hypertension', 'Common Cold', 'Paracetamol', '500mg x 2', 'Blood Test, Urine Test', 'Yes', 'Doctor Referral', 'General practitioner advised', 'Patient recovery good'],
            ['Sunita Desai', 38, 'Female', '19/12/2025', 'Another Village', 'India', 'Maharashtra', 'Pune', '1', '9345678901', '654321098765', 'Disease Prevention', '162.50', '62.50', '115/75', '120', '80', '12.00', 'Dizziness', 'Thyroid', 'Migraine', 'Aspirin', '500mg x 1', 'Blood Test', 'No', 'Home Care', 'Rest recommended', 'Monitor symptoms'],
        ];
    }

    protected function getAwarenessCampSample(): array
    {
        return [
            ['Patient Name', 'Age', 'Sex (Male/Female/Other)', 'Date (DD/MM/YYYY)', 'Village', 'Country (Reference)', 'State (Reference)', 'District (Reference)', 'Taluka ID', 'Mobile (10 digits)', 'Aadhar (12 digits)', 'Topic Covered', 'Height (cm)', 'Weight (kg)', 'BP', 'RBS (Blood Sugar)', 'BSL (Fasting)', 'HB (Hemoglobin)', 'Advice & Notes'],
            ['Priya Sharma', 32, 'Female', '22/12/2025', 'Village Name', 'India', 'Maharashtra', 'Pune', '1', '9234567890', '321654987321', 'Disease Prevention', '168.50', '65.50', '118/78', '140', '85', '12.50', 'Awareness session attended, good health'],
            ['Arun Singh', 42, 'Male', '23/12/2025', 'Another Village', 'India', 'Maharashtra', 'Pune', '1', '9456789012', '876543210987', 'Health Education', '175.00', '78.50', '125/82', '160', '95', '14.00', 'Session beneficial, maintain exercise routine'],
            ['Kavya Nair', 29, 'Female', '24/12/2025', 'Third Village', 'India', 'Maharashtra', 'Pune', '1', '9567890123', '987654321098', 'Nutrition & Wellness', '160.00', '60.00', '110/70', '110', '75', '11.50', 'Interested in diet modifications'],
        ];
    }

    protected function arrayToCsv(array $data): string
    {
        $csv = '';
        foreach ($data as $row) {
            $csv .= implode(',', array_map(function ($value) {
                // Escape quotes and wrap in quotes if contains comma
                if (is_string($value) && (strpos($value, ',') !== false || strpos($value, '"') !== false)) {
                    return '"' . str_replace('"', '""', $value) . '"';
                }
                return $value;
            }, $row)) . "\n";
        }
        return $csv;
    }

}
