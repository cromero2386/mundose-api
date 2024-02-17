<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Services\PersonService;
use App\Http\Requests\PersonRequest;


class PersonController extends Controller
{
    public function __construct(
        protected PersonService $personService

    ) {
    }
    /**
     * @OA\Get(
     *     path="/api/get-people",
     *     summary="Get a list of people",
     *     tags={"People"},
     *     @OA\Response(
     *          response=200, 
     *          description="Successful operation",
     *          @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                      example={
     *                         "data": {
     *                            "id": 1,
     *                             "nombre": "pepe",
     *                             "apellido": "pepe",
     *                             "correo": "user@example.com",
     *                             "provincia": {
     *                                "id": 1,
     *                                "nombre": "Bs As"
     *                              },
     *                              "created_at": "2024-02-17T16:16:12.729Z",
     *                              "updated_at": "2024-02-17T16:16:12.729Z",
     *                              "deleted_at": null
     *                          }  
     *                      }
     *                 )
     *              )
     *         )
     *      ),
     *     @OA\Response(
     *          response=400, 
     *          description="Invalid request",
     *      )
     * )
     * 
     */

    public function index()
    {
        return $this->personService::getAllPersons();
    }

    /**
     * @OA\Post(
     *     path="/api/set-person",
     *     summary="Adds a new person - with one of example",
     *     description="Adds a new person",
     *     tags={"People"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"firstname", "lastname", "email", "province_id"},
     *                 @OA\Property(
     *                     property="firstname",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="lastname",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string",
     *                     format="email",
     *                     pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
     *                 ),
     *                 @OA\Property(
     *                     property="province_id",
     *                     type="integer"
     *                 ),
     *                 example={"firstname": "Carlos", "lastname": "Romero", "email": "example@mail.com", "province_id":18}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Created",
     *         @OA\JsonContent(
     *             example={
     *                "data": {
     *                   "id": 0,
     *                    "nombre": "string",
     *                    "apellido": "string",
     *                    "correo": "user@example.com",
     *                    "provincia": {
     *                       "id": 0,
     *                       "nombre": "string"
     *                     },
     *                     "created_at": "2024-02-17T16:16:12.729Z",
     *                     "updated_at": "2024-02-17T16:16:12.729Z",
     *                     "deleted_at": null
     *                 }  
     *             }
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Entity",
     *         @OA\JsonContent(
     *             example={"message": "El correo ya esta registrado en la base", "errors": {"email": {"El correo ya esta registrado en la base"}}}
     *         )         
     *     )
     * )
     */


    public function store(PersonRequest $request)
    {
        return $this->personService::createNewPerson($request);
    }

    /**
     * @OA\Get(
     *     path="/api/get-person/{person}",
     *     summary="Get a person",
     *     description="Get a person",
     *     tags={"People"},
     *     @OA\Parameter(
     *         description="Parameter with an examples",
     *         in="path",
     *         name="person",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value.")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             example={
     *                "data": {
     *                   "id": 1,
     *                    "nombre": "pepe",
     *                    "apellido": "pepe",
     *                    "correo": "user@example.com",
     *                    "provincia": {
     *                       "id": 1,
     *                       "nombre": "Bs As"
     *                     },
     *                     "created_at": "2024-02-17T16:16:12.729Z",
     *                     "updated_at": "2024-02-17T16:16:12.729Z",
     *                     "deleted_at": null
     *                 }  
     *             }
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Error: Not Found",
     *         @OA\JsonContent(
     *             example={"data": {"message": "No hay resultados para el parametro ingresado..."}}
     *         )         
     *     )
     * )
     */
    public function show(Person $person)
    {
        return $this->personService::getPersonsById($person);
    }

    /**
     * @OA\Put(
     *     path="/api/update-person/{person}",
     *     summary="Updates a person",
     *     description="Updates a person",
     *     tags={"People"},
     *     @OA\Parameter(
     *         description="Parameter with an examples",
     *         in="path",
     *         name="person",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value.")
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"firstname", "lastname", "email", "province_id"},
     *                 @OA\Property(
     *                     property="firstname",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="lastname",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string",
     *                     format="email",
     *                     pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
     *                 ),
     *                 @OA\Property(
     *                     property="province_id",
     *                     type="integer"
     *                 ),
     *                 example={"firstname": "Carlos", "lastname": "Romero", "email": "example@mail.com", "province_id":18}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             example={
     *                "data": {
     *                   "id": 1,
     *                    "nombre": "pepe",
     *                    "apellido": "pepe",
     *                    "correo": "user@example.com",
     *                    "provincia": {
     *                       "id": 1,
     *                       "nombre": "Bs As"
     *                     },
     *                     "created_at": "2024-02-17T16:16:12.729Z",
     *                     "updated_at": "2024-02-17T16:16:12.729Z",
     *                     "deleted_at": null
     *                 }  
     *             }
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Error: Not Found",
     *         @OA\JsonContent(
     *             example={"data": {"message": "No hay resultados para el parametro ingresado..."}}
     *         )         
     *     )
     * )
     */
    public function update(PersonRequest $request, Person $person)
    {
        return $this->personService::updatePerson($request, $person);
    }

    /**
     * @OA\Delete(
     *     path="/api/delete-person/{person}",
     *     summary="Delete a person",
     *     description="Delete a person",
     *     tags={"People"},
     *     @OA\Parameter(
     *         description="Parameter with an examples",
     *         in="path",
     *         name="person",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         @OA\Examples(example="int", value="1", summary="An int value.")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             example={
     *                "data": {
     *                   "id": 1,
     *                    "nombre": "pepe",
     *                    "apellido": "pepe",
     *                    "correo": "user@example.com",
     *                    "provincia": {
     *                       "id": 1,
     *                       "nombre": "Bs As"
     *                     },
     *                     "created_at": "2024-02-17T16:16:12.729Z",
     *                     "updated_at": "2024-02-17T16:16:12.729Z",
     *                     "deleted_at": "2024-02-17T16:16:12.729Z",
     *                 }  
     *             }
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Error: Not Found",
     *         @OA\JsonContent(
     *             example={"data": {"message": "No hay resultados para el parametro ingresado..."}}
     *         )         
     *     )
     * )
     */
    public function destroy(Person $person)
    {
        return $this->personService::deletePerson($person);
    }

    public function getOnlyTrashed()
    {
        return $this->personService::onlyTrashedPersons();
    }
    public function restoreTrashed(Person $person, int $id)
    {
        return $this->personService::restoreTrashedPerson($person, $id);
    }
}
