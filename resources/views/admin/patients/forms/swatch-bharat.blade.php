<!-- Swatch Bharat Campaign - Basic Information and Location Only -->
@php
    $patient = $patient ?? null;
@endphp

<!-- Basic Information Section -->
<h5 class="mb-2" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-person-vcard"></i> Basic Information
</h5>

<div class="row">
    <div class="col-md-4 mb-2">
        <label for="patient_name" class="form-label">Patient Name <span style="color: red;">*</span></label>
        <input type="text" class="form-control @error('patient_name') is-invalid @enderror" id="patient_name" name="patient_name" value="{{ old('patient_name', ($patient ? $patient->patient_name : '')) }}" required>
        @error('patient_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-3 mb-2">
        <label for="age" class="form-label">Age <span style="color: red;">*</span></label>
        <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age', ($patient ? $patient->age : '')) }}" min="0" max="150" required>
        @error('age')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-3 mb-2">
        <label for="sex" class="form-label">Sex <span style="color: red;">*</span></label>
        <select class="form-select @error('sex') is-invalid @enderror" id="sex" name="sex" required>
            <option value="">-- Select --</option>
            <option value="Male" {{ old('sex', ($patient ? $patient->sex : '')) == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('sex', ($patient ? $patient->sex : '')) == 'Female' ? 'selected' : '' }}>Female</option>
            <option value="Other" {{ old('sex', ($patient ? $patient->sex : '')) == 'Other' ? 'selected' : '' }}>Other</option>
        </select>
        @error('sex')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-2 mb-2">
        <label for="date" class="form-label">Date <span style="color: red;">*</span></label>
        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $patient->date ?? date('Y-m-d')) }}" required>
        @error('date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
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
