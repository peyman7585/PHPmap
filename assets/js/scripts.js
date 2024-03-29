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
     // 1:add marker in clicked position
    L.marker(event.latlng).addTo(map);
    //2:open modal(form) for save the clicked location
    $('.modal-overlay').fadeIn('500');
    $('#lat-display').val(event.latlng.lat);
    $('#lng-display').val(event.latlng.lng);
    $('#l-title').val('');
    $('#l-type').val(0);
    //3 done:fill the form and submite data to server

    //4 done:save location in database(status :pending review)

    //5: review locations and verify if ok

});

var current_position,current_accuracy;

map.on('locationfound',function(e){

    if(current_position){
        map.removeLayer(current_position);
        map.removeLayer(current_accuracy);
    }
    var radius=e.accuracy /2;
    current_position= L.marker(e.latlng).addTo(map).bindPopup("دقت تقریبی " +radius+" متر").openPopup();
    current_accuracy= L.circle(e.latlng,radius).addTo(map);
});
map.on('locationerror',function(e){
 alert(e.message);
});


function locate(){
    map.locate({setView:true,maxZoom:defualtzoom})
}

/*
 setInterval(locate,5000);
 setTimeout(function(){
 map.setView([NorthLine,WestLine],defualtzoom);
 },4000);
 */

 $(document).ready(function(){
    $('form#addLocationForm').submit(function(e){
    e.preventDefault(); //prevent submit form
     var form=$(this);
     var resultTag=form.find('.ajax-result');
     $.ajax({
        url: form.attr('action'),
        method:form.attr('method'),
        data:form.serialize(),
        success: function(response){
            resultTag.html(response);
        }
      });
    });

    $('.modal-overlay .close').click(function(){
        $('.modal-overlay').fadeOut();
    });
});