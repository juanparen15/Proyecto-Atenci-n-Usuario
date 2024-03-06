<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Cartera extends Model
{
    use CrudTrait;
    public $incrementing = false;
    protected $table = 'cartera';
    protected $fillable= ['id','codC','nomCar', 'slug'];

    public function getRouteKeyName() {
      return "slug";
    } 

    //Relacion Uno a Muchos 
    public function area(){
        return $this->hasMany(Area::class);
    }
}
