<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class WarehouseResource extends Resource
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
            'id' => $this->id,
            'name' => $this->name,
            'lat' => $this->lat,
            'long' => $this->long,
            'area' => new AreaWarehouseResource($this->areaWarehouse)
        ];
    }
}
