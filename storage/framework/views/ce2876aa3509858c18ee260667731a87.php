<!-- Awareness Camp Campaign - Patient Info, Location, Height, Weight, BMI, Advice/Notes -->
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

<!-- Physical Measurements Section -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-ruler"></i> Physical Measurements
</h5>

<div class="row">
    <div class="col-md-3 mb-2">
        <label for="height" class="form-label">Height (cm)</label>
        <input type="number" step="0.01" class="form-control <?php $__errorArgs = ['height'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="height" name="height" value="<?php echo e(old('height', ($patient ? $patient->height : ''))); ?>" placeholder="in cm">
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
    <div class="col-md-3 mb-2">
        <label for="weight" class="form-label">Weight (kg)</label>
        <input type="number" step="0.01" class="form-control <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="weight" name="weight" value="<?php echo e(old('weight', ($patient ? $patient->weight : ''))); ?>" placeholder="in kg">
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
    <div class="col-md-3 mb-2">
        <label for="bmi_display" class="form-label">BMI</label>
        <input type="text" class="form-control" id="bmi_display" readonly value="<?php echo e(old('bmi', ($patient ? $patient->bmi : ''))); ?>">
        <input type="hidden" id="bmi" name="bmi" value="<?php echo e(old('bmi', ($patient ? $patient->bmi : ''))); ?>">
    </div>
</div>

<!-- Advice/Notes Section -->
<h5 class="mb-2 mt-3" style="color: #2e59a7; border-bottom: 2px solid #e3e6f0; padding-bottom: 8px; font-size: 0.95rem;">
    <i class="bi bi-info-square"></i> Advice
</h5>

<div class="mb-2">
    <label for="notes" class="form-label">Advice & Notes</label>
    <textarea class="form-control <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="notes" name="notes" rows="3"><?php echo e(old('notes', ($patient ? $patient->notes : ''))); ?></textarea>
    <?php $__errorArgs = ['notes'];
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
<?php /**PATH D:\NewEmr\borderless-emr\resources\views/admin/patients/forms/awareness-camp.blade.php ENDPATH**/ ?>