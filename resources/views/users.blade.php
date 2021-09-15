 @extends('dashmain')

 @section('content')
 <div class="container-fluid">
     <h1 class="mt-4">Użytkownicy uprawnieni</h1>
     <div class="row">
         <div class="card-body">
             <h3>Administratorzy</h3>
             <table class="table col-md-7">
                 <tr>
                     <th>Nazwa</th>
                     <th>E-mail</th>
                     <th class="text-center">Status</th>
                     <th></th>
                 </tr>
                 @foreach($admins as $admin)
                 <tr>
                     <td>{{$admin->name}}</td>
                     <td>{{$admin->email}}</td>
                     <td class="text-center">{{$admin->role}}</td>
                     <td class="text-right"><button class='btn btn-danger' form="{{$admin->id}}">Zdegraduj na użytkownika</button></td>
                     <form action="{{route('nadaj',$admin->id)}}" method="POST" id="{{$admin->id}}">
                         @csrf
                         @method('PATCH')
                        <input type="text" name="rola" hidden value="user">
                     </form>
                 </tr>
                 @endforeach
             </table>
         </div>
     </div>
     
     <div class="row">
         <div class="card-body">
             <h3>Użytkownicy</h3>
             <table class="table col-md-7">
                 <tr>
                     <th>Nazwa</th>
                     <th>E-mail</th>
                     <th class="text-center">Status</th>
                     <th></th>
                 </tr>
                 @foreach($users as $user)
                 <tr>
                     <td>{{$user->name}}</td>
                     <td>{{$user->email}}</td>
                     <td class="text-center">{{$user->role}}</td>
                     <td class="text-right"><button class='btn btn-primary' type="submit" form="{{$user->id}}">Nadaj prawa Administratora</button></td>
                     <form action="{{route('nadaj',$user->id)}}" method="POST" id="{{$user->id}}">
                         @csrf
                         @method('PATCH')
                         <input type="text" hidden value="admin" name="rola">
                     </form>
                 </tr>
                 @endforeach
             </table>
         </div>
     </div>
     
 </div>


 @endsection