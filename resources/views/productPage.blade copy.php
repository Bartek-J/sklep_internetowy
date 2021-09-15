@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row mt-5">
    <div class="card mx-1">
      <div class="card-header"><a href="{{ route('product')}}">Wszystkie</a> >>
        <a href="{{'/products?'.$category->id.'=on' }}">{{ $category->name}}</a>
      </div>
      <div class="row pb-4 pt-4">
        <div class="col-sm-6 align-items-center justify-content-center text-center pl-5 pr-5">

          @if($product->photos->count())
          @foreach ($product->photos as $photo)

          <img src="{{asset('storage/uploads/'. $photo->photo)}}" style=" max-width: 100%;">

          @endforeach
          @else
          photo
          @endif
        </div>
        <div class="col-sm-6">
          <div class="container border-left">
            <h4 class="card-title pt-3">{{ $product->name}}</h4>
            <h5 class="card-title pt-2">{{ $product->price}}zł</h5>
            <form action="{{ route('add_to_cart', [ 'product' => $product->id ] )}}" method="get">
              <div class="input-group col-lg-7  ml-0 pl-0">
                <select class="custom-select" id="inputGroupSelect04" name='ile'>
                  <option value="1" selected disabled>Wybierz ilość</option>
                  @for($i=1 ; $i < 10 ; $i++) <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <div class="input-group-append">

                  <button class="btn btn-primary" type="submit">Dodaj do koszyka</button>
            </form>
          </div>
        </div>
        <hr>
        <section class="font-weight-bold">Opis: </section>
        {{ $product->description}}
      </div>

    </div>
  </div>
</div>
</div>
</div>
@endsection