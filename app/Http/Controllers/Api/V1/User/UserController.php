<?php

namespace App\Http\Controllers\Api\V1\User;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Midtrans\Config;
use App\Http\Resources\v2\UserResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    public function updatePhoto(Request $request){
        $photo = $request->file('avatar');
        $filename = time() . '.' . $photo->getClientOriginalExtension();
        $filepath = 'user/' . $filename;
        Storage::disk('s3')->put($filepath, file_get_contents($photo));

        $user = Auth::guard('api')->user();
        $user->avatar = Storage::disk('s3')->url($filepath, $filename);
        $user->save();

        return response()->json([
            'message' => 'successfully update photo profil',
            'status' => true,
            'data' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        if ($request->password == null || empty($request->password)){
            $user = Auth::guard('api')->user();
            $user->name = $request->name;
            $user->save();
            return response()->json([
                'message' => 'successfully update profile',
                'status' => true,
                'data' => $user
            ]);
        }else{
            $user = Auth::guard('api')->user();
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json([
                'message' => 'successfully update profile',
                'status' => true,
                'data' => $user
            ]);
        }
    }

}
