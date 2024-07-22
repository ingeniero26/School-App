@component('mail::message')
Hola,{{ $user->name }},
<p>Este mensaje es de la aplicacion app.school</p>

{{ $user->send_message }},

{{ config('app.name') }}
@endcomponent