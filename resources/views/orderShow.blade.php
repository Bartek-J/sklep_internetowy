 @extends('dashmain')

 @section('content')
 <div class="container-fluid">
     <div class="row">
         <h1 class="mt-4">Szczegóły Zamówienia</h1>
     </div>

     <div class="row">
         <div class="card-body">
             <table class="table">
                 <tr>
                     <td>Status</td>
                     <td>
                         <form action="{{route('changeStatus', $order->id)}}" method="post">
                             @csrf
                             @method('PATCH')
                             <div class="input-group col-md-4">
                                 <select class="custom-select" id="inputGroupSelect08" name='status'>
                                     <option value='pending' @if($order->status == 'pending') selected style="background-color:lightgreen" @endif
                                         >Pending</option>
                                     <option value='paid' @if($order->status == 'paid') selected style="background-color:lightgreen" @endif
                                         >Paid</option>
                                     <option value='sent' @if($order->status == 'sent') selected style="background-color:lightgreen" @endif
                                         >Sent</option>
                                     <option value='done' @if($order->status == 'done') selected style="background-color:lightgreen" @endif
                                         >Done</option>
                                 </select>
                                 <div class="input-group-append">
                                     <button class="btn btn-primary" type="submit"> Zmień</button>
                                 </div>
                             </div>
                         </form>

                     </td>
                 </tr>
                 <tr>
                     <td>Id zamówienia</td>
                     <td>{{$order->id}}</td>
                 </tr>
                 <tr>
                     <td>Email kupującego</td>
                     <td>{{$order->email}}</td>
                 </tr>
                 <tr>
                     <td>Posiada konto</td>
                     <td>
                         @if($order->user_id == 0)
                         Nie
                         @else
                         Tak
                         @endif

                     </td>
                 </tr>
                 <tr>
                     <td>Data</td>
                     <td>{{$order->created_at}}</td>
                 </tr>
                 <tr>
                     <td>Sposób dostawy</td>
                     <td>{{$order->dostawy->name}}
                         @if($order->dostawy->ZaPobraniem == 'yes') (Płatność za pobraniem) @endif
                     </td>
                 </tr>
                 <tr>
                     <td>Łączna kwota</td>
                     <td>{{$order->price}}zł</td>
                 </tr>
             </table>
         </div>
     </div>
     <div class="row ml-5">

         <h4>Dane zamawiającego</h4>
         <table class="table">
             <tr>
                 <td>Imię</td>
                 <td>{{$order->name}}</td>
             </tr>
             <tr>
                 <td>Nazwisko</td>
                 <td>{{$order->secondname}}</td>
             </tr>
             <tr>
                 <td>Numer telefonu</td>
                 <td>{{$order->phonenumber}}</td>
             </tr>
             <tr>
                 <td>Miejscowość</td>
                 <td>{{$order->city}}</td>
             </tr>
             <tr>
                 <td>Kod pocztowy</td>
                 <td>{{$order->postalcode}}zł</td>
             </tr>
             <tr>
                 <td>Ulica i nr domu</td>
                 <td>{{$order->street}}</td>
             </tr>
             @if(isset($order->comment))
             <tr>
                 <td >Komentarz kupującego</td>
            
                 <td >{{$order->comment}}zł</td>
             
             @endif
         </table>

     </div>


     <div class="row">

         <ol>
             <h4>Zamawiane produkty</h4>
             @foreach($order->products as $product)
             <li>
                 <ul class="list-unstyled">
                     <li>
                         <a href="{{route('show', $product->product->id)}}">{{$product->product->name}}</a>
                     </li>
                     <li>
                         Ilość:{{$product->quantity}}
                     </li>
                     <li>
                         Cena jednostkowa: {{$product->product->price}}zł
                     </li>
                 </ul>
             </li>
             @if(!$loop->last)
             <hr>
             @endif
             @endforeach
         </ol>
     </div>

 </div>


 @endsection