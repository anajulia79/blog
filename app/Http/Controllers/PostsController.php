<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\comentarios;

class PostsController extends Controller {

   public function __construct() {

       $this->middleware('auth');

   }


   public function index() {

       $posts = Post::all();

       #$comentarios = comentarios::select('comentarios.comentario', 'posts.id', 'posts.user_id')
       #->join('posts', 'posts.id', '=', 'comentarios.idPost')
       #->join('users', 'users.id', '=', 'comentarios.user_id')
       #->get();

       
       return view('posts.list')->with('posts', $posts);#->with('comentarios', $comentarios);


   }


   public function create() {

       return view('posts.create');

   }


   public function store(){

       request()->validate([

           'image_path' => ['required', 'image']          

      ]);      

       $post = Post::create([

           'user_id' => auth()->id(),

           'image_path' => request()->file('image_path')->store('posts', 'public'),

           'legenda' => request('legenda'),

           'filter' => request('filter'),

           'likes' => 0

       ])->save();


       return redirect('home');

   }

   public function like ($id) {
       $post_like = Post::findOrFail($id);
       $quemCurtiu = Auth()->user()->id;
       if ($post_like->quemCurtiu != $quemCurtiu) {
            $post_like->quemCurtiu = $quemCurtiu;
            $post_like->likes +=1;
            $post_like->save();
            $posts = Post::all();
            return view ('posts.list')->with('posts', $posts);
           } else {
               $posts = Post::all();
               return view ('posts.list')->with('posts', $posts);
           }
       }

    
    public function deslike ($id){
        
        $post_like = Post::findOrFail($id);
        $quemCurtiu = Auth()->user()->id;
        if ($post_like->likes > 0) {
            if ($post_like->quemCurtiu == $quemCurtiu){
                $post_like->quemCurtiu = 0;
                $post_like->likes -=1;
                $post_like->save();
                $posts = Post::all();      
                return view ('posts.list')->with('posts', $posts);
            } else {   
                $posts = Post::all();  
                return view ('posts.list')->with('posts', $posts);                     
            }
        } else {
            $posts = Post::all();  
            return view ('posts.list')->with('posts', $posts);     
        }
    }

}
