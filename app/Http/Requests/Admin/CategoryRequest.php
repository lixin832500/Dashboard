<?php
/**
 * Created by PhpStorm.
 * User: xin.li
 * Date: 3/12/2018
 * Time: 3:14 PM
 */

namespace App\Http\Requests\Admin;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest {

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
            $category = Category::find($this->segment(3));
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