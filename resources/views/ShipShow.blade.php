 @extends('dashmain')

 @section('content')
 <div class="container-fluid">
     <h1 class="mt-4">Edytuj metodę dostawy</h1>
     <div class="row pl-5 pt-5">
         <form class='col-lg-5 col-md-5' action="{{route('shippingUpdate',$shipping->id)}}" method="POST">
             @csrf
             @method("PATCH")
             <div class="card">
                 <div class="card-body">
                     <div class="form-group">
                         <label for="nazwa">Nazwa</label>
                         <input type="text" name="nazwa" value="{{ $shipping->name}}" id="nazwa" class='form-control'>
                         @if($errors->has('nazwa'))
                         <span class="text-danger"> {{ $errors->first('nazwa') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label for="price">Koszt przesyłki (zł)</label>
                         <input type="number" name="price" value="{{ $shipping->price}}" id="price" class="form-control">
                         @if($errors->has('price'))
                         <span class="text-danger"> {{ $errors->first('price') }}</span>
                         @endif
                     </div>
                     <div class="input-group-prepend mb-3">
                         <div class="input-group-text col-9">
                            Płatność za za pobraniem
                         </div>
                         <select class="form-control col-3 custom-select" name="ZaPobraniem">
                             <option value="no"
                             @if( $shipping->ZaPobraniem == 'no') selected @endif
                             >Nie</option>
                             <option value="yes"
                             @if( $shipping->ZaPobraniem == 'yes') selected @endif
                             >Tak</option>
                         </select>
                         
                     </div>


                     
                   

                     <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                 </div>
             </div>
         </form>
     </div>
     <div class="row pl-5 pt-5">
         <form class='col-lg-5 col-md-5' action="{{route('shippingDelete', $shipping->id)}}" method="post">
             @csrf
             @method('DELETE')
             <div class="card">
                 <div class="card-body">

                     <button type="submit" class="btn btn-danger">Usuń tę metodę</button>
                 </div>
             </div>
         </form>
     </div>
 </div>



 @endsection