<!DOCTYPE html>
<html lang="en">

<head>
	<title>OutfiTR</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS (Legacy Support) -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Design System -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('styles/main_styles.css') ?>">
</head>

<body class="flex flex-col" style="min-height: 100vh;">

	<?= $this->include('Frontend\Templates\Header') ?>

	<main class="flex-grow">
		<?= $this->renderSection('slider') ?>
		<?= $this->renderSection('content') ?>
	</main>

	<?= $this->include('Frontend\Templates\Footer') ?>

	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<!-- Custom Scripts (Legacy) -->
	<script src="<?= base_url('js/main.js') ?>"></script>
	<script src="<?= base_url('js/custom.js') ?>"></script>
</body>

</html>