<?php

namespace App\Services;

use App\Models\Person;
use App\Http\Requests\PersonRequest;
use App\Http\Resources\PersonResource;

class PersonService
{
    public static function getAllPersons()
    {
        return PersonResource::collection(Person::all());
    }
    public static function getPersonsById(Person $person)
    {
        return new PersonResource($person);
    }
    public static function createNewPerson(PersonRequest $person)
    {
        $person = Person::create([
            'firstname' => $person->firstname,
            'lastname' => $person->lastname,
            'email' => $person->email,
            'province_id' => $person->province_id,
        ]);
        return new PersonResource($person);
    }
    public static function updatePerson(PersonRequest $request, Person $person)
    {
        $person->firstname = $request->firstname;
        $person->lastname = $request->lastname;
        $person->province_id = $request->province_id;
        $person->save();
        return new PersonResource($person);
    }
    public static function deletePerson(Person $person)
    {
        $person->delete();
        return new PersonResource($person);
    }
}
