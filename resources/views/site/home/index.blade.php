@extends('site.layouts.app')

@section('content')
<div class="text-center">
    <h1 class="title-plan">Escolha o plano</h1>
</div>
<div class="row">
    @foreach ($plans as $plan)
        <div class="col-md-4 col-sm-6">
            <div class="pricingTable">
                <div class="pricing-content">
                    <div class="pricingTable-header">
                        <h3 class="title">{{$plan->name}}</h3>
                    </div>
                    <div class="inner-content">
                        <div class="price-value">
                            <span class="currency">R$</span>
                            <span class="amount">{{number_format($plan->price, 2, ',', '.')}}</span>
                            <span class="duration">Por Mês</span>
                        </div>
                        <ul>
                            @foreach ($plan->details as $detail)
                                <li>{{$detail->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="pricingTable-signup">
                    <a href="{{route('plan.subscription', $plan->url)}}">Assinar</a>
                </div>
            </div>
        </div>
    @endforeach
    {{-- <div class="col-md-4 col-sm-6">
        <div class="pricingTable">
            <div class="pricing-content">
                <div class="pricingTable-header">
                    <h3 class="title">Premium</h3>
                </div>
                <div class="inner-content">
                    <div class="price-value">
                        <span class="currency">R$</span>
                        <span class="amount">199,99</span>
                        <span class="duration">Por Mês</span>
                    </div>
                    <ul>
                        <li>Categorias</li>
                        <li>Produtos</li>
                        <li>Mesas</li>
                        <li>Cardápio</li>
                    </ul>
                </div>
            </div>
            <div class="pricingTable-signup">
                <a href="#">Assinar</a>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="pricingTable">
            <div class="pricing-content">
                <div class="pricingTable-header">
                    <h3 class="title">Business</h3>
                </div>
                <div class="inner-content">
                    <div class="price-value">
                        <span class="currency">R$</span>
                        <span class="amount">499,99</span>
                        <span class="duration">Por Mês</span>
                    </div>
                    <ul>
                        <li>Categorias</li>
                        <li>Produtos</li>
                        <li>Mesas</li>
                        <li>Cardápio</li>
                        <li>Suporte</li>
                    </ul>
                </div>
            </div>
            <div class="pricingTable-signup">
                <a href="#">Assinar</a>
            </div>
        </div>
    </div> --}}
</div>
@endsection
