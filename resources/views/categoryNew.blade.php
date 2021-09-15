 @extends('dashmain')

 @section('content')
 <div class="container-fluid">
     <h1 class="mt-4">Dodaj kategorię</h1>
     <div class="row pl-5 pt-5">
         <form class='col-lg-5 col-md-5' action="{{route('categoryNewAdd')}}" method="GET">
             <div class="card">
                 <div class="card-body">
                     <div class="form-group">
                         <label for="nazwa">Nazwa Kategorii</label>
                         <input type="text" name="nazwa" value="" id="nazwa" class='form-control'>
                         @if($errors->has('nazwa'))
                         <span class="text-danger"> {{ $errors->first('nazwa') }}</span>
                         @endif
                     </div>

                     <button type="submit" class="btn btn-primary">Dodaj</button>
                 </div>
             </div>
         </form>


     </div>
 </div>



 @endsection