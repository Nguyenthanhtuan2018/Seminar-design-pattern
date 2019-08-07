<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CoreCreateRequest;
use App\Http\Requests\CoreUpdateRequest;
use App\Repositories\CoreRepository;
use App\Validators\CoreValidator;

/**
 * Class CoresController.
 *
 * @package namespace App\Http\Controllers;
 */
class CoresController extends Controller
{
    /**
     * @var CoreRepository
     */
    protected $repository;

    /**
     * @var CoreValidator
     */
    protected $validator;

    /**
     * CoresController constructor.
     *
     * @param CoreRepository $repository
     * @param CoreValidator $validator
     */
    public function __construct(CoreRepository $repository, CoreValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $cores = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $cores,
            ]);
        }

        return view('cores.index', compact('cores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CoreCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CoreCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $core = $this->repository->create($request->all());

            $response = [
                'message' => 'Core created.',
                'data'    => $core->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $core = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $core,
            ]);
        }

        return view('cores.show', compact('core'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $core = $this->repository->find($id);

        return view('cores.edit', compact('core'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CoreUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CoreUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $core = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Core updated.',
                'data'    => $core->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Core deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Core deleted.');
    }
}
