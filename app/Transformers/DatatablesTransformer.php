<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\User;

class DatatablesTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id'         => (int) $user->id,
            'name'       => $user->name,
            'email'      => $user->email,
            'created_at' => (string) $user->created_at,
            'updated_at' => (string) $user->updated_at,
        ];
    }
}
