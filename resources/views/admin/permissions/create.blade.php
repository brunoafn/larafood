@extends('adminlte::page')

@section('title', 'Cadastrar novo Perfil')

@section('content_header')
    <h1>Cadastrar Perfil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('permissions.store')}}" class="form" method="POST">
                @csrf
            <div class="form-group">
                <Label>Nome da permissão:</label>
                <input type="text" name="name" class="form-control" placeholder="Nome" value="{{$permission->name ?? old('name')}}">
            </div>

            <div class="form-group">
                <Label>Descrição da permissão:</label>
                <input type="text" name="description" class="form-control" placeholder="Descrição" value="{{$permission->description ?? old('description')}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Salvar</button>
            </div>
            </form>
        </div>
    </div>
@stop
