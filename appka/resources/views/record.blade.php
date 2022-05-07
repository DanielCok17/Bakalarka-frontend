<!DOCTYPE html>
<html>    
<head>
    <meta charset="utf-8" />
    <script type="text/javascript" src="https://api.mapy.cz/loader.js"></script>
    <script type="text/javascript">Loader.load();</script>
    <link href="css/speedometer.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet"  type="text/css" href="{{ asset('css/record.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/speedometer.js"></script>
    <title>Nehoda</title>
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
</style>
<body>
  <div id="rasto">  
  
<h2 >Základné informácie autonehody</h2>

<a style="margin-right: auto" href="http://127.0.0.1:8000/welcome" class="btn btn-info" role="button">Spať</a> 

<table style="width:100%">
  <tr>
    <th style="text-align:center">VIN</th>
    <th style="text-align:center">Rýchlosť</th>
    <th style="text-align:center">Akcelerácia</th>
    <th style="text-align:center">Rotácia</th>   
    <th style="text-align:center">Na streche</th>
    <th style="text-align:center">Počet prevrátení</th>
    <th style="text-align:center">Uhol nárazu</th>
    <th style="text-align:center">Vonkajšia teplota</th>
    <th style="text-align:center">Gforce</th>
  </tr>
  <tr>
    <td>{{$data['vin']}}</td>
    <td>{{$data['speed']}} km/h</td>
    <td>{{$data['acceleration']}}</td>
    <td>{{$data['rotation']}}</td>
    @if($data['on_roof']) <td>Áno</td> @endif
    @if(!$data['on_roof']) <td>Nie</td> @endif
    <td>{{$data['rotation_count']}}</td>
    <td>{{$data['inpack_site']}} °</td>
    <td>{{$data['temperature']}} °C</td>
    <td>{{$data['gforce']}}</td>
  </tr>
</table>
<br>

<div id="buttons">

<a href="http://127.0.0.1:8000/editedWelcome/{{$data['_id']}}" class="btn btn-success" role="button">Poslať záchranné zložky</a> 

<a href="https://www.google.com/maps/place/{{$data['latitude']}},{{$data['longitude']}}" id="btn" class="btn btn-primary" role="button" target="_blank">Navigovať k mieste nehody</a> 

<a href="http://127.0.0.1:8000/downloadPDF" class="btn btn-info" role="button" id="btn">Vygenerovať report PDF</a> 

<a href="http://127.0.0.1:8000/email" class="btn btn-secondary" role="button" target="_blank" id="btn">Pošli report na mail</a> 
</div>
    <div id="dots">
      <span class="dot1"></span>
      @if($data['occupied_seats'][1] == 1)<span class="dot2"></span>@endif
      @if($data['occupied_seats'][2] == 1)<span class="dot3"></span>@endif
      @if($data['occupied_seats'][3] == 1)<span class="dot4"></span>@endif
      @if($data['occupied_seats'][4] == 1)<span class="dot5"></span>@endif
      <span class="dot6"> <h5 id="text">Zobrazovanie obsadených miest</h5> </span>


      <img src="{{ URL('images/car.jpg')}}" alt="accident car" id="car_img style="float: left; margin-right: 15px;">
    </div>
 <div id="tach">
 <input id="myValues" style="display:none" />

  <div style="text-align: left">
    <link href="css/speedometer.css" rel="stylesheet" type="text/css" />
  </div> </div>       
    <input id="myValues" style="display:none" />    
    <div id="m" style="height:380px"></div>
    <br>
    <br>
  </div>

  </div>
</body>

<footer class="sticky-footer bg-white">
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
    var app_url = '{{ url('/') }}';


    var center = SMap.Coords.fromWGS84({{$data['longitude']}} , {{$data['latitude']}});
        var m = new SMap(JAK.gel("m"), center, 11);
        m.addDefaultLayer(SMap.DEF_BASE).enable();
        m.addDefaultControls();
        var coords = [];

        var layer = new SMap.Layer.Marker();
        m.addLayer(layer);
        layer.enable();

        var marker = map_checkpoints;      

        
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

        
        var cz = m.computeCenterZoom(coords);
        m.setCenterZoom(cz[0], cz[1]);
</script>

<script type="text/javascript">
    document.getElementById("myValues").value = 110;
	$("#myValues").speedometer({divFact:10,eventListenerType:'keyup'});
	$("#myValues2").speedometer({divFact:30});
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/speedometer.js"></script>
<script type="text/javascript">
    var speed = {{ $data['speed']}};
    document.getElementById("myValues").value = speed;
	$("#myValues").speedometer({divFact:10,eventListenerType:'keyup'});
	$("#myValues2").speedometer({divFact:30});
</script>




