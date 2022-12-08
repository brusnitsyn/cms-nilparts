<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Org\OrgTypeResource;
use App\Models\OrgType;
use Illuminate\Http\Request;

class OrgTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orgTypes = OrgType::all();

        return OrgTypeResource::collection($orgTypes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrgType  $orgType
     * @return \Illuminate\Http\Response
     */
    public function show(OrgType $orgType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrgType  $orgType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrgType $orgType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrgType  $orgType
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrgType $orgType)
    {
        //
    }
}
