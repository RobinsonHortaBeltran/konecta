<?php
namespace Modules\Products\App\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ValidateProductsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre_producto' => 'required|string|max:255',
            'referencia'      => 'required|string|max:255',
            'precio'          => 'required|numeric|min:0',
            'peso'            => 'required|integer|min:0',
            'categoria'       => 'required|string|max:255',
            'stock'           => 'required|integer|min:0',
            'fecha_creacion'  => 'required|date',
        ];
    }
}

