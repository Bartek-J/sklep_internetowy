@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <h4> Ustawienia</h4>

  </div>
  <form id="form-change-haslo" role="form" method="POST" action="{{route('zmiana')}}">
    @method('PATCH')
    <div class="col-md-9">
      <div class="col-sm-8">
        <div class="form-group font-weight-bold">
          E-mail: {{Auth()->user()->email}}
        </div>
      </div>
      <label for="nazwa" class="col-sm-4 control-label">Edytuj nazwę konta</label>
      <div class="col-sm-8">
        <div class="form-group">

          <input type="text" class="form-control" id="nazwa" name="nazwa" placeholder="" value="{{ Auth()->user()->name }}">
          @if($errors->has('nazwa'))
          <span class="text-danger">Wprowadzono niepoprawną nazwę</span>
          @endif
        </div>
      </div>
      <h5>Zmień hasło(w przeciwnym razie zostaw puste)</h5>
      <label for="aktualne-haslo" class="col-sm-4 control-label">Aktualne hasło</label>
      <div class="col-sm-8">
        <div class="form-group">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="password" class="form-control" id="aktualne-haslo" name="aktualne-haslo" placeholder="Aktualne hasło">
        </div>
      </div>
      <label for="haslo" class="col-sm-4 control-label">Nowe hasło</label>
      <div class="col-sm-8">
        <div class="form-group">
          <input type="password" class="form-control" id="haslo" name="haslo" placeholder="Nowe hasło">
          @if($errors->has('haslo'))
          <span class="text-danger">{{$errors->first('haslo')}}</span>
          @endif
        </div>
      </div>
      <label for="haslo_potwierdzenie" class="col-sm-4 control-label">Powtórz hasło</label>
      <div class="col-sm-8">
        <div class="form-group">
          <input type="password" class="form-control" id="haslo_potwierdzenie" name="haslo_potwierdzenie" placeholder="Powtórz nowe hasło">
          @if($errors->has('haslo_potwierdzenie'))
          <span class="text-danger">{{$errors->first('haslo_potwierdzenie')}}</span>
          @endif
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-5 col-sm-6">
        <button type="submit" class="btn btn-danger">Zmień</button>
      </div>
    </div>
  </form>
</div>
@endsection