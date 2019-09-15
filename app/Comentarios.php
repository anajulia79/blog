<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comentarios extends Model
{
    public $timestamps = false;
    
    protected $table = 'comentarios';
    
    protected $fillable = array('idcomentarios','user_id','idPost','comentario');
    
    protected $primaryKey = 'idcomentarios';
    
    protected $guarded = ['idcomentarios'];
}