<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dealers &mdash; Sepetim</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('styles/style.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('styles.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('styles/allResponsive.css')?>">  
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('styles/main_styles.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('styles/allResponsive.css')?>">   
	<!-- ####################################################################################### EGE-  iki adet .css dosyası eklendi -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('styles/slider.css')?>">   
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('styles/news_styles.css')?>">   
  </head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
<?= $this->include('Frontend\Views\Templates\Header') ?>

<?= $this->renderSection('slider') ?>
<section class="container">
	<?= $this->renderSection('content') ?>
</section>

<?= $this->include('Frontend\Views\Templates\Footer') ?>
	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<!-- JavaScripts -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="<?= base_url('js/main.js') ?>"></script>
<script src="<?= base_url('js/custom.js') ?>"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    

</body>
</html>