<x-mail::message>
# Replied Feedback

Hello {{ $feedback->user->name }},

{{ $feedback->admin->name }} has replied to your feedback.

Feedback: <br>
``{{ $feedback->content }}``

Reply: <br>
``{{ $reply->content }}``

{{-- <x-mail::button :url="{{ route() }}"> --}}
{{-- View Reply --}}
{{-- </x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
