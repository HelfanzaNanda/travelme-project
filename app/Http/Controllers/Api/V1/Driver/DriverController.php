<?php

namespace App\Http\Controllers\Api\V1\Driver;

use App\Driver;
use App\Http\Resources\driver\DriverResource;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:driver-api');
    }

    public function profile()
    {
        try {
            $driver = Driver::where('id', Auth::guard('driver-api')->user()->id)->first();
            return response()->json([
                'message' => 'succesfully get profile driver',
                'status' => true,
                'data' => new DriverResource($driver)
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }

    public function updateProfil(Request $request)
    {

    }

    public function domicile($location)
    {
        $driver = Driver::where('id', Auth::guard('driver-api')->user()->id)->first();
        $driver->location = $location;
        $driver->update();

        return response()->json([
            'message' => 'you are in domicile',
            'status' => true,
            'data' => (object)[]
        ]);
    }

    public function goOff()
    {
        $driver = Driver::where('id', Auth::guard('driver-api')->user()->id)->first();
        $driver->you_are_domicilied = false;
        $driver->update();

        return response()->json([
            'message' => 'you go off',
            'status' => true,
            'data' => (object)[]
        ]);
    }

    public function updatePhoto(Request $request)
    {
        $photo = $request->file('image');
        $filename = time() . '.' . $photo->getClientOriginalExtension();
        $filepath = 'driver/' . $filename;
        Storage::disk('s3')->put($filepath, file_get_contents($photo));

        $user = Auth::guard('driver-api')->user();
        $user->avatar = Storage::disk('s3')->url($filepath, $filename);
        $user->save();

        return response()->json([
            'message' => 'successfully update profile',
            'status' => true,
            'data' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        if ($request->password == null || empty($request->password)){
            $user = Auth::guard('driver-api')->user();
            $user->name = $request->name;
            $user->save();
            return response()->json([
                'message' => 'successfully update profile',
                'status' => true,
                'data' => $user
            ]);
        }else{
            $user = Auth::guard('driver-api')->user();
            $user->name = $request->name;
            $user->password = $request->password;
            $user->save();
            return response()->json([
                'message' => 'successfully update profile',
                'status' => true,
                'data' => $user
            ]);
        }
    }
}
