<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class AddFormRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
    */
    public function authorize() {  
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
    */
    public function rules() {
        return [
            'product_id' => 'required',
            'name' => 'required',
            'total_unit' => 'required',
            'unit' => 'required',
            'total_unit' => 'required',
            'net_price' => 'required',
            'markup' => 'required', 
            'unit_price' => 'required', 
            'sales_price' => 'required',
        ];
    }


}
