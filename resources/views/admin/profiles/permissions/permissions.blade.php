
@extends('adminlte::page')

@section('title', 'Permissões do perfil {$profile->name}')

@section('content_header')
    <h1>Permissões do perfil <b>{{$profile->name}}</b>
        <a href="{{route('profiles.permissions.available',$profile->id)}}" class="btn btn-dark">ADD Nova Permissão</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index',)}}">Dashboard </a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index',)}}">Perfils </a></li>
    </ol>
@stop

@section('content')
<div class="card">
    <div class="card-header">
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
                                <a href="{{route('profiles.permissions.detach',[$profile->id, $permission->id])}}"class="btn btn-danger">Desvincular Permissão</a>
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
