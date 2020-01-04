'use strict';

const weatherApp = {
  selectedLocations: {},
  addDialogContainer: document.getElementById('addDialogContainer'),
};

/**
 * Toggles the visibility of the add location dialog box.
 */
function toggleAddDialog() {
  weatherApp.addDialogContainer.classList.toggle('visible');
}


function updateLocations(country) {
  //const data = JSON.stringify(locations);
  localStorage.setItem('locationList', country);
}


/**
 * Search country from user input.
 */
function searchCountry(){
  const country = document.getElementById('countryInput');
  const spinner = document.querySelector('.card-spinner');
  spinner.style.display="block";
  var settings = {
    "async": true,
    "crossDomain": true,
    "url": "https://restcountries-v1.p.rapidapi.com/name/"+country.value,
    "method": "GET",
    "headers": {
      "x-rapidapi-host": "restcountries-v1.p.rapidapi.com",
      "x-rapidapi-key": "379758d4a7mshcf9c05972f98022p1737f3jsne0e6815fcba2"
    },
    success: function (response) {

      $.ajax({
        url: 'home/location',
        type: 'POST',
        data: {
          'object': response,
        },
        dataType: 'json',
        success: function (data) {
          $("#about").after(data.html);
          spinner.style.display="none";
          addToLocalStorageString('locationList',country.value,',');
          $("#results .input-group").append( "<button type=\"button\" class=\"btn btn-primary\">"+country.value+"</button>" );
        }, error: function (data) {

        }
      });
    },
    error: function (response){
      notie.force({
        type: 3,
        text: 'The country you specified does not exist, please enter another.',
        buttonText: 'OK',
        callback: function () {
          spinner.style.display="none";
        }
      })
    }
  };

  $.ajax(settings).done(function (response) {
    //getForecastCard(response)
  });
}

var addToLocalStorageString = function (name, value, delimiter) {
  // Get the existing data
  var existing = localStorage.getItem(name);
  // If no existing data, use the value by itself
  // Otherwise, add the new value to it
  var data = existing ? existing + delimiter + value : value;
  localStorage.setItem(name, data);
};

/**
 * Event handler for butDialogAdd, adds the selected location to the list.
 */
function addLocation() {
  // Hide the dialog
  toggleAddDialog();
  // Get the selected city
  const select = document.getElementById('selectCityToAdd');
  const selected = select.options[select.selectedIndex];
  const geo = selected.value;
  const label = selected.textContent;
  const location = {label: label, geo: geo};
  // Create a new card & get the weather data from the server
  const card = getForecastCard(location);
  getForecastFromNetwork(geo).then((forecast) => {
    renderForecast(card, forecast);
  });
  // Save the updated list of selected cities.
  weatherApp.selectedLocations[geo] = location;
  saveLocationList(weatherApp.selectedLocations);
}

/**
 * Event handler for remove city card.
 *
 * @param {Event} evt
 */
function removeLocation() {
  console.log(evt);
  const parent = evt.srcElement.parentElement;
  parent.remove();

}

/**
 * Get's the cached forecast data from the caches object.
 *
 * @param {string} coords Location object to.
 * @return {Object} The weather forecast, if the request fails, return null.
 */
function getForecastFromCache(coords) {
  // CODELAB: Add code to get weather forecast from the caches object.
  if (!('caches' in window)) {
    return null;
  }
  const url = `${window.location.origin}/forecast/${coords}`;
  return caches.match(url)
      .then((response) => {
        if (response) {
          return response.json();
        }
        return null;
      })
      .catch((err) => {
        console.error('Error getting data from cache', err);
        return null;
      });
}



/**
 * Gets the latest weather forecast data and updates each card with the
 * new data.
 */
function updateData() {
  Object.keys(weatherApp.selectedLocations).forEach((key) => {
    const location = weatherApp.selectedLocations[key];
    const card = getForecastCard(location);
    // CODELAB: Add code to call getForecastFromCache
    getForecastFromCache(location.geo)
        .then((forecast) => {
          renderForecast(card, forecast);
        });
    // Get the forecast data from the network.
    getForecastFromNetwork(location.geo)
        .then((forecast) => {
          renderForecast(card, forecast);
        });
  });
}

/**
 * Saves the list of locations.
 *
 * @param {Object} locations The list of locations to save.
 */
function saveLocationList(locations) {
  const data = JSON.stringify(locations);
  localStorage.setItem('locationList', data);
}



/**
 * Loads the list of saved location.
 *
 * @return {Array}
 */
function loadLocationList() {
  let locations = localStorage.getItem('locationList');
  if (locations) {
    try {
      locations = JSON.parse(locations);
    } catch (ex) {
      locations = {};
    }
  }

  return locations;
}

function loadCacheItems(){
  let locations = localStorage.getItem('locationList');

  if (locations) {
    try {
      let cacheItems = locations.split(',');
      document.querySelector('#results').style.display = "block";
      var i;
      for (i = 0; i < cacheItems.length; i++) {
          $("#results .input-group").append( "<button type=\"button\" class=\"btn btn-primary\">"+cacheItems[i]+"</button>" );
      }
    } catch (ex) {
      locations = {};
    }
  }
}

  $(document).on('click','.remove-city',function (e) {
    $(this).parent('div').remove();
  });



/**
 * Initialize the app, gets the list of locations from local storage, then
 * renders the initial data.
 */
function init() {
  // Get the location list, and update the UI.
  weatherApp.selectedLocations = loadLocationList();
  //updateData();
  //Function for loading cache items
  loadCacheItems();
  // Set up the event handlers for all of the buttons.
  document.getElementById('butRefresh').addEventListener('click', updateData);
  document.getElementById('butAdd').addEventListener('click', toggleAddDialog);
  document.getElementById('butDialogCancel')
      .addEventListener('click', toggleAddDialog);
  document.getElementById('butDialogAdd')
      .addEventListener('click', addLocation);

  // Custom code
  document.getElementById('search_for_country')
      .addEventListener('click', searchCountry);

}

init();
