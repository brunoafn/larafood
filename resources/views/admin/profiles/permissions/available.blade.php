
@extends('adminlte::page')

@section('title', 'Permissões disponíveis para o perfil {$profile->name}')

@section('content_header')
    <h1>Permissões disponíveis para o perfil <b>{{$profile->name}}</b>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index',)}}">Dashboard </a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index',)}}">Perfils </a></li>
    </ol>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{route('profiles.permissions.available', $profile->id)}}" method="POST">
            @csrf
            <input type="text" name="filter" placeholder="Filtrar pelo Nome" class="form-control" value="{{$filters['filter'] ?? ''}}">
            <br>
            <button type="submit" class="btn btn-dark">Filtrar</button>
        </form>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">Opções</th>
                        <th>Nome</th>
                    </tr>
                <thead>
                <tbody>
                <form action="{{route('profiles.permissions.attach', $profile->id)}}" method="post">
                        @csrf

                        @foreach($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox" name="permissions[]" value="{{$permission->id}}" id="">
                            </td>
                            <td>
                                {{$permission->name}}
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alert')
                                <button type="submit" class="btn btn-primary">Vincular</button>
                            </td>
                        </tr>
                    </form>
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
