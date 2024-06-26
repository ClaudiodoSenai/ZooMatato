<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AnimalUpdateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool 
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'max:255',
            'idade' => 'integer',
            'especie' => 'max:255',
            'ra' => 'min:5|max:20|unique:animals,ra,' . $this->id,
            'peso' => 'numeric',
            'altura' => 'numeric',
            'sexo' => 'max:255',
            'dieta' => 'max:255',
            'habitat' => 'max:255',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()


        ]));
    }
    public function messages()
    {
        return [
            'nome.max' => 'O campo nome deve conter no máximo 255 caracteres',
            'idade.integer' => 'O campo idade deve ser um número inteiro',
            'idade.max' => 'O campo idade deve ser menor ou igual a 150.',
            'especie.max' => 'O campo especie deve conter no máximo 255 caracteres',
            'ra.max' => 'O campo RA deve conter no máximo 20 caracteres',
            'ra.min' => 'O campo RA deve conter no minimo 5 caracteres',
            'ra.unique' => 'O campo RA deve ser único',
            'peso.numeric' => 'O campo peso deve ser um número',
            'altura.numeric' => 'O campo altura deve ser um número',
            'sexo.max' => 'O campo sexo deve conter no máximo 255 caracteres',
            'dieta.max' => 'O campo dieta deve conter no máximo 255 caracteres',
            'habitat.max' => 'O campo habitat deve conter no máximo 255 caracteres',
        ];
    }
}
