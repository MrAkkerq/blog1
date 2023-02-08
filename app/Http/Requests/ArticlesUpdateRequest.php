<?php

namespace App\Http\Requests;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ArticlesUpdateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $articleCode = Article::query()->where('code', '=', $request->get('code'))->get()->isEmpty();
        $isUnique = $articleCode ? 'unique:articles,code' : '';
        return [
            'code' => ['required', 'alpha_dash', $isUnique],
            'title' => ['required', 'min:5', 'max:100'],
            'detail' => ['required', 'max:255'],
            'body' => ['required'],
            'published' => ['boolean']
        ];
    }

//    protected function passedValidation()
//    {
//        if(!$this->has('published'))
//        {
//            $this->merge(['published' => 0]);
//        }
//    }
    public function validatedWithPublished()
    {
        if(!$this->has('published'))
        {
            return $this->safe()->merge(['published' => 0]);
        } else {
            return $this->safe();
        }
    }
}
