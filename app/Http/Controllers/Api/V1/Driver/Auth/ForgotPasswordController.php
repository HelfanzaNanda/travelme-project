<?php

namespace App\Http\Controllers\Api\V1\Driver\Auth;

use App\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:driver');
    }

    public function broker()
    {
        return Password::broker('drivers');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $driver = Driver::where('email', $request->email)->first();
        if($driver == null){
            return response()->json([
                'messagge' => 'email tidak di temukan',
                'status' => false,
                'data' => (object)[]
            ]);
        }

        $this->validateEmail($request);

        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);

            return response()->json([
                'message' => 'check email anda, untuk melakukan reset password',
                'status' => true,
                'data' => (object)[]
            ]);
    }
}
