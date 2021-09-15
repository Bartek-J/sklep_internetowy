@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row">
    <div class="card col-md-8 p-0">
      <div class="card-header col-12">
        <h4> Jakieś pytania? Napisz do nas!</h4>
      
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <form action="{{route('wiadomosc')}}" method="POST">
              @csrf
              <label for="email">Twój email</label>
              <input type="email" class="form-control" name="email" id="email">
              @if($errors->has('email'))
              <span class="text-danger"> {{ $errors->first('email') }}</span><br>
              @endif
              <label for="title" class="mt-3">Tytuł</label>
              <input type="text" class="form-control" name="title" id="title">
              @if($errors->has('title'))
              <span class="text-danger"> {{ $errors->first('title') }}</span><br>
              @endif
              <label for="main" class="mt-3">Zapytanie</label>
              <textarea class="form-control" id="main" name="main"></textarea>
              @if($errors->has('main'))
              <span class="text-danger"> {{ $errors->first('main') }}</span><br>
              @endif
              <button type="submit" class="btn btn-secondary mt-4 col-12">Wyślij</button>
            </form>
          </div>

          <div class="col-md-6">
          <img src="/storage/kontakt.jpg" class="card-img-top">
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection