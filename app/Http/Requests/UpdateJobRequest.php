<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
        $rule = [
        'title' => 'required',
        'region' => 'required',
        'access' => 'required',
        'job_description' => 'required',
        'employment_status' => 'required',
        'eligibility' => 'required',
        'pay' => 'required',
        'address' => 'required',
        'contact' => 'required',
        ];

        if ($this->file('image')) {
            $rule['image'] = 'required|file|image|mimes:jpg,png';
        }

        return $rule;
    }
}
