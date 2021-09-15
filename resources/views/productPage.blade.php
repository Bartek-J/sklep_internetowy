@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row mt-5">

    <div class="card  col-12 p-0">
      <div class="card-header"><a href="{{ route('product')}}">Wszystkie</a> >>
        <a href="{{'/products?'.$category->id.'=on' }}">{{ $category->name}}</a>
      </div>
      <div class="row pb-4 pt-4">
        <div class="col-sm-6 align-items-center justify-content-center text-center pl-5 pr-5">

          @if($product->photos->count())

          <div id="caro" class=" carousel slide" data-ride="carousel1">
            <ol class="carousel-indicators">
              @foreach ($product->photos as $photo)
              <li data-target="#caro" data-slide-to="{{ $loop->index }}" @if ($loop->first) class="active" @endif
                ></li>
              @endforeach
            </ol>
            <div class="carousel-inner">
              @foreach ($product->photos as $photo)
              @if($loop->first)
              <div class="carousel-item active">
                @else
                <div class="carousel-item">
                  @endif

                  <a href="{{asset('storage/uploads/'. $photo->photo)}}" data-lightbox="produkt"><img class="d-block img-fluid" src="{{asset('storage/uploads/'. $photo->photo)}}" alt="Photo"></a>
                </div>
                @endforeach

              </div>
              <a class="carousel-control-prev" href="#caro" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#caro" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>

            @else
            <span class="">Ten produkt nie posiada zdjęć</span>
            @endif
          </div>
          <div class="col-lg-6">
            <div class="container border-left">
              <h4 class="card-title pt-3">{{ $product->name}}</h4>
              <h5 class="card-title pt-2"><span id="price">{{ $product->price /100  }}</span>zł</h5>
              <form action="{{ route('add_to_cart', [ 'product' => $product->id ] )}}" method="get">

                <div class="input-group col-lg-7  ml-0 pl-0">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Ilość</span>
                  </div>
                  <input type="number" class="form-control" id="inputGroupSelect04" name='ile' min="1" max="10" value="1" style="min-width:45px;">

                  <div class="input-group-append">

                    <button class="btn btn-primary" type="submit" @if($product->active == 'no')
                      disabled
                      @endif
                      >Dodaj do koszyka
                    </button>
                  </div>
                </div>
                @if($product->category_id == '1')
                <div class="input-group mt-3 rounded ml-0 pl-0 col-lg-7">
                  <div class="input-group-append">
                    <span class="input-group-text rounded-left">Wybierz rozmiar</span>
                  </div>
                  <select class="custom-select" onchange="zmiana(this);" name='rozmiar'> 
                  <option value="0" >A5</option>
                  <option value="500" >A4</option>
                  <option value="2000" >A3</option>
                  </select>

                </div>
            
            @endif
            </form>


            @if($product->active == 'no')
            <span class="alert alert-danger mt-3">Produkt czasowo niedostępny</span>

            @endif

            <hr>
            <section class="font-weight-bold">Opis: </section>
            {{ $product->description}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
var price=parseFloat({{$product->price}});
function zmiana(a)
{
   var nowa = parseFloat(a.value);
  nowa = nowa + price;
  document.getElementById('price').innerHTML=nowa/100;
}
</script>
@endsection