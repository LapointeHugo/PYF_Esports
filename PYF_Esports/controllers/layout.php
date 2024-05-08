<?php
    session_start();
    if(!isset($_SESSION['username']) && $route == "/admin"){
        header('Location: /auth');
        exit();
    } else if(isset($_SESSION['username']) && $route == "/auth"){
		header('Location: /admin');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>PYF_Esports</title>
	<link rel="stylesheet" href="/../lib/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/../css/site.css" />
	<link rel="icon" href="/../favicon.png" type="image/png">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			var progressPath = document.querySelector('.progress-wrap path');
			var pathLength = progressPath.getTotalLength();

			progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
			progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
			progressPath.style.strokeDashoffset = pathLength;
			progressPath.getBoundingClientRect();
			progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';

			var updateProgress = function() {
				var scroll = $(window).scrollTop();
				var height = $(document).height() - $(window).height();
				var progress = pathLength - (scroll * pathLength / height);
				progressPath.style.strokeDashoffset = progress;
			}

			updateProgress();
			$(window).scroll(updateProgress);

			var offset = 50;
			var duration = 550;

			jQuery(window).on('scroll', function() {
				if (jQuery(this).scrollTop() > offset) {
					jQuery('.progress-wrap').addClass('active-progress');
				} else {
					jQuery('.progress-wrap').removeClass('active-progress');
				}
			});

			jQuery('.progress-wrap').on('click', function(event) {
				event.preventDefault();
				jQuery('html, body').animate({
					scrollTop: 0
				}, duration);
				return false;
			})
		});
	</script>
</head>

<body>
	<header>
		<div id="navbarOptions" class="container">
			<nav class="navbar navbar-expand-lg navbar-light fixed-top">
				<!-- Logo -->
				<a class="navbar-brand" href="/home">
					<img src="/images/Logo.png" alt="PYF_Logo" class="d-inline-block align-top h-logo">
				</a>

				<!-- Navbar Toggler -->
				<button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- Navbar Content -->
				<div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarNav">
					<ul class="navbar-nav">
						<?php
							if(isset($_SESSION['username'])) {
								echo '<li class="nav-item mx-3">
									<a class="nav-link" style="color: white" id="logout">LOGOUT</a>
								</li>
								<li class="nav-item mx-3">
									<a class="nav-link" style="color: white" href="/auth">ADMIN</a>
								</li>';
							}
						?>
						<li class="nav-item mx-3">
							<a class="nav-link" style="color: white" href="/home">HOME</a>
						</li>
						<li class="nav-item mx-3">
							<a class="nav-link" style="color: white" href="/schedule">SCHEDULE</a>
						</li>
						<li class="nav-item mx-3">
							<a class="nav-link" style="color: white" href="/bracket">BRACKET</a>
						</li>
						<li class="nav-item mx-3">
							<a class="nav-link" style="color: white" href="/team">TEAMS</a>
						</li>
						<li class="nav-item mx-3 dropdown">
							<a class="nav-link" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">STANDINGS</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="/teams">TEAMS</a></li>
								<li><a class="dropdown-item" href="/players">PLAYERS</a></li>
							</ul>
						</li>
						<li id="socials" class="nav-item mx-3 align-self-center">
							<a href="https://twitter.com/PYFesports" target="_blank"><i class="fa-brands fa-x-twitter fa-lg icon d-none d-lg-inline-block"></i></a>
							<i class="fa-brands fa-youtube fa-lg icon d-none d-lg-inline-block"></i>
							<a href="https://www.twitch.tv/pyfesports" target="_blank"><i class="fa-brands fa-twitch fa-lg icon d-none d-lg-inline-block"></i></a>
						</li>
						<li class="nav-item mx-3 d-lg-none bottom">
							<a class="nav-link d-lg-none" style="color: white">SOCIALS</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>

	<div id="bodyContainer" class="container">
		<?php
		if ($route == "/schedule") {
			include_once __DIR__ . "/../Views/schedule.php";
		} else if ($route == "/auth") {
			include_once __DIR__ . "/../views/auth.php";
		} else if ($route == "/admin") {
			include_once __DIR__ . "/../views/admin.php";
		} else if ($route == "/bracket") {
			include_once __DIR__ . "/../views/bracket.php";
		} else if ($route == "/teams") {
			include_once __DIR__ . "/../views/standingsTeams.php";
		} else if ($route == "/players") {
			include_once __DIR__ . "/../views/standingsPlayers.php";
		} else if ($route == "/team") {
			include_once __DIR__ . "/../views/teams.php";
		} else {
			include_once __DIR__ . "/../views/home.php";
		}
		?>
	</div>

	<!-- Scroll Progress -->
	<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
		</svg>
	</div>
	<!-- End Scroll Progress -->

	<footer>
		<div>
			<a href="https://twitter.com/PYFesports" target="_blank"><i class="fa-brands fa-x-twitter fa-2xl iconFooter"></i></a>
			<i class="fa-solid fa-circle"></i>
			<a href="https://www.instagram.com/phoqueyourfeelings?igsh=eDlnOTZ1ZjU0bm8%3D&utm_source=qr" target="_blank"><i class="fa-brands fa-instagram fa-2xl iconFooter"></i></a>
			<i class="fa-solid fa-circle"></i>
			<a href="https://www.twitch.tv/pyfesports" target="_blank"><i class="fa-brands fa-twitch fa-2xl iconFooter"></i></a>
			<i class="fa-solid fa-circle"></i>
			<a href=""><i class="fa-brands fa-youtube fa-2xl iconFooter"></i></a>
		</div>
		<div id="siteLinksFooter" class="row justify-content-center" style="margin-top: 30px">
			<a class="col-1 texteFooter" href="/home">Home</a>
			<a class="col-1 texteFooter" href="/schedule">Schedule</a>
			<a class="col-1 texteFooter" href="/bracket">Bracket</a>
			<a class="col-1 texteFooter" href="/teams">Teams</a>
			<a class="col-1 texteFooter">About us</a>
		</div>
		<p style="font-size: 14px; margin-top: 30px">Copyright &#64;2024 Designed by <a style="color: rgb(255, 255, 255, 0.5)">PYF ESPORTS</a></p>
	</footer>

	<script src="/../lib/jquery/dist/jquery.min.js"></script>
	<script src="/../lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://kit.fontawesome.com/63463ff979.js" crossorigin="anonymous"></script>
	<script src="/../lib/jquery-validation/dist/jquery.validate.js"></script>
	<script src="/../lib/jquery-validation-unobtrusive/jquery.validate.unobtrusive.js"></script>
	<script src="/../js/site.js"></script>
	<?php
		if($route == "/auth") {
			echo '<script src="/../js/auth.js"></script>';
		} else if(isset($_SESSION['username'])) {
			echo '<script src="/../js/admin.js"></script>';
		}
	?>
	<!--<script src="/../js/main.js"></script> -->

</body>

</html>
