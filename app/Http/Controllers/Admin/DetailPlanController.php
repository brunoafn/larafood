<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateDetailPlan;

class DetailPlanController extends Controller
{
    private $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan){
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    public function index($urlPlan){
        $plan = $this->plan->where('url',$urlPlan)->first();
        if(!$plan){
            return redirect()->back();
        }

        $details = $plan->details()->paginate();

        return view ('admin.pages.plans.details.index', ['details' => $details, 'plan' => $plan]);
    }

    public function create($urlPlan){
        $plan = $this->plan->where('url',$urlPlan)->first();
        if(!$plan){
            return redirect()->back();
        }
        return view('admin.pages.plans.details.create', compact('plan'));
    }

    public function store(StoreUpdateDetailPlan $request, $urlPlan){
        $plan = $this->plan->where('url',$urlPlan)->first();
        if(!$plan){
            return redirect()->back();
        }

        $plan->details()->create($request->all());

        return redirect()->route('details.plan.index', $plan->url);
    }

    public function edit($urlPlan, $idDetail){
        $plan = $this->plan->where('url',$urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail){
            return redirect()->back();
        }
        return view('admin.pages.plans.details.edit', compact('plan', 'detail'));
    }

    public function update(StoreUpdateDetailPlan $request, $urlPlan, $idDetail){

        $plan = $this->plan->where('url',$urlPlan)->first();
        $detail = $this->repository->where('id',$idDetail)->first();

        if(!$plan || !$detail){
            return redirect()->back();
        }

        $detail->name = $request->name;
        $detail->update();

        return redirect()->route('details.plan.index', $plan->url);
    }

    public function show($urlPlan, $idDetail){
        $plan = $this->plan->where('url',$urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail){
            return redirect()->back();
        }
        return view('admin.pages.plans.details.show', compact('plan', 'detail'));
    }

    public function destroy($urlPlan, $idDetail){
        $plan = $this->plan->where('url',$urlPlan)->first();
        $detail = $this->repository->find($idDetail);

        if(!$plan || !$detail){
            return redirect()->back();
        }

        $detail->delete();

        return redirect()->route('details.plan.index', $plan->url)->with('message', 'Detalhe deletado com sucesso!');
    }
}
