<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participante extends Model
{
    
    use SoftDeletes;
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome','email','cpf','telefone','hotsite_id'];
    
    public function hotsite(){
        return $this->belongsTo('App\Hotsite');
    }
    
}
