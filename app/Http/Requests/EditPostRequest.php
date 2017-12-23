<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EditPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        $rules = [
            'title' => "required|min:5|max:255|unique:posts,title,
            {$request->input('id')}",
            'body' => 'required|min:5',
            'category' => 'nullable|sometimes|exists:categories,id',
            'image' => 'nullable|sometimes|image|dimensions:min_width=1280,min_height=1024'
        ];

        // validate tags form field only if present
        if ($this->request->get('tags')) {
            foreach ($this->request->get('tags') as $key => $val) {
                $rules["tags.{$key}"] = 'exists:tags,id';
            }
        }

        return $rules;
    }
}
