@extends('layouts.app')

@section('content')
<div class="container pt-5 mt-4">
@guest
    <div class="card mb-5">
        <div class="card-header">
            Jesteś niezalogowany
        </div>
        <div class="card-body">
            Zalecamy składanie zamówień jako zalogowany użytkownik w celu uzyskania większego bezpieczeństwa oraz odblokowania wszystkich możliwości.<br>
            <a href="{{ route('login') }}" class="text-info">Zaloguj lub zarejestruj się</a> 
        </div>
    </div>
@endguest
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Twoje zamówienie</span>
                <span class='badge badge-secondary badge-pill'>{{$numberofprods}}</span>
            </h4>
            <ul class="list-group mb-3">
                @foreach ($cart as $product)
                <li class='list-group-item d-flex justify-content-between lh-condensed'>
                    <div>
                        <h6 class='my-0'>{{$product->name}}
                        @if($product->attributes->format)
                        <span class="text-muted">(Format {{$product->attributes->format}})</span>
                        @endif
                        </h6>
                        <small class='text-muted'>Ilość:{{$product->quantity}}</small>
                    </div>
                    <span class='text-muted'>{{$product->price * $product->quantity / 100}}zł</span>
                </li>
                @endforeach

                @foreach($condition as $cond)
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Kod rabatowy</h6>
                        <small>{{$conds}}</small>
                    </div>
                    <span class="text-success">
                    @if(is_int($cond->getValue())) {{$cond->getAttributes()['znizka']/100 .'zł'}}
                        @else {{$cond->getAttributes()['znizka'] }} @endif
                    </span>
                </li>
                @endforeach

                <li class='list-group-item d-flex justify-content-between lh-condensed'>
                    <div>
                        <h6 class='my-0'>Dostawa</h6>
                        <small class='text-muted' id="sposobdostawy">
                            
                        </small>
                    </div>
                    <span class='text-muted' id="kwotadostawy"></span>
                </li>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Suma łącznie(PLN)</span>
                    <strong id="lacznakwota">{{$total}}zł</strong>
                </li>
            </ul>
            <form class="card p-2" action="{{route('rabat')}}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Kod rabatowy" name="coupon">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Odbierz</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 order-md-1">

            <h4 class="mb-3 text-muted">Dane Osobowe</h4>
            <form action="{{route('dodajzamowienie')}}" method="POST">
                @csrf
                @guest
                <label for="email">Twój email</label>
                <input type="email" class="form-control mb-3" name="email" id="email">
                @else
                <input type="email" class="form-control" name="email" id="email" hidden value="{{auth()->user()->email}}">
                @endguest
                @if($errors->has('email'))
                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                        @endif
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Imię</label>
                        <input type="text" name="Name" class="form-control" id="firstName" placeholder="Imię" value="">
                        @if($errors->has('Name'))
                        <span class="text-danger"> {{ $errors->first('Name') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Nazwisko</label>
                        <input type="text" name="SurName" class="form-control" id="lastName" placeholder="Nazwisko" value="">
                        @if($errors->has('SurName'))
                        <span class="text-danger"> {{ $errors->first('SurName') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address">Ulica i nr domu</label>
                    <input type="text" name="recipientStreet" class="form-control" id="address" placeholder="Krakowska 3a">
                    @if($errors->has('recipientStreet'))
                    <span class="text-danger"> {{ $errors->first('recipientStreet') }}</span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-9 mb-9">
                        <label for="city">Miejscowość</label>
                        <input type="text" name="recipientCity" class="form-control" id="city" placeholder="Miejscowość">
                        @if($errors->has('recipientCity'))
                        <span class="text-danger"> {{ $errors->first('recipientCity') }}</span>
                        @endif
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Kod pocztowy</label>
                        <input type="text" name="recipientPostalCode" class="form-control" id="zip" placeholder="00-000">
                        @if($errors->has('recipientPostalCode'))
                        <span class="text-danger"> {{ $errors->first('recipientPostalCode') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="tel">Telefon</label>
                        <input type="tel" name="recipientPhoneNumber" id="tel" class="form-control" placeholder="">
                        @if($errors->has('recipientPhoneNumber'))
                        <span class="text-danger"> {{ $errors->first('recipientPhoneNumber') }}</span>
                        @endif
                    </div>
                    <div class="col-md-7 mb-6">
                        <label for="comm">Komentarz do zamówienia<span class="text-muted">(Opcjonalnie)</span></label>
                        <textarea class="form-control" id="comm" rows="1" name="comment"></textarea>
                    </div>
                </div>
                <hr class="mb-4">
                <h4 class="mb-3 text-muted">Sposób doręczenia (Zamówienia od 200zł mają darmową wysyłkę)</h4>
                <div class="d-block my-3">
                @foreach($shippings as $shipping)
                <div class="custom-control custom-radio">
                        <input id="{{$shipping->id}}" name="delieveryMethod" type="radio" class="custom-control-input" value="{{$shipping->id}}" onclick="dostawa(this);">
                        <label class="custom-control-label" for="{{$shipping->id}}" id="{{'ship'.$shipping->id}}"> 
                       <span id="{{'n'.$shipping->id}}"> {{ $shipping->name }} </span>
                        <span class="text-secondary"> (+{{$shipping->price}}zł)
                        @if($shipping->ZaPobraniem == 'yes')
                        (Płatność za pobraniem)
                        @endif
                        </span>
                        <span style="display:none" id="{{'c' . $shipping->id }}"> {{$shipping->price}} </span>
                    </label>
                    </div>
                @endforeach
               @if($errors->has('delieveryMethod'))
               <span class="text-danger"> Musisz wybrać sposób dostawy</span>
               @endif
                </div>
                <hr class="mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address" name="regulamin">
                    <label class="custom-control-label" for="same-address">Akceptuję <a href="{{route('regulamin')}}" target='_blank' class="text-info">regulamin</a> sklepu</label>

                    @if($errors->has('regulamin'))
                    <br>
                    <span class="text-danger"> Musisz zaakceptować regulamin naszego sklepu!</span>
                    @endif


                </div>
                <hr>
                <button class="btn btn-outline-primary btn-lg btn-block" type="submit">Przejdź do płatności</button>
            </form>
        </div>
    </div>
    <script>
        var totala = {{$total}} * 100;
        var a, b, c;

        function dostawa(t) {
            var you = t.value;
            b = document.getElementById('n' + you).innerHTML;
            if(totala >= 20000 )
            {
                c = 0;
            }
            else
            {
                c = document.getElementById('c' + you).innerHTML;
            }
            
            a = (totala + parseInt(c)*100)/100;
            
            document.getElementById('sposobdostawy').innerHTML = b;
            document.getElementById('kwotadostawy').innerHTML = c + "zł";
            document.getElementById('lacznakwota').innerHTML = a + "zł";
        }
    </script>

</div>
@endsection