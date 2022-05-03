<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>WELCOME</title>
</head>

<style>
table, th, td {
  border:1px solid black;
}
h2{text-align: center;}
td{text-align: center;}
input{text-align: center;}
body{
  width: 100%;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
}
#m{
  width: 60%;  
}

#tach{
  justify-content:left;
}
#rasto{
  width:85%;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
}

.sticky-footer {
  width:100%;
  color: white;
  background: #a62424;
  background: linear-gradient(90deg, #a62424 42%, #741919 75%);
}
.sticky-footer h6 {
  font-weight: 700;
  text-transform: uppercase;
  margin-bottom: 20px;
}
.sticky-footer .wide-container span, .sticky-footer .wide-container a {
  color: rgba(255, 255, 255, 0.8);
  margin-top: 7px;
  transition: 0.3s;
}
.sticky-footer .wide-container a:hover {
  color: white;
  text-decoration: none;
}
.sticky-footer .social-links {
  padding: 25px 0px;
}
.sticky-footer .social-links a {
  display: inline-block;
  height: 30px;
  width: 30px;
  background: white;
  border-radius: 100%;
  text-align: center;
  margin: 5px;
  color: #a62424;
  transition: 0s !important;
}
.sticky-footer .social-links a i {
  line-height: 30px;
}
.sticky-footer .social-links a:hover {
  color: #841c1c;
  transform: scale(1.1);
}
.sticky-footer .sponsors, .sticky-footer .links, .sticky-footer .contact_us {
  padding: 25px 0px;
}
.sticky-footer .sponsors a {
  vertical-align: top;
  height: 100%;
}
.sticky-footer .sponsors img {
  margin-top: -7px;
}
.sticky-footer .sponsors .nocr_logo {
  margin-top: 15px;
}
.sticky-footer .sponsors .nocr_logo img {
  border-radius: 3px;
}
.sticky-footer .sponsors .museum_logo {
  margin-top: 15px;
}
.sticky-footer .sponsors .museum_logo img {
  margin-left: 10px;
}
.sticky-footer .sponsors .slovakia_travel_logo {
  margin-top: 15px;
}
.sticky-footer .sponsors .slovakia_travel_logo img {
  margin-left: 10px;
}
.sticky-footer .footer-logo {
  max-height: 30px;
}
.sticky-footer .copyright {
  padding: 7px;
  background: rgba(0, 0, 0, 0.2);
}
.sticky-footer .copyright a, .sticky-footer .copyright span {
  color: white;
}
.sticky-footer .footer_logo {
  height: 100px;
  position: absolute;
}

.nav-item
{ 
 {
   border-bottom: 1px solid rgba(0,0,0,0.1);
   &:last-child
  {
    border: none;
  }
}
}

.body {
    min-height: 100vh;
    max-width: 400px;
    background-color: papayawhip; 
    margin: 0 auto;
}

#car_img{
  height: 500px; 
  width: 700px;
  align: left;
}

.table{
    table-layout: auto;
    width: 300px;
}

</style>

<body>
    <h2>Záchranné stredisko</h2>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">č.</th>
                <th scope="col" style="text-align:center">VIN</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <p>{{$count}}</p>
            <tbody>

            @for($i = 0; $i < $count; $i++)
                <tbody>
                    <th  scope="row">{{$i+1}}</th>
                    <th class="table-danger">{{$data[$i]['vin']}}</th>
                    <td><a href="http://127.0.0.1:8000/record/{{$data[$i]['_id']}}" target="_blank">Zobraziť</a></td>
                </tbody>
            @endfor
        </table>

    
    <p>Homepage</p>
</body>

<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span class="text-center">&copy; Copyright {{ now()->year }} | Záchranné centrum | <a href="https://github.com/DanielCok17/Bakalarka-frontend/tree/master/appka" target="_blank"> Github </a></span>
    </div>
  </div>
</footer>
</html>