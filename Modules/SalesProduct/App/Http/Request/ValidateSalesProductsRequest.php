<?php
namespace Modules\SalesProduct\App\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ValidateSalesProductsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id'    => 'required|integer',
            'cantidad'      => 'required|integer',
            'client_id'     => 'required|integer',
        ];
    }
}

