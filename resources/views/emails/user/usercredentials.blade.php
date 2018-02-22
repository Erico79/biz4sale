<title>County</title>
@component('mail::message')
# Kiambu County assembly.
Dear {{ $user->name }},

Welcome to Kiambu county assembly document management system.

Use the credentials below to login to the mobile app and change your password.<br>
Email: {{ $user->email }}<br>
Password: 123456

{{--@component('mail::button', ['url' => 'hbkh','color'=>'green'])--}}
{{--Confirm Email--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
