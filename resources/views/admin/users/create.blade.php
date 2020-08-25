
@extends('adminlte::page')

@section('title', 'Cadastrar novo Usuário')

@section('content_header')
    <h1>Cadastrar novo Usuário </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('plans.store')}}" class="form" method="POST">
                @csrf
                <div class="form-group">
                    <Label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                    <Label>Email:</label>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <Label>Senha:</label>
                    <input type="password" name="password" class="form-control" placeholder="Senha">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>
        </div>
    </div>

@stop
