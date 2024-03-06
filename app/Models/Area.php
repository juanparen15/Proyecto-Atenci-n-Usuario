<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use CrudTrait;
    public $incrementing = false;
    protected $table = 'area';
    protected $fillable= ['id','fK_car', 'codA', 'nomA', 'slug'];

    public function getRouteKeyName() {
      return "slug";
    }
    
    //Relacion Uno a Muchos 
    public function productos(){
        return $this->hasMany(Producto::class);
    }

    //Relacion Uno a Muchos (Inversa)
    public function cartera(){
       return $this->belongsTo(Cartera::class, 'fK_car', 'id' );
    }
}