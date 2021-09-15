 @extends('dashmain')

 @section('content')
 <div class="container-fluid">
     <h1 class="mt-4">Wszystkie produtky ({{$allprods}})</h1>
     <div class="row">
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             
                         <th>Nazwa</th>
                             <th>Kategoria</th>                           
                             <th>Cena</th>
                             <th>ilość</th>
                             <th  class="text-center">Edytuj produkt</th>
                         </tr>
                     </thead>

                     <tbody>

                         @foreach($products as $product)
                         <tr>

                             
                             <td>{{$product->name}}</td>
                             <th>{{$product->category->name}}</th>
                             <td>{{$product->price}}zł</td>
                             <td>{{$product->amount}}</td>
                             <td class="text-center"><a href="{{route('productShow', $product->id)}}" class="btn btn-primary">Edytuj</a>
                             <button class="btn btn-danger" type="submit" form="{{$product->id}}">Usuń</button>
                             <form id="{{$product->id}}" action="{{route('deleteProduct',$product->id)}}" method="POST" onsubmit="return confirm('Czy jesteś pewien, że chcesz usunąć ten produkt?')">
                             @csrf
                             @method('DELETE')
                             
                             </form>
                             </td>
                         </tr>
                         @endforeach



                     </tbody>
                 </table>
                 <div class="row mx-auto">
    <div class="col-12  mx-auto">
        {{ $products->links()}}
    </div>
</div>
             </div>
         </div>
     </div>
 </div>
 
 @endsection