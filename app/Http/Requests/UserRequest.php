<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "name" => "required|min:3|max:120|regex:/^[^<>]*$/",
            "email" => [
                "required",
                "email",
                "max:255",
                "min:2",
                "unique:users",
            ],
            "cep" => "required|min:7|max:8|regex:/^[^<>]*$/",
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'localidade' => 'required',
            'uf' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "O nome é obrigatório.",
            "name.min" => "O nome deve ter pelo menos 3 caracteres.",
            "name.max" => "O nome não pode ter mais de 120 caracteres.",
            "name.regex" => "O nome contém caracteres inválidos.",

            "cep.required" => "O CEP é obrigatório.",
            "cep.min" => "O CEP deve ter pelo menos 7 caracteres.",
            "cep.max" => "O CEP não pode ter mais de 8 caracteres.",
            "cep.regex" => "O CEP contém caracteres inválidos.",

            "email.required" => "O e-mail é obrigatório.",
            "email.email" => "O e-mail informado não é válido.",
            "email.max" => "O e-mail não pode ter mais de 255 caracteres.",
            "email.min" => "O e-mail deve ter pelo menos 2 caracteres.",
            "email.unique" => "Este e-mail já está cadastrado.",

            "logradouro.required" => "O logradouro é obrigatório.",
            "numero.required" => "O número é obrigatório.",
            "bairro.required" => "O bairro é obrigatório.",
            "localidade.required" => "A localidade é obrigatória.",
            "uf.required" => "A UF é obrigatória.",
        ];
    }
}
