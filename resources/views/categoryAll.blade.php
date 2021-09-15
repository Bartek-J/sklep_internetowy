 @extends('dashmain')

 @section('content')
 <div class="container-fluid">
     <h1 class="mt-4">Wszystkie kategorie</h1>
     <div class="row">
         <div class="card-body">
             <table class="table col-md-4">
                 <tr>
                     <th>Nazwa</th>
                     <th class="text-center">Ilość produktów</th>
                     <th class="text-center">Edytuj</th>
                 </tr>
                 @foreach($categories as $category)
                 <tr>
                     <td> {{$category->name}} </td>
                     <td class="text-center"> {{$category->products_active_count}} </td>
                     <td class="text-center"> <a href="{{route('categoryShow', $category->id)}}" class="btn btn-primary">Edytuj</a> 
                      
                      </td>
                 </tr>
                 @endforeach
             </table>
         </div>
     </div>
 </div>


 @endsection