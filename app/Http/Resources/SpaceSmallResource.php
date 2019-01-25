<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpaceSmallResource extends JsonResource
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
            'code_space_small'  => $this->code_space_small,
            'barcode'           => $this->barcode,
            'location'          => $this->location,
            'shelves'           => new ShelvesResource($this->shelves)
        ];
    }
}
