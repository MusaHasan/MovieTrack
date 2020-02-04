<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        //retutn everything 
        // return parent::toArray($request);

        //return secific part
        return[
        'id'=>$this->id,
        'title'=>$this->title,
        'body'=>$this->body,


        ];

    }
}
