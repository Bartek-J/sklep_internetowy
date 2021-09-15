@component('mail::message')

@component('mail::panel')
{{$dane['header']}}
@endcomponent

{{$dane['main']}}

@if($dane['przycisk'] == 1)
@component('mail::button', ['url' => $dane['link'] ])
{{$dane['przyciskopis']}}
@endcomponent
@endif

Pozdrawiamy,<br>
Huge Pic
@endcomponent
