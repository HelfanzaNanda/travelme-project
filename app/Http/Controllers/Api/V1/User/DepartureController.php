<?php

namespace App\Http\Controllers\Api\V1\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Departure;
use App\HourOfDeparture;
use App\Http\Resources\User\DepartureResource;
use App\Http\Resources\v2\HourResource;
use App\Http\Resources\v2\HoursResource;
use App\Owner;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Validator;

class DepartureController extends Controller
{

    // public function getDestinationFromTegal()
    // {
    //     try{
    //         $datas = Departure::all();
    //         return response()->json([
    //             'message' => 'successfully get destination',
    //             'status' => true,
    //             'data' => $datas
    //         ]);
    //     }catch (\Exception $exception){
    //         return response()->json([
    //             'message' => $exception->getMessage(),
    //             'status' => false,
    //             'data' => (object)[]
    //         ]);
    //     }
    // }


    public function getDomicile()
    {
        $domicile = Owner::all('domicile');

        return response()->json([
            'message' => 'successfully get domicile',
            'status' => true,
            'data' => $domicile
        ]);
    }


    public function getDestinationTegal()
    {
        try{
            $datas = Departure::where('destination', 'Tegal')->get();
            return response()->json([
                'message' => 'successfully get destination',
                'status' => true,
                'data' => $datas
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }


    public function getDestinationOther()
    {
        try{
            $datas = Departure::where('destination', '!=','Tegal')->get();
            return response()->json([
                'message' => 'successfully get destination',
                'status' => true,
                'data' => $datas
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ]);
        }
    }


    

    public function departureByDestination($destination)
    {
        try{

            $now = Carbon::now();
            $datas = Departure::with(['dates' => function($query) use($now){
                $query->whereDate('date', '>=', $now);
            }])->where('destination', $destination)->orderBy('id', 'ASC')->get();

            $results = [];
            foreach ($datas as $val){
                if ($val->date){
                    array_push($results, $val);
                }
            }

            return response()->json([
                'message' => 'succeessfully get departure by destination',
                'status' => true,
                'data' => DepartureResource::collection(collect($results))
            ], 200);

        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                'data' => (object)[]
            ], 200);
        }
    }

    public function search(Request $request)
    {
        try{
            $validator = Validator::make($request->all(),['destination' => 'required', 'date' => 'required',]);

            if ($validator->fails()){
                return response()->json(['message' => $validator->errors(),'status' => false,'data'=> (object)[]], 501);
            }

            $now = Carbon::now();
            $datas = Departure::with(['dates' => function($q) use($request, $now){
                $q->whereDate('date', $request->date)->whereDate('date', '>=', $now);
            }])->where('destination', $request->destination)->orderBy('id', 'ASC')->get();

            $results = [];
            foreach ($datas as $val){
                if ($val->dates){
                    array_push($results, $val);
                }
            }

            return response()->json([
                'message' => 'successfully search departure',
                'status' => true,
                'data'=> DepartureResource::collection(collect($results)),
            ], 200);

        }catch (\Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
                'status' => false,
                    'data'=> (object)[]
            ], 200);
        }
    }

    public function searchOwner(Request $request)
    {
        $date = $request->date;
        $from = $request->from;
        $destination = $request->destination;
        $now = Carbon::now();

        $data = Departure::with(['dates' => function ($query) use ($date, $now){
            $query->whereDate('date', '>=', $now)->whereDate('date', $date);
        }])->where('from', $from)->where('destination', $destination)->orderBy('id', 'ASC')->get();

        return response()->json([
            'message' => 'successfully search travel',
            'status' => true,
            'data' => DepartureResource::collection($data)
        ]);
    }

    public function searchHour(Request $request)
    {
        $date = $request->date;
        $from = $request->from;
        $destination = $request->destination;
        $now = Carbon::now();

        $data = HourOfDeparture::whereHas('date', function($query) use ($date, $now, $from, $destination){
            $query->whereDate('date', '>=', $now)->whereDate('date', $date)
            ->whereHas('departure', function($q) use($from, $destination){
                $q->where('from', $from)->where('destination', $destination);
            });
        })->orderBy('id', 'ASC')->get();

        return response()->json([
            'message' => 'successfully search travel',
            'status' => true,
            'data' => HourResource::collection($data)
        ]);
    }

    public function searchOwners(Request $request)
    {
        $hour = $request->hour;
        $date = $request->date;
        $from = $request->from;
        $destination = $request->destination;
        $now = Carbon::now();

        $data = HourOfDeparture::whereHas('date', function($query) use ($date, $now, $from, $destination){
            $query->whereDate('date', '>=', $now)->whereDate('date', $date)
            ->whereHas('departure', function($q) use ($from, $destination){
                $q->where('from', $from)->where('destination', $destination);
            });
        })->where('hour', $hour)->orderBy('id', 'ASC')->get();

        return response()->json([
            'message' => 'successfully search travel',
            'status' => true,
            'data' => HoursResource::collection($data)
        ]);
    }
}
