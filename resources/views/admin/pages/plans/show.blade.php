
@extends('adminlte::page')

@section('title', 'Dados do Plano')

@section('content_header')
    <h1>Detalhes do Plano <b>{{$plan->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$plan->name}}
                </li>
                <li>
                    <strong>URL: </strong> {{$plan->url}}
                </li>
                <li>
                    <strong>Preço: </strong> R$ {{number_format($plan->price, 2, ',', '.')}}
                </li>
            </ul>
            @include('admin.includes.alert')
            <form action="{{route('plans.destroy',$plan->url)}}" method="POST">
                @csrf
                @method('DELETE')
               <button type='submit' class="btn btn-danger">Deletar Plano</button>
            </form>
        </div>
    </div>

@stop
