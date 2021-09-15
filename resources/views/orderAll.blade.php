 @extends('dashmain')

 @section('content')
 <div class="container-fluid">
     <h1 class="mt-4">Wszystkie Zamówienia</h1>
     <div class="row">
         <div class="card-body">
             <table class="table col-md-9">
                 <tr>
                     <th>Id zamówienia</th>
                     <th>Status</th>
                     <th>Data</th>
                     <th>Łączna kwota</th>
                     <th>Email zamawiającego</th> 
                     <th class="text-center">Szczegóły zamównienia</th> 

                 </tr>
                @foreach($orders as $order)
                <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->status}}</td>
                <td>{{$order->created_at}}</td>
                <td>{{$order->price}}zł</td>
                <td>{{$order->email}}</td>
                <td class="text-center"><a href="{{route('orderShow',  $order->id)}}" class="btn btn-primary">Szczegóły</button></td>
                </tr>
                @endforeach

             </table>
         </div>
     </div>
 </div>


 @endsection