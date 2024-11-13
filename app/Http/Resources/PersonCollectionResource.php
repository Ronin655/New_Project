<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PersonCollectionResource extends ResourceCollection
{

    public $collects = PersonResource::class;

}
