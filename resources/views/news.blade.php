 @extends('dashmain')

 @section('content')
 <div class="container-fluid">
   <h1 class="mt-4">Wyślij newsletter</h1>
   <div class="row pl-5 pt-5">
     <form action="{{route('senNewsletter')}}" method="POST" class="form col-md-6">
       @csrf
       <label for="title">Tytuł</label>
       <input type="text" class="form-control" name="title" id="title">
       @if($errors->has('title'))
       <span class="text-danger"> {{ $errors->first('title') }}</span><br>
       @endif
       <label for="header">Nagłówek</label>
       <input type="text" class="form-control" name="header" id="header">
       @if($errors->has('header'))
       <span class="text-danger"> {{ $errors->first('header') }}</span><br>
       @endif
       <label for="main">Treść</label>
       <textarea id="main" name="main" class="form-control" rows="5"></textarea>
       @if($errors->has('main'))
       <span class="text-danger"> {{ $errors->first('main') }}</span><br>
       @endif
       <hr class="mt-5">
       <input type="checkbox" name="przycisk" id="przycisk" onclick="photoNewsletter();">
       <label for="przycisk">Dodaj przycisk</label>
       <br>
       <div id="dodajphoto" style="display:none">
         <label for='przyciskopis'>Napis na przycisku</label>
         <input type="text" name="przyciskopis" id="przyciskopis" class="form-control">
         <label for="link">Odnośnik przycisku(link)</label>
         <input type="url" name="link" id="link" class="form-control">
       </div>
       @if($errors->has('przyciskopis'))
       <span class="text-danger"> {{ $errors->first('przyciskopis') }}</span><br>
       @endif
       @if($errors->has('link'))
       <span class="text-danger"> {{ $errors->first('link') }}</span><br>
       @endif
       <hr class="mt-5">
       <button type="submit" class="btn btn-primary">Wyślij</button>
     </form>
   </div>
 </div>
 <script>
   function photoNewsletter() {
     var checkBox = document.getElementById("przycisk");
     var text = document.getElementById("dodajphoto");
     if (checkBox.checked == true) {
       text.style.display = "block";
     } else {
       text.style.display = "none";
     }

   }
 </script>

 @endsection