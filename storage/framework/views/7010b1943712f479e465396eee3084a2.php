<!-- Special HC. Beneficiary Campaign - Full Form with Topic -->
<?php
    $patient = $patient ?? null;
?>

<!-- Topic Section -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-info-circle"></i> Topic
</h5>

<div class="mb-2">
    <label for="topic_covered" class="form-label">Topic <span style="color: red;">*</span></label>
    <input type="text" class="form-control <?php $__errorArgs = ['topic_covered'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="topic_covered" name="topic_covered" value="<?php echo e(old('topic_covered', $patient ? $patient->topic_covered : '')); ?>" placeholder="e.g., Health Awareness, Disease Prevention...">
    <?php $__errorArgs = ['topic_covered'];
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

<!-- Vital Signs Section -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-heart-pulse"></i> Vital Signs
</h5>

<div class="row">
    <div class="col-md-2 mb-2">
        <label for="height" class="form-label">Height (cm)</label>
        <input type="number" step="0.01" class="form-control <?php $__errorArgs = ['height'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="height" name="height" value="<?php echo e(old('height', $patient ? $patient->height : '')); ?>" placeholder="in cm">
        <?php $__errorArgs = ['height'];
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
        <label for="weight" class="form-label">Weight (kg)</label>
        <input type="number" step="0.01" class="form-control <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="weight" name="weight" value="<?php echo e(old('weight', $patient ? $patient->weight : '')); ?>" placeholder="in kg">
        <?php $__errorArgs = ['weight'];
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
        <label for="bmi_display" class="form-label">BMI</label>
        <input type="text" class="form-control" id="bmi_display" readonly value="<?php echo e(old('bmi', $patient ? $patient->bmi : '')); ?>">
        <input type="hidden" id="bmi" name="bmi" value="<?php echo e(old('bmi', $patient ? $patient->bmi : '')); ?>">
    </div>
    <div class="col-md-2 mb-2">
        <label for="bp" class="form-label">BP (mmHg)</label>
        <input type="text" class="form-control <?php $__errorArgs = ['bp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="bp" name="bp" value="<?php echo e(old('bp', $patient ? $patient->bp : '')); ?>" placeholder="e.g., 120/80">
        <?php $__errorArgs = ['bp'];
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
        <label for="rbs" class="form-label">RBS (mg/dL)</label>
        <input type="number" class="form-control <?php $__errorArgs = ['rbs'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="rbs" name="rbs" value="<?php echo e(old('rbs', $patient ? $patient->rbs : '')); ?>">
        <?php $__errorArgs = ['rbs'];
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
        <label for="bsl" class="form-label">BSL (mg/dL)</label>
        <input type="number" class="form-control <?php $__errorArgs = ['bsl'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="bsl" name="bsl" value="<?php echo e(old('bsl', $patient ? $patient->bsl : '')); ?>">
        <?php $__errorArgs = ['bsl'];
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
    <div class="col-md-2 mb-2">
        <label for="hb" class="form-label">HB (g/dL)</label>
        <input type="number" step="0.1" class="form-control <?php $__errorArgs = ['hb'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="hb" name="hb" value="<?php echo e(old('hb', $patient ? $patient->hb : '')); ?>">
        <?php $__errorArgs = ['hb'];
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

<!-- Clinical Information Section -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-clipboard-pulse"></i> Clinical Information
</h5>

<div class="mb-2">
    <label for="complaints_select" class="form-label">Chief Complaints (Multiple)</label>
    <select class="form-select <?php $__errorArgs = ['complaints'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="complaints_select" name="complaints_select" multiple>
        <?php $__currentLoopData = $complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($complaint->complaint); ?>"><?php echo e($complaint->complaint); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <input type="hidden" id="complaints_hidden" name="complaints" value="<?php echo e(old('complaints', $patient ? $patient->complaints : '')); ?>">
    <?php $__errorArgs = ['complaints'];
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

<div class="mb-2">
    <label for="known_conditions_select" class="form-label">Known Conditions (Multiple)</label>
    <select class="form-select <?php $__errorArgs = ['known_conditions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="known_conditions_select" name="known_conditions_select" multiple>
        <?php $__currentLoopData = $knownConditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $condition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($condition->title); ?>"><?php echo e($condition->title); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <input type="hidden" id="known_conditions_hidden" name="known_conditions" value="<?php echo e(old('known_conditions', $patient ? $patient->known_conditions : '')); ?>">
    <?php $__errorArgs = ['known_conditions'];
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

<div class="mb-2">
    <label for="diagnosis_select" class="form-label">Diagnosis (Multiple)</label>
    <select class="form-select <?php $__errorArgs = ['diagnosis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="diagnosis_select" name="diagnosis_select" multiple>
        <?php $__currentLoopData = $diagnoses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diagnosis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($diagnosis->title); ?>"><?php echo e($diagnosis->title); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <input type="hidden" id="diagnosis_hidden" name="diagnosis" value="<?php echo e(old('diagnosis', $patient ? $patient->diagnosis : '')); ?>">
    <?php $__errorArgs = ['diagnosis'];
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

<!-- Treatment Section -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-prescription2"></i> Treatment
</h5>

<div class="mb-2">
    <label for="treatment_select" class="form-label">Treatment</label>
    <select class="form-select <?php $__errorArgs = ['treatment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="treatment_select" name="treatment_select" multiple>
        <?php $__currentLoopData = $treatments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treatment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($treatment->name); ?>"><?php echo e($treatment->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <input type="hidden" id="treatment_hidden" name="treatment" value="<?php echo e(old('treatment', $patient ? $patient->treatment : '')); ?>">
    <?php $__errorArgs = ['treatment'];
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

<div class="mb-2">
    <label for="dosage" class="form-label">Dosage</label>
    <textarea class="form-control <?php $__errorArgs = ['dosage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="dosage" name="dosage" rows="2"><?php echo e(old('dosage', $patient ? $patient->dosage : '')); ?></textarea>
    <?php $__errorArgs = ['dosage'];
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
            <?php
                $labTests = old('lab_tests', $patient->lab_tests ?? []);
            ?>
            <?php if($labTests && is_array($labTests)): ?>
                <?php $__currentLoopData = $labTests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="badge bg-primary me-2 mb-2">
                        <?php echo e($test); ?>

                        <input type="hidden" name="lab_tests[]" value="<?php echo e($test); ?>">
                        <button type="button" class="btn-close btn-close-white ms-1" onclick="this.parentElement.remove()"></button>
                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-2">
        <label for="sample_collected" class="form-label">Sample Collected</label>
        <select class="form-select <?php $__errorArgs = ['sample_collected'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="sample_collected" name="sample_collected">
            <option value="">-- Select --</option>
            <option value="Yes" <?php echo e(old('sample_collected', $patient ? $patient->sample_collected : '') == 'Yes' ? 'selected' : ''); ?>>Yes</option>
            <option value="No" <?php echo e(old('sample_collected', $patient ? $patient->sample_collected : '') == 'No' ? 'selected' : ''); ?>>No</option>
            <option value="NA" <?php echo e(old('sample_collected', $patient ? $patient->sample_collected : '') == 'NA' ? 'selected' : ''); ?>>N/A</option>
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
            <?php
                $referralTypes = old('referral_types', $patient && isset($patient->referral_type) ? explode(',', $patient->referral_type) : []);
            ?>
            <?php if($referralTypes && is_array($referralTypes)): ?>
                <?php $__currentLoopData = $referralTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(trim($type)): ?>
                    <span class="badge bg-primary me-2 mb-2">
                        <?php echo e(trim($type)); ?>

                        <input type="hidden" name="referral_types[]" value="<?php echo e(trim($type)); ?>">
                        <button type="button" class="btn-close btn-close-white ms-1" onclick="this.parentElement.remove()"></button>
                    </span>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
    <input type="hidden" id="referral_types_hidden" name="referral_type" value="<?php echo e(old('referral_type', $patient ? $patient->referral_type : '')); ?>">
</div>

<div class="mb-2">
    <label for="referral_details" class="form-label">Referral Details</label>
    <textarea class="form-control <?php $__errorArgs = ['referral_details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="referral_details" name="referral_details" rows="2"><?php echo e(old('referral_details', $patient ? $patient->referral_details : '')); ?></textarea>
</div>

<!-- Additional Notes -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-sticky"></i> Additional Notes
</h5>

<div class="mb-2">
    <label for="notes" class="form-label">Notes</label>
    <textarea class="form-control <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="notes" name="notes" rows="2"><?php echo e(old('notes', $patient ? $patient->notes : '')); ?></textarea>
</div>
<?php /**PATH /Users/avinashvidyanand/Documents/projects/borderless-new/resources/views/admin/patients/forms/special-hc-beneficiary.blade.php ENDPATH**/ ?>