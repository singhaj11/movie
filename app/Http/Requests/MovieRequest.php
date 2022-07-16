<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MovieRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $rules =  [
            'title' => 'required|string|min:0|max:255',
            'release_date' => 'required|date|after:yesterday|date_format:Y-m-d',
            'description' => 'required|string',
            'poster' => 'required|image|max:1024',
            'status' => 'required|boolean'
        ];
        if($request->method() == "PUT" || $request->method() == "PATCH"){
            $rules = array_merge($rules, [
                'poster' => 'nullable|image|max:1024'
            ]);

        }
        return $rules;
    }
}
