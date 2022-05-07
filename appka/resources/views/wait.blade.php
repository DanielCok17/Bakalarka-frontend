<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Riešenie nehody</title>
</head>

<style>
    #rasto{
  width:85%;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
}
</style>
<body>
<div id="rasto">
    <br>
    <br>

    <h1>Záchranné zložky boli poslané na miesto</h1>
    <br>
    <h2>Prajete si napriek tomu prejsť na prehľad nehody?
    <a href="http://127.0.0.1:8000/record/{{$data['_id']}}" class="btn btn-success" role="button">Áno</a>
    <a href="http://127.0.0.1:8000/welcome" class="btn btn-secondary" role="button">Nie</a>
    </h2>
    
</div>
</body>
</html>