<x-mail::message>
# New User Has Been Created

Hello {{ $user->name }}, <br>

A new user has been created with the following details: <br>

Name: {{ $user->name }} <br>
Email: {{ $user->email }} <br>
Password: "{{ $password }}" <br>
(Please change your password after login)

Please click the button below to login:
<x-mail::button :url="route('login')">
Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
