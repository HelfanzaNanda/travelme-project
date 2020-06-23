<?php

namespace App\Http\Resources;

use App\Order;
use Illuminate\Http\Resources\Json\JsonResource;

class ChartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $count = [];
        for ($i=1; $i <= 12; $i++) {
            $order = $this->where('departure_id', $this->departure_id)
            ->whereMonth('date', $i)->get()->count();
            array_push($count, $order);
         }

        return [
            'name' => '1',
            'data' => $count
        ];
    }
}
