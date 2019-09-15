<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\comentarios;

class comentariosController extends Controller

{
    public function Comentar (Request $data) {        
            $coment = comentarios::create([
    
            'user_id' => auth()->id(),
    
            'Comentario' => request('Comentario'),
    
            'idPost'    => request('idPost'),
    
            ])->save();
    
        return redirect()->route('posts');
    }
    
    public function DeletarComentario(Request $data){
        comentarios::where('idcomentarios', '=', $data['idcomentarios'])->delete();
        return redirect()->route('posts');
    }
    
    
}


