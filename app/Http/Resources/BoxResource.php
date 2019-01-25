<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BoxResource extends JsonResource
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
            'id'                => $this->id,
            'name'              => $this->name,
            'barcode'           => $this->barcode,
            'code_shelves'      => $this->code_shelves,
            'location'          => $this->location,
            'space'             => new SpaceResource($this->space),
            'shelves'           => new ShelvesResource($this->shelves)
        ];
    }
}
