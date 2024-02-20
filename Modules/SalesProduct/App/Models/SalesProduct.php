<?php

namespace Modules\SalesProduct\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\SalesProduct\Database\factories\SalesProductFactory;

class SalesProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['product_id', 'cantidad', 'client_id'];
    protected $table = 'sales_product';
    protected static function newFactory()
    {
        //return SalesProductFactory::new();
    }
}
