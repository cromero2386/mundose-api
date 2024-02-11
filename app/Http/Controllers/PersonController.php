<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Requests\StorePersonRequest;
use App\Services\PersonService;

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
        return $this->personService::getPersons();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request)
    {
        return $this->personService::storePerson($request);
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
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }
}
