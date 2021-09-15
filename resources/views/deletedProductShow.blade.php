 @extends('dashmain')

 @section('content')
 <div class="container-fluid">
     <h1 class="mt-4">Szczegóły usuniętego produktu</h1>
     <div class="row pl-5 pt-5">
         <div class='col-lg-5 col-md-5'>

             <div class="card">
                 <div class="card-body">
                     <div class="form-group">
                         <label for="nazwa">Nazwa produktu</label>
                         <input type="text" name="nazwa" value="{{ $product->name}}" id="nazwa" class='form-control' disabled>
                         @if($errors->has('nazwa'))
                         <span class="text-danger"> {{ $errors->first('nazwa') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label for="cena">Cena w zł</label>
                         <input type="number" name="cena" value="{{ $product->price}}" id="cena" class='form-control' min="0" max="10000" disabled>
                         @if($errors->has('cena'))
                         <span class="text-danger"> {{ $errors->first('cena') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label for="kategoria">Kategoria</label>
                         <select name="kategoria" id="kategoria" class='form-control custom-select' disabled>
                            <option>{{$product->category_id}}</option>
                         </select>

                     </div>
                     <div class="form-group">
                         <label for="ilosc">Ilość dostępnych</label>
                         <input type="number" name="ilosc" value="{{ $product->amount}}" id="ilosc" class='form-control' min="1" max="10000" disabled>

                     </div>
                     <div class="form-group">
                         <label for="opis">Opis</label>
                         <textarea name="opis" id="opis" rows="5" class="form-control" disabled>{{$product->description}}</textarea>

                     </div>


                     <a href="{{ route('przywroc', $product->id)}}" class="btn btn-success">Przywróć produkt</a>
                 </div>
             </div>
         </div>


     </div>
 </div>


 @endsection