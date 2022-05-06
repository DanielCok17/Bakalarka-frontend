<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Nehody</title>
    <style>
        #tabble{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        #tabble td,#tabble th{
            border: 1px solid #ddd;
            padding: 8px;
        }
        #tabble tr:nth-child(even){
            background-color: ;
        }
        #tabble th{
            padding-top : 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            colout: &fff;
        }
        #rasto{
        width:85%;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        }
    </style>
</head>
<body>
<div id="rasto"> 
<a style="margin-right: 70%" href="http://127.0.0.1:8000/welcome" class="btn btn-info" role="button">Spať</a> <br>

<a href="http://127.0.0.1:8000/exportCsv" class="btn btn-info" role="button">Export csv</a> <br>



<table  id="tabble" style="width:9%">
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
    <th style="text-align:center">Vytvorené</th>
  </tr>
  <tbody>
    @foreach($accidents as $data)
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
            <td>{{$data['created_at']}}</td>
        </tr>
    @endforeach
   </tbody>    
</table>   
</div>
</body>
</html>