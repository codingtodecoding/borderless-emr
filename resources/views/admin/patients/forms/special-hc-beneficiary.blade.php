<!-- Special HC. Beneficiary Campaign - Patient Info, Location, Complaints, Investigation, Diagnosis, Treatment, Referral -->
@php
    $patient = $patient ?? null;
@endphp

<!-- Topic Section -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-info-circle"></i> Topic
</h5>

<div class="mb-2">
    <label for="topic_covered" class="form-label">Topic <span style="color: red;">*</span></label>
    <input type="text" class="form-control @error('topic_covered') is-invalid @enderror" id="topic_covered" name="topic_covered" value="{{ old('topic_covered', $patient ? $patient->topic_covered : '') }}" placeholder="e.g., Health Awareness, Disease Prevention..." required>
    @error('topic_covered')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Location Details Section -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-geo-alt"></i> Location Details
</h5>

<div class="row">
    <div class="col-md-3 mb-2">
        <label for="country_id" class="form-label">Country <span style="color: red;">*</span></label>
        <select class="form-select @error('country_id') is-invalid @enderror" id="country_id" name="country_id" onchange="loadStates()" required>
            <option value="">-- Select Country --</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}" {{ old('country_id', ($patient ? $patient->country_id : '')) == $country->id ? 'selected' : '' }}>
                    {{ $country->name }}
                </option>
            @endforeach
        </select>
        @error('country_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-3 mb-2">
        <label for="state_id" class="form-label">State <span style="color: red;">*</span></label>
        <select class="form-select @error('state_id') is-invalid @enderror" id="state_id" name="state_id" onchange="loadDistricts()" required>
            <option value="">-- Select State --</option>
        </select>
        @error('state_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-3 mb-2">
        <label for="district_id" class="form-label">District <span style="color: red;">*</span></label>
        <select class="form-select @error('district_id') is-invalid @enderror" id="district_id" name="district_id" onchange="loadTalukas()" required>
            <option value="">-- Select District --</option>
        </select>
        @error('district_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-3 mb-2">
        <label for="taluka_id" class="form-label">Taluka <span style="color: red;">*</span></label>
        <select class="form-select @error('taluka_id') is-invalid @enderror" id="taluka_id" name="taluka_id" onchange="loadVillages()" required>
            <option value="">-- Select Taluka --</option>
        </select>
        @error('taluka_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-2">
        <label for="village" class="form-label">Village <span style="color: red;">*</span></label>
        <input type="text" class="form-control @error('village') is-invalid @enderror" id="village" name="village" value="{{ old('village', ($patient ? $patient->village : '')) }}" placeholder="Search village..." autocomplete="off" required>
        <div id="village-suggestions" style="display: none; position: absolute; background: white; border: 1px solid #ccc; width: 100%; max-height: 200px; overflow-y: auto; z-index: 1000; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-top: 2px;"></div>
        @error('village')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4 mb-2">
        <label for="mobile" class="form-label">Mobile <span style="color: red;">*</span></label>
        <input type="tel" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile', ($patient ? $patient->mobile : '')) }}" placeholder="10 digit mobile number" maxlength="10" required>
        @error('mobile')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-4 mb-2">
        <label for="aadhar" class="form-label">Aadhar</label>
        <input type="text" class="form-control @error('aadhar') is-invalid @enderror" id="aadhar" name="aadhar" value="{{ old('aadhar', ($patient ? $patient->aadhar : '')) }}" placeholder="12 digit aadhar number" maxlength="12">
        @error('aadhar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- Clinical Information Section -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-clipboard-pulse"></i> Clinical Information
</h5>

<div class="mb-2">
    <label for="complaints_select" class="form-label">Chief Complaints</label>
    <select class="form-select @error('complaints') is-invalid @enderror" id="complaints_select" name="complaints_select">
        <option value="">-- Select Complaints --</option>
        @foreach ($complaints as $complaint)
            <option value="{{ $complaint->complaint }}">{{ $complaint->complaint }}</option>
        @endforeach
    </select>
    <input type="hidden" id="complaints_hidden" name="complaints" value="{{ old('complaints', ($patient ? $patient->complaints : '')) }}">
    @error('complaints')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-2">
    <label for="diagnosis_select" class="form-label">Diagnosis</label>
    <select class="form-select @error('diagnosis') is-invalid @enderror" id="diagnosis_select" name="diagnosis_select">
        <option value="">-- Select Diagnosis --</option>
        @foreach ($diagnoses as $diagnosis)
            <option value="{{ $diagnosis->title }}">{{ $diagnosis->title }}</option>
        @endforeach
    </select>
    <input type="hidden" id="diagnosis_hidden" name="diagnosis" value="{{ old('diagnosis', ($patient ? $patient->diagnosis : '')) }}">
    @error('diagnosis')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Investigation Section -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-heart-pulse"></i> Investigation
</h5>

<div class="row">
    <div class="col-md-3 mb-2">
        <label for="height" class="form-label">Height (cm)</label>
        <input type="number" step="0.01" class="form-control @error('height') is-invalid @enderror" id="height" name="height" value="{{ old('height', ($patient ? $patient->height : '')) }}" placeholder="in cm">
        @error('height')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-3 mb-2">
        <label for="weight" class="form-label">Weight (kg)</label>
        <input type="number" step="0.01" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{ old('weight', ($patient ? $patient->weight : '')) }}" placeholder="in kg">
        @error('weight')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-3 mb-2">
        <label for="bp" class="form-label">BP (mmHg)</label>
        <input type="text" class="form-control @error('bp') is-invalid @enderror" id="bp" name="bp" value="{{ old('bp', ($patient ? $patient->bp : '')) }}" placeholder="e.g., 120/80">
        @error('bp')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
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
    <input type="hidden" id="treatment_hidden" name="treatment" value="{{ old('treatment', ($patient ? $patient->treatment : '')) }}">
    @error('treatment')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-2">
    <label for="dosage" class="form-label">Dosage</label>
    <textarea class="form-control @error('dosage') is-invalid @enderror" id="dosage" name="dosage" rows="2">{{ old('dosage', ($patient ? $patient->dosage : '')) }}</textarea>
    @error('dosage')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Referral -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-arrow-up-right-square"></i> Referral
</h5>

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
    <textarea class="form-control @error('referral_details') is-invalid @enderror" id="referral_details" name="referral_details" rows="2">{{ old('referral_details', ($patient ? $patient->referral_details : '')) }}</textarea>
</div>
