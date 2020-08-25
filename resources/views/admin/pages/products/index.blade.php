
@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produtos <a href="{{route('products.create')}}" class="btn btn-dark">ADD</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index',)}}">Dashboard </a></li>
        <li class="breadcrumb-item active"><a href="{{route('products.index',)}}">Produtos </a></li>
    </ol>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{route('products.search')}}" method="POST">
            @csrf
            <input type="text" name="filter" placeholder="Filtrar pelo Nome" class="form-control" value="{{$filters['filter'] ?? ''}}">
            <br>
            <button type="submit" class="btn btn-dark">Filtrar</button>
        </form>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Título</th>
                        {{-- <th>Descrição</th> --}}
                        <th width="270">Ações</th>
                    </tr>
                <thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                <img src="{{url("storage/{$product->image}")}}" alt="{{$product->title}}" style="max-width: 90px">
                            </td>
                            <td>
                                {{$product->title}}
                            </td>
                            <td>
                                {{-- <a href="{{route('details.product.index',$product->url)}}"class="btn btn-info">Detalhes</a> --}}
                                <a href="{{route('products.edit',$product->id)}}"class="btn btn-success">Editar</a>
                                <a href="{{route('products.show',$product->id)}}"class="btn btn-warning">Ver</a>
                                {{-- <a href="{{route('products.profiles',$product->id)}}"class="btn btn-warning"><i class="fas fa-address-book"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $products ?? ''->appends($filters)->links() !!}
            @else
                {!! $products ?? ''->links() !!}
            @endif
        </div>
    </div>
</div>
@stop
