<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePhotoGalleryRequest extends FormRequest
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
            'photo' => 'required',
            'story' => 'required',
            'type' => 'required',
            
			
         ];
    }
	 public function messages()
    {
        return [
            'story.required' => 'Story field is required',
            'photo.required' => 'Image field is required.',
           
            
            
        ];
    } 
}
