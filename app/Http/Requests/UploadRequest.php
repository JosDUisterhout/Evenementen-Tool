<?php

//Extensie van de Request klasse van laravel.
//Gebruikt om het verhandelen van bestanden mogelijk te maken.

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
                'title' => 'required',
                'text_area' => 'required',
                'image' => 'nullable',
            ];




    }


}
