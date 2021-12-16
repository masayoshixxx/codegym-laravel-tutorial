<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * @overRide
     * Get data to be validated from the request.
     *
     * @return array
     */
    protected function validationData()
    {
        $all =  $this->all();
        if (isset($all['detail'])) {
            $all['detail'] = preg_replace("/\r\n/", "\n", $all['detail']);
        }
        return $all;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'detail' => 'nullable|string|max:1000',
        ];
    }
}
