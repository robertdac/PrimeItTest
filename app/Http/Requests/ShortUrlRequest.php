<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class ShortUrlRequest extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
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
            return [
                'url' => 'required|url'
            ];
        }

        /**
         * Get custom messages for validation errors.
         *
         * @return array
         */
        public function messages()
        {
            return [
                'url.required' => 'The URL field is required.',
                'url.url' => 'The URL must be a valid URL.',
            ];
        }
    }
