<?php

namespace App\Contracts;

interface DataTransformer
{
    /**
     * @param array $data
     * @return array
     */
    public function transform($data);
}
