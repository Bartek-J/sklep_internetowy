 @extends('dashmain')

 @section('content')
 <div class="container-fluid">
     <h1 class="mt-4">Dodaj nowy kupon</h1>
     <div class="row">
         <div class="card-body col-md-8">
             <form action="{{route('NowyRabatAdd')}}" method="get">
                 <label for="nazwa">Nazwa kuponu</label>
                 <input type="text" name='nazwa' class="form-control" id="nazwa">
                 @if($errors->has('nazwa'))
                <span class="text-danger"> {{ $errors->first('nazwa') }}</span><br>
                @endif
                 <label for="ilosc">Ilość dostępnych użyć</label>
                 <input type="number" name='ilosc' class="form-control" id="ilosc" min="1" value="1">
                 @if($errors->has('ilosc'))
                <span class="text-danger"> {{ $errors->first('ilosc') }}</span><br>
                @endif
                 <label for="discount">Zniżka</label>
                 <div class="input-group">
                     <input type="number" name='discount' class="form-control"  min="1" id="discount">
                     <select name="type" class="custom-select col-2">
                         <option value="procent" selected>%</option>
                         <option value="kwota">zł</option>
                     </select>
                 </div>
                 @if($errors->has('discount'))
                <span class="text-danger"> {{ $errors->first('discount') }}</span><br>
                @endif
                 <label for="date">Data wygaśnięcia</label>
                 <input type="date" name="expires"  class="form-control" id="date">
                 @if($errors->has('expires'))
                <span class="text-danger"> {{ $errors->first('expires') }}</span><br>
                @endif
                
                    <label for="category">Kategoria</label>
                    <select name="category" id="category" class="custom-select">
                        <option value="all" selected>Wszystkie</option>
                        @foreach($cats as $cat)
                        <option value="{{$cat->id}}"> {{$cat->name}} </option>

                        @endforeach
                    </select>
                
                 <button type="submit" class=" btn btn-primary mt-3">Dodaj</button>
             </form>
         </div>
     </div>
 </div>



 @endsection