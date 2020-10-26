
<!doctype html>
<html lang="en">
		<head>
		  <title>Geolocation</title>
		  <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      
     
      <link rel="stylesheet" href="lib/css/style.css">
			
        <!--bootstrap-->
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<!--Leaflet-->
       <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
      <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
      <script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>
	 
	  
	  
</head>

	
<style>
 body { margin:0; padding:0; }
    #map { position: absolute; top:65px; bottom:0; right:0; left:0; }

	
</style>
<body>

<nav class="navbar navbar-inverse">

    <a class="navbar-brand" href="#"><select  id="data" class="browser-default custom-select custom-select-lg mb-3"> <option selected>select country</option></select></a>
    
    
        <a class="navbar-brand" href="#"></a><button type="button" class="btn btn-info btn-lg" data-toggle="modal" id="submit" data-target="#myModal">Country Data</button></a>
        <a class="navbar-brand" href="#"></a><button type="button" class="pure-button pure-button-primary"  id="pure">Get my location</button></a>
    </nav>
    <div  id="map"  ></div>
    
    
  </div>
  </div>
  <div id ="myModal"  class="modal">
		  <div class="modal-dialog">
		
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
			
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<h4 class="modal-title">Country Information</h4>
			  </div>
			  <div class="modal-body">
				<div class="row">
  <table>
	

<tr><td id="country_flag"><img src="" alt=""  class="center"></td> </tr>
<tr><td id="name"></td></tr>								
<tr><td id="capital"></td></tr>								 
<tr><td id="regio"></td></tr>						  
<tr><td id="population"></td></tr>								
<tr><td id="currencies"></td></tr>
<tr><td id="languages"></td></tr>						
<tr><td id="lat"></td></tr>									
<tr><td id="name1"></td></tr>									  
<tr><td id="country"></td></tr>								
<tr><td id="main"></td></tr>	
<tr><td id="temprature"></td></tr>								  
<tr><td id="min"></td></tr>								
<tr><td id="max"></td></tr>							  
<tr><td id="humidity"></td>	</tr>							 
<tr><td id="wind"></td>	</tr>							
<tr><td id="weather"></td></tr>								  
<tr><td id="pressure"></td></tr>								
								
</table>				
</div>
</div>
</div>
 </div>
  </div> 	
  
    
     <script>
var layerGroup;
 
  
var map;
var streets = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 19,
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});
var layerGroup;
window.onload = function(){
  loadMap();
}
  function loadMap(coords){
    
    baseMaps = {
        "Streets": streets,
       
    };
    
    
    map = L.map('map',{
        layers:[streets]
    }).setView([0, 0], 3)

  } 
 

  var x = document.getElementById("data");
  x.addEventListener("change", function() {
    $('#data').click(function(){ 
  
const countryname = $('#data').val();

applyCountryBorder(countryname );




function applyCountryBorder( countryname) {
  if (layerGroup){
        map.removeLayer(layerGroup);
    }
  jQuery
    .ajax({
      type: "GET",
      dataType: "json",
    
      url:
      "https://nominatim.openstreetmap.org/search?country=" +
      countryname.trim() +
      "&polygon_geojson=1&format=json"
    })
    .then(function(data) {
      var bounds = new L.LatLngBounds([data[0].boundingbox[0],data[0].boundingbox[2]],[data[0].boundingbox[1],data[0].boundingbox[3]]);
          map.fitBounds(bounds)
          layerGroup = new L.LayerGroup();
        layerGroup.addTo(map);
        L.geoJSON(data[0].geojson, {
          color: "green",
        weight: 8,
        opacity: 1,
        fillOpacity: 0.0 
        }).addTo(layerGroup);
      });
  }


    });
  });
          
        
      
           
         

     </script>
<script type="application/javascript" src="lib/js/fore.js"></script>
<script type="application/javascript" src="lib/vendor/jquery-2.2.3.min.js"></script>
<script type="application/javascript" src="lib/js/script.js"></script>
<script type="application/javascript" src="lib/js/fore.js"></script>
	<script type="application/javascript" src="lib/js/script.js"></script>
<script src="lib/js/app1.js"></script>

</body>
</html>

 
  


