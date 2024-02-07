<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7Map</title>
    <link href="favicon.png" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  
     <!-- prevent of cache -->
    <link rel="stylesheet" href="assets/css/styles.css<?php echo "?v=". rand(99,99999)?>" />
  
</head>

<body>
    <div class="main">
        <div class="head">
            <input type="text" id="search" placeholder="دنبال کجا می گردی؟">
        </div>
        <div class="mapContainer">
            <div id="map"></div>
        </div>
    </div>
    <script src="assets/js/scripts.js"></script>  
</body>

</html>
