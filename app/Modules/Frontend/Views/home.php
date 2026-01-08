<?= $this->extend('Frontend\Templates\Content') ?>



<?= $this->section('slider') ?>
<div class="hero" id="heroSlider">
    <!-- Slider Wrapper -->
    <div class="hero-slides">
        <!-- Slide 1 -->
        <div class="hero-slide active" style="background-image: url('<?= base_url('images/slider_1.jpg') ?>');"></div>
        <!-- Slide 2 -->
        <div class="hero-slide" style="background-image: url('<?= base_url('images/slider_2.jpg') ?>');"></div>
        <!-- Slide 3 -->
        <div class="hero-slide" style="background-image: url('<?= base_url('images/example3.jpg') ?>');"></div>
    </div>

    <!-- Content Overlay -->
    <div class="hero-content-wrapper">
        <div class="hero-content">
            <h5 style="margin-bottom: 12px; font-weight: 500; letter-spacing: 0.1em; font-size: 13px;">AUTUMN / WINTER
                2025</h5>
            <h1 style="margin-bottom: 24px; font-weight: 600; font-size: 3.5rem; letter-spacing: -0.02em;">New Season
                Essentials</h1>
            <a href="<?= base_url('shop') ?>" class="btn btn-primary"
                style="background: #000; color: #fff; border: 1px solid #000; padding: 14px 32px;">Shop Collection</a>
        </div>
    </div>

    <!-- Controls -->
    <div class="hero-controls">
        <button class="hero-prev" aria-label="Previous slide">&lsaquo;</button>
        <button class="hero-next" aria-label="Next slide">&rsaquo;</button>
    </div>
    <div class="hero-dots"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slider = document.querySelector('#heroSlider');
        if (!slider) return;

        const slides = slider.querySelectorAll('.hero-slide');
        const prevBtn = slider.querySelector('.hero-prev');
        const nextBtn = slider.querySelector('.hero-next');
        const dotsContainer = slider.querySelector('.hero-dots');

        let currentSlide = 0;
        const totalSlides = slides.length;
        let slideInterval;

        // Create dots
        slides.forEach((_, index) => {
            const dot = document.createElement('button');
            dot.classList.add('hero-dot');
            if (index === 0) dot.classList.add('active');
            dot.addEventListener('click', () => goToSlide(index));
            dotsContainer.appendChild(dot);
        });

        const dots = dotsContainer.querySelectorAll('.hero-dot');

        function updateSlides() {
            slides.forEach((slide, index) => {
                slide.classList.toggle('active', index === currentSlide);
            });
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }

        function goToSlide(index) {
            currentSlide = (index + totalSlides) % totalSlides;
            updateSlides();
            resetInterval();
        }

        function nextSlide() {
            goToSlide(currentSlide + 1);
        }

        function prevSlide() {
            goToSlide(currentSlide - 1);
        }

        function resetInterval() {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, 5000);
        }

        // Event Listeners
        if (prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); resetInterval(); });
        if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); resetInterval(); });

        // Start Autoplay
        resetInterval();
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Featured / New Arrivals -->
<div class="container section">
    <div class="section-title">
        <h2>New Arrivals</h2>
        <p>Curated pieces for the modern wardrobe.</p>
    </div>

    <div class="grid grid-4">
        <?php if (!empty($products) && is_array($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="card-product">
                    <a href="<?= base_url('shop/' . $product['slug']); ?>" class="card-img-wrap">
                        <?php $img = !empty($product['image']) ? $product['image'] : 'https://via.placeholder.com/300x400'; ?>
                        <img src="<?= base_url($img); ?>" alt="<?= esc($product['name']); ?>">
                    </a>
                    <div>
                        <h3 class="card-title">
                            <a href="<?= base_url('shop/' . $product['slug']); ?>"><?= esc($product['name']); ?></a>
                        </h3>
                        <div class="card-price"><?= format_rupiah($product['price']); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div style="grid-column: 1 / -1; text-align: center; color: #999;">
                No new arrivals at the moment.
            </div>
        <?php endif; ?>
    </div>

    <div style="text-align: center; margin-top: 40px;">
        <a href="<?= base_url('shop') ?>" class="btn btn-secondary">View All</a>
    </div>
</div>

<!-- Benefits Section -->
<div class="section" style="background-color: var(--color-bg-alt);">
    <div class="container">
        <div class="grid grid-4" style="text-align: center;">
            <div>
                <h6 style="margin-bottom: 5px;">Free Shipping</h6>
                <p style="font-size: 13px;">On orders over 100 ₺</p>
            </div>
            <div>
                <h6 style="margin-bottom: 5px;">Fast Delivery</h6>
                <p style="font-size: 13px;">Express options available</p>
            </div>
            <div>
                <h6 style="margin-bottom: 5px;">Easy Returns</h6>
                <p style="font-size: 13px;">45-day money back</p>
            </div>
            <div>
                <h6 style="margin-bottom: 5px;">24/7 Support</h6>
                <p style="font-size: 13px;">Contact us anytime</p>
            </div>
        </div>
    </div>
</div>

<!-- News Teaser -->
<div class="container section">
    <div class="section-title">
        <h2>The Journal</h2>
    </div>
    <div class="grid grid-3" style="gap: 40px;">
        <?php if (!empty($news) && is_array($news)): ?>
            <?php foreach (array_slice($news, 0, 3) as $item): ?>
                <a href="<?= base_url('news/' . ($item['slug'] ?? '#')); ?>" style="display: block; position: relative;">
                    <div style="background: #f5f5f5; aspect-ratio: 3/2; overflow: hidden; margin-bottom: 20px;">
                        <?php $img = !empty($item['image']) ? $item['image'] : 'images/banner_1.jpg'; ?>
                        <img src="<?= base_url($img); ?>" alt="<?= esc($item['title']); ?>"
                            style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                    </div>
                    <div>
                        <div style="font-size: 11px; text-transform: uppercase; color: #999; margin-bottom: 8px;">
                            <?= date('F j, Y', strtotime($item['created_at'])); ?>
                        </div>
                        <h3 style="font-size: 1.1rem; margin-bottom: 10px; line-height: 1.4; color: #000; font-weight: 500;">
                            <?= esc($item['title']); ?>
                        </h3>
                        <p style="font-size: 14px; color: #666; line-height: 1.6; margin-bottom: 16px;">
                            <?= substr(strip_tags($item['content']), 0, 80) . '...'; ?>
                        </p>
                        <div
                            style="font-size: 12px; font-weight: 600; text-transform: uppercase; text-decoration: underline; color: #000;">
                            Read Story</div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <div style="grid-column: 1 / -1; text-align: center;">
                <p style="margin-bottom: 20px; color: #666;">Read the latest updates and style guides.</p>
                <a href="<?= base_url('news') ?>" class="btn btn-secondary">Read News</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>