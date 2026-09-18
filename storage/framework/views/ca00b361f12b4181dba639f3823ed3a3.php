<?php $__env->startSection('title', 'Manage About Us Page - Admin Panel'); ?>
<?php $__env->startSection('header_title', 'About Us Page Content Settings'); ?>

<?php $__env->startSection('content'); ?>
<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4 p-md-5">
        <form action="<?php echo e(route('admin.about.update')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <h5 class="fw-bold mb-3 pb-2 border-bottom text-primary"><i class="bi bi-megaphone me-2"></i> Hero Banner Section</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Hero Banner Title <span class="text-danger">*</span></label>
                    <input type="text" name="hero_title" class="form-control rounded-3" value="<?php echo e(old('hero_title', $about->hero_title)); ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Hero Subtitle / Tagline</label>
                    <input type="text" name="hero_subtitle" class="form-control rounded-3" value="<?php echo e(old('hero_subtitle', $about->hero_subtitle)); ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Upload New Hero Image File</label>
                    <input type="file" name="hero_image_file" class="form-control rounded-3">
                    <small class="text-muted">PNG, JPG, WEBP (Max 4MB)</small>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Hero Image URL</label>
                    <input type="text" name="hero_image_url" class="form-control rounded-3" value="<?php echo e(old('hero_image_url', Str::startsWith($about->hero_image, ['http://', 'https://']) ? $about->hero_image : '')); ?>" placeholder="https://images.unsplash.com/...">
                </div>
            </div>

            <h5 class="fw-bold mb-3 pb-2 border-bottom text-primary"><i class="bi bi-journal-text me-2"></i> Company Story & Description</h5>
            <div class="row g-3 mb-4">
                <div class="col-12">
                    <label class="form-label fw-semibold">Story Title <span class="text-danger">*</span></label>
                    <input type="text" name="story_title" class="form-control rounded-3" value="<?php echo e(old('story_title', $about->story_title)); ?>" required>
                </div>
                <div class="col-12">
                    <label class="form-label fw-semibold">Detailed Story Content (HTML allowed) <span class="text-danger">*</span></label>
                    <textarea name="story_content" rows="6" class="form-control rounded-3" required><?php echo e(old('story_content', $about->story_content)); ?></textarea>
                </div>
            </div>

            <h5 class="fw-bold mb-3 pb-2 border-bottom text-primary"><i class="bi bi-bar-chart-line me-2"></i> Statistics & Achievement Counters</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-3 col-6">
                    <label class="form-label small fw-bold">Stat 1 Number</label>
                    <input type="text" name="stat_1_number" class="form-control rounded-3" value="<?php echo e(old('stat_1_number', $about->stat_1_number)); ?>" required>
                    <label class="form-label extra-small text-muted mt-1">Label</label>
                    <input type="text" name="stat_1_label" class="form-control form-control-sm rounded-3" value="<?php echo e(old('stat_1_label', $about->stat_1_label)); ?>" required>
                </div>
                <div class="col-md-3 col-6">
                    <label class="form-label small fw-bold">Stat 2 Number</label>
                    <input type="text" name="stat_2_number" class="form-control rounded-3" value="<?php echo e(old('stat_2_number', $about->stat_2_number)); ?>" required>
                    <label class="form-label extra-small text-muted mt-1">Label</label>
                    <input type="text" name="stat_2_label" class="form-control form-control-sm rounded-3" value="<?php echo e(old('stat_2_label', $about->stat_2_label)); ?>" required>
                </div>
                <div class="col-md-3 col-6">
                    <label class="form-label small fw-bold">Stat 3 Number</label>
                    <input type="text" name="stat_3_number" class="form-control rounded-3" value="<?php echo e(old('stat_3_number', $about->stat_3_number)); ?>" required>
                    <label class="form-label extra-small text-muted mt-1">Label</label>
                    <input type="text" name="stat_3_label" class="form-control form-control-sm rounded-3" value="<?php echo e(old('stat_3_label', $about->stat_3_label)); ?>" required>
                </div>
                <div class="col-md-3 col-6">
                    <label class="form-label small fw-bold">Stat 4 Number</label>
                    <input type="text" name="stat_4_number" class="form-control rounded-3" value="<?php echo e(old('stat_4_number', $about->stat_4_number)); ?>" required>
                    <label class="form-label extra-small text-muted mt-1">Label</label>
                    <input type="text" name="stat_4_label" class="form-control form-control-sm rounded-3" value="<?php echo e(old('stat_4_label', $about->stat_4_label)); ?>" required>
                </div>
            </div>

            <h5 class="fw-bold mb-3 pb-2 border-bottom text-primary"><i class="bi bi-compass me-2"></i> Mission & Vision</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Our Mission Statement</label>
                    <textarea name="mission" rows="4" class="form-control rounded-3"><?php echo e(old('mission', $about->mission)); ?></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Our Vision Statement</label>
                    <textarea name="vision" rows="4" class="form-control rounded-3"><?php echo e(old('vision', $about->vision)); ?></textarea>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary rounded-pill px-5 py-3 fw-bold">
                    <i class="bi bi-check-circle-fill me-2"></i> Save About Us Settings
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/admin/about/edit.blade.php ENDPATH**/ ?>