 @extends('dashmain')

 @section('content')
 <div class="container-fluid">
     <h1 class="mt-4">Wszystkie kupony</h1>
     <div class="row">
         <div class="card-body">
             <table class="table col-md-9">
                 <tr>
                     <th>Kod</th>
                     <th>Ilość użyć</th>
                     <th>Wygasa</th>
                     <th>Zniżka</th>
                     <th>data utworzenia</th>
                     <th>Kategorie</th>
                     <th>Usuń</th>
                     
                    
                 </tr>
                 @foreach($coupons as $coupon)
                 <tr>
                     <td> {{$coupon->name}} </td>
                     <td> {{$coupon->quantity}} </td>
                     <td> {{$coupon->expires_at}} </td>
                     <td> {{$coupon->discount}} @if($coupon->type == 'procent') % @else zł @endif </td>
                     <td> {{$coupon->created_at}} </td>
                     <td> {{$coupon->categoryName}} </td>
                     <td>
                         <form action="{{route('deleteCoupon',$coupon->id)}}" method="post">
                             @csrf
                             @method('DELETE')
                         <button class="btn btn-danger">Usuń</button>
                         </form>
                    </td>
                    
                 </tr>
                 @endforeach
             </table>
         </div>
     </div>
     <div class="row">
         <a href="{{route('NowyRabat')}}" class="btn btn-primary">Dodaj nowy</a>
     </div>
 </div>
 


 @endsection