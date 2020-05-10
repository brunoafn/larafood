
@extends('adminlte::page')

@section('title', 'Cadastrar novo Detalhe')

@section('content_header')
    <h1> Dados do Detalhe </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong>{{$detail->name}}
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <form action="{{route('details.plan.destroy',[$plan->url, $detail->id])}}" method="POST">
            @csrf
            @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar esse detalhe do plano {{$plan->name}}</button>
            </form>
        </div>
    </div>

@stop
