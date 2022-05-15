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
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet"  type="text/css" href="{{ asset('css/welcome.css') }}">

    <title>Welcome</title>
</head>

<body>
<div id="rasto">  
    <br>
    <h2 >Záchranné centrum</h2><br>
   <br>
   

    <br>

    <div id="tables"> 
    <div style="display:inline-block; width:50%">
    <h5><strong>Nevyriešené autonehody</strong></h5>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">č.</th>
                <th scope="col" style="text-align:center">VIN</th>
                <th scope="col">Dátum</th>
                <th scope="col"></th>
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
                    <th><div id="timer"></div> <button id="start" style="display:none"></button></th>
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
                @if($zachranka_available == 0 || $policia_available == 0 || $hasici_available == 0)<th scope="col"></th>@endif
                </tr>
            </thead>
            <tbody>
            @for($i = 0; $i < $count2; $i++)
                <tbody>
                    <th  scope="row">{{$i+1}}</th>
                    <th class="table-primary">{{$data2[$i]['vin']}}</th>
                    <th class="table-primary">{{$data2[$i]['created_at']}}</th>
                    <td><a href="http://127.0.0.1:8000/wait/{{$data2[$i]['_id']}}"  class="btn btn-primary" target="_blank">Zobraziť</a></td>
                    <td><a href="http://127.0.0.1:8000/welcomeDelete/{{$data2[$i]['_id']}}"  class="btn btn-success" target="_blank">Vyriešiť</a></td>
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
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
              <th  scope="row">1</th>
              <th style="text-align:center">Sanitka</th>
              <th style="text-align:center"> {{$zachranka_available}}/{{$zachranka_total}} </th>
              @if($zachranka_available  == 0)<td><a href="http://127.0.0.1:8000/addZachranka"  class="btn btn-primary" target="_blank">Povolať</a></td>@endif
            </tbody>
            <tbody>
              <th  scope="row">2</th>
              <th style="text-align:center">Polícia</th>
              <th style="text-align:center">{{$policia_available}}/{{$policia_total}}</th>
              @if($policia_available  == 0)<td><a href="http://127.0.0.1:8000/addPolicia"  class="btn btn-primary" target="_blank">Povolať</a></td>@endif
            </tbody>
            <tbody>
              <th  scope="row">4</th>
              <th style="text-align:center">Hasič</th>
              <th style="text-align:center">{{$hasici_available}}/{{$hasici_total}}</th>
              @if($hasici_available  == 0)<td><a href="http://127.0.0.1:8000/addHasici"  class="btn btn-primary" target="_blank">Povolať</a></td>@endif
            </tbody>
        </table>   
    </div> 

    </div>

    <h1 id="demo"></h1> 


    <br>
    <h4>Nehody</h4>
      <div id="m" style="height:380px"></div>
      <br>
    </div> 
    <br>
    <a href="http://127.0.0.1:8000/nehody" class="btn btn-success" role="button">Všetky nehody</a>
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
    var app_url = '{{ url('/') }}';

    var center = SMap.Coords.fromWGS84(17.0713 , 48.154);
        var m = new SMap(JAK.gel("m"), center, 11);
        m.addDefaultLayer(SMap.DEF_BASE).enable();
        m.addDefaultControls();
        var coords = [];

        var layer = new SMap.Layer.Marker();
        m.addLayer(layer);
        layer.enable();

        var markers = map_checkpoints; 
        
        var policia_dostupne = @json($policia_available, JSON_HEX_APOS);    
        var policia_total = @json($policia_total, JSON_HEX_APOS); 
        
        var hasici_dostupne = @json($hasici_available, JSON_HEX_APOS);    
        var hasici_total = @json($hasici_total, JSON_HEX_APOS);  

        var zachranka_dostupne = @json($zachranka_available, JSON_HEX_APOS);    
        var zachranka_total = @json($zachranka_total, JSON_HEX_APOS); 

        markers.forEach(function(marker)
        {
          
            if(marker.status != -1) {
              var zn = JAK.mel("div");
              zn.classList.add("map_marker","clickable");
              zn.setAttribute('data-ltd', marker.latitude);
              zn.setAttribute('data-lng',marker.longitude );

              var img = JAK.mel("img", {src:SMap.CONFIG.img+"/marker/drop-red.png"});
              var img = JAK.mel("img", { src: images_path+"/r_marker.png" });
              img.setAttribute("title", marker.title);
              img.setAttribute("data-toggle", "tooltip");

              var card = new SMap.Card();
              card.getHeader().innerHTML = "<strong>Nehoda vozidla s VIN číslom: </strong>";
              card.getBody().innerHTML = marker.vin;

              zn.appendChild(img);
              var c = SMap.Coords.fromWGS84(marker.longitude,marker.latitude);
              var mark = new SMap.Marker(c, marker._id, marker.vin);
              mark.decorate(SMap.Marker.Feature.Card, card);
              layer.addMarker(mark);
              coords.push(c);
            }             
        });
        
        //zachranka      
        if(zachranka_total -zachranka_dostupne > 0 ){
              var zn = JAK.mel("div");
              zn.classList.add("map_marker","clickable");
              zn.setAttribute('data-ltd', 48.11);
              zn.setAttribute('data-lng',17.1 );

              var img = JAK.mel("img", {src:SMap.CONFIG.img+"/marker/drop-red.png"});
              var img = JAK.mel("img", { src: images_path+"/police.png" });
              //img.setAttribute("title", marker.title);
              img.setAttribute("data-toggle", "tooltip");

              var card = new SMap.Card();
              card.getHeader().innerHTML = "<strong>Záchranné stredisko</strong>";
              card.getBody().innerHTML = "Dostupnosť je "+ zachranka_dostupne +"/"+zachranka_total;
              
           
              
              zn.appendChild(img);              

              var c = SMap.Coords.fromWGS84(17.1,48.11);
              var mark = new SMap.Marker(c, "niečo", "marker.vin");
              mark.decorate(SMap.Marker.Feature.Card, card);
              layer.addMarker(mark);
              coords.push(c);
        }    

        //polícia
        if(policia_total - policia_dostupne >0){
              var zn = JAK.mel("div");
              zn.classList.add("map_marker","clickable");
              zn.setAttribute('data-ltd', 48);
              zn.setAttribute('data-lng',17 );

              var img = JAK.mel("img", {src:SMap.CONFIG.img+"/marker/drop-red.png"});
              var img = JAK.mel("img", { src: images_path+"/police.png" });
              //img.setAttribute("title", marker.title);
              img.setAttribute("data-toggle", "tooltip");

              var card = new SMap.Card();
              card.getHeader().innerHTML = "<strong>Stretidko polície</strong>";
              card.getBody().innerHTML = "Dostupnosť je "+ policia_dostupne +"/"+policia_total;              
             
              zn.appendChild(img);              

              var c = SMap.Coords.fromWGS84(17,48);
              var mark = new SMap.Marker(c, "niečo", "marker.vin");
              mark.decorate(SMap.Marker.Feature.Card, card);
              layer.addMarker(mark);
              coords.push(c);
          }

             //hasiči                
        if(hasici_total - hasici_dostupne >0){
              var zn = JAK.mel("div");
              zn.classList.add("map_marker","clickable");
              zn.setAttribute('data-ltd', 48.16);
              zn.setAttribute('data-lng',17.1 );

              var img = JAK.mel("img", {src:SMap.CONFIG.img+"/marker/drop-red.png"});
              var img = JAK.mel("img", { src: images_path+"/police.png" });
              //img.setAttribute("title", marker.title);
              img.setAttribute("data-toggle", "tooltip");

              var card = new SMap.Card();
              card.getHeader().innerHTML = "<strong>Hasičské stredisko </strong>";
              card.getBody().innerHTML = "Dostupnosť je "+ hasici_dostupne +"/"+hasici_total;             
            
              
              zn.appendChild(img);              

              var c = SMap.Coords.fromWGS84(17.1,48.16);
              var mark = new SMap.Marker(c, "niečo", "marker.vin");
              mark.decorate(SMap.Marker.Feature.Card, card);
              layer.addMarker(mark);
              coords.push(c);
          }

        var cz = m.computeCenterZoom(coords);
        m.setCenterZoom(cz[0], cz[1]);
</script>

<!-- Nevyriešené nehody TIMER     -->

<script>
    function incTimer() {
        var currentMinutes = Math.floor(totalSecs / 60);
        var currentSeconds = totalSecs % 60;
        if(currentSeconds <= 9) currentSeconds = "0" + currentSeconds;
        if(currentMinutes <= 9) currentMinutes = "0" + currentMinutes;
        totalSecs++;
          $("#timer").text(currentMinutes + ":" + currentSeconds);
          setTimeout('incTimer()', 1000);
    }
    totalSecs = 0;

    $(document).ready(function() {
        $("#start").click(function() {
            incTimer();            
        });
    });    
</script>

<script>
  var empty = @json($empty, JSON_HEX_APOS);    
  if(empty == false){
    //alert("picvina")
    $(document).ready(function() {
        setTimeout(function() {
        $('#start').click();
        //alert("zac")
    }, 1);
});
  }
</script>


<script>
   $(document).ready(function() {
      setTimeout(function() {
        $('#start').click();
        myFunction();
        //alert("Vráť spať zachranne zložky!");
    }, 10000);
        
});
</script>

<script>
  var empty = @json($empty2, JSON_HEX_APOS);    
  if(empty == false){
   $(document).ready(function() {
      setTimeout(function() {
        $('#start').click();
        alert("Vráť spať zachranne zložky!"); 
       
    }, 20000);
});
  }
</script>

<script>
  var empty = @json($empty, JSON_HEX_APOS);    
  if(empty == false){
function myFunction() {
  var txt;
  if (confirm("Prajete si vyriešiť autonehodu manuálne?!")) {
    txt = "Manuálne vyriešenie nehody!";
  } else {
    txt = "Nehoda bude vyriešená automaticky!";  

  }
  document.getElementById("demo").innerHTML = txt;
}
  }
</script>





