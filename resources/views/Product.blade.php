@extends('layouts.app')

@section('content')


<div class="container-fluid pt-4">
    <div class="container">
        <div class="row">
            <div class=" col-lg-3 col-md-4 col-sm-6 pb-4">
                <div class="card card-filter">
                    <article class="card-group-item">
                        <div class="filter-content collapse show" id="collapse2">
                            <div class="card-body">
                                <form method="GET" action="{{route('product')}}">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Szukaj" type="text" name="name">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                <svg width="1.3em" height="1.3em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                                                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </article>
                    <form action="{{route('product')}}" method="get">
                        <article class="card-group-item">
                            <header class="card-header">
                                <a aria-expanded="false" href="#" data-toggle="collapse" data-target="#collapse223" class="collapsed">
                                    <h6 class="title">Sortowanie
                                        <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" id="collapse223" class="hide bi bi-chevron-down float-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </h6>
                                </a>
                            </header>
                            <div class="filter-content collapse" aria-expanded="false" id="collapse223">
                                <div class="card-body ">
                                    <ul class="list-unstyled list-lg">

                                        <li>
                                            <div class="form-check">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" name="sortowanie" value="domyslne" id="s1" checked>
                                                    <label for="s1" class="custom-control-label">Domyślne</label>
                                                </div>
                                            </div>
                                        </li>
                                        <li>

                                            <div class="form-check">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" name="sortowanie" id="s3" value="alfabetycznie" @if($sortowanie=='alfabetycznie' ) checked @endif>
                                                    <label for="s3" class="custom-control-label">Alfabetycznie</label>
                                                </div>
                                            </div>
                                        </li>
                                        <li>

                                            <div class="form-check">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" name="sortowanie" id="s2" value="rosnaco" @if($sortowanie=='rosnaco' ) checked @endif>
                                                    <label for="s2" class="custom-control-label">Cena rosnąco</label>
                                                </div>
                                            </div>
                                        </li>
                                        <li>

                                            <div class="form-check">
                                                <div class="custom-control custom-radio">
                                                    <input class="custom-control-input" type="radio" name="sortowanie" id="s4" value="malejaco" @if($sortowanie=='malejaco' ) checked @endif>
                                                    <label for="s4" class="custom-control-label">Cena malejąco</label>
                                                </div>
                                            </div>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </article>








                        <article class="card-group-item">
                            <header class="card-header">
                                <a aria-expanded="false" href="#" data-toggle="collapse" data-target="#collapse22">
                                    <h6 class="title">Kategorie
                                        <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" id="collapse22" class="hide bi bi-chevron-down float-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse22">
                                <div class="card-body ">
                                    <ul class="list-unstyled list-lg">
                                        <div class="custom-control custom-checkbox">
                                            <li class='pl-1'><input type="checkbox" name="categorie" id="option" value=""  class="custom-control-input" @if($all==1) checked @endif>
                                                <label for="option" class="font-weight-bold custom-control-label"> Wszystkie</label>
                                                <span class="float-right badge badge-light round text-secondary">{{$prodall}}</span></li>
                                            @foreach($categories as $category)

                                            <li class="pl-2"><input type="checkbox" name="{{$category->id}}" id="{{$category->name}}" class="subOption custom-control-input" @if(isset($_GET[$category->id]) || $all == 1 ) checked @endif
                                                >
                                                <label for="{{ $category->name }}" class="custom-control-label"> {{ $category->name }}</label>
                                                <span class="float-right badge badge-light round text-secondary">{{$category->products_active_count}} </span></li>




                                            @endforeach

                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </article>

                        <article class="card-group-item">
                            <header class="card-header">
                                <a aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse33">
                                    <h6 class="title">Cena
                                        <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" id="collapse33" class=" bi bi-chevron-down float-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </h6>
                                </a>
                            </header>

                            <div class="filter-content collapse show" id="collapse33">

                                <div class="card-body">

                                    <div class="form-now d-flex">
                                        <div class="form-group pr-1">
                                            <label>
                                                Od
                                            </label>
                                            <input class="form-control" min="0" type="number" id="Od" value='{{$bet1}}' name="from">
                                        </div>
                                        <div class="form-group  pl-1 text-right">
                                            <label>
                                                Do
                                            </label>
                                            <input class="form-control" type="number" id="Do" value='{{$bet2}}' name="to">
                                        </div>
                                    </div>
                                    <input type="text" class="js-range-slider" value="" />
                                </div>
                            </div>
                        </article>
                        <article class="card-group-item">
                            <header class="card-body pt-0 mt-0">
                                <button class="btn btn-block btn-outline-primary mt-3">Filtruj</button>
                            </header>
                        </article>
                    </form>
                </div>
            </div>
            <div class="col-md-9 col-sm-6">
                @if($prod>0)
                <div class="row">

                    <div class="row col-12 pb-4 text-center align-items-center pl-4">
                        <h3 class="pl-3">Znalezione produkty({{$prod}})</h3>
                    </div>


                    @foreach($products as $product)
                    <div class="col-lg-4  col-md-6 hover-shadow">
                        <figure class="card-product pb-2"> 
                        <a href="{{route('show', ['product' => $product->id])}}">
                            <div class="align-items-center text-center pt-2" style="height:150px">
                                @if($product->photos->count())

                                <img src="{{asset('storage/uploads/'. $product->photos->first()->photo )}}" class="card-img-top" style="height:140px; width:auto;">
                                @else
                                <img src="/storage/slider2.jpg" class="card-img-top">
                                @endif
                            </div>
                            
                            <figcaption class="info-wrap text-center">
                                <div class="container pt-2">
                                    <h6 class="title">{{$product->name }}</a></h6>
                                    <div class="price-wrap"><span class="price-new">{{$product->price / 100 }}zł</span></div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    @endforeach

                </div>
                <div class="row align-items-center justify-content-center">
                    {{ $products->withQueryString()->links()  }}
                </div>
                @else
                <div class="row">

                    <div class="row col-12 pb-4 text-center align-items-center pl-4">
                        <h3 class="pl-3">Nie znaleziono żadnych produktów</h3>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>




@endsection