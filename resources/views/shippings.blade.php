 @extends('dashmain')

 @section('content')
 <div class="container-fluid">
     <h1 class="mt-4">Metody dostaw</h1>
     <div class="row">
         <div class="card-body">
             <table class="table col-md-4">
                 <tr>
                     <th>Nazwa</th>
                     <th>Cena</th>
                     <th>Płatność za pobraniem</th>
                     <th class="text-center">Edytuj</th>
                 </tr>
                 @foreach($ships as $ship)
                 <tr>
                     <td> {{$ship->name}} </td>
                     <td> {{$ship->price}} zł</td>
                     <td> {{$ship->ZaPobraniem}} </td>
                     <td class="text-center"> <a href="{{route('shipShow', $ship->id)}}" class="btn btn-primary">Edytuj</a> 
                      
                      </td>
                 </tr>
                 @endforeach
             </table>
             <a href="{{route('shippingNew')}}" class="btn btn-primary">Dodaj nową</a>
         </div>
     </div>
 </div>


 @endsection