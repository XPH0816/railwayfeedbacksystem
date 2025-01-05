<x-mail::message>
# Replied Feedback

Hello {{ $feedback->user->name }},

{{ $feedback->admin->name }} has replied to your feedback.

Feedback: {{ $feedback->content }}
Reply: {{ $feedback->reply }}

{{-- <x-mail::button :url="{{ route() }}"> --}}
{{-- View Reply --}}
{{-- </x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
