<?php

namespace App\Transformers;

use App\Post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['user'];

    /**
     * @param \App\Post $post
     * @return array
     */
    public function transform(Post $post)
    {
        return [
            'id'         => (int) $post->id,
            'created_at' => (string) $post->created_at,
            'updated_at' => (string) $post->updated_at,
        ];
    }
}
