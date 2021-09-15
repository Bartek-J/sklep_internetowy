@component('mail::message')

@component('mail::panel')
Od: {{ $request->input('email') }}
@endcomponent

{{ $request->input('main') }}


@endcomponent
