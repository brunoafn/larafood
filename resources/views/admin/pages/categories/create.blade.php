
@extends('adminlte::page')

@section('title', 'Cadastrar nova Categoria')

@section('content_header')
    <h1>Cadastrar nova Categoria </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('categories.store')}}" class="form" method="POST">
                @csrf
                <div class="form-group">
                    <Label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                    <Label>Descrição:</label>
                    <textarea name="description" cols="30" rows="5" class="form-control" placeholder="Descrição"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>
        </div>
    </div>

@stop
