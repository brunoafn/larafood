
@extends('adminlte::page')

@section('title', 'Perfils do plano {$plan->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index',)}}">Dashboard </a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.index',)}}">Planos </a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.profiles',$plan->id)}}">Perfis </a></li>


    </ol>

    <h1> Perfils do Plano <strong>{{ $plan->name}}</strong></h1>

    <a href="{{route('plans.profiles.available',$plan->id)}}" class="btn btn-dark">ADD NOVO PERFIL</a>
@stop

@section('content')
<div class="card">
    <div class="card-header">

        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Perfils</th>
                    </tr>
                <thead>
                <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td>
                                {{$profile->name}}
                            </td>
                            <td style="width: 10px;">
                                <a href="{{route('plans.profile.detach', [$plan->id, $profile->id])}}" class="btn btn-danger">DESVINCULAR</a>
                            </td>
                        </tr>
                    @endforeach
                        <tr>
                            <td>
                                <a href="/admin/permissions"class="btn btn-primary ">Voltar</a>
                            </td>
                        <tr>
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
