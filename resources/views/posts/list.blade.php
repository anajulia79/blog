@extends('layouts.app')


@section('content')

<div class="container">

   <div class="row justify-content-center">

       <div class="col-md-8">

           @foreach ($posts as $post)
           
            <div class="card mt-4">

                   <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap">

                <center>
                    <br>
                    <a href='/like/{{$post->id}}'>    <button type="button" class="btn btn-primary btn-lg">Curtir</button></a>

                    <a href='/deslike/{{$post->id}}'> <button type="button" class="btn btn-secondary btn-lg">Descurtir</button></a>
                </center>


                   <div class="card-body">Curtidas: {{$post->likes}}</div>


                   <div class="card-body">Descrição:{{$post->legenda}}</div>

            </div>   

            <form method="GET">
                <ul class="list-group list-group-flush">
                
                    <li class="list-group-item"></li>
                                
                

                <div class="input-group mb-3">

                    <input type="hidden" name="idPost" value="{{$post->id}}">
                    <input type="text" class="form-control" placeholder="Comente algo!"  aria-describedby="button-addon2" name="comentario">
                    
                    <div class="input-group-append">
                        
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Comentar</button>
                    
                    </div>



            </form>

                
</div>
           @endforeach
   </div>

</div>

@endsection