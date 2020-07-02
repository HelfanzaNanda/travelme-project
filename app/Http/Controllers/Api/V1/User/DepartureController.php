<?php

namespace App\Http\Controllers\Api\V1\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HourOfDeparture;
use App\Http\Resources\v2\HourResource;
use App\Http\Resources\v2\HoursResource;
use App\Owner;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Validator;

class DepartureController extends Controller
{

    public function getDomicile()
    {
        $domicile = Owner::where('domicile', '!=', 'Tegal')->orderBy('domicile', 'ASC')->get('domicile');

        return response()->json([
            'message' => 'successfully get domicile',
            'status' => true,
            'data' => $domicile
        ]);
    }


    public function searchHour(Request $request)
    {
        $date = $request->date;
        $from = $request->from;
        $destination = $request->destination;
        $now = Carbon::now();

        $hours = HourOfDeparture::whereHas('date', function($query) use ($date, $now, $from, $destination){
            $query->whereDate('date', '>=', $now)->whereDate('date', $date)
            ->whereHas('departure', function($q) use($from, $destination){
                $q->where('from', $from)->where('destination', $destination);
            });
        })->where('remaining_seat','!=', 0)->orderBy('hour', 'ASC')->get();

        $results = [];
        foreach($hours as $hour){
            $minute = substr($hour, 3);
            if($minute != '00'){
                $minute = '00';
                array_push($results, $hour);
            }
        }

        return response()->json([
            'message' => 'successfully search travel',
            'status' => true,
            'data' => HourResource::collection(collect($results))
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
        })->where('hour', $hour)->where('remaining_seat','!=', 0)->orderBy('id', 'ASC')->get();

        return response()->json([
            'message' => 'successfully search travel',
            'status' => true,
            'data' => HoursResource::collection($data)
        ]);
    }
}
