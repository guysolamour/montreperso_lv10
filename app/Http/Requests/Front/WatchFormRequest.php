<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class WatchFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name"                => ['sometimes', 'required', 'string'],
            "description"         => ['sometimes', 'required', 'string'],
            "form_id"             => ['sometimes', 'required', 'exists:App\Models\Form,id'],
            "index_id"            => ['sometimes', 'required'],
            "index_image_id"      => ['sometimes', 'required'],
            "indicator_id"        => ['sometimes', 'required'],
            "background_id"       => ['sometimes', 'required'],
            "background_image_id" => ['sometimes', 'required'],
            "bracelet_id"         => ['sometimes', 'required'],
            "design_id"           => ['sometimes', 'required'],
            "design_category_id"  => ['sometimes','required'],
            "user_id"             => ['sometimes','required'],
            "text"                => ['sometimes','required', 'string' ],
            "background_image"          => ['sometimes','required', 'string' ],
        ];
        // return [
        //     "name"                => ['sometimes', 'required', 'string'],
        //     "description"         => ['sometimes', 'required', 'string'],
        //     "form_id"             => ['sometimes', 'required', 'exists:App\Models\Form,id'],
        //     "index_id"            => ['sometimes', 'required', 'exists:App\Models\Index,id'],
        //     "index_image_id"      => ['sometimes', 'required', 'exists:media,id'],
        //     "indicator_id"        => ['sometimes', 'required', 'exists:App\Models\Indicator,id'],
        //     "background_id"       => ['sometimes', 'required', 'exists:App\Models\Background,id'],
        //     "background_image_id" => ['sometimes', 'required', 'exists:media,id'],
        //     "bracelet_id"         => ['sometimes', 'required', 'exists:App\Models\Bracelet,id'],
        //     "design_id"           => ['sometimes', 'required', 'exists:App\Models\Design,id'],
        //     "design_category_id"  => ['sometimes','required', 'exists:App\Models\DesignCategory,id' ],
        //     "user_id"             => ['sometimes','required', 'exists:App\Models\User,id' ],
        //     "text"                => ['sometimes','required', 'string' ],
        //     "background"          => ['sometimes','required', 'string' ],
        // ];
    }
}
