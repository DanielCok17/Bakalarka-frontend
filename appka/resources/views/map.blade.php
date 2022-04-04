<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <script type="text/javascript" src="https://api.mapy.cz/loader.js"></script>
    <script type="text/javascript">Loader.load();</script>
</head>

<body>
    <div id="m" style="height:380px"></div>
</body>
</html>

<script>
    var center = SMap.Coords.fromWGS84({{$data['longitude']}} , {{$data['latitude']}});
    var m = new SMap(JAK.gel("m"), center, 13);
    m.addDefaultLayer(SMap.DEF_BASE).enable();
    m.addDefaultControls();

    var layer = new SMap.Layer.Marker();
    m.addLayer(layer);
    layer.enable();

    var options = {};
    var marker = new SMap.Marker(center, "myMarker", options);
    layer.addMarker(marker);
</script>