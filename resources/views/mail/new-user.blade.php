<x-mail::message>
# New User Has Been Created

Hello {{ $user->name }},
A new user has been created with the following details:
Name: {{ $user->name }}
Email: {{ $user->email }}
Password: {{ $password }} (Please change your password after login)

Please click the button below to login:
<x-mail::button :url="route('login')">
Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
