<?php

namespace App\Http\Requests\Admin\Employees;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;

class CreatedRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array[]
     */
    public function rules(): array
    {
        $lang = Language::where('active', 1 )->pluck('value')->join(',');

        return [
            'speciality' => ['required', 'integer', 'exists:specialities,id'],
            'last_name' => ['array', 'required', 'required_array_keys:' . $lang],
            'first_name' => ['array', 'required', 'required_array_keys:' . $lang],
            'surname' => ['array', 'required', 'required_array_keys:' . $lang],
            'description' => ['array', 'required', 'required_array_keys:' . $lang],
            'status' => ['required', 'integer', 'in:0,1'],
            'photo' => ['required', 'file', 'max:5120', 'mimes:jpeg,png']
        ];
    }
}
