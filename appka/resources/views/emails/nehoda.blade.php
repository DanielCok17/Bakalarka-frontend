@component('mail::message')
# Nehody vozidla s VIN čislom: {{$data['vin']}} 

<p>Dátum nehody: <strong> {{$data['created_at']}} <strong> </p>
    <p>Pocet osob v aute v case nehody: <strong>{{$count}}</strong></p> 
    <p>Zaznamenaná rýchlost vozidla : <strong> {{$data['speed']}} km/h</strong></p> 
    @if($data['car_position'][0] == 0) <p>Vozidlo sa aktuálne nachádze <strong> na kolesách </strong></p> @endif
    @if($data['car_position'][0] == 1) <p>Vozidlo sa aktuálne nachádze <strong> na pravom boku </strong></p> @endif
    @if($data['car_position'][0] == 2) <p>Vozidlo sa aktuálne nachádze <strong> na streche </strong></p> @endif
    @if($data['car_position'][0] == 3) <p>Vozidlo sa aktuálne nachádze <strong> na pravom boku </strong></p> @endif

    Predpokladaný príchodu záchranných zložiek na miesto nehody je :
    {{$time}}


@component('mail::button', ['url' => 'http://127.0.0.1:8000/welcome'])
Záchranné centrum
@endcomponent

S pozdravom,<br>
Záchranné centrum
@endcomponent
