
@extends('adminlte::page')

@section('title', 'Cadastrar novo Produto')

@section('content_header')
    <h1>Cadastrar novo Produto </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('products.store')}}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <Label>Título:</label>
                    <input type="text" name="title" class="form-control" placeholder="Título" value="{{ $product->title ??  old('title') }}">
                </div>
                <div class="form-group">
                    <Label>Preço:</label>
                    <input type="text" name="price" class="form-control" placeholder="Preco" value="{{ $product->price ??  old('price') }}">
                </div>
                <div class="form-group">
                    <Label>Imagem:</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <Label>Descrição:</label>
                    <textarea name="description" cols="30" rows="5" class="form-control" value="{{ $product->description ??  old('description') }}"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>
        </div>
    </div>

@stop
