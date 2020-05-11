@extends('adminlte::page')

@section('title', 'Editar novo Perfil')

@section('content_header')
    <h1>Editar Perfil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('profiles.update',$profile->id)}}" class="form" method="POST">
                @csrf
                @method('PUT')
            <div class="form-group">
                <Label>Nome do perfil:</label>
                <input type="text" name="name" class="form-control" placeholder="Nome" value="{{$profile->name ?? old('name')}}">
            </div>

            <div class="form-group">
                <Label>Descrição do perfil:</label>
                <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{$profile->description ?? old('description')}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Salvar</button>
            </div>
            </form>
        </div>
    </div>
@stop
