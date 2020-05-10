
@extends('adminlte::page')

@section('title', 'Cadastrar novo Detalhe')

@section('content_header')
    <h1>Cadastrar novo Detalhe </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('details.plan.store', $plan->url)}}" class="form" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="plan_id" class="form-control" value="{{$plan->id}}">
                </div>
                @include('admin.pages.plans.details._partials.form')
            </form>
        </div>
    </div>

@stop
