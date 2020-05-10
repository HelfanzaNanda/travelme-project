<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Departure;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\DepartureResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getDestination()
    {
        try{
            $datas = Departure::all();
            return response()->json([
                'message' => 'successfully get destination',
                'status' => true,
                'data' => $datas
            ]);
        }catch (\Exception $exception){
            $exception->getMessage();
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage(),
                'data' => (object)[],
            ], 500);
        }
    }

    public function departureByDestination($destination)
    {
        $datas = Departure::where('destination', $destination)->get();

        /*$results = [];
        foreach ($datas as $val){
            if ($val->date){
                array_push($results, $val);
            }
        }*/

        return response()->json([
            'message' => 'succeessfully get departure by destination',
            'status' => true,
            'data' => DepartureResource::collection($datas)
        ], 200);
    }

    public function search(Request $request)
    {
        try{
            $this->validate($request, [
                'destination' => 'required',
                'date' => 'required',
            ]);

            $date = $request->date;
            $datas = Departure::with(['date' => function ($query) use ($date) {
                $query->where('date', $date);
            }])->where('destination', $request->destination)->get();

            $results = [];
            foreach ($datas as $val){
                if ($val->date){
                    array_push($results, $val);
                }
            }

            return response()->json([
                'message' => 'successfully search',
                'status' => true,
                'data'=> DepartureResource::collection($results),
            ], 200);

        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data'=> (object)[],
            ], 404);
        }
    }

}
