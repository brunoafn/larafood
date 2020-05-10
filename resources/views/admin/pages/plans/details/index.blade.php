
@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard </a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos </a></li>
        <li class="breadcrumb-item"><a href="{{route('plans.show', $plan->url)}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('details.plan.index', $plan->url)}}">Detalhes do Plano {{$plan->name}}</a></li>
        <li class="breadcrumb-item active"><a href="{{route('details.plan.create',$plan->url)}}">Adicionar detalhe para o plano {{$plan->name}} </a></li>
    </ol>

    <h1>Detalhes do plano {{$plan->name}}<a href="{{route('details.plan.create', $plan->url)}}" class="btn btn-dark">ADD</a></h1>

@stop

@section('content')
<div class="card">

        <form action="{{route('plans.search')}}" method="POST">
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
                        <th width="150">Ações</th>
                    </tr>
                <thead>
                <tbody>
                    @foreach($details as $detail)
                        <tr>
                            <td>
                                {{$detail->name}}
                            </td>
                            <td>
                                <a href="{{route('details.plan.edit',[$plan->url, $detail->id])}}"class="btn btn-success">Editar</a>
                                <a href="{{route('details.plan.show',[$plan->url, $detail->id])}}"class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
        </div>

</div>
@stop
