<?php

namespace Modules\Products\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Products\Database\factories\ProductsFactory;

class Products extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nombre_producto',
        'referencia',
        'precio',
        'peso',
        'categoria',
        'stock',
        'fecha_creacion',
    ];

    /* The line `protected  = 'products';` in the `Products` model class is specifying the name
    of the database table that the model should interact with. In this case, the model is associated
    with the "products" table in the database. By setting this property, Laravel's Eloquent ORM will
    automatically assume that this model corresponds to the "products" table in the database when
    performing database operations such as querying or saving data. */
    protected $table = 'products';

    protected static function newFactory()
    {
    }
}
