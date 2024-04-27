<?php

namespace App\Http\Requests\Admin\Articles;

use App\Models\Employees;
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
            'name' => ['array', 'required', 'required_array_keys:' . $lang],
            'text' => ['array', 'required', 'required_array_keys:' . $lang],
            'status' => ['required', 'integer', 'in:0,1'],
            'photo' => ['required', 'file', 'max:5120', 'mimes:jpeg,png'],
            'creators' => ['array', 'required'],
            'resource' => ['string', 'nullable'],
            'views' => ['required', 'integer'],
            'public_at' => ['required', 'date'],
        ];
    }
}
