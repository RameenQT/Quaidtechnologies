<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePortfolioRequest extends FormRequest
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
            'type' => 'required',
            'title' => 'required',
			'category' => 'required',
            'tagLine' => 'required',
            'compatibility' => 'required',
            'seller' => 'required',
            'size' => 'required',
            'languages' => 'required',
            'ageRating' => 'required',
            'copyright' => 'required',
            'playStoreLink' => 'required',
            'price' => 'required',
            'appStoreLine' => 'required',
            'description' => 'required',
            'shortDescription' => 'required',
            'clientName' => 'required',
            'clientWords' => 'required',
            'clientVideo' => 'required',
            'slidrThumb' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'mianImage' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'desImage1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'desImage2' => 'required|image|mimes:jpeg,png,jpg|max:2048',
           // 'PortfolioGallery' => 'image|mimes:jpeg,png,jpg|max:2048',
          
            
            
         ];
    }
	
}
