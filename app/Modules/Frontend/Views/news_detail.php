<?= $this->extend('Frontend\Templates\Content') ?>

<?= $this->section('content') ?>

<div class="container section">

    <!-- Breadcrumb -->
    <div style="margin-bottom: 24px; font-size: 13px; text-transform: uppercase; color: var(--color-text-secondary);">
        <a href="<?= base_url() ?>">Home</a>
        <span style="margin: 0 8px;">/</span>
        <a href="<?= base_url('news') ?>">Journal</a>
        <span style="margin: 0 8px;">/</span>
        <span style="color: var(--color-text);">
            <?= esc($news_item['title']) ?>
        </span>
    </div>

    <!-- Article Header -->
    <div style="max-width: 800px; margin: 0 auto; text-align: center; margin-bottom: 40px;">
        <div style="font-size: 13px; text-transform: uppercase; color: #999; margin-bottom: 16px; letter-spacing: 1px;">
            <?= date('F j, Y', strtotime($news_item['created_at'])) ?>
        </div>
        <h1 style="font-size: 2.5rem; line-height: 1.2; margin-bottom: 24px;">
            <?= esc($news_item['title']) ?>
        </h1>
    </div>

    <!-- Featured Image -->
    <div style="margin-bottom: 60px;">
        <?php if (!empty($news_item['image'])): ?>
            <img src="<?= base_url($news_item['image']) ?>" alt="<?= esc($news_item['title']) ?>"
                style="width: 100%; max-height: 600px; object-fit: cover; display: block;">
        <?php else: ?>
            <div
                style="width: 100%; height: 400px; background: #f5f5f5; display: flex; align-items: center; justify-content: center; color: #999;">
                No Image Available
            </div>
        <?php endif; ?>
    </div>

    <!-- Content -->
    <div style="max-width: 700px; margin: 0 auto; font-size: 18px; line-height: 1.8; color: #333;">
        <?= nl2br($news_item['content']) ?>
    </div>

    <!-- Related News -->
    <?php if (!empty($related_news)): ?>
        <div style="margin-top: 80px; padding-top: 40px; border-top: 1px solid #eee;">
            <h3 style="text-align: center; margin-bottom: 40px; font-size: 1.5rem;">More Stories</h3>
            <div class="grid grid-3" style="gap: 30px;">
                <?php foreach ($related_news as $item): ?>
                    <a href="<?= base_url('news/' . ($item['slug'] ?? '#')); ?>" style="display: block; group: hover;">
                        <div style="background: #f5f5f5; aspect-ratio: 3/2; overflow: hidden; margin-bottom: 16px;">
                            <?php $img = !empty($item['image']) ? $item['image'] : 'https://via.placeholder.com/400x300'; ?>
                            <img src="<?= base_url($img); ?>" alt="<?= esc($item['title']); ?>" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div>
                            <div style="font-size: 11px; text-transform: uppercase; color: #999; margin-bottom: 6px;">
                                <?= date('F j, Y', strtotime($item['created_at'])); ?>
                            </div>
                            <h4 style="font-size: 1rem; margin-bottom: 8px; line-height: 1.4; color: #000; font-weight: 500;">
                                <?= esc($item['title']); ?>
                            </h4>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Back Link -->
    <div style="text-align: center; margin-top: 80px;">
        <a href="<?= base_url('news') ?>" class="btn btn-secondary">Back to Journal</a>
    </div>

</div>

<?= $this->endSection() ?>