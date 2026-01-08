<?= $this->extend('Frontend\Templates\Content') ?>

<?= $this->section('content') ?>

<div class="container section">
  <div class="section-title">
    <h2>The Journal</h2>
    <p>Stories, style updates, and news.</p>
  </div>

  <div class="grid grid-3" style="gap: 40px;">
    <?php if (!empty($news) && is_array($news)): ?>
      <?php foreach ($news as $item): ?>
        <a href="<?= base_url('news/' . $item['slug']); ?>" style="display: block; group: hover;">
          <div style="background: #f5f5f5; aspect-ratio: 3/2; overflow: hidden; margin-bottom: 20px;">
            <?php $img = !empty($item['image']) ? $item['image'] : 'https://via.placeholder.com/600x400'; ?>
            <img src="<?= base_url($img); ?>" alt="<?= esc($item['title']); ?>"
              style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s;">
          </div>
          <div stye="padding-right: 20px;">
            <div style="font-size: 11px; text-transform: uppercase; color: #999; margin-bottom: 8px;">
              <?= date('F j, Y', strtotime($item['created_at'])); ?>
            </div>
            <h3 style="font-size: 1.25rem; margin-bottom: 12px; line-height: 1.4;"><?= esc($item['title']); ?></h3>
            <p style="font-size: 14px; color: #666; line-height: 1.6; margin-bottom: 16px;">
              <?= substr(strip_tags($item['content']), 0, 100) . '...'; ?>
            </p>
            <span class="btn-text"
              style="font-size: 13px; font-weight: 600; text-transform: uppercase; text-decoration: underline;">Read
              Story</span>
          </div>
        </a>
      <?php endforeach; ?>
    <?php else: ?>
      <div style="grid-column: 1 / -1; text-align: center; padding: 60px; color: #999;">
        <p>No articles available at the moment.</p>
      </div>
    <?php endif; ?>
  </div>
</div>

<?= $this->endSection() ?>