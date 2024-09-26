<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Http\Resources\PersonResource;
use App\Models\Person;
use Illuminate\Http\Response;

class PersonController extends Controller
{

    public function store(PersonRequest $request): PersonResource
    {
        $person = Person::create($request->validated());

        return new PersonResource($person);
    }

    public function update(): PersonResource
    {
        $person = Person::update();

        return new PersonResource($person);
    }

    public function destroy(Person $person): Response
    {
        $person->delete();

        return response()->noContent();
    }
}
