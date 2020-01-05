<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Country info</title>
	<meta name="osicka" content="pwa-app">
	<link rel="canonical" href="https://localhost/mob_tech"/>
	<link rel="stylesheet" type="text/css" href="/mob_tech/public/css/inline.css">
	<link rel="icon" href="/mob_tech/public/images/favicon.ico" type="image/x-icon" />
	<meta name="theme-color" content="#2F3BA2" />
	<meta name="description" content="Country finder">
	<!-- Added manifest.json -->
	<link rel="manifest" href="/mob_tech/manifest.json">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notie/4.3.1/notie.css" integrity="sha256-riQq/IR4tjk1PZxADrk953XR1tEk0uismMeRjW6xaL0=" crossorigin="anonymous" />
	<!-- IOS Meta tags -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="Weather PWA">
	<link rel="apple-touch-icon" href="/mob_tech/public/images/icons/icon-152x152.png">


</head>
<body>

<header class="header">
	<h1>
		Search for country
	</h1>
	<button id="butInstall" aria-label="Install" hidden></button>
	<button id="butRefresh" aria-label="Refresh"></button>
</header>

<main class="main">

	<div id="results" class="site weather-card">
		<div class="col-sm-12">
			<h6>Popis webové aplikace</h6>
			<ul>
				<li>Webová aplikace vrací výsledky z API služby - rest-countries-v1.</li>
				<li>Vyhledávané výsledky ukládá do cache paměti. Výsledky jsou zobrazeny pod vyhledávacím polem.</li>
				<li>Vstup od uživatele je buď zadáním do inputu nebo kliknutím na vyhledávanou zemi v historii hledání.</li>
				<li>Aplikace je postavená na PHP 7xx - framework Codeigniter, JS, HTML, CSS.</li>
			</ul>
		</div>
	</div>


	<div id="navigation">
		<nav class="mobile-bottom-nav">
			<a href="<?= base_url("/mob_tech")?>">
				<div class="mobile-bottom-nav__item">
					<div class="mobile-bottom-nav__item-content">
						<i class="fas fa-home"></i>

					</div>
				</div>
			</a>
			<a href="<?= base_url("/mob_tech/info")?>">
				<div class=" mobile-bottom-nav__item mobile-bottom-nav__item--active">
					<div class="mobile-bottom-nav__item-content">
						<i class="fas fa-info"></i>
					</div>
				</div>
			</a>
			<a href="<?= base_url("/mob_tech/contact")?>">
			<div class="mobile-bottom-nav__item">
				<div class="mobile-bottom-nav__item-content">
					<i class="fas fa-phone"></i>
				</div>
			</div>
			</a>
		</nav>

	</div>


</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notie/4.3.1/notie.js" integrity="sha256-qYjc/rYiyC3fRkJ0uhvlRHog1iWl5TLR9d/PpzUYbh0=" crossorigin="anonymous"></script>
<script src="/mob_tech/public/js/luxon-1.11.4.js"></script>
<script src="/mob_tech/public/js/app.js"></script>
<script src="/mob_tech/public/js/install.js"></script>

<script>

    function getLocation() {
        if (navigator.geolocation) {
            console.log(navigator.geolocation.getCurrentPosition());
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
    }
    // Register service worker.
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/mob_tech/service-worker.js')
                .then((reg) => {
                    console.log('Service worker registered.', reg);
                });
        });
    }
</script>

</body>
</html>
