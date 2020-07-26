<?php

namespace App\Http\Controllers\Api\V1\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response([
            'message' => trans($response),
            'status' => true,
            'data' => (object)[]
            ], 200);
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response([
            'message' => trans($response),
            'status' => true,
            'data' => (object)[]
            ], 422);
    }
}
