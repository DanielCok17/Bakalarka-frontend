<!DOCTYPE html>
<html>    
<head>
    <meta charset="utf-8" />
    <script type="text/javascript" src="https://api.mapy.cz/loader.js"></script>
    <script type="text/javascript">Loader.load();</script>
</head>
<style>
table, th, td {
  border:1px solid black;
}
h2{text-align: center;}
td{text-align: center;}
input{text-align: center;}
</style>
<body>
<h2 >Základné informácie autonehody</h2>

<table style="width:100%">
  <tr>
    <th>VIN</th>
    <th>Typ paliva</th>
    <th>Množstvo paliva</th>
    <th>Pozícia pedálu</th>
    <th>Rýchlosť</th>
    <th>Akcelerácia</th>
    <th>Rotácia</th>
    <th>Počet obsadených sedadiel</th>    
    <th>Status</th>
  </tr>
  <tr>
    <td>{{$data['vin']}}</td>
    <td>{{$data['fuel_type']}}</td>
    <td>{{$data['fuel_amount']}}</td>
    <td>{{$data['pedal_position']}}</td>
    <td>{{$data['speed']}} km/h</td>
    <td>{{$data['acceleration']}}</td>
    <td>{{$data['rotation']}}</td>
    <td>{{$data['occupied_seats']}}</td>
    <td>{{$data['status']}}</td>
  </tr>
</table>
<br>
  <link href="css/speedometer.css" rel="stylesheet" type="text/css" />
  <input id="myValues" / >

  <div id="m" style="height:380px"></div>

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
</html>

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

