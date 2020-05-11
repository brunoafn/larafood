
@extends('adminlte::page')

@section('title', 'Dados da Permissão')

@section('content_header')
    <h1>Detalhes do perfil<b>{{$permission->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$permission->name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$permission->description}}
                </li>
            </ul>
            @include('admin.includes.alert')
            <form action="{{route('permissions.destroy',$permission->id)}}" method="POST">
                @csrf
                @method('DELETE')
               <button type='submit' class="btn btn-danger">Deletar Permissão</button>
            </form>
        </div>
    </div>

@stop
