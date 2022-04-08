<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nehody</title>
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
    </style>
</head>
<body>
    <table id="tabble">
        <thead>
            <tr>
                <th>ID</th>
                <th>Vin</th>
                <th>created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accidents as $data)
            <tr>
            <td>{{$data['_id']}}</td>
            <td>{{$data['vin']}}</td>
            <td>{{$data['created_at']}}</td>
            </tr>

            @endforeach
        </tbody>
    </table>     
</body>
</html>