<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticuloFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'nombre'=>'required|max:50',
            'unit_id'=>'required',
            'codigo'=>'required|numeric',            
            'idcategoria'=>'required',
            'stock_minimo'=>'required|numeric',
            'stock'=>'required|numeric',
            'descripcion'=>'required|max:510',
            'imagen'=>'mimes:jpeg,bmp,png'
        ];
    }


    public function messages()
    {
        return [
      
            'idcategoria.required'=>'Seleccione la categoria, es obligatorio',

        ];
    }
}
