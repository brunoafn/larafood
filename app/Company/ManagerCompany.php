<?php

namespace App\Company;

use App\Models\Company;

class ManagerCompany{

    public function getCompanyIdentify(){
       return auth()->user()->company_id;
    }

    public function getCompany(): Company{
        return auth()->user()->company;
    }

    public function isAdmin(): bool{

        return in_array(auth()->user()->email, config('company.admins'));
    }

}
