<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Core;

/**
 * Class CoreTransformer.
 *
 * @package namespace App\Transformers;
 */
class CoreTransformer extends TransformerAbstract
{
    /**
     * Transform the Core entity.
     *
     * @param \App\Entities\Core $model
     *
     * @return array
     */
    public function transform(Core $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
