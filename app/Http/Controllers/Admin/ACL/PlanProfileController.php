<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    protected $plan, $profile;

    public function __construct(Plan $plan, Profile $profile)
    {
        $this->plan = $plan;
        $this->profile = $profile;
    }

    public function profiles($idPlan){

        $plan = $this->plan->find($idPlan);

        if(!$plan){
            return redirect()->back();
        }

        $profiles = $plan->profiles()->paginate();

        return view('admin.plans.profiles.profiles', compact('plan', 'profiles'));

    }

    public function profilesAvailable(Request $request, $idPlan){

        $plan = $this->plan->find($idPlan);

        if(!$plan){
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $profiles =  $plan->profilesAvailable($request->filter);

        return view('admin.plans.profiles.available', compact('plan', 'profiles', 'filters'));

    }

    public function attachProfilesPlan(Request $request, $idPlan){

        $plan = $this->plan->find($idPlan);

        if(!$plan){
            return redirect()->back();
        }

        if(!$request->profiles || count($request->profiles)==0){
            return redirect()->back()->with('warning', 'Escolha pelo menos um plano!');
        }

        $plan->Profiles()->attach($request->Profiles);

        return redirect()->route('plan.profiles', $plan->id);

    }

    public function detachProfilePlan($idPlan, $idProfile){
        $plan = $this->plan->find($idPlan);
        $profile = $this->profile->find($idProfile);

        if(!$plan || !$profile){
            return redirect()->back();
        }
        $plan->Profiles()->detach($profile);

        return redirect()->route('plans.profiles', $plan->id);
    }

    public function plans($idProfile){

        $profile = $this->profile->find($idProfile);

        if(!$profile){
            return redirect()->back();
        }

        $plans = $profile->Plans()->paginate();

        return view('admin.profiles.plans.plans', compact('plans', 'profile'));
    }
}
