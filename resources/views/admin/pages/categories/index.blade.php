
@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias <a href="{{route('categories.create')}}" class="btn btn-dark">ADD</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index',)}}">Dashboard </a></li>
        <li class="breadcrumb-item active"><a href="{{route('categories.index',)}}">Usuários </a></li>
    </ol>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{route('categories.search')}}" method="POST">
            @csrf
            <input type="text" name="filter" placeholder="Filtrar pelo Nome" class="form-control" value="{{$filters['filter'] ?? ''}}">
            <br>
            <button type="submit" class="btn btn-dark">Filtrar</button>
        </form>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th width="270">Ações</th>
                    </tr>
                <thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{$category->name}}
                            </td>
                            <td>
                                {{$category->description}}
                            </td>
                            <td>
                                {{-- <a href="{{route('details.category.index',$category->url)}}"class="btn btn-info">Detalhes</a> --}}
                                <a href="{{route('categories.edit',$category->id)}}"class="btn btn-success">Editar</a>
                                <a href="{{route('categories.show',$category->id)}}"class="btn btn-warning">Ver</a>
                                {{-- <a href="{{route('categories.profiles',$category->id)}}"class="btn btn-warning"><i class="fas fa-address-book"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $categories ?? ''->appends($filters)->links() !!}
            @else
                {!! $categories ?? ''->links() !!}
            @endif
        </div>
    </div>
</div>
@stop
