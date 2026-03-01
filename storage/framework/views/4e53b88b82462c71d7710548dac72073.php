<?php $__env->startSection('page-title', 'Add Patient'); ?>

<?php $__env->startSection('admin-content'); ?>

<!-- Header -->
<div style="margin-bottom: 25px;">
    <h2 style="margin: 0; color: #2e59a7;">
        <i class="bi bi-person-plus-fill"></i> Add Patient
    </h2>
</div>

<div class="table-container">
    <div class="card">
        <div class="card-body" style="padding: 1.25rem 1.5rem;">
            <?php
                $patient = $patient ?? null;
            ?>

            <form method="POST" action="<?php echo e(route('admin.patients.store')); ?>" id="patientForm">
                <?php echo csrf_field(); ?>

                <!-- Basic Information Section -->
                <h5 class="mb-2" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
                    <i class="bi bi-person-vcard"></i> Basic Information
                </h5>

                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label for="patient_name" class="form-label">Patient Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?php $__errorArgs = ['patient_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="patient_name" name="patient_name" value="<?php echo e(old('patient_name')); ?>" required>
                        <?php $__errorArgs = ['patient_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="age" class="form-label">Age <span style="color: red;">*</span></label>
                        <input type="number" class="form-control <?php $__errorArgs = ['age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="age" name="age" value="<?php echo e(old('age')); ?>" min="0" max="150" required>
                        <?php $__errorArgs = ['age'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="sex" class="form-label">Sex <span style="color: red;">*</span></label>
                        <select class="form-select <?php $__errorArgs = ['sex'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="sex" name="sex" required>
                            <option value="">-- Select --</option>
                            <option value="Male" <?php echo e(old('sex') == 'Male' ? 'selected' : ''); ?>>Male</option>
                            <option value="Female" <?php echo e(old('sex') == 'Female' ? 'selected' : ''); ?>>Female</option>
                            <option value="Other" <?php echo e(old('sex') == 'Other' ? 'selected' : ''); ?>>Other</option>
                        </select>
                        <?php $__errorArgs = ['sex'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="date" class="form-label">Date <span style="color: red;">*</span></label>
                        <input type="date" class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="date" name="date" value="<?php echo e(old('date')); ?>" required>
                        <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="campaign_type_id" class="form-label">Campaign Type</label>
                        <select class="form-select <?php $__errorArgs = ['campaign_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="campaign_type_id" name="campaign_type_id">
                            <option value="">-- Select Campaign Type --</option>
                            <?php $__currentLoopData = $campaignTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($campaign->id); ?>" <?php echo e(old('campaign_type_id') == $campaign->id ? 'selected' : ''); ?>>
                                    <?php echo e($campaign->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['campaign_type_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <!-- Shared Location Details Section -->
                <h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
                    <i class="bi bi-geo-alt"></i> Location Details
                </h5>

                <div class="row">
                    <div class="col-md-3 mb-2">
                        <label for="country_id" class="form-label">Country <span style="color: red;">*</span></label>
                        <select class="form-select <?php $__errorArgs = ['country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="country_id" name="country_id" onchange="loadStates()" required>
                            <option value="">-- Select Country --</option>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($country->id); ?>" <?php echo e(old('country_id') ? (old('country_id') == $country->id ? 'selected' : '') : ($patient && $patient->country_id ? ($patient->country_id == $country->id ? 'selected' : '') : ($country->name === 'India' ? 'selected' : ''))); ?>>
                                    <?php echo e($country->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="state_id" class="form-label">State <span style="color: red;">*</span></label>
                        <select class="form-select <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="state_id" name="state_id" onchange="loadDistricts()" required>
                            <option value="">-- Select State --</option>
                        </select>
                        <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="district_id" class="form-label">District <span style="color: red;">*</span></label>
                        <select class="form-select <?php $__errorArgs = ['district_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="district_id" name="district_id" onchange="loadTalukas()" required>
                            <option value="">-- Select District --</option>
                        </select>
                        <?php $__errorArgs = ['district_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-3 mb-2">
                        <label for="taluka_id" class="form-label">Taluka <span style="color: red;">*</span></label>
                        <select class="form-select <?php $__errorArgs = ['taluka_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="taluka_id" name="taluka_id" onchange="loadVillages()" required>
                            <option value="">-- Select Taluka --</option>
                        </select>
                        <?php $__errorArgs = ['taluka_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label for="village" class="form-label">Village <span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?php $__errorArgs = ['village'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="village" name="village" value="<?php echo e(old('village')); ?>" placeholder="Search village..." autocomplete="off" required>
                        <div id="village-suggestions" style="display: none; position: absolute; background: white; border: 1px solid #ccc; width: 100%; max-height: 200px; overflow-y: auto; z-index: 1000; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-top: 2px;"></div>
                        <?php $__errorArgs = ['village'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="mobile" class="form-label">Mobile <span style="color: red;">*</span></label>
                        <input type="tel" class="form-control <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="mobile" name="mobile" value="<?php echo e(old('mobile')); ?>" placeholder="10 digit mobile number" maxlength="10" required>
                        <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="aadhar" class="form-label">Aadhar</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['aadhar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="aadhar" name="aadhar" value="<?php echo e(old('aadhar')); ?>" placeholder="12 digit aadhar number" maxlength="12">
                        <?php $__errorArgs = ['aadhar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <!-- Campaign-Specific Form Content -->
                <div id="campaign-form-content">
                    <!-- General Health Screening Form (ID: 7) -->
                    <div id="form-campaign-7" class="campaign-form" style="display: none;">
                        <?php echo $__env->make('admin.patients.forms.general-screening', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>

                    <!-- Swatch Bharat Form (ID: 8) -->
                    <div id="form-campaign-8" class="campaign-form" style="display: none;">
                        <?php echo $__env->make('admin.patients.forms.swatch-bharat', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>

                    <!-- Special HC. Beneficiary Form (ID: 9) -->
                    <div id="form-campaign-9" class="campaign-form" style="display: none;">
                        <?php echo $__env->make('admin.patients.forms.special-hc-beneficiary', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>

                    <!-- Awareness Camp Form (ID: 10) -->
                    <div id="form-campaign-10" class="campaign-form" style="display: none;">
                        <?php echo $__env->make('admin.patients.forms.awareness-camp', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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
                    <a href="<?php echo e(route('admin.patients.index')); ?>" class="btn btn-secondary">
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
            // Show all states
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
            // Show all districts
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
function calculateBMI(event) {
    // Find the visible campaign form that contains the height/weight fields
    let form = null;
    if (event && event.target) {
        form = event.target.closest('.campaign-form') || document.querySelector('.campaign-form[style*="block"]');
    } else {
        form = document.querySelector('.campaign-form[style*="block"]');
    }

    if (!form) return;

    // Scope all lookups to the visible form
    const heightInput = form.querySelector('#height');
    const weightInput = form.querySelector('#weight');
    const bmiDisplay = form.querySelector('#bmi_display');
    const bmiInput = form.querySelector('#bmi');

    if (!heightInput || !weightInput || !bmiDisplay || !bmiInput) {
        return;
    }

    const height = parseFloat(heightInput.value);
    const weight = parseFloat(weightInput.value);

    if (height > 0 && weight > 0) {
        // BMI = weight (kg) / (height in meters)^2
        // Height is in cm, so convert to meters by dividing by 100
        const heightInMeters = height / 100;
        const bmi = (weight / (heightInMeters * heightInMeters)).toFixed(2);
        if (bmiDisplay) bmiDisplay.value = bmi;
        if (bmiInput) bmiInput.value = bmi;
    } else {
        if (bmiDisplay) bmiDisplay.value = '';
        if (bmiInput) bmiInput.value = '';
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

// Store Tom Select instances keyed by element reference
const tomSelectInstances = new Map();

// Build Tom Select on a specific element
function buildTomSelect(selectEl, hiddenEl, placeholder) {
    // Destroy any existing instance on this element
    if (selectEl.tomselect) {
        selectEl.tomselect.destroy();
    }

    const hiddenValue = hiddenEl ? (hiddenEl.value || '') : '';
    const items = hiddenValue ? hiddenValue.split(',').map(v => v.trim()).filter(v => v) : [];

    new TomSelect(selectEl, {
        plugins: ['remove_button'],
        delimiter: ',',
        create: false,
        maxOptions: 300,
        maxItems: null,
        items: items,
        placeholder: placeholder,
        searchField: ['text'],
        hideSelected: false,
        closeAfterSelect: false,
        diacritics: true,
        onChange: function(value) {
            if (hiddenEl) hiddenEl.value = value.join(',');
        },
        render: {
            option: function(data, escape) {
                return '<div class="py-2 px-3">' + escape(data.text) + '</div>';
            },
            item: function(data, escape) {
                return '<span class="badge bg-primary me-1 mb-1">' + escape(data.text) + '</span>';
            }
        }
    });
}

// Initialize Tom Select scoped to the currently visible campaign form
function reinitializeTomSelect() {
    // Find the currently visible campaign form container
    const visibleForm = document.querySelector('.campaign-form[style*="block"]')
                     || document.querySelector('.campaign-form:not([style*="none"])');

    if (!visibleForm) return;

    const fieldConfigs = [
        { selectName: 'complaints_select',      hiddenName: 'complaints_hidden',      placeholder: 'Search complaints...' },
        { selectName: 'known_conditions_select', hiddenName: 'known_conditions_hidden', placeholder: 'Search conditions...' },
        { selectName: 'diagnosis_select',        hiddenName: 'diagnosis_hidden',        placeholder: 'Search diagnosis...' },
        { selectName: 'treatment_select',        hiddenName: 'treatment_hidden',        placeholder: 'Search treatments...' }
    ];

    fieldConfigs.forEach(config => {
        // Scope to the VISIBLE form — avoids getElementById returning wrong (hidden) element
        const selectEl = visibleForm.querySelector('#' + config.selectName);
        const hiddenEl = visibleForm.querySelector('#' + config.hiddenName);

        if (!selectEl) return;

        try {
            buildTomSelect(selectEl, hiddenEl, config.placeholder);
        } catch (e) {
            console.error('Tom Select init failed for ' + config.selectName, e);
        }
    });
}

// Initialize form elements (height, weight, village autocomplete, etc.)
// Global BMI change handler - works for any visible form
function handleBMIChange(e) {
    if (e.target.id === 'height' || e.target.id === 'weight') {
        calculateBMI(e);
    }
}

function initializeFormElements() {
    // BMI calculation using event delegation
    // This works for ANY visible campaign form (general-screening, special-hc, awareness-camp)
    // Remove old listeners from document to prevent duplicates
    document.removeEventListener('change', handleBMIChange);
    document.removeEventListener('input', handleBMIChange);

    // Attach delegated listeners to catch height/weight changes in ANY visible form
    document.addEventListener('change', handleBMIChange);
    document.addEventListener('input', handleBMIChange);

    // Calculate BMI on initialization
    calculateBMI();

    // Village autocomplete
    const villageInput = document.getElementById('village');
    const talukaSelect = document.getElementById('taluka_id');

    if (villageInput) {
        villageInput.removeEventListener('input', showVillageSuggestions);
        villageInput.removeEventListener('focus', showVillageSuggestions);

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
    }

    if (talukaSelect) {
        talukaSelect.removeEventListener('change', loadVillages);
        talukaSelect.addEventListener('change', loadVillages);
    }

    // Reinitialize Tom Select for the visible form
    reinitializeTomSelect();
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
                    // Re-initialize form elements after brief delay to ensure DOM is ready
                    setTimeout(() => {
                        initializeFormElements();
                    }, 50);
                    // Always load states for the campaign form
                    const countryId = document.getElementById('country_id').value;
                    if (countryId) {
                        loadStates();
                    }
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

    // Initialize form elements with a slight delay to ensure DOM is ready
    setTimeout(() => {
        initializeFormElements();
    }, 100);

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

    // Set India as default country and load all states
    const countrySelect = document.getElementById('country_id');
    if (countrySelect && !countrySelect.value) {
        const options = countrySelect.querySelectorAll('option');
        for (let option of options) {
            if (option.textContent.trim() === 'India') {
                countrySelect.value = option.value;
                break;
            }
        }
    }

    // Load states for India by default (show all states without requiring country selection)
    const countryId = countrySelect.value;
    if (countryId) {
        fetch(`/admin/states/by-country/${countryId}`)
            .then(response => response.json())
            .then(data => {
                const stateSelect = document.getElementById('state_id');
                stateSelect.innerHTML = '<option value="">-- Select State --</option>';
                // Show all states
                data.forEach(state => {
                    const option = document.createElement('option');
                    option.value = state.id;
                    option.textContent = state.name;
                    stateSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error loading states:', error));
    }

    <?php if(old('country_id')): ?>
        loadStates();
        setTimeout(() => {
            <?php if(old('state_id')): ?>
                document.getElementById('state_id').value = '<?php echo e(old('state_id')); ?>';
                loadDistricts();
                setTimeout(() => {
                    <?php if(old('district_id')): ?>
                        document.getElementById('district_id').value = '<?php echo e(old('district_id')); ?>';
                        loadTalukas();
                        <?php if(old('taluka_id')): ?>
                            setTimeout(() => {
                                document.getElementById('taluka_id').value = '<?php echo e(old('taluka_id')); ?>';
                                loadVillages();
                            }, 100);
                        <?php endif; ?>
                    <?php endif; ?>
                }, 100);
            <?php endif; ?>
        }, 100);
    <?php endif; ?>
});
</script>

<?php $__env->startPush('styles'); ?>
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
<style>
    .lab-tests-container,
    .referral-types-container {
        position: relative;
    }

    .lab-tests-container .input-group,
    .referral-types-container .input-group {
        position: relative;
    }

    .selected-tests-list {
        margin-top: 10px;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 4px;
        min-height: 40px;
        border: 1px solid #e3e6f0;
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
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

    #lab_test_suggestions,
    #referral_type_suggestions {
        margin-top: 2px;
    }

    #lab_test_suggestions > div:hover,
    #referral_type_suggestions > div:hover {
        background-color: #f0f0f0;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
        .table-container {
            padding: 10px;
        }

        .card-body {
            padding: 10px !important;
        }

        .row {
            margin-right: -5px;
            margin-left: -5px;
        }

        .col-md-2,
        .col-md-3,
        .col-md-4,
        .col-md-6 {
            padding-right: 5px;
            padding-left: 5px;
            margin-bottom: 8px;
        }

        .form-label {
            font-size: 0.85rem;
            margin-bottom: 4px;
        }

        .form-control,
        .form-select {
            font-size: 16px;
            padding: 8px;
            min-height: 44px;
        }

        .btn {
            padding: 8px 12px;
            font-size: 0.9rem;
            min-height: 44px;
        }

        h5 {
            font-size: 0.9rem !important;
            margin-bottom: 12px !important;
            padding-bottom: 6px !important;
        }

        .input-group {
            flex-wrap: wrap;
        }

        .input-group .btn {
            margin-top: 4px;
            width: 100%;
        }

        .selected-tests-list .badge {
            font-size: 12px;
            padding: 4px 8px;
        }

        #village-suggestions,
        #lab_test_suggestions,
        #referral_type_suggestions {
            max-height: 150px;
            font-size: 0.9rem;
        }

        .d-flex.gap-2 {
            flex-direction: column;
        }

        .d-flex.gap-2 .btn {
            width: 100%;
            margin-bottom: 8px;
        }
    }

    @media (max-width: 480px) {
        .col-md-2,
        .col-md-3,
        .col-md-4,
        .col-md-6 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .form-label {
            font-size: 0.8rem;
        }

        .form-control,
        .form-select {
            font-size: 16px;
            padding: 10px;
        }

        h5 {
            font-size: 0.85rem !important;
        }
    }

    /* Tom Select Autocomplete Enhancements */
    .ts-wrapper {
        width: 100%;
    }

    .ts-control {
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        padding: 6px 8px;
        min-height: auto;
    }

    .ts-control.focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .ts-control input {
        padding: 4px 0 !important;
        min-height: auto !important;
    }

    .ts-dropdown {
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        max-height: 300px;
    }

    .ts-dropdown [data-selectable] {
        cursor: pointer;
        padding: 8px 12px;
        border-bottom: 1px solid #f0f0f0;
    }

    .ts-dropdown [data-selectable]:hover {
        background-color: #e7f3ff;
        color: #0d6efd;
    }

    .ts-dropdown [data-selected] {
        display: none;
    }

    .ts-dropdown-content {
        padding: 0;
    }

    .ts-item {
        background-color: #0d6efd;
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        margin-right: 4px;
        font-size: 13px;
    }

    .ts-item.selected {
        background-color: #0d6efd;
    }

    .ts-item .ts-item-remove {
        cursor: pointer;
        margin-left: 4px;
    }

    .ts-item .ts-item-remove:hover {
        opacity: 0.7;
    }

    /* Search highlight in dropdown */
    .ts-dropdown [data-selectable].highlight {
        background-color: #fff3cd;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
<script>
// Referral Types List
const referralTypesList = [
    'Cardiologist', 'Neurologist', 'Dermatologist', 'Orthopedist',
    'Ophthalmologist', 'ENT Specialist', 'Gastroenterologist', 'Urologist',
    'Physiotherapist', 'Specialist Consultation', 'Hospital Admission', 'Surgery'
];

// ─── Lab Tests & Referral Types: Event Delegation ───────────────────────────
// Uses event delegation so handlers work for ANY visible campaign form,
// avoiding the getElementById-returns-first-match problem.

const labTestsData = <?php echo json_encode($labTests->pluck('name')->toArray(), 15, 512) ?>;

// Helper: get the visible campaign form container from any child element
function getVisibleForm(el) {
    return el.closest('.campaign-form') || null;
}

// Helper: show autocomplete suggestions list below the input
function showSuggestions(inputEl, suggestions, onSelect) {
    const container = inputEl.closest('.input-group');
    let suggestionsEl = container.querySelector('.autocomplete-suggestions');
    if (!suggestionsEl) {
        suggestionsEl = document.createElement('div');
        suggestionsEl.className = 'autocomplete-suggestions';
        suggestionsEl.style.cssText = 'position:absolute;top:100%;left:0;right:0;background:white;border:1px solid #ccc;max-height:200px;overflow-y:auto;z-index:9999;border-radius:4px;box-shadow:0 4px 8px rgba(0,0,0,0.15);';
        container.style.position = 'relative';
        container.appendChild(suggestionsEl);
    }
    suggestionsEl.innerHTML = suggestions.map(s =>
        `<div class="p-2" style="cursor:pointer;border-bottom:1px solid #eee;" data-value="${s}">${s}</div>`
    ).join('');
    suggestionsEl.querySelectorAll('[data-value]').forEach(item => {
        item.addEventListener('mousedown', function(e) {
            e.preventDefault(); // keep focus on input
            onSelect(this.dataset.value);
            suggestionsEl.innerHTML = '';
            inputEl.value = '';
        });
        item.addEventListener('mouseover', () => item.style.background = '#e7f3ff');
        item.addEventListener('mouseout', () => item.style.background = '');
    });
}

// Helper: add a removable badge to a container
function addBadge(container, value, inputName) {
    const badge = document.createElement('span');
    badge.className = 'badge bg-primary me-2 mb-2 d-inline-flex align-items-center';
    badge.innerHTML = `${value}
        <input type="hidden" name="${inputName}" value="${value}">
        <button type="button" class="btn-close btn-close-white ms-1" style="font-size:0.6rem;" aria-label="Remove"></button>`;
    badge.querySelector('.btn-close').addEventListener('click', () => badge.remove());
    container.appendChild(badge);
}

// ── Delegated listener on the whole form ──
document.getElementById('patientForm').addEventListener('input', function(e) {
    const form = getVisibleForm(e.target);
    if (!form) return;

    // Lab test autocomplete
    if (e.target.id === 'lab_test_input') {
        const input = e.target;
        const value = input.value.toLowerCase().trim();
        const selectedList = form.querySelector('#selected_lab_tests');
        const already = Array.from(selectedList.querySelectorAll('input[name="lab_tests[]"]')).map(i => i.value);
        const filtered = labTestsData.filter(t => t.toLowerCase().includes(value) && !already.includes(t));
        if (!value || !filtered.length) {
            const s = input.closest('.input-group').querySelector('.autocomplete-suggestions');
            if (s) s.innerHTML = '';
            return;
        }
        showSuggestions(input, filtered, val => {
            addBadge(selectedList, val, 'lab_tests[]');
        });
    }

    // Referral type autocomplete
    if (e.target.id === 'referral_type_input') {
        const input = e.target;
        const value = input.value.toLowerCase().trim();
        const selectedList = form.querySelector('#selected_referral_types');
        const already = Array.from(selectedList.querySelectorAll('input[name="referral_types[]"]')).map(i => i.value);
        const filtered = referralTypesList.filter(t => t.toLowerCase().includes(value) && !already.includes(t));
        if (!value || !filtered.length) {
            const s = input.closest('.input-group').querySelector('.autocomplete-suggestions');
            if (s) s.innerHTML = '';
            return;
        }
        showSuggestions(input, filtered, val => {
            const hidden = form.querySelector('#referral_types_hidden');
            addBadge(selectedList, val, 'referral_types[]');
            if (hidden) {
                hidden.value = Array.from(selectedList.querySelectorAll('input[name="referral_types[]"]')).map(i => i.value).join(',');
            }
        });
    }
});

document.getElementById('patientForm').addEventListener('click', function(e) {
    const form = getVisibleForm(e.target);
    if (!form) return;

    // Lab test Add button
    if (e.target.id === 'add_lab_test_btn' || e.target.closest('#add_lab_test_btn')) {
        const input = form.querySelector('#lab_test_input');
        const val = input ? input.value.trim() : '';
        const selectedList = form.querySelector('#selected_lab_tests');
        if (!val || !selectedList) return;
        const already = Array.from(selectedList.querySelectorAll('input[name="lab_tests[]"]')).map(i => i.value);
        if (!already.includes(val)) {
            addBadge(selectedList, val, 'lab_tests[]');
        }
        if (input) input.value = '';
    }

    // Referral type Add button
    if (e.target.id === 'add_referral_type_btn' || e.target.closest('#add_referral_type_btn')) {
        const input = form.querySelector('#referral_type_input');
        const val = input ? input.value.trim() : '';
        const selectedList = form.querySelector('#selected_referral_types');
        const hidden = form.querySelector('#referral_types_hidden');
        if (!val || !selectedList) return;
        const already = Array.from(selectedList.querySelectorAll('input[name="referral_types[]"]')).map(i => i.value);
        if (!already.includes(val)) {
            addBadge(selectedList, val, 'referral_types[]');
            if (hidden) {
                hidden.value = Array.from(selectedList.querySelectorAll('input[name="referral_types[]"]')).map(i => i.value).join(',');
            }
        }
        if (input) input.value = '';
    }
});

document.getElementById('patientForm').addEventListener('keydown', function(e) {
    if (e.key !== 'Enter') return;
    const form = getVisibleForm(e.target);
    if (!form) return;

    if (e.target.id === 'lab_test_input' || e.target.id === 'referral_type_input') {
        e.preventDefault();
        e.target.closest('.input-group')?.querySelector('#add_lab_test_btn, #add_referral_type_btn')?.click();
    }
});

// Close autocomplete suggestions when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('.input-group')) {
        document.querySelectorAll('.autocomplete-suggestions').forEach(s => s.innerHTML = '');
    }
});
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/avinashvidyanand/Documents/projects/borderless-new/resources/views/admin/patients/create.blade.php ENDPATH**/ ?>