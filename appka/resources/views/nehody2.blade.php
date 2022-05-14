<!DOCTYPE html>
<html>
<head>
    <title>PDF report</title>
</head>
<body>
    <h2>Nehoda vozidla s VIN císlom: {{$accidents[0]['vin']}}</h2> <br>
    <p>Dátum nehody: <strong> {{$accidents[0]['created_at']}} <strong> </p>
    <p>Pocet osob v aute v case nehody: <strong>{{$count}}</strong></p> 
    <p>Zaznamenaná rýchlost vozidla : <strong> {{$accidents[0]['speed']}} km/h</strong></p> 
    @if($accidents[0]['car_position'][0] == 0) <p>Vozidlo sa aktuálne nachádze <strong> na kolesách </strong></p> @endif
    @if($accidents[0]['car_position'][0] == 1) <p>Vozidlo sa aktuálne nachádze <strong> na pravom boku </strong></p> @endif
    @if($accidents[0]['car_position'][0] == 2) <p>Vozidlo sa aktuálne nachádze <strong> na streche </strong></p> @endif
    @if($accidents[0]['car_position'][0] == 3) <p>Vozidlo sa aktuálne nachádze <strong> na pravom boku </strong></p> @endif


    <p>Predpokladaný príchodu záchranných zložiek na miesto nehody je : <strong>{{$time}}</strong></p> <br>


    <p>V prípade potreby, <a href = "https://www.google.com/maps/place/{{$accidents[0]['latitude']}},{{$accidents[0]['longitude']}}" target="_blank">kliknite sem</a> pre navigovanie na miesto nehody.</p>        
</body>
</html>