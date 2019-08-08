<?php

namespace App\Responses;

class CoreResponse
{
    public function data($data)
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function created($data, $message = null)
    {
        $message = $message ?: trans('common.create_new_success');
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data
        ], 201);
    }

    public function updated($data, $message = null)
    {
        $message = $message ?: trans('common.edit_successfully');
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], 200);
    }

    public function deleted($message = null)
    {
        $message = $message ?: trans('common.successfully_deleted');
        return response()->json([
            'success' => true,
            'message' => $message,
        ], 200);
    }

    public function error($error, $message = null)
    {
        $message = $message ?: trans('common.request_failed');
        return response()->json([
            'success' => false,
            'message' => $message,
            'error'   => $error
        ], 500);
    }

    public function validationError($error, $message = null)
    {
        $message = $message ?: trans('validation.validation_exception');
        return response()->json([
            'success'    => false,
            'message'    => $message,
            'validation' => $error
        ], 403);
    }
}
