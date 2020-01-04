'use strict';


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

/**
 * Search country from user button input.
 */
function searchCountryFromButton(button){
  console.log(button);
  const spinner = document.querySelector('.card-spinner');
  spinner.style.display="block";
  var settings = {
    "async": true,
    "crossDomain": true,
    "url": "https://restcountries-v1.p.rapidapi.com/name/"+button,
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
          addToLocalStorageString('locationList',button,',');
          $("#results .input-group").append( "<button type=\"button\" class=\"btn btn-primary\">"+button+"</button>" );
        }, error: function (data) {

        }
      });
    }
  };
  $.ajax(settings).done(function (response) {
  });
}
/**
 * Add object into local storage - specific storage name, value and delimiter.
 */
var addToLocalStorageString = function (name, value, delimiter) {
  // Get the existing data
  var existing = localStorage.getItem(name);
  // If no existing data, use the value by itself
  // Otherwise, add the new value to it
  var data = existing ? existing + delimiter + value : value;
  localStorage.setItem(name, data);
};

/**
 * Load cache items from storage and show them in #result container.
 */
function loadCacheItems(){
  let locations = localStorage.getItem('locationList');

  if (locations) {
    try {
      let cacheItems = locations.split(',');
      document.querySelector('#results').style.display = "block";
      var i;
      for (i = 0; i < cacheItems.length; i++) {
          $("#results .input-group").append( "<button type=\"button\" class=\"btn_country btn btn-primary\">"+cacheItems[i]+"</button>" );
      }
    } catch (ex) {
      locations = {};
    }
  }
}
/**
 * Event for remove parent element
 */
  $(document).on('click','.remove-city',function (e) {
    $(this).parent('div').remove();
  });
/**
 * Event for search from button click
 */
$(document).on('click','.btn_country',function (e) {
  let element = $(this).text();
  searchCountryFromButton(element);
});

/**
 * Initialize the app, gets the list of locations from local storage, then
 * renders the initial data.
 */
function init() {
  //Function for loading cache items
  loadCacheItems();
  document.getElementById('search_for_country')
      .addEventListener('click', searchCountry);
}

init();
