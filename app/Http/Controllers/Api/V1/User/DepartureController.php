<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Departure;
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

    public function getDestination()
    {
        $domicile = Departure::where('destination', '!=', 'Tegal')->orderBy('destination', 'ASC')->get('destination');

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
        $now = Carbon::now()->format('Y-m-d');
        $hourNow = Carbon::now()->addHours(2)->format('H:i');

        if ($date == $now) {
            $hours = HourOfDeparture::whereHas('date', function ($query) use ($date, $now, $from, $destination) {
                $query->whereDate('date', '>=', $now)->whereDate('date', $date)
                    ->whereHas('departure', function ($q) use ($from, $destination) {
                        $q->where('from', $from)->where('destination', $destination);
                    });
            })->where('remaining_seat', '>', 2)->whereTime('hour', '>=', $hourNow)->orderBy('hour', 'ASC')->get();

            return response()->json([
                'message' => 'successfully search travel',
                'status' => true,
                'data' => HourResource::collection($hours)
            ]);
        } else {
            $hours = HourOfDeparture::whereHas('date', function ($query) use ($date, $now, $from, $destination) {
                $query->whereDate('date', '>=', $now)->whereDate('date', $date)
                    ->whereHas('departure', function ($q) use ($from, $destination) {
                        $q->where('from', $from)->where('destination', $destination);
                    });
            })->where('remaining_seat', '>', 2)->orderBy('hour', 'ASC')->get();

            return response()->json([
                'message' => 'successfully search travel',
                'status' => true,
                'data' => HourResource::collection($hours)
            ]);
        }
    }

    public function searchOwners(Request $request)
    {
        $hour = $request->hour;
        $date = $request->date;
        $from = $request->from;
        $destination = $request->destination;
        $now = Carbon::now();

        $data = HourOfDeparture::whereHas('date', function ($query) use ($date, $now, $from, $destination) {
            $query->whereDate('date', '>=', $now)->whereDate('date', $date)
                ->whereHas('departure', function ($q) use ($from, $destination) {
                    $q->where('from', $from)->where('destination', $destination);
                });
        })->where('remaining_seat', '!=', 0)->where('hour', $hour)->orderBy('id', 'ASC')->get();

        return response()->json([
            'message' => 'successfully search travel',
            'status' => true,
            'data' => HoursResource::collection($data)
        ]);
    }
}
