
@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários <a href="{{route('users.create')}}" class="btn btn-dark">ADD</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index',)}}">Dashboard </a></li>
        <li class="breadcrumb-item active"><a href="{{route('users.index',)}}">Usuários </a></li>
    </ol>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{route('users.search')}}" method="POST">
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
                        <th>Email</th>
                        <th width="270">Ações</th>
                    </tr>
                <thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                {{-- <a href="{{route('details.user.index',$user->url)}}"class="btn btn-info">Detalhes</a> --}}
                                <a href="{{route('users.edit',$user->id)}}"class="btn btn-success">Editar</a>
                                <a href="{{route('users.show',$user->id)}}"class="btn btn-warning">Ver</a>
                                {{-- <a href="{{route('users.profiles',$user->id)}}"class="btn btn-warning"><i class="fas fa-address-book"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $users ?? ''->appends($filters)->links() !!}
            @else
                {!! $users ?? ''->links() !!}
            @endif
        </div>
    </div>
</div>
@stop
