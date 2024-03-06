<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use CrudTrait;
  public $incrementing = false;
  protected $table = 'sectores';
  protected $primaryKey = 'id';
  protected $fillable = ['id', 'fK_pDes', 'codS', 'nomS', 'slug'];

  public function getRouteKeyName()
  {
    return "slug";
  }

  //Relacion Uno a Muchos (Inversa)
  public function planDesarrollo()
  {
    return $this->belongsTo(PlanDesarrollo::class, 'fK_pDes', 'id');
  }

  //Relacion Uno a Muchos 
  public function programa()
  {
    return $this->hasMany(Programa::class);
  }
}
