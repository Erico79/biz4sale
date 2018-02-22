<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\MasterFile;

class UpdateMasterFileRequest extends FormRequest
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
//                User::find()
//        $user = User::find($this->users);

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                 return [
                    'surname'=>'required',
                    'firstname'=>'required',
                    'gender'=>'required',
                    'national_id'=>'required|min:8|unique:masterfiles,national_id',
                    'phone_number'=>'required|unique:masterfiles,phone_number'
                ];
            }
            case 'PUT':{
                break;
            }
            case 'PATCH':
            {
                return [
                    'surname'=>'required',
                    'firstname'=>'required',
                    'gender'=>'required',
//                    'national_id'=>'required|min:8|unique:masterfiles,national_id',
//                    'phone_number'=>'required|unique:masterfiles,phone_number'
                ];
            }
            default:break;
        }
//        return MasterFile::$rules;
    }
}
