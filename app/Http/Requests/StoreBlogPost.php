<?php

namespace App\Http\Requests;
use App\Post;
use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       /* $post = Post::find($this->route()->parameter('post'));

       return  $this->user()->can('update',$post); */
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
            'title'  =>  ['required','string','max:100'],
            'body'   =>  ['required','max:300']
        ];
    }

    public function persist($post)
    {
       return $post->addPost([ 
            'user_id' => request('user_id'), 
            'title'   => request('title') ,
            'body'    => request('body')
        ]);

    }
}
