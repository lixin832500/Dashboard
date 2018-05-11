<?php
/**
 * Created by PhpStorm.
 * User: xin.li
 * Date: 3/26/2018
 * Time: 12:31 PM
 */

namespace App\Http\Requests\Admin;

use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest {

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
        if($this->segment(3)!="") {
            $service = Service::find($this->segment(3));
        }

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
                        'name' => 'required|min:2',
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'name' => 'required|min:2',
                    ];
                }
            default:break;
        }
    }
}