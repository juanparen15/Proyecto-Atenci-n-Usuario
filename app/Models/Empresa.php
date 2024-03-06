<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use CrudTrait;
    protected $fillable= [
        'nombre',
        'mision',
        'vision',
        'url'
    ];
}
