<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreBeadle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->system_role_id === 4){
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $yearSem = hGetCurYearAndMonth();
        return [
            "classCode" => "bail|required|string",
            "beadleStudentCode" => [
                'sometimes'
                ,'bail'
                ,'required'
                ,Rule::unique('academic.beadle')->where(function($query) use($yearSem){
                    return $query->where('schoolYear',$yearSem['year'])->where('semester',$yearSem['semester']);
                })
            ],
            "assistant" => [
                'sometimes'
                ,'bail'
                ,'required'
                ,Rule::unique('academic.beadle','beadleStudentCode')->where(function($query) use($yearSem){
                    return $query->where('schoolYear',$yearSem['year'])->where('semester',$yearSem['semester'])->whereAssistant(1);
                })
            ]
        ];
    }
}
