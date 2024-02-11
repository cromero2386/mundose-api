<?php

namespace App\Services;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Resources\PersonResource;

class PersonService
{
    public static function getPersons()
    {
        return PersonResource::collection(Person::all());
    }
    public static function getPersonsById(Person $person)
    {
        return new PersonResource($person);
    }
    public static function storePerson(Request $person)
    {
        $person = Person::create([
            'firstname' => $person->firstname,
            'lastname' => $person->lastname,
            'email' => $person->email,
            'province_id' => $person->province_id,
        ]);
        return new PersonResource($person);
    }
    public static function updatePerson(int $person)
    {
    }
    public static function deletePerson(int $person)
    {
    }
}
