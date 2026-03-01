<!-- Special HC. Beneficiary Campaign - Full Form with Topic -->
@php
    $patient = $patient ?? null;
@endphp

<!-- Topic Section -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-info-circle"></i> Topic
</h5>

<div class="mb-2">
    <label for="topic_covered" class="form-label">Topic <span style="color: red;">*</span></label>
    <input type="text" class="form-control @error('topic_covered') is-invalid @enderror" id="topic_covered" name="topic_covered" value="{{ old('topic_covered', $patient ? $patient->topic_covered : '') }}" placeholder="e.g., Health Awareness, Disease Prevention...">
    @error('topic_covered')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Vital Signs Section -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-heart-pulse"></i> Vital Signs
</h5>

<div class="row">
    <div class="col-md-2 mb-2">
        <label for="height" class="form-label">Height (cm)</label>
        <input type="number" step="0.01" class="form-control @error('height') is-invalid @enderror" id="height" name="height" value="{{ old('height', $patient ? $patient->height : '') }}" placeholder="in cm">
        @error('height')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-2 mb-2">
        <label for="weight" class="form-label">Weight (kg)</label>
        <input type="number" step="0.01" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight', $patient ? $patient->weight : '') }}" placeholder="in kg">
        @error('weight')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-2 mb-2">
        <label for="bmi_display" class="form-label">BMI</label>
        <input type="text" class="form-control" id="bmi_display" readonly value="{{ old('bmi', $patient ? $patient->bmi : '') }}">
        <input type="hidden" id="bmi" name="bmi" value="{{ old('bmi', $patient ? $patient->bmi : '') }}">
    </div>
    <div class="col-md-2 mb-2">
        <label for="bp" class="form-label">BP (mmHg)</label>
        <input type="text" class="form-control @error('bp') is-invalid @enderror" id="bp" name="bp" value="{{ old('bp', $patient ? $patient->bp : '') }}" placeholder="e.g., 120/80">
        @error('bp')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-2 mb-2">
        <label for="rbs" class="form-label">RBS (mg/dL)</label>
        <input type="number" class="form-control @error('rbs') is-invalid @enderror" id="rbs" name="rbs" value="{{ old('rbs', $patient ? $patient->rbs : '') }}">
        @error('rbs')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-2 mb-2">
        <label for="bsl" class="form-label">BSL (mg/dL)</label>
        <input type="number" class="form-control @error('bsl') is-invalid @enderror" id="bsl" name="bsl" value="{{ old('bsl', $patient ? $patient->bsl : '') }}">
        @error('bsl')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-2 mb-2">
        <label for="hb" class="form-label">HB (g/dL)</label>
        <input type="number" step="0.1" class="form-control @error('hb') is-invalid @enderror" id="hb" name="hb" value="{{ old('hb', $patient ? $patient->hb : '') }}">
        @error('hb')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Clinical Information Section -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-clipboard-pulse"></i> Clinical Information
</h5>

<div class="mb-2">
    <label for="complaints_select" class="form-label">Chief Complaints (Multiple)</label>
    <select class="form-select @error('complaints') is-invalid @enderror" id="complaints_select" name="complaints_select" multiple>
        @foreach ($complaints as $complaint)
            <option value="{{ $complaint->complaint }}">{{ $complaint->complaint }}</option>
        @endforeach
    </select>
    <input type="hidden" id="complaints_hidden" name="complaints" value="{{ old('complaints', $patient ? $patient->complaints : '') }}">
    @error('complaints')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-2">
    <label for="known_conditions_select" class="form-label">Known Conditions (Multiple)</label>
    <select class="form-select @error('known_conditions') is-invalid @enderror" id="known_conditions_select" name="known_conditions_select" multiple>
        @foreach ($knownConditions as $condition)
            <option value="{{ $condition->title }}">{{ $condition->title }}</option>
        @endforeach
    </select>
    <input type="hidden" id="known_conditions_hidden" name="known_conditions" value="{{ old('known_conditions', $patient ? $patient->known_conditions : '') }}">
    @error('known_conditions')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-2">
    <label for="diagnosis_select" class="form-label">Diagnosis (Multiple)</label>
    <select class="form-select @error('diagnosis') is-invalid @enderror" id="diagnosis_select" name="diagnosis_select" multiple>
        @foreach ($diagnoses as $diagnosis)
            <option value="{{ $diagnosis->title }}">{{ $diagnosis->title }}</option>
        @endforeach
    </select>
    <input type="hidden" id="diagnosis_hidden" name="diagnosis" value="{{ old('diagnosis', $patient ? $patient->diagnosis : '') }}">
    @error('diagnosis')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Treatment Section -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-prescription2"></i> Treatment
</h5>

<div class="mb-2">
    <label for="treatment_select" class="form-label">Treatment</label>
    <select class="form-select @error('treatment') is-invalid @enderror" id="treatment_select" name="treatment_select" multiple>
        @foreach ($treatments as $treatment)
            <option value="{{ $treatment->name }}">{{ $treatment->name }}</option>
        @endforeach
    </select>
    <input type="hidden" id="treatment_hidden" name="treatment" value="{{ old('treatment', $patient ? $patient->treatment : '') }}">
    @error('treatment')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-2">
    <label for="dosage" class="form-label">Dosage</label>
    <textarea class="form-control @error('dosage') is-invalid @enderror" id="dosage" name="dosage" rows="2">{{ old('dosage', $patient ? $patient->dosage : '') }}</textarea>
    @error('dosage')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Lab Tests & Referral -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-flask"></i> Lab Tests & Referral
</h5>

<div class="mb-3">
    <label class="form-label">Lab Tests</label>
    <div class="lab-tests-container">
        <div class="input-group mb-2">
            <input type="text" class="form-control" id="lab_test_input" placeholder="Search and add lab tests..." autocomplete="off">
            <button class="btn btn-outline-secondary" type="button" id="add_lab_test_btn">
                <i class="bi bi-plus-lg"></i> Add
            </button>
        </div>
        <div id="selected_lab_tests" class="selected-tests-list">
            @php
                $labTests = old('lab_tests', $patient->lab_tests ?? []);
            @endphp
            @if($labTests && is_array($labTests))
                @foreach($labTests as $test)
                    <span class="badge bg-primary me-2 mb-2">
                        {{ $test }}
                        <input type="hidden" name="lab_tests[]" value="{{ $test }}">
                        <button type="button" class="btn-close btn-close-white ms-1" onclick="this.parentElement.remove()"></button>
                    </span>
                @endforeach
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-2">
        <label for="sample_collected" class="form-label">Sample Collected</label>
        <select class="form-select @error('sample_collected') is-invalid @enderror" id="sample_collected" name="sample_collected">
            <option value="">-- Select --</option>
            <option value="Yes" {{ old('sample_collected', $patient ? $patient->sample_collected : '') == 'Yes' ? 'selected' : '' }}>Yes</option>
            <option value="No" {{ old('sample_collected', $patient ? $patient->sample_collected : '') == 'No' ? 'selected' : '' }}>No</option>
            <option value="NA" {{ old('sample_collected', $patient ? $patient->sample_collected : '') == 'NA' ? 'selected' : '' }}>N/A</option>
        </select>
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Referral Type (Add Multiple)</label>
    <div class="referral-types-container">
        <div class="input-group mb-2">
            <input type="text" class="form-control" id="referral_type_input" placeholder="Search and add referral types..." autocomplete="off">
            <button class="btn btn-outline-secondary" type="button" id="add_referral_type_btn">
                <i class="bi bi-plus-lg"></i> Add
            </button>
        </div>
        <div id="selected_referral_types" class="selected-tests-list">
            @php
                $referralTypes = old('referral_types', $patient && isset($patient->referral_type) ? explode(',', $patient->referral_type) : []);
            @endphp
            @if($referralTypes && is_array($referralTypes))
                @foreach($referralTypes as $type)
                    @if(trim($type))
                    <span class="badge bg-primary me-2 mb-2">
                        {{ trim($type) }}
                        <input type="hidden" name="referral_types[]" value="{{ trim($type) }}">
                        <button type="button" class="btn-close btn-close-white ms-1" onclick="this.parentElement.remove()"></button>
                    </span>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
    <input type="hidden" id="referral_types_hidden" name="referral_type" value="{{ old('referral_type', $patient ? $patient->referral_type : '') }}">
</div>

<div class="mb-2">
    <label for="referral_details" class="form-label">Referral Details</label>
    <textarea class="form-control @error('referral_details') is-invalid @enderror" id="referral_details" name="referral_details" rows="2">{{ old('referral_details', $patient ? $patient->referral_details : '') }}</textarea>
</div>

<!-- Additional Notes -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-sticky"></i> Additional Notes
</h5>

<div class="mb-2">
    <label for="notes" class="form-label">Notes</label>
    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="2">{{ old('notes', $patient ? $patient->notes : '') }}</textarea>
</div>
