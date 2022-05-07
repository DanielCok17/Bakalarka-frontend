<!DOCTYPE html>
<html>
<head>
    <title>PDF report</title>
</head>
<body>
    <h1>Nehoda vozidla {{$accidents[0]['vin']}}</h1>
    <p> <strong> Dátum nehody: </strong> {{$accidents[0]['created_at']}}</p>
    <p>Pocet osob v aute v case nehody: <strong>{{$count}}</strong></p> <br>
    <p>V prpade potreby, <a href = "https://www.google.com/maps/place/{{$accidents[0]['latitude']}},{{$accidents[0]['longitude']}}" target="_blank">kliknite sem</a> pre navigovanie na miesto nehody.</p>        
</body>
</html>