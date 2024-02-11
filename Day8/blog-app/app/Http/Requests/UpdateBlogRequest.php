<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Blog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|max:255',
            'slug'=>'required|unique:blogs',
            'category_id'=>'required',
            'body'=>'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
        ];
    }
}
