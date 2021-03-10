<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class SuccessTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param bool $status
     * @return array
     */
    public function transform(bool $status)
    {
        return [
            'status' => $status,
        ];
    }
}
