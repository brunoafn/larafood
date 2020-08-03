
@extends('adminlte::page')

@section('title', 'Perfils')

@section('content_header')
    <h1>Perfils <a href="{{route('profiles.create')}}" class="btn btn-dark">ADD</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index',)}}">Dashboard </a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index',)}}">Perfils </a></li>
    </ol>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{route('profiles.search')}}" method="POST">
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
                        <th width="250">Ações</th>
                    </tr>
                <thead>
                <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td>
                                {{$profile->name}}
                            </td>
                            <td>
                                {{-- <a href="{{route('details.plan.index',$plan->url)}}"class="btn btn-info">Detalhes</a> --}}
                                <a href="{{route('profiles.edit',$profile->id)}}"class="btn btn-success">Editar</a>
                                <a href="{{route('profiles.show',$profile->id)}}"class="btn btn-warning">Ver</a>
                                <a href="{{route('profiles.permissions',$profile->id)}}"class="btn btn-warning"><i class="fas fa-lock"></i></a>
                                <a href="{{route('profiles.plans',$profile->id)}}"class="btn btn-info"><i class="fas fa-list-alt"></i></a>

                            </td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $profiles ?? ''->appends($filters)->links() !!}
            @else
                {!! $profiles ?? ''->links() !!}
            @endif
        </div>
    </div>
</div>
@stop
