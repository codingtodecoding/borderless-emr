@extends('layouts.admin')

@section('page-title', 'Add Patient')

@section('admin-content')

<!-- Header -->
<div style="margin-bottom: 25px;">
    <h2 style="margin: 0; color: #2e59a7;">
        <i class="bi bi-person-plus-fill"></i> Add Patient
    </h2>
</div>

<div class="table-container">
    <div class="card">
        <div class="card-body" style="padding: 1.25rem 1.5rem;">
            <form method="POST" action="{{ route('admin.patients.store') }}" id="patientForm">
                @csrf

                <!-- Basic Information Section -->
                <h5 class="mb-2" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
                    <i class="bi bi-person-vcard"></i> Basic Information
                </h5>

                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label for="patient_name" class="form-label">Patient Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control @error('patient_name') is-invalid @enderror" id="patient_name" name="patient_name" value="{{ old('patient_name') }}" required>
                        @error('patient_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="age" class="form-label">Age <span style="color: red;">*</span></label>
                        <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age') }}" min="0" max="150" required>
                        @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="sex" class="form-label">Sex <span style="color: red;">*</span></label>
                        <select class="form-select @error('sex') is-invalid @enderror" id="sex" name="sex" required>
                            <option value="">-- Select --</option>
                            <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('sex') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('sex')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="date" class="form-label">Date <span style="color: red;">*</span></label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}" required>
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="campaign_type_id" class="form-label">Campaign Type</label>
                        <select class="form-select @error('campaign_type_id') is-invalid @enderror" id="campaign_type_id" name="campaign_type_id">
                            <option value="">-- Select Campaign Type --</option>
                            @foreach ($campaignTypes as $campaign)
                                <option value="{{ $campaign->id }}" {{ old('campaign_type_id') == $campaign->id ? 'selected' : '' }}>
                                    {{ $campaign->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('campaign_type_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Campaign-Specific Form Content -->
                <div id="campaign-form-content">
                    <!-- General Health Screening Form (ID: 7) -->
                    <div id="form-campaign-7" class="campaign-form" style="display: none;">
                        @include('admin.patients.forms.general-screening')
                    </div>

                    <!-- Swatch Bharat Form (ID: 8) -->
                    <div id="form-campaign-8" class="campaign-form" style="display: none;">
                        @include('admin.patients.forms.swatch-bharat')
                    </div>

                    <!-- Special HC. Beneficiary Form (ID: 9) -->
                    <div id="form-campaign-9" class="campaign-form" style="display: none;">
                        @include('admin.patients.forms.special-hc-beneficiary')
                    </div>

                    <!-- Awareness Camp Form (ID: 10) -->
                    <div id="form-campaign-10" class="campaign-form" style="display: none;">
                        @include('admin.patients.forms.awareness-camp')
                    </div>

                    <!-- Default message when no campaign type is selected -->
                    <div id="form-default" class="alert alert-info" role="alert" style="margin-top: 20px;">
                        <i class="bi bi-info-circle"></i> Please select a campaign type to see the form fields.
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Create Patient
                    </button>
                    <a href="{{ route('admin.patients.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Campaign ID and name mapping
const SWATCH_BHARAT_ID = 8;
const SWATCH_BHARAT_NAME = 'Swatch Bharat';
const SPECIAL_HC_BENEFICIARY_ID = 9;
const SPECIAL_HC_BENEFICIARY_NAME = 'Special HC. Beneficiary';
const AWARENESS_CAMP_ID = 10;
const AWARENESS_CAMP_NAME = 'Awareness Camp';

// Fields to hide for Swatch Bharat campaign
const hiddenFieldsForSwatchBharat = [
    'vital_signs_section',      // Hide entire Vital Signs section
    'clinical_section',         // Hide entire Clinical Information section
    'treatment_section',        // Hide entire Treatment section
    'lab_referral_section',     // Hide entire Lab & Referral section
    'notes_section',            // Hide entire Additional Notes section
];

// Fields to hide for Special HC. Beneficiary campaign
// Visible fields: Patient Name, Age, Sex, Country, State, District, Village, Mobile, Aadhar, Chief Complaints, Investigation, Diagnosis, Treatment, Dosage, Referral Type, Referral Details, Advice
const hiddenFieldsForSpecialHC = [
    'height_field',             // Hide Height
    'weight_field',             // Hide Weight
    'bp_field',                 // Hide BP
    'hb_field',                 // Hide HB
    'rbs_field',                // Hide RBS
    'bsl_field',                // Hide BSL
    'bmi_field',                // Hide BMI
    'known_conditions_field',   // Hide Known Conditions
    'topic_covered_field',      // Hide Topic Covered
    'lab_tests_field',          // Hide Lab Tests checkboxes
    'sample_collected_field',   // Hide Sample Collected
    'notes_field',              // Hide Notes
];

// Fields to hide for Awareness camp campaign
// Visible fields: Patient Name, Age, Sex, Country, State, District, Village, Mobile, Aadhar, Topic Covered, Height, Weight, BMI, Investigation, Advice
const hiddenFieldsForAwarenesscamp = [
    'complaints_field',         // Hide Chief Complaints
    'known_conditions_field',   // Hide Known Conditions
    'diagnosis_field',          // Hide Diagnosis
    'bp_field',                 // Hide BP
    'hb_field',                 // Hide HB
    'rbs_field',                // Hide RBS
    'bsl_field',                // Hide BSL
    'treatment_field',          // Hide Treatment
    'dosage_field',             // Hide Dosage
    'lab_tests_field',          // Hide Lab Tests
    'sample_collected_field',   // Hide Sample Collected
    'referral_type_field',      // Hide Referral Type
    'referral_details_field',   // Hide Referral Details
    'notes_field',              // Hide Notes
];

function toggleSwatchBharatFields() {
    const campaignSelect = document.getElementById('campaign_type_id');
    const selectedId = campaignSelect.value;
    const selectedText = campaignSelect.options[campaignSelect.selectedIndex].text;

    // Check if it's Swatch Bharat campaign (ID 2 and name contains "Swatch bharat")
    const isSwatchBharat = selectedId == SWATCH_BHARAT_ID && selectedText.toLowerCase().includes('swatch bharat');

    // Toggle visibility of sections
    hiddenFieldsForSwatchBharat.forEach(fieldId => {
        const element = document.getElementById(fieldId);
        if (element) {
            element.style.display = isSwatchBharat ? 'none' : 'block';
        }
    });

    // Toggle required attribute on visible fields
    const vitalSignsInputs = document.querySelectorAll('#vital_signs_section input, #vital_signs_section textarea');
    const clinicalInputs = document.querySelectorAll('#clinical_section input, #clinical_section textarea, #clinical_section select, #clinical_section [type="hidden"]');
    const treatmentInputs = document.querySelectorAll('#treatment_section input, #treatment_section textarea');
    const labInputs = document.querySelectorAll('#lab_referral_section input, #lab_referral_section textarea, #lab_referral_section select');
    const notesInputs = document.querySelectorAll('#notes_section textarea');

    [vitalSignsInputs, clinicalInputs, treatmentInputs, labInputs, notesInputs].forEach(inputs => {
        inputs.forEach(input => {
            if (isSwatchBharat && input.hasAttribute('required')) {
                input.dataset.wasRequired = 'true';
                input.removeAttribute('required');
            } else if (!isSwatchBharat && input.dataset.wasRequired === 'true') {
                input.setAttribute('required', 'required');
            }
        });
    });
}

function toggleSpecialHCFields() {
    const campaignSelect = document.getElementById('campaign_type_id');
    const selectedId = campaignSelect.value;
    const selectedText = campaignSelect.options[campaignSelect.selectedIndex].text;

    // Check if it's Special HC. Beneficiary campaign (ID 3 and name contains "Special HC. Beneficiary")
    const isSpecialHC = selectedId == SPECIAL_HC_BENEFICIARY_ID && selectedText.toLowerCase().includes('special hc');

    // Toggle visibility of individual fields
    hiddenFieldsForSpecialHC.forEach(fieldId => {
        const element = document.getElementById(fieldId);
        if (element) {
            element.style.display = isSpecialHC ? 'none' : 'block';
        }
    });

    // Toggle required attribute on visible fields
    const heightInput = document.getElementById('height');
    const weightInput = document.getElementById('weight');
    const bpInput = document.getElementById('bp');
    const hbInput = document.getElementById('hb');
    const rbsInput = document.getElementById('rbs');
    const bslInput = document.getElementById('bsl');
    const bmiInput = document.getElementById('bmi');
    const knownConditionsInput = document.getElementById('known_conditions');
    const topicCoveredInput = document.getElementById('topic_covered');
    const notesInput = document.getElementById('notes');
    const labTestInput = document.getElementById('lab_test_input');
    const sampleCollectedSelect = document.getElementById('sample_collected');

    const fieldsToToggle = [heightInput, weightInput, bpInput, hbInput, rbsInput, bslInput, bmiInput, knownConditionsInput, topicCoveredInput, notesInput, sampleCollectedSelect, labTestInput];

    fieldsToToggle.forEach(field => {
        if (field) {
            if (isSpecialHC && field.hasAttribute('required')) {
                field.dataset.wasRequired = 'true';
                field.removeAttribute('required');
            } else if (!isSpecialHC && field.dataset.wasRequired === 'true') {
                field.setAttribute('required', 'required');
            }
        }
    });
}

function toggleAwarenesscamp() {
    const campaignSelect = document.getElementById('campaign_type_id');
    const selectedId = campaignSelect.value;
    const selectedText = campaignSelect.options[campaignSelect.selectedIndex].text;

    // Check if it's Awareness camp campaign (ID 4 and name contains "Awareness camp")
    const isAwarenesscamp = selectedId == AWARENESS_CAMP_ID && selectedText.toLowerCase().includes('awareness camp');

    // Toggle visibility of individual fields
    hiddenFieldsForAwarenesscamp.forEach(fieldId => {
        const element = document.getElementById(fieldId);
        if (element) {
            element.style.display = isAwarenesscamp ? 'none' : 'block';
        }
    });

    // Toggle required attribute on visible fields
    const complaintsInput = document.getElementById('complaints');
    const knownConditionsInput = document.getElementById('known_conditions');
    const diagnosisInput = document.getElementById('diagnosis');
    const bpInput = document.getElementById('bp');
    const hbInput = document.getElementById('hb');
    const rbsInput = document.getElementById('rbs');
    const bslInput = document.getElementById('bsl');
    const treatmentInput = document.getElementById('treatment');
    const dosageInput = document.getElementById('dosage');
    const labTestInput = document.getElementById('lab_test_input');
    const sampleCollectedSelect = document.getElementById('sample_collected');
    const referralTypeInput = document.getElementById('referral_type');
    const referralDetailsInput = document.getElementById('referral_details');
    const notesInput = document.getElementById('notes');

    const fieldsToToggle = [complaintsInput, knownConditionsInput, diagnosisInput, bpInput, hbInput, rbsInput, bslInput, treatmentInput, dosageInput, sampleCollectedSelect, referralTypeInput, referralDetailsInput, notesInput, labTestInput];

    fieldsToToggle.forEach(field => {
        if (field) {
            if (isAwarenesscamp && field.hasAttribute('required')) {
                field.dataset.wasRequired = 'true';
                field.removeAttribute('required');
            } else if (!isAwarenesscamp && field.dataset.wasRequired === 'true') {
                field.setAttribute('required', 'required');
            }
        }
    });
}

function loadStates() {
    const countryId = document.getElementById('country_id').value;
    const stateSelect = document.getElementById('state_id');

    stateSelect.innerHTML = '<option value="">-- Select State --</option>';
    document.getElementById('district_id').innerHTML = '<option value="">-- Select District --</option>';
    document.getElementById('taluka_id').innerHTML = '<option value="">-- Select Taluka --</option>';

    if (!countryId) return;

    fetch(`/admin/states/by-country/${countryId}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(state => {
                const option = document.createElement('option');
                option.value = state.id;
                option.textContent = state.name;
                stateSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));
}

function loadDistricts() {
    const stateId = document.getElementById('state_id').value;
    const districtSelect = document.getElementById('district_id');

    districtSelect.innerHTML = '<option value="">-- Select District --</option>';
    document.getElementById('taluka_id').innerHTML = '<option value="">-- Select Taluka --</option>';

    if (!stateId) return;

    fetch(`/admin/districts/by-state/${stateId}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(district => {
                const option = document.createElement('option');
                option.value = district.id;
                option.textContent = district.name;
                districtSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));
}

function loadTalukas() {
    const districtId = document.getElementById('district_id').value;
    const talukaSelect = document.getElementById('taluka_id');

    talukaSelect.innerHTML = '<option value="">-- Select Taluka --</option>';

    if (!districtId) return;

    fetch(`/admin/talukas/by-district/${districtId}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(taluka => {
                const option = document.createElement('option');
                option.value = taluka.id;
                option.textContent = taluka.name;
                talukaSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));
}

// Calculate BMI automatically
function calculateBMI() {
    const height = parseFloat(document.getElementById('height').value);
    const weight = parseFloat(document.getElementById('weight').value);
    const bmiDisplay = document.getElementById('bmi_display');
    const bmiInput = document.getElementById('bmi');

    if (height > 0 && weight > 0) {
        // BMI = weight (kg) / (height in meters)^2
        // Height is in cm, so convert to meters by dividing by 100
        const heightInMeters = height / 100;
        const bmi = (weight / (heightInMeters * heightInMeters)).toFixed(2);
        bmiDisplay.value = bmi;
        bmiInput.value = bmi;
    } else {
        bmiDisplay.value = '';
        bmiInput.value = '';
    }
}

// Village autocomplete
let villageCache = [];
let villageDebounceTimer;

function loadVillages() {
    const talukaId = document.getElementById('taluka_id').value;
    if (!talukaId) {
        villageCache = [];
        return;
    }

    fetch(`/admin/villages/by-taluka/${talukaId}`)
        .then(response => response.json())
        .then(data => {
            villageCache = data;
            console.log('Villages loaded for taluka:', data);
            // If village field is focused and has input, show suggestions
            const villageInput = document.getElementById('village');
            if (document.activeElement === villageInput && villageInput.value.length > 0) {
                showVillageSuggestions();
            }
        })
        .catch(error => console.error('Error loading villages:', error));
}

function showVillageSuggestions() {
    const villageInput = document.getElementById('village');
    const suggestionsDiv = document.getElementById('village-suggestions');
    const searchTerm = villageInput.value.toLowerCase().trim();

    if (!searchTerm || searchTerm.length === 0) {
        suggestionsDiv.style.display = 'none';
        return;
    }

    const talukaId = document.getElementById('taluka_id').value;

    // If taluka is selected, use cached villages; otherwise, use search API
    if (talukaId && villageCache.length > 0) {
        // Filter from cached villages
        const matches = villageCache.filter(v =>
            v.name.toLowerCase().includes(searchTerm)
        );

        if (matches.length === 0) {
            suggestionsDiv.style.display = 'none';
            return;
        }

        displaySuggestions(matches);
    } else {
        // Use search API for all villages or when cache is empty
        fetch(`/admin/villages/search?q=${encodeURIComponent(searchTerm)}${talukaId ? '&taluka_id=' + talukaId : ''}`)
            .then(response => response.json())
            .then(data => {
                console.log('Search results:', data);
                if (data.length === 0) {
                    suggestionsDiv.style.display = 'none';
                    return;
                }
                displaySuggestions(data);
            })
            .catch(error => console.error('Error searching villages:', error));
    }
}

function displaySuggestions(villages) {
    const villageInput = document.getElementById('village');
    const suggestionsDiv = document.getElementById('village-suggestions');

    // Build suggestions HTML
    suggestionsDiv.innerHTML = villages.map(v =>
        `<div class="suggestion-item" data-value="${v.name}" style="padding:10px; cursor:pointer; border-bottom:1px solid #eee;">
            ${v.name}
        </div>`
    ).join('');

    suggestionsDiv.style.display = 'block';

    // Add click handlers to suggestions
    suggestionsDiv.querySelectorAll('.suggestion-item').forEach(item => {
        item.addEventListener('click', function() {
            villageInput.value = this.dataset.value;
            suggestionsDiv.style.display = 'none';
        });
    });
}

// Initialize form elements (height, weight, village autocomplete, etc.)
function initializeFormElements() {
    // BMI calculation
    const heightField = document.getElementById('height');
    const weightField = document.getElementById('weight');

    if (heightField && !heightField.hasListener) {
        heightField.addEventListener('change', calculateBMI);
        heightField.addEventListener('input', calculateBMI);
        heightField.hasListener = true;
    }

    if (weightField && !weightField.hasListener) {
        weightField.addEventListener('change', calculateBMI);
        weightField.addEventListener('input', calculateBMI);
        weightField.hasListener = true;
    }

    // Calculate BMI if fields have values
    if (heightField || weightField) {
        calculateBMI();
    }

    // Village autocomplete
    const villageInput = document.getElementById('village');
    const talukaSelect = document.getElementById('taluka_id');

    if (villageInput && !villageInput.hasListener) {
        villageInput.addEventListener('input', function() {
            clearTimeout(villageDebounceTimer);
            villageDebounceTimer = setTimeout(() => {
                showVillageSuggestions();
            }, 300);
        });

        villageInput.addEventListener('focus', function() {
            if (this.value.length > 0) {
                showVillageSuggestions();
            }
        });

        villageInput.hasListener = true;
    }

    if (talukaSelect && !talukaSelect.hasListener) {
        talukaSelect.addEventListener('change', loadVillages);
        talukaSelect.hasListener = true;
    }
}

// Load initial cascading dropdowns on page load if values exist
document.addEventListener('DOMContentLoaded', function() {
    // Initialize campaign field visibility
    toggleSwatchBharatFields();
    toggleSpecialHCFields();
    toggleAwarenesscamp();

    // Add event listener to campaign type dropdown
    const campaignSelect = document.getElementById('campaign_type_id');
    const formDefault = document.getElementById('form-default');

    if (campaignSelect) {
        campaignSelect.addEventListener('change', function() {
            // Show/hide the appropriate form based on campaign type
            const campaignTypeId = this.value;

            // Hide all forms
            document.querySelectorAll('.campaign-form').forEach(form => {
                form.style.display = 'none';
            });
            if (formDefault) {
                formDefault.style.display = 'none';
            }

            // Show the selected form
            if (campaignTypeId) {
                const selectedForm = document.getElementById('form-campaign-' + campaignTypeId);
                if (selectedForm) {
                    selectedForm.style.display = 'block';
                    // Re-initialize form elements if needed
                    initializeFormElements();
                }
            } else {
                if (formDefault) {
                    formDefault.style.display = 'block';
                }
            }

            toggleSwatchBharatFields();
            toggleSpecialHCFields();
            toggleAwarenesscamp();
        });

        // Show the initially selected form on page load
        const initialCampaignType = campaignSelect.value;
        if (initialCampaignType) {
            const initialForm = document.getElementById('form-campaign-' + initialCampaignType);
            if (initialForm) {
                initialForm.style.display = 'block';
            }
        } else {
            if (formDefault) {
                formDefault.style.display = 'block';
            }
        }
    }

    // Initialize form elements
    initializeFormElements();

    // Hide suggestions when clicking outside
    document.addEventListener('click', function(e) {
        const villageInput = document.getElementById('village');
        const suggestionsDiv = document.getElementById('village-suggestions');
        if (villageInput && suggestionsDiv) {
            if (e.target !== villageInput && e.target !== suggestionsDiv && !suggestionsDiv.contains(e.target)) {
                suggestionsDiv.style.display = 'none';
            }
        }
    });

    @if(old('country_id'))
        loadStates();
        setTimeout(() => {
            @if(old('state_id'))
                document.getElementById('state_id').value = '{{ old('state_id') }}';
                loadDistricts();
                setTimeout(() => {
                    @if(old('district_id'))
                        document.getElementById('district_id').value = '{{ old('district_id') }}';
                        loadTalukas();
                        @if(old('taluka_id'))
                            setTimeout(() => {
                                document.getElementById('taluka_id').value = '{{ old('taluka_id') }}';
                                loadVillages();
                            }, 100);
                        @endif
                    @endif
                }, 100);
            @endif
        }, 100);
    @endif
});
</script>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
<style>
    .lab-tests-container {
        position: relative;
    }

    .lab-tests-container .input-group {
        position: relative;
    }

    .selected-tests-list {
        margin-top: 10px;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 4px;
        min-height: 40px;
        border: 1px solid #e3e6f0;
    }

    .selected-tests-list .badge {
        padding: 6px 10px;
        font-size: 13px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .selected-tests-list .badge .btn-close {
        padding: 2px;
        font-size: 12px;
    }

    #lab_test_suggestions {
        margin-top: 2px;
    }

    #lab_test_suggestions > div:hover {
        background-color: #f0f0f0;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Tom Select for multi-select fields
    function initTomSelect(selectId, hiddenId, existingValues) {
        const select = document.getElementById(selectId);
        if (!select) return;

        const items = existingValues ? existingValues.split(',').map(v => v.trim()).filter(v => v.length > 0) : [];

        const ts = new TomSelect('#' + selectId, {
            plugins: ['remove_button'],
            delimiter: ',',
            create: true,
            createOnBlur: true,
            items: items,
            onChange: function(value) {
                // Update hidden input with comma-separated values
                document.getElementById(hiddenId).value = value;
            }
        });
    }

    // Initialize all select fields with TomSelect for multi-select
    initTomSelect('complaints_select', 'complaints_hidden', '{{ old("complaints") }}');
    initTomSelect('known_conditions_select', 'known_conditions_hidden', '{{ old("known_conditions") }}');
    initTomSelect('diagnosis_select', 'diagnosis_hidden', '{{ old("diagnosis") }}');
    initTomSelect('treatment_select', 'treatment_hidden', '{{ old("treatment") }}');

    // Lab Tests Autocomplete
    const labTestsData = @json($labTests->pluck('name')->toArray());
    const labTestInput = document.getElementById('lab_test_input');
    const addLabTestBtn = document.getElementById('add_lab_test_btn');
    const selectedLabTests = document.getElementById('selected_lab_tests');
    let selectedTests = [];

    // Initialize selected tests from old values
    @if(old('lab_tests'))
        selectedTests = @json(old('lab_tests'));
    @endif

    // Lab test input autocomplete
    labTestInput.addEventListener('input', function(e) {
        const value = this.value.toLowerCase();
        const suggestions = document.getElementById('lab_test_suggestions');

        if (!value) {
            if (suggestions) suggestions.remove();
            return;
        }

        const filtered = labTestsData.filter(test =>
            test.toLowerCase().includes(value) &&
            !selectedTests.includes(test)
        );

        if (filtered.length === 0) {
            if (suggestions) suggestions.remove();
            return;
        }

        // Create or update suggestions dropdown
        let suggestionsEl = document.getElementById('lab_test_suggestions');
        if (!suggestionsEl) {
            suggestionsEl = document.createElement('div');
            suggestionsEl.id = 'lab_test_suggestions';
            suggestionsEl.style.cssText = 'position:absolute;background:white;border:1px solid #ccc;width:100%;max-height:200px;overflow-y:auto;z-index:1000;border-radius:4px;box-shadow:0 2px 4px rgba(0,0,0,0.1);';
            labTestInput.parentElement.style.position = 'relative';
            labTestInput.parentElement.appendChild(suggestionsEl);
        }

        suggestionsEl.innerHTML = filtered.map(test =>
            `<div class="p-2" style="cursor:pointer;border-bottom:1px solid #eee;" data-test="${test}">
                <i class="bi bi-flask"></i> ${test}
            </div>`
        ).join('');

        // Add click handlers to suggestions
        suggestionsEl.querySelectorAll('div[data-test]').forEach(el => {
            el.addEventListener('click', function() {
                addLabTest(this.getAttribute('data-test'));
                labTestInput.value = '';
                suggestionsEl.innerHTML = '';
            });
        });
    });

    // Add lab test on button click or Enter key
    addLabTestBtn.addEventListener('click', function() {
        const test = labTestInput.value.trim();
        if (test && labTestsData.includes(test) && !selectedTests.includes(test)) {
            addLabTest(test);
            labTestInput.value = '';
        }
    });

    labTestInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const test = this.value.trim();
            if (test && labTestsData.includes(test) && !selectedTests.includes(test)) {
                addLabTest(test);
                this.value = '';
            }
        }
    });

    function addLabTest(testName) {
        if (selectedTests.includes(testName)) return;

        selectedTests.push(testName);

        const badge = document.createElement('span');
        badge.className = 'badge bg-primary me-2 mb-2';
        badge.innerHTML = `${testName}
            <input type="hidden" name="lab_tests[]" value="${testName}">
            <button type="button" class="btn-close btn-close-white ms-1" onclick="this.parentElement.remove(); selectedTests = selectedTests.filter(t => t !== '${testName}');"></button>`;

        selectedLabTests.appendChild(badge);
    }

    // Close suggestions when clicking outside
    document.addEventListener('click', function(e) {
        if (e.target !== labTestInput) {
            const suggestions = document.getElementById('lab_test_suggestions');
            if (suggestions) suggestions.remove();
        }
    });
});
</script>
@endpush

@endsection
