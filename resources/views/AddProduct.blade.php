 @extends('dashmain')

 @section('content')
 <div class="container-fluid">
     <h1 class="mt-4">Dodaj nowy Produkt</h1>
     <div class="row pl-5 pt-5">
         <form class='col-lg-5 col-md-5' action="{{route('productNewAdd')}}" method="GET">
             <div class="card">
                 <div class="card-body">
                     <div class="form-group">
                         <label for="nazwa">Nazwa produktu</label>
                         <input type="text" name="nazwa" value="" id="nazwa" class='form-control'>
                         @if($errors->has('nazwa'))
                         <span class="text-danger"> {{ $errors->first('nazwa') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label for="cena">Cena w zł</label>
                         <input type="number" name="cena" value="" id="cena" class='form-control' min="0" max="10000">
                         @if($errors->has('cena'))
                         <span class="text-danger"> {{ $errors->first('cena') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label for="kategoria">Kategoria</label>
                         <select name="kategoria" id="kategoria" class='form-control'>
                             @foreach($categories as $category)
                             <option value='{{$category->id}}'>{{$category->name}}</option>
                             @endforeach
                         </select>
                         @if($errors->has('kategoria'))
                         <span class="text-danger"> {{ $errors->first('kategoria') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label for="ilosc">Ilość dostępnych</label>
                         <input type="number" name="ilosc" value="" id="ilosc" class='form-control' min="1" max="10000">
                         @if($errors->has('ilosc'))
                         <span class="text-danger"> {{ $errors->first('ilosc') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label for="opis">Opis</label>
                         <textarea name="opis" id="opis" rows="5" class="form-control"></textarea>
                         @if($errors->has('opis'))
                         <span class="text-danger"> {{ $errors->first('opis') }}</span>
                         @endif
                     </div>


                     <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                 </div>
             </div>
         </form>
     </div>
 </div>


 @endsection