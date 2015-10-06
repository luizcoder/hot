<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Hotsite extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['nome','apelido','descricao'];
    public $timestamps = true;

    public function concursos(){
        $this->hasMany('App\Hotsite');
    }
    public function participantes(){
        $this->hasMany('App\Participante');
    }    
}
