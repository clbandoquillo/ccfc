<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'STUDENTCODE' => $this->STUDENTCODE,
            'LASTNAME' => $this->LASTNAME,
            'FIRSTNAME' => $this->FIRSTNAME
        ];
    }
}
