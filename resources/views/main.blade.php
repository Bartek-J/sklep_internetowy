@extends('layouts.app')

@section('header')
<style>
.ads_sponsors div img{
	width:200px;
	height:150px;
}
</style>

@endsection

@section('content')



<div class="container-fluid justify-content-center">
    <div class="col-md-9 col-sm-12 mx-auto">
        <div id="carouselExampleControls" class="carousel slide rounded" data-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="{{ url('/products') }}">
                        <img class="d-block w-100" src="{{asset('storage/slider2.png')}}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="{{ url('/products') }}">
                        <img class="d-block w-100" src="{{asset('storage/slider4.png')}}" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block text-dark">
                            <h5></h5>
                            <p></p>
                        </div>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="{{ url('/products') }}">
                        <img class="d-block w-100" src="{{asset('storage/slider2.png')}}" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>
<div class="container">
    <div class="row pt-3 mt-5 text-center align-items-center justify-content-center mb-3">

    </div>
    <div class="row">
        <div class="col-12 overflow-hidden d-flex border rounded p-2" data-spy="scroll">
            @foreach($products as $product)
            <div class="col-lg-3 col-6 border-right" id="{{$loop->index}}">
                <div class="mx-3 pt-1 ">
                    <div class="card-img text-center" style="height:150px">
                        <a href="{{route('show', ['product' => $product->id])}}">
                            @if($product->photos->count())
                            <img src="{{asset('storage/uploads/'. $product->photos->first()->photo )}}" class="card-img-top" style="height:140px; width:auto;">
                            @else
                            <img src="/storage/slider2.jpg" class="card-img-top">
                            @endif
                    </div>
                    <div class="card-body border-top">
                        <h6 class="title">{{$product->name }}</a></h6>
                        <div class="price-wrap"><span class="price-new">{{$product->price / 100}}zł</span></div>
                    </div>
                </div>
            </div>
            @if($loop->last)
            <div class="pl-1"></div>
            @endif
            @endforeach
        </div>
    </div>

    {{--
    <div class="container-fluid">
        <div class="ads_sponsors">
            @foreach($products as $product)
            <div><img src="{{asset('storage/uploads/'. $product->photos->first()->photo )}}"></div>
            @endforeach
        </div>
    </div>
    --}}

    <div class="row bg-white border p-0 mt-5 mb-4 rounded mx-1">
        <div class="col-lg-6 p-3">
            <h3>O nas</h3>
            Nasz sklep zajmuje się sprzedawaniem plakatów oraz boxów

            In enim harum doloribus ducimus saepe possimus molestiae. Corrupti vero architecto et temporibus et fuga. Enim tempore ipsam voluptatem doloribus. Facere et ipsum nesciunt et. Delectus maxime voluptatem nesciunt expedita labore. Et omnis iste consequatur facere reprehenderit sit.
        </div>
        <div class="col-lg-6 p-0"> <img class="d-block w-100 rounded-right" src="{{ asset('storage/mainSiteDown.jpg') }}" alt="Photo"></div>

    </div>
    <div class="row"></div>
</div>

@endsection