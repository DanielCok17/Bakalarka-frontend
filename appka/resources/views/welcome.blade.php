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
    <link rel="stylesheet"  type="text/css" href="{{ asset('css/welcome.css') }}">

    <title>Welcome</title>
</head>

<body>
<div id="rasto">  
    <br>
    <h2 >Záchranné centrum</h2><br>
    <div class="topnav" style="text-align:left">
      <a class="active" href="">Domov</a>
      <a href="http://127.0.0.1:8000/nehody" target="_blank">Dataset nehôd</a>
      <a href="#contact">Kontakt</a>
    </div>

    <br>

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




