<?php

namespace App\Http\Requests\Admin\Speciality;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;

class ItemsRequest extends FormRequest
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
        return [
            'id' => ['required', 'string', 'exists:specialities,id'],
        ];
    }
}
