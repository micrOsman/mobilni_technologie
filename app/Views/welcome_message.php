<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Country info</title>
	<meta name="osicka" content="pwa-app">
	<link rel="stylesheet" type="text/css" href="css/inline.css">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
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
	<link rel="apple-touch-icon" href="images/icons/icon-152x152.png">


</head>
<body>

<header class="header">
	<h1>
		Weather PWA
		<a href="https://darksky.net/poweredby/" class="powered-by">
			Powered by Dark Sky
		</a>
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
	<div id="weather-template" class="weather-card" hidden>
		<div class="card-spinner">
			<svg viewBox="0 0 32 32" width="32" height="32">
				<circle cx="16" cy="16" r="14" fill="none"></circle>
			</svg>
		</div>
		<button class="remove-city" id="remove-city">&times;</button>
		<div class="city-key" hidden></div>
		<div class="card-last-updated" hidden></div>
		<div class="location" id="location">&nbsp;</div>
		<div class="date" id="date">&nbsp;</div>
		<div class="description" id="description">&nbsp;</div>
		<div class="current">
			<div class="visual">
				<div class="icon"><i class="fas fa-city"></i>
				</div>
				<div class="temperature">
					<span class="value"></span><span class="scale">°F</span>
				</div>
			</div>
			<div class="description">
				<div class="humidity">
					<span class="label">Humidity:</span>
					<span class="value"></span><span class="scale">%</span>
				</div>
				<div class="wind">
					<span class="label">Wind:</span>
					<span class="value"></span>
					<span class="scale">mph</span>
					<span class="direction"></span>°
				</div>
				<div class="sunrise">
					<span class="label">Sunrise:</span>
					<span class="value"></span>
				</div>
				<div class="sunset">
					<span class="label">Sunset:</span>
					<span class="value"></span>
				</div>
			</div>
		</div>
		<div class="future">
			<div class="oneday">
				<div class="date"></div>
				<div class="icon"></div>
				<div class="temp-high">
					<span class="value"></span>°
				</div>
				<div class="temp-low">
					<span class="value"></span>°
				</div>
			</div>
			<div class="oneday">
				<div class="date"></div>
				<div class="icon"></div>
				<div class="temp-high">
					<span class="value"></span>°
				</div>
				<div class="temp-low">
					<span class="value"></span>°
				</div>
			</div>
			<div class="oneday">
				<div class="date"></div>
				<div class="icon"></div>
				<div class="temp-high">
					<span class="value"></span>°
				</div>
				<div class="temp-low">
					<span class="value"></span>°
				</div>
			</div>
			<div class="oneday">
				<div class="date"></div>
				<div class="icon"></div>
				<div class="temp-high">
					<span class="value"></span>°
				</div>
				<div class="temp-low">
					<span class="value"></span>°
				</div>
			</div>
			<div class="oneday">
				<div class="date"></div>
				<div class="icon"></div>
				<div class="temp-high">
					<span class="value"></span>°
				</div>
				<div class="temp-low">
					<span class="value"></span>°
				</div>
			</div>
			<div class="oneday">
				<div class="date"></div>
				<div class="icon"></div>
				<div class="temp-high">
					<span class="value"></span>°
				</div>
				<div class="temp-low">
					<span class="value"></span>°
				</div>
			</div>
			<div class="oneday">
				<div class="date"></div>
				<div class="icon"></div>
				<div class="temp-high">
					<span class="value"></span>°
				</div>
				<div class="temp-low">
					<span class="value"></span>°
				</div>
			</div>
		</div>
	</div>
</main>

<div id="addDialogContainer">
	<div class="dialog">
		<div class="dialog-title">Add new city</div>
		<div class="dialog-body">
			<select id="selectCityToAdd" aria-label="City to add">

				<option value="28.6472799,76.8130727">Dehli, India</option>
				<option value="-5.7759362,106.1174957">Jakarta, Indonesia</option>
				<option value="51.5287718,-0.2416815">London, UK</option>
				<option value="40.6976701,-74.2598666">New York, USA</option>
				<option value="48.8589507,2.2770202">Paris, France</option>
				<option value="-64.8251018,-63.496847">Port Lockroy, Antarctica</option>
				<option value="37.757815,-122.5076401">San Francisco, USA</option>
				<option value="31.2243085,120.9162955">Shanghai, China</option>
				<option value="35.6735408,139.5703032">Tokyo, Japan</option>
			</select>
		</div>
		<div class="dialog-buttons">
			<button id="butDialogCancel" class="button">Cancel</button>
			<button id="butDialogAdd" class="button">Add</button>
		</div>
	</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notie/4.3.1/notie.js" integrity="sha256-qYjc/rYiyC3fRkJ0uhvlRHog1iWl5TLR9d/PpzUYbh0=" crossorigin="anonymous"></script>
<script src="js/luxon-1.11.4.js"></script>
<script src="js/app.js"></script>
<!-- CODELAB: Add the install script here -->
<!-- <script src="/scripts/install.js"></script> -->

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
