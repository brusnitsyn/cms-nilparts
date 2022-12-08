<?php

namespace App\Http\Controllers\API\v1;

use App\Data\OrgData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Org\OrgStoreRequest;
use App\Http\Requests\Org\OrgUpdateRequest;
use App\Http\Resources\Org\OrgResource;
use App\Models\Org;
use App\Models\User;
use App\Services\OrgService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orgs = Org::withRelationships(request('with'))->get();
        return OrgResource::collection($orgs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Org\OrgStoreRequest  $request
     * @param  \App\Services\OrgService  $service
     * @return \App\Http\Resources\Org\OrgResource
     */
    public function store(OrgStoreRequest $request, OrgService $service)
    {
        $data = OrgData::fromRequest($request);

        $org = $service->store($data);

        return new OrgResource($org);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Org  $org
     * @return OrgResource
     */
    public function show(Org $org)
    {
        $org = $org->loadRelationships(request('with'));
        return OrgResource::make($org);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Org\OrgUpdateRequest  $request
     * @param  \App\Models\Org  $org
     * @param  \App\Services\OrgService  $service
     * @return \App\Http\Resources\Org\OrgResource
     */
    public function update(OrgUpdateRequest $request, Org $org, OrgService $service)
    {
        $data = OrgData::fromRequest($request);

        $updatedOrg = $service->update($data, $org);

        return new OrgResource($updatedOrg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Org  $org
     * @return \Illuminate\Http\Response
     */
    public function destroy(org $org)
    {
        //
    }
}
