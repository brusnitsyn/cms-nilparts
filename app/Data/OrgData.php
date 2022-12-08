<?php

namespace App\Data;

use App\Casts\ObjectData;
use Illuminate\Http\Request;

final class OrgData extends ObjectData
{
    public ?string $name;
    public ?string $inn;
    public ?string $ogrn;
    public ?string $desc;
    public ?string $kpp;
    public ?string $email;
    public ?string $call;
    public ?string $bank_bik;
    public ?string $bank_name;
    public ?string $bank_ks;
    public ?string $bank_rs;
    public ?object $type;

    public static function fromRequest(
        Request $request
    ): OrgData {
        return new OrgData(
            name: $request->get('name'),
            inn: $request->get('inn'),
            ogrn: $request->get('ogrn'),
            desc: $request->get('desc'),
            kpp: $request->get('kpp'),
            email: $request->get('email'),
            call: $request->get('call'),
            bank_bik: $request->get('bank_bik'),
            bank_name: $request->get('bank_name'),
            bank_ks: $request->get('bank_ks'),
            bank_rs: $request->get('bank_rs'),
            type: (object) $request->get('type'),
        );
    }
}
