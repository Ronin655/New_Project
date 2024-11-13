<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Http\Resources\PersonCollectionResource;
use App\Http\Resources\PersonResource;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PersonController extends Controller
{
    public function index(): PersonCollectionResource
    {

        $id = Person::query()->get();

        return new PersonCollectionResource($id);
    }

    public function store(PersonRequest $request): PersonResource
    {

        $data = $request->validated();
        $data['date_of_birth'] = Carbon::make($data['date_of_birth']);
        $data['date_of_death'] = Carbon::make($data['date_of_death']);
//        dd(
//            $data
//        );

        $person = Person::create($request->validated());

        return new PersonResource($person);
    }

    public function show(Person $id)
    {

        return (new PersonResource($id))->response();

    }

    public function update(PersonRequest $request, Person $person): PersonResource
    {
        $person = Person::query()->find($person);

        return new PersonResource($person);
    }

    public function destroy(Person $person): Response
    {
        $person->delete();

        return response()->noContent();
    }
}
