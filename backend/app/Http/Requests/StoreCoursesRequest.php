<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Requests\StoreCoursesRequest;

class StoreCoursesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => "required|min:7",
            "description" =>"required",
            "weeks" => "numeric",
            "enroll_cost"=> "required",
            "minimun_skill"=>"required",
            "bootcamp_id"=> "exists:bootcamps,id"
        ];
    }
    /** 
     * enviar response en caso de
     * validacion fallida
    */
    protected function failedValidation(Validator $v){
        //lanzar una excepción HttpResponse en caso
        //de errores de Validacion
        throw new HttpResponseException( response()->json([
                                                            "success"=> false,
                                                            "errors" => $v->errors()
                                                            ]  ,  422 ) );
    } 
}
