
@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <h1>Permissões <a href="{{route('permissions.create')}}" class="btn btn-dark">ADD</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index',)}}">Dashboard </a></li>
        <li class="breadcrumb-item active"><a href="{{route('permissions.index',)}}">Permissões </a></li>
    </ol>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{route('permissions.search')}}" method="POST">
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
                        <th width="450">Ações</th>
                    </tr>
                <thead>
                <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                {{$permission->name}}
                            </td>
                            <td>
                                {{-- <a href="{{route('details.plan.index',$plan->url)}}"class="btn btn-info">Detalhes</a> --}}
                                <a href="{{route('permissions.edit',$permission->id)}}"class="btn btn-success">Editar</a>
                                <a href="{{route('permissions.show',$permission->id)}}"class="btn btn-warning">Ver</a>
                                <a href="{{route('profiles.permissions.profiles',$permission->id)}}"class="btn btn-info">Perfis com esta Permissão</a>

                            </td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $permissions ?? ''->appends($filters)->links() !!}
            @else
                {!! $permissions ?? ''->links() !!}
            @endif
        </div>
    </div>
</div>
@stop
