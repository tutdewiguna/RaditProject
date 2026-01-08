<?= $this->extend('Frontend\Views\Templates\Content') ?>

<!-- Load Slider Section -->
<?= $this->section('slider') ?>
<!-- REQUIRED FOR ALL PAGES -->
<!-- ####################################################################################### EGE----MODIFIED -->
<!-- NAVIGATOR -->
<div class="main_slider">
	<div class="swiper-container">
		<div class="swiper-wrapper">

			<!-- Slide 1 -->
			<div class="swiper-slide" style="background-image:url(images/example3.jpg)">
				<section class="showcase">
					<div class="video-container">
						<a href="categories.html">
							<video src="videos/main_page_slider_video.mp4" autoplay muted loop></video>
						</a>
					</div>
					<div class="content">
						<br><br><br><br><br><br><br><br><br><br>
						<h6 style="color:white">
							<a href="index.html" style="color:white; font-size:18px; font-family:Cormorant Garamond, Georgia, serif;">
								<small>Autumn / Winter Collection - 2025</small>
							</a>
						</h6>
						<h1 style="color:white">
							<a href="categories.html" style="color:white; font-size:100px; font-family:Cormorant Garamond, Georgia, serif;">OUTFITR</a>
						</h1>
					</div>
				</section>
			</div>

			<!-- Slide 2 -->
			<div class="swiper-slide" style="background-image:url(images/example3.jpg)"></div>

			<!-- Slide 3 -->
			<div class="swiper-slide" style="background-image:url(images/example1.jpg)"></div>

		</div>

		<!-- Navigation -->
		<div class="swiper-scrollbar"></div>
		<div class="swiper-button-next" style="color:#fe4c50"></div>
		<div class="swiper-button-prev" style="color:#fe4c50"></div>
	</div>
</div>
<?= $this->endSection() ?>

<!-- Load Content Section -->
<?= $this->section('content') ?>

<!-- ABOUT US SECTION -->
<div class="about pt-5 pb-5" style="background:#ffffff;">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title">
                    <h2>ABOUT US</h2>
                </div>
                <p style="max-width: 750px; margin: 15px auto; font-size: 18px; color: #555;">
                    Welcome to OUTFITR, the place for modern fashion for those who want to look stylish every day. We offer a collection of women's, men's, and accessories with selected quality and the latest trends. Each product is designed to make you comfortable, unique, and confident in every moment. Discover new styles and express yourself with OUTFITR.
                    Fashion is not just about clothes. It's about you.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- ####################################################################################### EGE----MODIFIED -->
<!-- CATEGORIES -->

<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="banner_item align-items-center" style="background-image:url(images/banner_1.jpg)">
                    <div class="banner_category">
                        <a href="categories.html">WOMEN</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="banner_item align-items-center" style="background-image:url(images/banner_2.jpg)">
                    <div class="banner_category">
                        <a href="aksCategories.html">ACCESSORIES</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="banner_item align-items-center" style="background-image:url(images/banner_3.jpg)">
                    <div class="banner_category">
                        <a href="manCategories.html">MEN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- NEW ARRIVALS -->

<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>NEW ARRIVALS</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col text-center">
                <div class="new_arrivals_sorting">
                    <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">ALL</li>
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">WOMEN</li>
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories">ACCESSORIES</li>
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">MEN</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
    <div class="col">
        <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

            <?php foreach ($products as $product): ?>
                <div class="product-item <?= esc($product['category_slug']); ?>">
                    <div class="product product_filter">

                        <div class="product_image">
                            <img src="<?= base_url($product['image']); ?>" alt="<?= esc($product['name']); ?>">
                        </div>

                        <div class="favorite"></div>

                        <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center">
                            <span>New</span>
                        </div>

                        <div class="product_info">
                            <h6 class="product_name">
                                <a href="<?= base_url('product/' . $product['slug']); ?>">
                                    <?= esc($product['name']); ?>
                                </a>
                            </h6>

                            <div class="product_price">
                                <?= number_format($product['price'], 0, ',', '.'); ?> ₺
                            </div>
                        </div>
                    </div>

                    <div class="red_button add_to_cart_button">
                        <a href="<?= base_url('product/' . $product['slug']); ?>">Buy Now</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>

    </div>
</div>

<!-- REQUIRED ON EVERY PAGE -->
<!-- Advantages -->

<div class="benefit">
    <div class="container">
        <div class="row benefit_row">
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>Free Shipping</h6>
                        <p>Free shipping on orders over 100 ₺.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>FAST DELIVERY</h6>
                        <p>Your order will arrive as quickly as possible.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>45-Day Return</h6>
                        <p>You can return within 45 days.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>Every Day of the Week</h6>
                        <p>08:00 - 21:00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->

<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                    <h4>Newsletter</h4>
                    <p>Subscribe to our newsletter and get 20% off your first purchase.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <form action="post">
                    <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                        <input id="newsletter_email" type="email" placeholder="Email" required="required" data-error="Valid email is required.">
                        <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
 

<!-- NEWS -->
<section class="news-section">
  <h2 class="news-title">NEWS</h2>
  <div class="news-slider-container">
    <div class="slider">
      <!-- Hidden radio inputs for slider control -->
      <input type="radio" name="slider" id="slide1" checked>
      <input type="radio" name="slider" id="slide2">
      <input type="radio" name="slider" id="slide3">
      <input type="radio" name="slider" id="slide4">

      <div class="slides">
        <div class="slide s1">
          <img src="background-image:url(images/example3.jpg)" alt="Slide 1">
          <div class="slide-logo">Song of the Welkin Moon</div>
        </div>
        <div class="slide s2">
          <img src="background-image:url(images/example3.jpg)" alt="Slide 2">
          <div class="slide-logo">Song of the Welkin Moon</div>
        </div>
        <div class="slide s3">
          <img src="background-image:url(images/example3.jpg" alt="Slide 3">
         <div class="slide-logo">Song of the Welkin Moon</div>
        </div>
        <div class="slide s4">
          <img src="background-image:url(images/banner_1.jp0)"alt="Slide 4">
          <div class="slide-logo">Song of the Welkin Moon</div>
        </div>
      </div>

      <div class="slider-dots">
        <label for="slide1" class="dot"></label>
        <label for="slide2" class="dot"></label>
        <label for="slide3" class="dot"></label>
        <label for="slide4" class="dot"></label>
      </div>
    </div>

    <div class="news-list">
      <h3 class="latest-title">Latest</h3>
      <ul>
        <li><a href="#">Cutscene Animation: "End of the Story" | Genshin Impact</a><span>Oct 30, 2025</span></li>
        <li><a href="#">Story Teaser: Reflection of the Moon | Genshin Impact</a><span>Oct 29, 2025</span></li>
        <li><a href="#">Miliastra Wonderland Trailer: "Of Dreams and Inspiration" | Genshin Impact</a><span>Oct 29, 2025</span></li>
        <li><a href="#">Cutscene Animation: "Waning Moon, Oh Lifeless Damsel" | Genshin Impact</a><span>Oct 28, 2025</span></li>
        <li><a href="#">Cutscene Animation: "The Hunt Beneath the Silver Moon" | Genshin Impact</a><span>Oct 27, 2025</span></li>
      </ul>
      <a href="#" class="more-link">+ More</a>
    </div>
  </div>
</section>

<?= $this->endSection() ?>