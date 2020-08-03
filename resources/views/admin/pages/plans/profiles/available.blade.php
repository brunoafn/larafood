
@extends('adminlte::page')

@section('title', 'Perfis disponíveis para o perfil {$plan->name}')

@section('content_header')
    <h1>Perfis disponíveis para o Plano <b>{{$plan->name}}</b>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index',)}}">Dashboard </a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.index',)}}">Planos </a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.profiles.available',$plan->id)}}">Disponíveis </a></li>
    </ol>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{route('plans.profiles.available', $plan->id)}}" method="POST">
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
                <form action="{{route('plans.profiles.attach', $plan->id)}}" method="post">
                        @csrf

                        @foreach($profiles as $profile)
                        <tr>
                            <td>
                                <input type="checkbox" name="profiles[]" value="{{$profile->id}}" id="">
                            </td>
                            <td>
                                {{$profiles->name}}
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
                {!! $profiless ?? ''->appends($filters)->links() !!}
            @else
                {!! $profiless ?? ''->links() !!}
            @endif
        </div>
    </div>
</div>
@stop
