<?php

namespace App\Http\Controllers\Api\V1\User;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Midtrans\Config;
use App\Http\Resources\v2\UserResource;
use Carbon\Carbon;

/**
 * @property  response
 */
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('getUsers');
    }

    public function getUsers()
    {
        try{
            $users = User::all();
            return response()->json([
                'message' => 'successfully get all users',
                'status' => true,
                'data' => UserResource::collection($users)
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }

    public function profile()
    {
        try{

            $user = User::where('id', Auth::guard('api')->user()->id)->first();
            return response()->json([
                'message' => 'successfully get user is login',
                'status' => true,
                'data' => new UserResource($user)
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }

    }

    public function updateprofile(Request $request)
    {
        $user = User::where('id', Auth::guard('api')->user()->id)->first();
        $user->name = $request->name;
        $user->password = $request->password;
        $photo = $request->file('photo');
        if($photo){
            $path = time() . '.' . $photo->getClientOriginalExtension();
            $destinationPath = public_path('uploads/owner/user');
            $photo->move($destinationPath, $path);
            $user->photo = $path;
        }else{
            $user->photo = $user->photo;
        }
        $user->update();

        return response()->json([
            'message' => 'successfully update profile user',
            'status' => true,
            'data' => new UserResource($user)
        ]);
    }

}
