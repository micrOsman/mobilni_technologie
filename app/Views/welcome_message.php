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
	<div class="card-spinner">
		<svg viewBox="0 0 32 32" width="32" height="32">
			<circle cx="16" cy="16" r="14" fill="none"></circle>
		</svg>
	</div>
	<button id="butAdd" class="fab" aria-label="Add">
		<span class="icon add"></span>
	</button>

	<div id="about" class="weather-card">
			<div class="input-group">
				<input type="text" id="countryInput" class="form-control" placeholder="Insert name of country">
				<div class="input-group-append">
					<button class="btn btn-secondary" id="search_for_country" type="button">
						<i class="fa fa-search"></i>
					</button>
				</div>
			</div>
	</div>
	<div id="results" class="weather-card">
		<div class="input-group">
			<h6>History (by click repeat search): </h6>

		</div>
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
