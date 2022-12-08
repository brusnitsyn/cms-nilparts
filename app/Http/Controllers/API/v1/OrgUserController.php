<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Org\OrgUserResource;
use App\Models\OrgUser;
use App\Services\OrgService;
use Illuminate\Http\Request;

class OrgUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orgUsers = OrgUser::all();

        return OrgUserResource::collection($orgUsers);
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
     * @param  \App\Models\OrgUser  $orgUser
     * @param  \App\Services\OrgService  $service
     * @return \Illuminate\Http\Response
     */
    public function show(OrgUser $orgUser, OrgService $service)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrgUser  $orgUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrgUser $orgUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrgUser  $orgUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrgUser $orgUser)
    {
        //
    }
}
