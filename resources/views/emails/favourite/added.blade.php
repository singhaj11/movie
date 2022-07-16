@component('mail::message')
{{-- # Introduction --}}

Hi, {{ $user->name }}
Movie '{{ $movie->title }}' has been added to you favourite list.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
