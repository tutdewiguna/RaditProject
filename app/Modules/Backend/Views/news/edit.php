<?= $this->extend('Backend\Views\templates\content') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4 pt-3 px-3">
    <div>
        <h1 class="h3 mb-1 fw-bold">Edit News</h1>
        <p class="text-secondary small mb-0">Update article content and media</p>
    </div>
    <div>
        <a href="<?= base_url('admin/news'); ?>" class="btn btn-outline-secondary me-2">Back to List</a>
        <?php if (!empty($news['slug'])): ?>
            <a href="<?= base_url('news/' . $news['slug']); ?>" target="_blank" class="btn btn-outline-primary">
                Preview <i class="bi bi-box-arrow-up-right ms-1"></i>
            </a>
        <?php endif; ?>
    </div>
</div>

<div class="px-3">
    <form action="<?= base_url('admin/news/update/' . $news['id']); ?>" method="post" enctype="multipart/form-data">
        <div class="row g-4">
            <!-- Left Column: Content -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h6 class="mb-0 fw-bold">Article Content</h6>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Title</label>
                            <input type="text" name="title" class="form-control" value="<?= esc($news['title']); ?>"
                                required placeholder="Enter article title">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-secondary">Slug</label>
                            <input type="text" name="slug" class="form-control bg-light"
                                value="<?= esc($news['slug']); ?>" required>
                            <div class="form-text small">URL-friendly version of the title.</div>
                        </div>

                        <div class="mb-0">
                            <label class="form-label small fw-bold text-secondary">Content</label>
                            <textarea name="content" class="form-control" rows="12"
                                placeholder="Write your article content here..."><?= esc($news['content']); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Media & Publish -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h6 class="mb-0 fw-bold">Featured Image</h6>
                    </div>
                    <div class="card-body p-4 text-center">
                        <div class="mb-3 rounded bg-light d-flex align-items-center justify-content-center overflow-hidden position-relative"
                            style="height: 200px; width: 100%;">
                            <?php if (!empty($news['image'])): ?>
                                <img src="<?= base_url($news['image']); ?>" alt="Current Image"
                                    class="w-100 h-100 object-fit-cover">
                            <?php else: ?>
                                <div class="text-secondary">
                                    <i class="bi bi-image fs-1 opacity-25"></i>
                                    <p class="small mb-0 mt-2">No image set</p>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mt-3">
                            <label for="imageUpload" class="btn btn-outline-primary btn-sm w-100">
                                <i class="bi bi-upload me-1"></i> Replace Image
                            </label>
                            <input type="file" id="imageUpload" name="image" class="d-none" accept="image/*"
                                onchange="previewImage(this)">
                            <div class="form-text small mt-2">Recommended: 1200x600px, JPG or PNG.</div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary fw-bold">Update News</button>
                            <a href="<?= base_url('admin/news'); ?>" class="btn btn-light text-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                // Find the image container and replace/add img tag
                var container = input.parentElement.previousElementSibling;
                container.innerHTML = '<img src="' + e.target.result + '" class="w-100 h-100 object-fit-cover">';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?= $this->endSection() ?>