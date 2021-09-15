
@component('mail::message')
Twoje zamówienie zostało złożone!<br>
Data:{{$order->created_at}}
@component('mail::table')
| Produkt      | Ilość         | Cena |
| ------------- |:-------------:| --------:|
@foreach($cart as $item)
| {{$item->name}}      | {{$item->quantity}}     | {{$item->price}} zł     |
@endforeach
@endcomponent

@component('mail::panel')
Łączna kwota:{{$order->price}} zł
@endcomponent

Dziękujemy,<br>
Huge Pic
@endcomponent
