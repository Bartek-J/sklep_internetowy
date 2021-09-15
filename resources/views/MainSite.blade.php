 @extends('dashmain')

 @section('content')
 <div class="container-fluid pt-5">
     <h1 class="">Edycja Strony Głównej</h1>
     <form action="{{ route('MainSiteEdit') }}" method="POST">
         <div class="row mt-4">
             <div class="col-5">
                 <div class="card">
                     <div class="card-header">
                         Pierwszy Produkt
                     </div>
                     <div class="card-body">
                         <select class="custom-select" name="FirstProduct">
                             @foreach($products as $product)
                             <option value="{{$product->id}}"> {{$product->name}} </option>
                             @endforeach
                         </select>
                     </div>
                 </div>
             </div>
             <div class="col-5">
                 <div class="card">
                     <div class="card-header">
                         Drugi Produkt
                     </div>
                     <div class="card-body">
                         <select class="custom-select" name="SecondProduct">
                             @foreach($products as $product)
                             <option value="{{$product->id}}"> {{$product->name}} </option>
                             @endforeach
                         </select>
                     </div>
                 </div>
             </div>
         </div>
         <button type="submit" class="btn btn-primary mt-4">Zapisz zmiany</button>
     </form>
 </div>


 @endsection