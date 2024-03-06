<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use CrudTrait;
    public $incrementing = false;
    protected $table = 'programas';
    protected $fillable= [
        'id',
        'fK_sector',
        'codProg',
        'nomProg',
        'slug'
    ];

    public function getRouteKeyName() {
      return "slug";
    }
     
    //Relacion Uno a Muchos (Inversa)
    public function sector(){
        return $this->belongsTo(Sector::class, 'fK_sector', 'id');
    }

    //Relacion Uno a Muchos 
    public function subprogramas(){
        return $this->hasMany(SubPrograma::class);
    }
}
