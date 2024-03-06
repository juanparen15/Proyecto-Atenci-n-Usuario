<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use CrudTrait;
    public $incrementing = false;
    protected $fillable= ['id','nomUMed','slug'];

    public function getRouteKeyName() {
      return "slug";
    }
    

     //Relacion Uno a Muchos 
     public function productos(){
        return $this->hasMany(Producto::class);
    }
}