<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concurso extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['nome','descricao','pergunta','hotsite_id'];
    public $timestamps = true;

    public function hotsite(){
        return $this->belongsTo('App\Hotsite');
    }
}
