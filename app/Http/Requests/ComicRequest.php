<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:80|min:2',
            'price' => 'required|decimal:2',
            'series' => 'required|max:80|min:2',
            'sale_date' => 'required|date',
            'type' => 'required|max:30|min:2',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il Titolo è un campo obbligatorio',
            'title.max' => 'Il Titolo deve avere massimo :max caratteri',
            'title.min' => 'Il Titolo deve avere minimo :min caratteri',
            'price.required' => 'Il Prezzo è un campo obbligatorio',
            'price.decimal' => 'Il Prezzo deve avere un numero decimale con 2 cifre dopo la virgola',
            'series.required' => 'La Serie è un campo obbligatorio' ,
            'series.max' => 'La Serie deve avere massimo :max caratteri' ,
            'series.min' => 'La Serie deve avere minimo :min caratteri' ,
            'sale_date.required' => 'La Data d\'uscita è un campo obbligatorio ' ,
            'sale_date.max' => 'La Data d\'uscita deve avere massimo :max caratteri' ,
            'sale_date.min' => 'La Data d\'uscita deve avere minimo :min caratteri' ,
            'type.required' => 'Il Tipo è un campo obbligatorio' ,
            'type.max' => 'Il Tipo deve avere massimo :max caratteri' ,
            'type.min' => 'Il Tipo deve avere minimo :min caratteri' ,
        ];
    }
}
