 @extends('dashmain')

 @section('content')
 <div class="container-fluid">
     <h1 class="mt-4">Edytuj Produkt</h1>
     <div class="row pl-5 pt-5">
         <form class='col-lg-5 col-md-5' action="{{route('update', $product->id)}}" method="POST">
             @csrf
             @method("PATCH")
             <div class="card">
                 <div class="card-body">
                     <div class="form-group">
                         <label for="nazwa">Nazwa produktu</label>
                         <input type="text" name="nazwa" value="{{ $product->name}}" id="nazwa" class='form-control'>
                         @if($errors->has('nazwa'))
                         <span class="text-danger"> {{ $errors->first('nazwa') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label for="cena">Cena w zł</label>
                         <input type="number" name="cena" value="{{ $product->price}}" id="cena" class='form-control' min="0" max="1000000">
                         @if($errors->has('cena'))
                         <span class="text-danger"> {{ $errors->first('cena') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label for="kategoria">Kategoria</label>
                         <select name="kategoria" id="kategoria" class='form-control custom-select'>
                             @foreach($categories as $category)
                             <option value='{{$category->id}}' @if($category->id == $product->category_id) selected @endif
                                 >{{$category->name}}</option>
                             @endforeach
                         </select>
                         @if($errors->has('kategoria'))
                         <span class="text-danger"> {{ $errors->first('kategoria') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label for="ilosc">Ilość dostępnych</label>
                         <input type="number" name="ilosc" value="{{ $product->amount}}" id="ilosc" class='form-control' min="1" max="10000">
                         @if($errors->has('ilosc'))
                         <span class="text-danger"> {{ $errors->first('ilosc') }}</span>
                         @endif
                     </div>
                     <div class="form-group">
                         <label for="opis">Opis</label>
                         <textarea name="opis" id="opis" rows="5" class="form-control">{{$product->description}}</textarea>
                         @if($errors->has('opis'))
                         <span class="text-danger"> {{ $errors->first('opis') }}</span>
                         @endif
                     </div>


                     <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                 </div>
             </div>
         </form>

         <div class="col-lg-5 col-md-5 pt-2">
             <div class="card">
                 <div class="card-header">
                     Zdjęcia
                 </div>
                 <div class="card-body">
                     <form action="{{ route('addPhoto', $product->id) }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="mb-1">
                             <div class="custom-file mb-2">
                             <input type="file" class="custom-file-input" id="photo" aria-describedby="inputGroupFileAddon01" name="photo">
    <label class="custom-file-label" for="photo">Wybierz zdjęcie</label>
    @if($errors->has('photo'))
                         <span class="text-danger"> {{ $errors->first('photo') }}</span>
                         @endif
                             </div>
                         </div>
                         <div class="mb-4">
                             <button type="submit" class="btn btn-primary">Dodaj zdjęcie</button>
                         </div>


                         
 
                         @if($product->photos->count())
                         <table class="table">
                             @foreach ($product->photos as $photo)
                             <tr>
                                 <td><img src="{{asset('storage/uploads/'. $photo->photo)}}" width="100"></td>
                                 <td><a href="{{route('deletePhoto',[ $product->id , $photo->id])}}" class="btn btn-danger">Usuń</a></td>
                             </tr>
                             @endforeach
                         </table>
                         @endif
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>


 @endsection