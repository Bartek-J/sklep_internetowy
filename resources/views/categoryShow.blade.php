 @extends('dashmain')

 @section('content')
 <div class="container-fluid">
     <h1 class="mt-4">Edytuj kategorię</h1>
     <div class="row pl-5 pt-5">
         <form class='col-lg-5 col-md-5' action="{{route('categoryUpdate',$category->id)}}" method="POST">
             @csrf
             @method("PATCH")
             <div class="card">
                 <div class="card-body">
                     <div class="form-group">
                         <label for="nazwa">Nazwa Kategorii</label>
                         <input type="text" name="nazwa" value="{{ $category->name}}" id="nazwa" class='form-control'>
                         @if($errors->has('nazwa'))
                         <span class="text-danger"> {{ $errors->first('nazwa') }}</span>
                         @endif
                     </div>

                     <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                 </div>
             </div>
         </form>
     </div>
     <div class="row pl-5 pt-5">
         <form class='col-lg-5 col-md-5' action="{{route('categoryDelete', $category->id)}}" method="post">
@csrf
@method('DELETE')
             <div class="card">
                 <div class="card-body">

                     <button type="submit" class="btn btn-danger">Usuń tę kategorię</button>
                 </div>
             </div>
         </form>
     </div>
 </div>



 @endsection