
@extends('adminlte::page')

@section('title', 'Dados do perfil')

@section('content_header')
    <h1>Detalhes do perfil<b>{{$profile->name}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{$profile->name}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$profile->description}}
                </li>
            </ul>
            @include('admin.includes.alert')
            <form action="{{route('profiles.destroy',$profile->id)}}" method="POST">
                @csrf
                @method('DELETE')
               <button type='submit' class="btn btn-danger">Deletar perfil</button>
            </form>
        </div>
    </div>

@stop
