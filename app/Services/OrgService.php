<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Data\OrgData;
use App\Data\OrgUserData;
use App\Models\Org;
use App\Models\OrgUser;
use Illuminate\Support\Facades\Auth;

class OrgService
{
    public function store(OrgData $data)
    {
        /*
         *  Создание компании
         */
        $org = new Org();
        $org->name = $data->name;
        $org->inn = $data->inn;
        $org->kpp = $data->kpp;

        if ($data->ogrn)
            $org->ogrn = $data->ogrn;

        if ($data->desc)
            $org->desc = $data->desc;

        if ($data->email)
            $org->email = $data->email;

        if ($data->call)
            $org->call = $data->call;

        if ($data->bank_bik)
            $org->bank_bik = $data->bank_bik;

        if ($data->bank_name)
            $org->bank_name = $data->bank_name;

        if ($data->bank_ks)
            $org->bank_ks = $data->bank_ks;

        if ($data->bank_rs)
            $org->bank_rs = $data->bank_rs;

        $org->creator_id = Auth::user()->id;
        $org->type_id = $data->type->id;
        $org->slug = Str::slug($data->name);

        $org->save();

        /*
         *  Добавить создателя в пользователей компании
         */
        $orgUser = new OrgUser();
        $orgUser->org_id = $org->id;
        $orgUser->user_id = Auth::user()->id;

        $orgUser->save();

        return $org;
    }

    public function update(OrgData $data, Org $org)
    {
        /*
         * Обновить компанию
         */
//        $org = auth()->user()->org;
        $org->update([
            'name' => $data->name,
            'inn' => $data->inn,
            'kpp' => $data->kpp,
            'ogrn' => $data->ogrn,
            'desc' => $data->desc,
            'email' => $data->email,
            'call' => $data->call,
            'bank_bik' => $data->bank_bik,
            'bank_name' => $data->bank_name,
            'bank_ks' => $data->bank_ks,
            'bank_rs' => $data->bank_rs,
            'type_id' => $data->type->id,
        ]);
        return $org;
    }

    public function storeUser(OrgUserData $data)
    {
        /*
         *  Добавить пользователя компании
         */
        $orgUser = new OrgUser();
        $orgUser->org_id = $data->org_id;
        $orgUser->user_id = $data->user_id;

        if ($data->user_job_title)
            $orgUser->user_job_title = $data->user_job_title;

        $orgUser->save();

        return $orgUser;
    }
}
