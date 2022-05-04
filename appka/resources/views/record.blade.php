<!DOCTYPE html>
<html>    
<head>
    <meta charset="utf-8" />
    <script type="text/javascript" src="https://api.mapy.cz/loader.js"></script>
    <script type="text/javascript">Loader.load();</script>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


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

</style>
<body>
  <div id="rasto">  
<div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:8000/welcome">Domov</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:8000/welcome">Detail autonehody</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://127.0.0.1:8000/welcome">Dataset autonehôd</a>
                        </li>
                    </ul>
                </div>

<h2 >Základné informácie autonehody</h2>
<i class="fas fa-check-circle text-success text-center"></i>

<table style="width:100%">
  <tr>
    <th>VIN</th>
    <th>Pozícia pedálu</th>
    <th>Rýchlosť</th>
    <th>Akcelerácia</th>
    <th>Rotácia</th>   
    <th>Status</th>
  </tr>
  <tr>
    <td>{{$data['vin']}}</td>
    <td>{{$data['pedal_position']}}</td>
    <td>{{$data['speed']}} km/h</td>
    <td>{{$data['acceleration']}}</td>
    <td>{{$data['rotation']}}</td>
    <td>{{$data['status']}}</td>
  </tr>
</table>
<br>
<button class="nehoda">Poslať záchranné zložky</button><br>

    <img src="{{ URL('images/car.jpg')}}" alt="accident car" id="car_img style="float: left; margin-right: 15px;">
 <div id="tach">
  <div style="text-align: left">
    <link href="css/speedometer.css" rel="stylesheet" type="text/css" />
  </div> </div>       
    <input id="myValues" style="display:none" />    
    <div id="m" style="height:380px"></div>
    <br>
  </div>
  <button class="navi">Navigovať k mieste nehody</button><br>
  <button class="pdf">Vygenerovať report PDF</button><br>
  <button class="email">Pošli report na mail</button><br><br>
  <a href="/edit/$data['_id']" class="btn btn-primary">Button</a>


  </div>
</body>

@if(isset($data))
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/speedometer.js"></script>
<script type="text/javascript">
    var speed = {{ $data['speed']}};
    document.getElementById("myValues").value = speed;
	$("#myValues").speedometer({divFact:10,eventListenerType:'keyup'});
	$("#myValues2").speedometer({divFact:30});
</script>
@endif

<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span class="text-center">&copy; Copyright {{ now()->year }} | Záchranné centrum | <a href="https://github.com/DanielCok17/Bakalarka-frontend/tree/master/appka" target="_blank"> Github </a></span>
    </div>
  </div>
</footer>

</html>


<script>
  $(document).on('click',".pdf",function(){
    location.href = 'http://127.0.0.1:8000/downloadPDF';
    alert("PDF bolo úspešne vygenerované")
})

$(document).on('click',".email",function(){
  location.href = 'http://127.0.0.1:8000/email';  
  alert("Mail bol úspešne vygenerované")
})

$(document).on('click',".nehoda",function(){    
  alert("Záchranné zložky boli odoslané na miesto nehody!")
  window.open('https://www.google.com/maps/place/'+ {{$data['latitude']}}+','+{{$data['longitude']}}, '_blank');

  
})

$(document).on('click',".navi",function(){
  alert("Navihujem ťa k nehode")
  //location.href = 'https://www.google.com/maps/place/'+ {{$data['latitude']}}+','+{{$data['longitude']}};  
  //window.open('https://www.google.com/maps/place/'+ {{$data['latitude']}}+','+{{$data['longitude']}}, '_blank');
})
</script>

<script>
    var center = SMap.Coords.fromWGS84({{$data['longitude']}} , {{$data['latitude']}});
    var m = new SMap(JAK.gel("m"), center, 12);
    m.addDefaultLayer(SMap.DEF_BASE).enable();
    m.addDefaultControls();

    var layer = new SMap.Layer.Marker();
    m.addLayer(layer);
    layer.enable();

    var options = {};
    var marker = new SMap.Marker(center, "myMarker", options);
    layer.addMarker(marker);
</script>



