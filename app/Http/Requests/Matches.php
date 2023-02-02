<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class Matches extends FormRequest
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
            'round' => 'required|not_regex:/\?|<|>/',
            'firstNick' => 'required|not_regex:/\?|<|>/',
            'secoundNick' => 'required|not_regex:/\?|<|>/',
            'result' => 'required',
            'endGame' =>'required',
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
            'round' => 'Podaj liczbę w formie liczby całkowitej dodatniej.',
            'firstNick' => 'Podaj nick gracza.',
            'secoundNick' => 'Podaj nick gracza.',
            'result' => 'Podaj w dobrej formie rezultat gry.',
            'endGame' =>'Wybierz jedną opcję.',
        ];
    }
}
