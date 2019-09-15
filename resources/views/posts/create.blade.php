@extends('layouts.app')


@section('content')

<div class="container">

   <div class="row justify-content-center">

       <div class="col-md-8">

           <center><h1>Poste uma nova foto!</h1></center>

           <form method="POST" enctype="multipart/form-data" action="/posts">

         

               @csrf
               <center>
               <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Legenda" name= "legenda">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Filtro" name="filter">
                    </div>
                </div>
                </center>
                <br>

               <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="image_path">
                    <label class="custom-file-label" for="customFile">Escolher arquivo</label>
               </div>
               
                <center> <br><button type="submit" class="btn btn-primary btn-lg">Postar</button> </center>

           </form>

       </div>

   </div>

</div>

@endsection