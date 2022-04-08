@component('mail::message')
# Introduction

Email ohladne nehody

@component('mail::button', ['url' => ''])
Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
