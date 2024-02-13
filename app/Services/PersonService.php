<?php

namespace App\Services;

use App\Models\Person;
use App\Http\Requests\PersonRequest;
use App\Http\Resources\PersonResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonService
{
    public static function getAllPersons(): JsonResource
    {
        return PersonResource::collection(Person::all());
    }
    public static function getPersonsById(Person $person): JsonResource
    {
        return new PersonResource($person);
    }
    public static function createNewPerson(PersonRequest $person): JsonResource
    {
        $person = Person::create([
            'firstname' => $person->firstname,
            'lastname' => $person->lastname,
            'email' => $person->email,
            'province_id' => $person->province_id,
        ]);
        return new PersonResource($person);
    }
    public static function updatePerson(PersonRequest $request, Person $person): JsonResource
    {
        $person->firstname = $request->firstname;
        $person->lastname = $request->lastname;
        $person->province_id = $request->province_id;
        $person->save();
        return new PersonResource($person);
    }
    public static function deletePerson(Person $person): JsonResource
    {
        $person->delete();
        return new PersonResource($person);
    }
    public static function onlyTrashedPersons(): JsonResource
    {
        return PersonResource::collection(Person::onlyTrashed()->get());
    }
    public static function restoreTrashedPerson(Person $person, int $id): JsonResource
    {
        // Unlinks the logical deletion constraint and finds the model by its ID, 
        // including the logically deleted records.
        $restoredPerson = $person->withTrashed()->findOrFail($id);
        // Check if the deleted model was found
        if ($restoredPerson) {
            // Restore the model
            $restoredPerson->restore();
            // Return the restored Person resource
            return new PersonResource($restoredPerson);
        } else {
            // Handle the case where the deleted model was not found.
            throw new \Exception('No se encontró la persona eliminada para restaurar');
        }
    }
}
