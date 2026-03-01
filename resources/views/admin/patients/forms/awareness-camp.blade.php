<!-- Awareness Camp Campaign - Patient Info, Location, Height, Weight, BMI, Advice/Notes -->
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

<!-- Physical Measurements Section -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-ruler"></i> Physical Measurements
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
        <label for="bmi_display" class="form-label">BMI</label>
        <input type="text" class="form-control" id="bmi_display" readonly value="{{ old('bmi', ($patient ? $patient->bmi : '')) }}">
        <input type="hidden" id="bmi" name="bmi" value="{{ old('bmi', ($patient ? $patient->bmi : '')) }}">
    </div>
</div>

<!-- Advice/Notes Section -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-info-square"></i> Advice
</h5>

<div class="mb-2">
    <label for="notes" class="form-label">Advice & Notes</label>
    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3">{{ old('notes', ($patient ? $patient->notes : '')) }}</textarea>
    @error('notes')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
