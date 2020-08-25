
@extends('adminlte::page')

@section('title', 'Dados do Produto')

@section('content_header')
    <h1>Detalhes do Produto <b>{{$product->title}}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>

                    <img src="{{url("storage/{$product->image}")}}" alt="{{$product->title}}" style="max-width: 90px">

                <li>
                    <strong>Título: </strong> {{$product->title}}
                </li>
                <li>
                    <strong>Flag: </strong> {{$product->flag}}
                </li>
                <li>
                    <strong>Descrição: </strong> {{$product->description}}
                </li>
            </ul>
            @include('admin.includes.alert')
            <form action="{{route('products.destroy',$product->id)}}" method="POST">
                @csrf
                @method('DELETE')
               <button type='submit' class="btn btn-danger">Deletar o Produto</button>
            </form>
        </div>
    </div>

@stop
