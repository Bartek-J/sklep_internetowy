 @extends('dashmain')

 @section('content')
 <div class="container-fluid">
     <h1 class="mt-4">Edytuj metodę dostawy</h1>
     <div class="row pl-5 pt-5">
         <form class='col-lg-5 col-md-5' action="{{route('shippingAdd')}}" method="GET">
             <div class="card">
                 <div class="card-body">
                     <div class="form-group">
                         <label for="nazwa">Nazwa</label>
                         <input type="text" name="nazwa" value="" id="nazwa" class='form-control'>
                         @if($errors->has('nazwa'))
                         <span class="text-danger"> {{ $errors->first('nazwa') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                     <label for="price">Koszt przesyłki (zł)</label>
                     <input type="number" name="price" value="" id="price" class="form-control">
                     @if($errors->has('price'))
                         <span class="text-danger"> {{ $errors->first('price') }}</span>
                         @endif
                     </div>
                     <div class="input-group-prepend mb-3">
                         <div class="input-group-text col-9">
                            Płatność za za pobraniem
                         </div>
                         <select class="form-control col-3 custom-select" name="ZaPobraniem">
                             <option value="no">Nie</option>
                             <option value="yes">Tak</option>
                         </select>
                         
                     </div>
                     <button type="submit" class="btn btn-primary">Dodaj</button>
                 </div>
             </div>
         </form>
     </div>
 </div>



 @endsection