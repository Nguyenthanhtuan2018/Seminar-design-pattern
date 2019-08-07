<?php

namespace App\Presenters;

use App\Transformers\CoreTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CorePresenter.
 *
 * @package namespace App\Presenters;
 */
class CorePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CoreTransformer();
    }
}
