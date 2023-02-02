<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class History extends FormRequest
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
            'winner' => 'required|not_regex:/\?|<|>/',
            'winnerPoints' => 'required',
            'loser' => 'required|not_regex:/\?|<|>/',
            'loserPoints' => 'required',
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
            'winner' => 'Podaj nick gracza.',
            'winnerPoints' => 'Podaj liczbę w formie liczby całkowitej dodatniej.',
            'loser' => 'Podaj nick gracza.',
            'loserPoints' => 'Podaj liczbę w formie liczby całkowitej dodatniej.',
        ];
    }
}
