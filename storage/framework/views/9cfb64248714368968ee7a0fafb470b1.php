<?php $__env->startSection('title', 'Contact Us - Gadget & Glow'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <!-- Hero Banner -->
    <div class="hero-banner mb-5 text-center position-relative">
        <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-2 rounded-pill text-uppercase tracking-wider fw-bold">Customer Support</span>
        <h1 class="display-4 fw-bold mb-3 text-dark"><?php echo e($contact->page_title); ?></h1>
        <p class="lead text-secondary mx-auto max-w-2xl" style="max-width: 750px;">
            <?php echo e($contact->hero_text); ?>

        </p>
    </div>

    <!-- Contact Info Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4 text-center group-card bg-white">
                <div class="rounded-circle bg-primary bg-opacity-10 mx-auto p-3 text-primary fs-2 mb-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <h5 class="fw-bold mb-2 text-dark">Our Office Address</h5>
                <p class="text-muted small mb-0"><?php echo e($contact->address); ?></p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4 text-center group-card bg-white">
                <div class="rounded-circle bg-success bg-opacity-10 mx-auto p-3 text-success fs-2 mb-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-telephone-fill"></i>
                </div>
                <h5 class="fw-bold mb-2 text-dark">Phone & Support</h5>
                <p class="text-muted small mb-1"><strong class="text-dark">Phone:</strong> <?php echo e($contact->phone); ?></p>
                <p class="text-muted small mb-0"><strong class="text-dark">Hours:</strong> <?php echo e($contact->support_hours); ?></p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4 text-center group-card bg-white">
                <div class="rounded-circle bg-danger bg-opacity-10 mx-auto p-3 text-danger fs-2 mb-3" style="width: 70px; height: 70px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-envelope-at-fill"></i>
                </div>
                <h5 class="fw-bold mb-2 text-dark">Email Address</h5>
                <p class="text-muted small mb-1"><strong class="text-dark">Official:</strong> <?php echo e($contact->email); ?></p>
                <p class="text-muted small mb-0">Quick reply within 24 hours.</p>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <!-- Contact Form -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                <h3 class="fw-bold mb-2 text-dark brand-font">Send Us a Message</h3>
                <p class="text-muted small mb-4">Fill out the inquiry form below and our team will get back to you promptly.</p>

                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if(isset($errors) && $errors->any()): ?>
                    <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4" role="alert">
                        <strong class="d-block mb-1"><i class="bi bi-exclamation-triangle-fill me-2"></i> Validation Errors:</strong>
                        <ul class="mb-0 ps-3 small">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('contact.store')); ?>" method="POST" id="contactForm" novalidate>
                    <?php echo csrf_field(); ?>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Your Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control rounded-3 p-3 bg-white text-dark border <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="e.g. Tanvir Ahmed" value="<?php echo e(old('name')); ?>" required>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback fw-semibold"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Email Address <span class="text-danger">*</span></label>
                            <input type="email" id="contactEmail" name="email" class="form-control rounded-3 p-3 bg-white text-dark border <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="e.g. tanvir@example.com" value="<?php echo e(old('email')); ?>" required>
                            <div id="emailFeedback" class="invalid-feedback fw-semibold">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Please enter a valid email address. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" id="contactPhone" name="phone" class="form-control rounded-3 p-3 bg-white text-dark border <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="e.g. 01712345678" value="<?php echo e(old('phone')); ?>" required maxlength="14">
                            <small class="text-muted d-block mt-1" style="font-size: 0.75rem;">11-digit BD mobile number (e.g. 01700000000)</small>
                            <div id="phoneFeedback" class="invalid-feedback fw-semibold">
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php else: ?> Phone number must be an 11-digit mobile number starting with 01. <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark small">Subject <span class="text-danger">*</span></label>
                            <input type="text" name="subject" class="form-control rounded-3 p-3 bg-white text-dark border <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="e.g. Order Inquiry / Warranty" value="<?php echo e(old('subject')); ?>" required>
                            <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback fw-semibold"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold text-dark small">Message / Details <span class="text-danger">*</span></label>
                            <textarea name="message" rows="5" class="form-control rounded-3 p-3 bg-white text-dark border <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Write your message details here..." required><?php echo e(old('message')); ?></textarea>
                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback fw-semibold"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary-custom rounded-pill px-5 py-3 fw-bold w-100">
                                Send Message <i class="bi bi-send-fill ms-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Google Map Iframe Container -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 bg-white">
                <div class="card-header bg-light text-dark p-3 fw-bold d-flex align-items-center gap-2 border-bottom">
                    <i class="bi bi-map-fill text-warning"></i> Store Location Map
                </div>
                <div class="card-body p-0 h-100" style="min-height: 350px;">
                    <?php if($contact->map_iframe): ?>
                        <iframe src="<?php echo e($contact->map_iframe); ?>" width="100%" height="100%" style="border:0; min-height: 400px;" allowfullscreen="" loading="lazy"></iframe>
                    <?php else: ?>
                        <div class="d-flex align-items-center justify-content-center h-100 bg-light text-muted p-4 text-center">
                            <div>
                                <i class="bi bi-geo-alt display-4"></i>
                                <p class="mt-2 mb-0"><?php echo e($contact->address); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contactForm');
    const phoneInput = document.getElementById('contactPhone');
    const emailInput = document.getElementById('contactEmail');
    const phoneFeedback = document.getElementById('phoneFeedback');
    const emailFeedback = document.getElementById('emailFeedback');

    function validatePhone() {
        const val = phoneInput.value.trim();
        // Regex for BD 11-digit mobile: 013-019XXXXXXXX or +88013-019XXXXXXXX
        const bdMobileRegex = /^(?:\+?88)?01[3-9]\d{8}$/;
        
        // Count digits only
        const digits = val.replace(/\D/g, '');
        let cleanDigits = digits;
        if (digits.startsWith('8801')) {
            cleanDigits = digits.substring(2);
        }

        if (val === '') {
            phoneInput.classList.add('is-invalid');
            phoneInput.classList.remove('is-valid');
            phoneFeedback.textContent = 'Phone number is required.';
            return false;
        } else if (!bdMobileRegex.test(val) || cleanDigits.length !== 11) {
            phoneInput.classList.add('is-invalid');
            phoneInput.classList.remove('is-valid');
            phoneFeedback.textContent = `Invalid phone number! Must be an 11-digit BD mobile number starting with 01 (e.g. 01712345678). Entered digits: ${cleanDigits.length}`;
            return false;
        } else {
            phoneInput.classList.remove('is-invalid');
            phoneInput.classList.add('is-valid');
            return true;
        }
    }

    function validateEmail() {
        const val = emailInput.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (val === '') {
            emailInput.classList.add('is-invalid');
            emailInput.classList.remove('is-valid');
            emailFeedback.textContent = 'Email address is required.';
            return false;
        } else if (!emailRegex.test(val)) {
            emailInput.classList.add('is-invalid');
            emailInput.classList.remove('is-valid');
            emailFeedback.textContent = 'Please enter a valid email address format (e.g. name@example.com).';
            return false;
        } else {
            emailInput.classList.remove('is-invalid');
            emailInput.classList.add('is-valid');
            return true;
        }
    }

    phoneInput.addEventListener('input', validatePhone);
    phoneInput.addEventListener('blur', validatePhone);
    emailInput.addEventListener('input', validateEmail);
    emailInput.addEventListener('blur', validateEmail);

    form.addEventListener('submit', function (e) {
        const isPhoneValid = validatePhone();
        const isEmailValid = validateEmail();

        if (!isPhoneValid || !isEmailValid) {
            e.preventDefault();
            e.stopPropagation();
            if (!isPhoneValid) phoneInput.focus();
            else if (!isEmailValid) emailInput.focus();
        }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/contact/index.blade.php ENDPATH**/ ?>