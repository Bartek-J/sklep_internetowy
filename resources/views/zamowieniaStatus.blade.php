@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @if($orders->count()> 0)
    <h4> Twoje zamówienia</h4>
  </div>
  @foreach($orders as $order)
  <div class="row card mt-4">
    <table class="table mb-0">
      <tr>
        <td>ID zamówienia</td>
        <td>{{ $order->id }}</td>
      </tr>
      <tr>
        <td>Łączna kwota</td>
        <td>{{ $order->price }}zł</td>
      </tr>
      <tr>
        <td>Data złożenia</td>
        <td>{{ $order->created_at }}</td>
      </tr>
      <tr>
        <td>Status</td>
        <td>{{ $order->status }}</td>
      </tr>
      <tr>
        <td>Dostawa</td>
        <td>{{ $order->dostawy->name }}
          @if($order->dostawy->ZaPobraniem == 'yes') <span class="text-muted">(Płatnośc za pobraniem)</span> @endif
        </td>
      </tr>
      <tr>
        <td colspan="2" class="pl-5 ml-5" style="font-size:120%">Zamawiane produkty:</td>
      </tr>
    </table>
    <table class="table table-bordered col-10 ml-5">
      @foreach($order->products as $product)
      <tr>
        <td> <a href="{{route('show', ['product' => $product->product_id])}}">{{$product->product->name}}</a></td>
        <td> Ilość: {{$product->quantity}} </td>
        <td> Cena jednostkowa: {{$product->product->price}}zł </td>
      </tr>
      @endforeach
    </table>
  </div>
  @endforeach
</div>
@else
<div class="row col-12 justify-content-center">
  <div class="mt-5 text-secondary text-center col-12 justify-content-center">
  <h2>Nie posiadasz jeszcze żadnych zamówień!</h2>
  </div>
</div>
@endif

@endsection