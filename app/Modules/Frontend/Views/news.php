<?= $this->extend('Frontend\Views\Templates\Content') ?>

<!-- Load Slider Section -->
<?= $this->section('slider') ?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="news">
  <div class="container">
    <div class="newsTitle">
      <span class="newsIcon"></span>
      <h3>NEWS</h3>
      <span class="newsIcon"></span>
    </div>
    <div class="new_content clear">
      <div class="newsPic lazyloaded">
        <img src="https://img-static.mihoyo.com/communityweb/upload/ad7e69b5c1fe814a0d94a09b17b49823.png?x-oss-process=image/resize,m_fixed,h_242,w_401/quality,Q_90/format,webp"
             alt="newsPic" class="newPicImg"/>
      </div>
      <div class="newsContent">
        <h4 class="contentTitle">Latest</h4>
        <ul class="news-list">
          <li><a href="news-detail.html">Lorem Ipsum" | Genshin Impact</a><span class="time">Oct 30, 2025</span></li>
          <li><a href="news-detail.html">Story Teasert</a><span class="time">Oct 29, 2025</span></li>
          <li><a href="news-detail.html">Miliastra Wonderland| Genshin Impact</a><span class="time">Oct 29, 2025</span></li>
          <li><a href="news-detail.html">Cutscene Animation: | Genshin Impact</a><span class="time">Oct 28, 2025</span></li>
          <li><a href="news-detail.html">Cutscene Animation | Genshin Impact</a><span class="time">Oct 27, 2025</span></li>
        </ul>
        <a href="more-news.html" class="newsMoreBtn">More</a>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>