<?php
// Fetch the street and city from query parameters
$street = isset($_GET['street']) ? $_GET['street'] : '';
$city = isset($_GET['city']) ? $_GET['city'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Directions</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgotqqVRfysBN6mPsyVstxRD2EjyLbRzg&callback=initMap&v=weekly" async defer></script>
    <script>
    let map, directionsService, directionsRenderer;

    function initMap() {
        // User's current location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                // Create a new map centered on user's location
                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 14,
                    center: userLocation,
                });

                // Initialize the Directions Service and Renderer
                directionsService = new google.maps.DirectionsService();
                directionsRenderer = new google.maps.DirectionsRenderer();
                directionsRenderer.setMap(map);

                // Geocode the destination address
                const destination = "<?php echo urlencode($street . ', ' . $city); ?>";
                const geocoder = new google.maps.Geocoder();

                geocoder.geocode({ address: destination }, function(results, status) {
                    if (status === "OK") {
                        const destinationLocation = results[0].geometry.location;

                        // Calculate and display the route
                        calculateRoute(userLocation, destinationLocation);
                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });
            });
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function calculateRoute(start, end) {
        const request = {
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING
        };

        // Get the route and display it on the map
        directionsService.route(request, function(result, status) {
            if (status === "OK") {
                directionsRenderer.setDirections(result);
            } else {
                alert("Directions request failed due to " + status);
            }
        });
    }
    </script>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body onload="initMap()">
    <h1>Directions to: <?php echo htmlspecialchars($street . ', ' . $city); ?></h1>
    <div id="map"></div>
</body>
</html>
