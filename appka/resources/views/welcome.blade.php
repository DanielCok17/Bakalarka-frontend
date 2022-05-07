<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">    
    <script type="text/javascript" src="https://api.mapy.cz/loader.js"></script>
    <script type="text/javascript">Loader.load();</script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="/lib/jquery.min.js"></script>
    <script src="/lib/jquery.plugin.js"></script>

    <title>Welcome</title>
</head>

<style>
table, th, td {
  border:1px solid black;
}
h2{text-align: center;}
td{text-align: center;}
input{text-align: center;}
body{
  width: 100%;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
}
#m{
  width: 60%;  
}

#tach{
  justify-content:left;
}
#rasto{
  width:85%;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
}

.sticky-footer {
  width:100%;
  color: white;
  background: #a62424;
  background: linear-gradient(90deg, #a62424 42%, #741919 75%);
}
.sticky-footer h6 {
  font-weight: 700;
  text-transform: uppercase;
  margin-bottom: 20px;
}
.sticky-footer .wide-container span, .sticky-footer .wide-container a {
  color: rgba(255, 255, 255, 0.8);
  margin-top: 7px;
  transition: 0.3s;
}
.sticky-footer .wide-container a:hover {
  color: white;
  text-decoration: none;
}
.sticky-footer .social-links {
  padding: 25px 0px;
}
.sticky-footer .social-links a {
  display: inline-block;
  height: 30px;
  width: 30px;
  background: white;
  border-radius: 100%;
  text-align: center;
  margin: 5px;
  color: #a62424;
  transition: 0s !important;
}
.sticky-footer .social-links a i {
  line-height: 30px;
}
.sticky-footer .social-links a:hover {
  color: #841c1c;
  transform: scale(1.1);
}
.sticky-footer .sponsors, .sticky-footer .links, .sticky-footer .contact_us {
  padding: 25px 0px;
}
.sticky-footer .sponsors a {
  vertical-align: top;
  height: 100%;
}
.sticky-footer .sponsors img {
  margin-top: -7px;
}
.sticky-footer .sponsors .nocr_logo {
  margin-top: 15px;
}
.sticky-footer .sponsors .nocr_logo img {
  border-radius: 3px;
}
.sticky-footer .sponsors .museum_logo {
  margin-top: 15px;
}
.sticky-footer .sponsors .museum_logo img {
  margin-left: 10px;
}
.sticky-footer .sponsors .slovakia_travel_logo {
  margin-top: 15px;
}
.sticky-footer .sponsors .slovakia_travel_logo img {
  margin-left: 10px;
}
.sticky-footer .footer-logo {
  max-height: 30px;
}
.sticky-footer .copyright {
  padding: 7px;
  background: rgba(0, 0, 0, 0.2);
}
.sticky-footer .copyright a, .sticky-footer .copyright span {
  color: white;
}
.sticky-footer .footer_logo {
  height: 100px;
  position: absolute;
}

.nav-item
{ 
 {
   border-bottom: 1px solid rgba(0,0,0,0.1);
   &:last-child
  {
    border: none;
  }
}
}

.body {
    min-height: 100vh;
    max-width: 400px;
    background-color: papayawhip; 
    margin: 0 auto;
}

#car_img{
  height: 500px; 
  width: 700px;
  align: left;
}

.table{
    table-layout: auto;
    width: 300px;
}

.body {
    min-height: 100vh;
    max-width: 400px;
    background-color: papayawhip; 
    margin: 0 auto;
}

#rasto{
  width:85%;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
}

/* Add a black background color to the top navigation */
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

#tables{
  display:flex;
  flex-direction: row;
}

#footer{
  position:absolute;
  bottom:0px;
}

.table{
  margin: 20px;
}

.modal-open .modal {
  display: flex !important;
  align-items: center !important;
}
.modal-open .modal .modal-dialog {
  flex-grow: 1;
}

#markerModal .modal-content {
  overflow: hidden;
  border-radius: 0px;
  background-color: white;
  border: none;
}
#markerModal .modal-content .place_description {
  line-height: 20px;
  height: 200px;
  display: block;
  overflow-y: auto;
  text-align: justify;
  padding: 10px;
}
#markerModal p {
  line-height: 8px;
  margin: 8px;
  margin-right: 0px;
}
#markerModal .close {
  padding-top: 5px;
  font-size: 1.3rem;
}
#markerModal h5 {
  font-family: "Montserrat", sans-serif;
  font-weight: 600;
  text-transform: uppercase;
}
#markerModal .info-icon {
  display: inline-block;
  width: 15px;
  text-align: center;
  margin-left: 8px;
}
#markerModal .big_icon {
  color: #2980b9;
  position: absolute;
  font-size: 18rem;
  left: 0;
  top: 0;
  margin-left: -70px;
  margin-top: -35px;
  opacity: 0.2;
}
#markerModal .description {
  padding-top: 40px;
  padding-right: 0px !important;
  padding-bottom: 15px;
}
#markerModal .modal-header, #markerModal .modal-footer {
  border: none;
}
@media (max-width: 480px) {
  #markerModal .big_icon {
    font-size: 12rem;
  }
  #markerModal h5 {
    font-size: 1rem;
  }
  #markerModal p {
    font-size: 0.8rem;
  }
  #markerModal .btn {
    padding: 0.25rem 0.5rem;
    font-size: 0.7875rem;
    line-height: 1.5;
  }
}


</style>

<body>
<div id="rasto">  
    <br>
    <div class="topnav">
      <a class="active" href="">Domov</a>
      <a href="http://127.0.0.1:8000/nehody" target="_blank">Dataset nehôd</a>
      <a href="#contact">Kontakt</a>
    </div>

    <div id="tables"> 
    <div style="display:inline-block; width:50%">
    <h5>Nevyriešené autonehody</h5>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">č.</th>
                <th scope="col" style="text-align:center">VIN</th>
                <th scope="col">Dátum</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @for($i = 0; $i < $count3; $i++)
                <tbody>
                    <th  scope="row">{{$i+1}}</th>
                    <th class="table-danger">{{$data3[$i]['vin']}}</th>
                    <th class="table-danger">{{$data3[$i]['created_at']}}</th>
                    <td><a href="http://127.0.0.1:8000/record/{{$data3[$i]['_id']}}"  class="btn btn-danger" target="_blank">Zobraziť</a></td>
                </tbody>
            @endfor
        </table>   
    </div> 


    <div style="display:inline-block ; width:50%">
    <h5>Riešené autonehody</h5>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">č.</th>
                <th scope="col" style="text-align:center">VIN</th>
                <th scope="col" style="text-align:center">Dátum</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @for($i = 0; $i < $count2; $i++)
                <tbody>
                    <th  scope="row">{{$i+1}}</th>
                    <th class="table-primary">{{$data2[$i]['vin']}}</th>
                    <th class="table-primary">{{$data2[$i]['created_at']}}</th>
                    <td><a href="http://127.0.0.1:8000/wait/{{$data2[$i]['_id']}}"  class="btn btn-primary" target="_blank">Zobraziť</a></td>
                </tbody>
            @endfor
        </table>   
        
    </div>

    <div style="margin-left: auto">
    <h5>Dostupnosť záchranných zložiek</h5>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">č.</th>
                <th scope="col" style="text-align:center">Typ zložiek</th>
                <th scope="col" style="text-align:center">Dostupnosť</th>
                </tr>
            </thead>
            <tbody>
              <th  scope="row">1</th>
              <th style="text-align:center">Sanitka</th>
              <th style="text-align:center"> {{$zachranka_available}}/{{$zachranka_total}} </th>
            </tbody>
            <tbody>
              <th  scope="row">2</th>
              <th style="text-align:center">Polícia</th>
              <th style="text-align:center">{{$policia_available}}/{{$policia_total}}</th>
            </tbody>
            <tbody>
              <th  scope="row">4</th>
              <th style="text-align:center">Hasič</th>
              <th style="text-align:center">{{$hasici_available}}/{{$hasici_total}}</th>
            </tbody>
        </table>   
    </div> 

    </div>


    <br>
    <h4>Nehody</h4>
      <div id="m" style="height:380px"></div>
      <br>
    </div> 
    <br>
    <!-- Modal -->
    <div class="modal fade" id="markerModal" tabindex="-1" role="dialog" aria-labelledby="markerModalLabel" aria-hidden="true" position="fixed">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
              <div class="text-right col-12">
                <span class="clickable close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                <i class="fas fa-info-circle big_icon"></i>
                <div class="description">
                    <h5 class="checkpoint_vin mb-3"></h5>
                    <p><span class="place_description"></span></p>                
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('app.buttons.close')</button>
          </div>
        </div>
      </div>
    </div>

</body>

<footer id="footer" class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span class="text-center">&copy; Copyright {{ now()->year }} | Záchranné centrum | <a href="https://github.com/DanielCok17/Bakalarka-frontend/tree/master/appka" target="_blank"> Github </a></span>
    </div>
  </div>
</footer>
</html>



<script>
  var map_checkpoints = @json($data, JSON_HEX_APOS);    
    var images_path = "{{ asset('images/') }}";
    //console.log(images_path);
    var app_url = '{{ url('/') }}';


    var center = SMap.Coords.fromWGS84({{$data[0]['longitude']}} , {{$data[0]['latitude']}});
        var m = new SMap(JAK.gel("m"), center, 11);
        m.addDefaultLayer(SMap.DEF_BASE).enable();
        m.addDefaultControls();
        var coords = [];

        var layer = new SMap.Layer.Marker();
        m.addLayer(layer);
        layer.enable();

        var markers = map_checkpoints;      

        markers.forEach(function(marker)
        {
            var zn = JAK.mel("div");
            zn.classList.add("map_marker","clickable");
            zn.setAttribute('data-ltd', marker.latitude);
            zn.setAttribute('data-lng',marker.longitude );

            var img = JAK.mel("img", {src:SMap.CONFIG.img+"/marker/drop-red.png"});
            var img = JAK.mel("img", { src: images_path+"/r_marker.png" });
            img.setAttribute("title", marker.title);
            img.setAttribute("data-toggle", "tooltip");

            var card = new SMap.Card();
            card.getHeader().innerHTML = "<strong>VIN</strong>";
            card.getBody().innerHTML = marker.vin;

            zn.appendChild(img);
            var c = SMap.Coords.fromWGS84(marker.longitude,marker.latitude);
            var mark = new SMap.Marker(c, marker._id, marker.vin);
            mark.decorate(SMap.Marker.Feature.Card, card);
            layer.addMarker(mark);
            coords.push(c);   

        });
        var cz = m.computeCenterZoom(coords);
        m.setCenterZoom(cz[0], cz[1]);
</script>


