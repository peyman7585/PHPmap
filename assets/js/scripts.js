const defualtLocation=[35.736431,51.3215528];
const defualtzoom=13;

const map = L.map('map').setView(defualtLocation, defualtzoom);
    
const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="">PHPmap</a>'
}).addTo(map);
 document.getElementById('map').style.setProperty('height', window.innerHeight + 'px');

 //set viwe in map
/*  map.setView([29.3603403, 51.0687747],defualtzoom);*/

/*
 L.marker(defualtLocation).addTo(map).bindPopup('dance house').openPopup();
 L.marker([35.736431,50.3215528]).addTo(map).bindPopup('my house');
 map.on('popupopen',function(){
    alert('dance house');
 });
 */


//get view information

/*
var NorthLine =map.getBounds().getNorth();
var SouthLine =map.getBounds().getSouth();
var WestLine  =map.getBounds().getWest();
var EastLine  =map.getBounds().getEast();
*/

// get map Event
map.on('dblclick',function(event){


});



 setTimeout(function(){
  // map.setView([NorthLine,WestLine],defualtzoom);
 },4000);
 