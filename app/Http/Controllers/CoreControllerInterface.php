<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Interface BaseControllerInterface
 * @package Modules\Core\Contracts
 */
interface CoreControllerInterface
{
    /**
     * @return mixed
     */
    public function index();

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request);

    /**
     * @param int $id
     * @return mixed
     */
    public function show($id);

    /**
     * @param int $id
     * @return mixed
     */
    public function edit($id);

    /**
     * @param Request $request
     * @param int $id
     * @return mixed
     */
    public function update(Request $request, $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function destroy($id);
}
