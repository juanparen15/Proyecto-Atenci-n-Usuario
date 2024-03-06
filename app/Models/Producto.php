<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;



class Producto extends Model
{
    use CrudTrait;
    protected $table = 'productos';

    protected $fillable = [
        'fK_sProg',
        'fK_tProd',
        'fK_uMed',
        'fK_user',
        'codProd',
        'nomProd',
        'iB',
        'mCuatrienia',
        'slug'
    ];
    protected $with = [
        'subprograma',
        'tipoproducto',
        'unidadmedida',
        'area',
        'user'
    ];

    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relacion Uno a Muchos (Inversa)
    public function user()
    {
        return $this->belongsTo(User::class, 'fK_user', 'id');
    }

    //Relacion Uno a Muchos (Inversa)
    public function subprograma()
    {
        return $this->belongsTo(SubPrograma::class, 'fK_sProg', 'id');
    }

    //Relacion Uno a Muchos (Inversa)
    public function tipoproducto()
    {
        return $this->belongsTo(TipoProducto::class, 'fK_tProd', 'id');
    }

    //Relacion Uno a Muchos (Inversa)
    public function unidadmedida()
    {
        return $this->belongsTo(UnidadMedida::class, 'fK_uMed', 'id');
    }

    //Relacion Uno a Muchos (Inversa)
    public function area()
    {
        return $this->belongsTo(Area::class, 'fK_area', 'id');
    }
}
