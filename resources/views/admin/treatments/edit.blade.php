@extends('layouts.admin')

@section('page-title', 'Edit Treatment')

@section('admin-content')

<!-- Header -->
<div style="margin-bottom: 25px;">
    <h2 style="margin: 0; color: #2e59a7;">
        <i class="bi bi-pencil-square"></i> Edit Treatment
    </h2>
</div>

<div class="table-container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.treatments.update', $treatment->id) }}" id="treatmentForm">
                @csrf
                @method('PUT')

                <!-- Treatment Information Section -->
                <h5 class="mb-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 10px;">
                    <i class="bi bi-prescription2"></i> Treatment Details
                </h5>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">
                            Treatment Name <span style="color: red;">*</span>
                        </label>

                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               id="name"
                               name="name"
                               value="{{ old('name', $treatment->name) }}"
                               placeholder="Enter treatment name"
                               required>

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Update Treatment
                    </button>

                    <a href="{{ route('admin.treatments.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
