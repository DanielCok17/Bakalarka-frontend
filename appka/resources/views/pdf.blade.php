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
            width: 60%;
        }
        #tabble li,#tabble th{
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

<h2>{{$data['created_at']}} bola evidovaná dopravná nehoda vozidla s VIN číslom: {{$data['vin']}}.</h2><br>

</div>
</body>
</html>