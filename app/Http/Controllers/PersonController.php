<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Services\PersonService;
use App\Http\Requests\PersonRequest;

class PersonController extends Controller
{
    public function __construct(
        public PersonService $personService

    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->personService::getAllPersons();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request)
    {
        return $this->personService::createNewPerson($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return $this->personService::getPersonsById($person);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request, Person $person)
    {
        return $this->personService::updatePerson($request, $person);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        return $this->personService::deletePerson($person);
    }
}
