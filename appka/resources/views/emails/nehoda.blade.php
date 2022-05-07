@component('mail::message')
# Email ohladne nehody

Vozidlo s VIN čislom: {{$data['vin']}} 

@component('mail::button', ['url' => 'http://127.0.0.1:8000/welcome'])
Záchranné centrum
@endcomponent

S pozdravom,<br>
{{ config('app.name') }}
@endcomponent
