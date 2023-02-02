<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class Ranking extends FormRequest
{
 /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*
    public function authorize()
    {
        return false;
    }
    */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nick' => 'required|min:3|max:50|not_regex:/\?|<|>//',
            'points' => 'required',
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }

    public function message(){
        return[
            'nick' => 'Nick powinien być większy niż 3 znaki i nie większy niż 50.',
            'points' => 'Proszę wpisać punkty. Punkty powinny być w formie liczby całkowitej dodatniej',
        ];
    }  
    
}
