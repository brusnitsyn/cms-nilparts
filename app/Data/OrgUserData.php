<?php

namespace App\Data;

use App\Casts\ObjectData;
use Illuminate\Http\Request;

final class OrgUserData extends ObjectData
{
    public ?string $user_job_title;
    public int $org_id;
    public int $user_id;

    public static function fromRequest(
        Request $request
    ): OrgUserData {
        return new OrgUserData(
            user_job_title: $request->get('user_job_title'),
            org_id: $request->get('org_id'),
            user_id: $request->get('user_id'),
        );
    }
}
