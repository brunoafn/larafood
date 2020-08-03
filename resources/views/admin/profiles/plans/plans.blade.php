
@extends('adminlte::page')

@section('title', 'Planos relacionados a permissão escolhida')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard </a></li>
        <li class="breadcrumb-item"><a href="{{route('profiles.index')}}">Perfis </a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.plans',$profile->id)}}">Planos </a></li>

    </ol>
@stop

@section('content')
<div class="card">
    <div class="card-header">

        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Planos</th>
                    </tr>
                <thead>
                <tbody>
                    @foreach($plans as $plan)
                        <tr>
                            <td>
                                {{$plan->name}}
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
                {!! $plans ?? ''->appends($filters)->links() !!}
            @else
                {!! $plans ?? ''->links() !!}
            @endif
        </div>
    </div>
</div>
@stop
