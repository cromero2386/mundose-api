<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Http\Resources\ProvinceResource;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProvinceResource::collection(Province::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Province $province)
    {
        return new ProvinceResource($province);
    }
}
