<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface ModelEvent
{
    /**
     * @return Model
     */
    public function getModel(): Model;
}
