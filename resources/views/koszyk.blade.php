@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        @if($cart->count() > 0)
        <div class="col-lg-8 mt-1">
            <table class="bg-white border rounded col-12 ">
                <tr class="border-bottom">
                    <th></th>
                    <th class="">Produkt</th>
                    <th>Ilość</th>
                    <th>Cena</th>
                    <th class="text-right pr-3"></th>
                </tr>
                @foreach($cart as $item)
                <tr class="border-bottom">
                    <td class="pl-4 pb-2 pt-2">
                        @if($item->attributes->photo)
                        
                        <img src="{{asset('storage/uploads/'. $item->attributes->photo )}}" style="width:80px">
                        @else
                        <img src='/storage/koszykphoto.jpg' style="width:80px">
                        @endif
                    </td>
                    <td><a href="{{route('show', ['product' => $item->id])}}">{{$item->name}}
                        @if($item->attributes->format)
                        <span class="text-muted">(Format {{$item->attributes->format}})</span>
                        @endif
                    </a></td>
                    <td class=" text-left">
                        <button type="submit" class="btn p-0" form="{{'min'.$item->id}}">

                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-dash-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path fill-rule="evenodd" d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </button>
                        <input type='number' value='{{$item->quantity}}' disabled style="width:40px; text-align: center;">
                        
                        <button type="submit" class="btn p-0" form="{{'plus'.$item->id}}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z" />
                                <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z" />
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            </svg>
                        </button>
                        
                        <form action="{{ route('plus', [ 'id' => $item->id ])}}" method="POST" class="w-25  m-0 p-0" id="{{'plus'.$item->id}}">
                            @csrf
                            @method('PATCH')

                        </form>
                        <form action="{{ route('minus', [ 'id' => $item->id ])}}" method="POST" class="w-25 m-0 p-0" id="{{'min'.$item->id}}">
                            @csrf
                            @method('PATCH')

                        </form>
                    </td>
                    <td>{{$item->price * $item->quantity / 100 }}zł</td>
                    <td>
                        <form action="{{ route('usun_przedmiot', [ 'id' => $item->id ])}}" method="POST" class="p-0 m-0" id="{{'odejmij'.$item->id}}">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button type="submit" class="btn" form="{{'odejmij'.$item->id}}">
                            <svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z" />
                                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z" />
                            </svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </table>
            @foreach($condition as $cond)
            <table class="border rounded col-12 mt-3 bg-white">
                <tr class="border-bottom">
                    <th></th>
                    <th>Kupon rabatowy</th>
                    <th>Zniżka</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr class="text-success">
                    <td></td>
                    <td>
                        {{$conds}}
                    </td>
                    <td>
                        @if(is_int($cond->getValue())) {{$cond->getAttributes()['znizka']/100 .'zł'}}
                        @else {{$cond->getAttributes()['znizka'] }} @endif
                    </td>
                    <td></td>
                    <td>
                        <a href="{{route('usunRabat')}}" class="btn text-success">
                            <svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z" />
                                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z" />
                            </svg>
                        </a>
                    </td>
                </tr>
            </table>
            @endforeach
        </div>
        <div class="col-lg-4 mt-1">
            <div class="card w-100">
                <div class="card-header">Łącznie produktów:{{$numberofprods}}</div>
                <div class="card-body">
                    <h4>Suma łącznie:{{ $total }}zł</h4>

                    <form action="{{route('rabat')}}" method="GET">
                        <div class="input-group mt-4">
                            <input type="text" class="form-control" placeholder="Kod rabatowy" name="coupon">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Odbierz</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body pt-0 mt-0">
                    <a href="{{route('product')}}" class="btn btn-block btn-outline-primary mt-3">Powrót do zakupów</a>
                    <a href="{{route('zamow')}}" class="btn btn-block btn-primary mt-3">Zamawiam i płacę</a>
                </div>
            </div>
        </div>
        @else
        <div class="row h-auto align-items-center justify-content-center col-12 mt-5 pt-5">
            <div class="text-center col-12">
                <h2>Wygląda na to, że Twój koszyk jest pusty</h2>
                <h3>Szukasz inspiracji?</h3>
                <h4><a href="{{route('product')}}">Przedź do produktów</a></h4>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection