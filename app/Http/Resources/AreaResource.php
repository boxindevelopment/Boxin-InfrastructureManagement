<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AreaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'id_name'   => $this->id_name,
            'latitude'  => $this->latitude,
            'longitude' => $this->longitude,
            'city'      => new CityResource($this->city)
        ];
    }
}
