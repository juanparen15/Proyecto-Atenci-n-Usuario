<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    use CrudTrait;
    public $incrementing = false;
    protected $fillable= ['id','nomProd','slug'];

    public function getRouteKeyName() {
      return "slug";
    }
    

     //Relacion Uno a Muchos 
     public function productos(){
        return $this->hasMany(Producto::class);
    }
}