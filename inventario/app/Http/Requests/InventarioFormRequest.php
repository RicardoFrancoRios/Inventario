<?php

namespace inventario\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarioFormRequest extends FormRequest
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
        //Se agregan los campos de la tabla y se coloca la condición que se requiera
        return [
        ];
    }
}
